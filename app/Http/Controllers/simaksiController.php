<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\simaksi;
use Auth;
use Validator;
use Carbon\Carbon;


class simaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function daftarSimaksi()
    {
        return view('contentUser/formDaftar');
    }

    public function ProsesDaftar(Request $request)
    {
        // dd($request);
        $request->validate([
            "tanggal_naik" => 'required',
            "tanggal_turun" => 'required',
            "jumlah_peserta" => 'required',
            "nama_peserta" => 'required',
            "no_ktp" => 'required',
            "no_hp" => 'required',
            "jenis_kelamin" => 'required',
            "tanggal_lahir" => 'required',
            "alamat" => 'required',
            ]);
            
            $random_number = 'SMKS'.rand();
            $data = [
                "id_simaksi" => $random_number,
                "id_user" => Auth::user()->id,
                "tanggal_naik" => $request->tanggal_naik,
                "tanggal_turun" => $request->tanggal_turun,
                "jumlah_peserta" => $request->jumlah_peserta,
                "status" => '0',
                "created_at" => Carbon::now(),
        ];

        $insDataSimaksi = simaksi::insDataSimaksi($data);

        for($i=0; $i<count($request->nama_peserta);$i++){
            $data1 = [
                "id_simaksi" => $random_number,
                "nama_peserta" => $request->nama_peserta[$i],
                "jenis_kelamin" => $request->jenis_kelamin[$i],
                "no_ktp" => $request->no_ktp[$i],
                "tanggal_lahir" => $request->tanggal_lahir[$i],
                "no_tlpn" => $request->no_hp[$i],
                "alamat" => $request->alamat[$i],
                "created_at" => Carbon::now(),
            ];
            $insPesertaSimaksi = simaksi::insPesertaSimaksi($data1);
        }
        return redirect('/daftarSimaksi')->with('status','Berhasil Menambahkan Data');

    }

    public function bayarSimaksi()
    {
        return view('contentUser/formBayarSimaksi');
    }

    public function prosesBayarSimaksi(Request $request)
    {
        $request->validate([
            "kd_pendaftaran" => "required",
            "file" => "required|mimes:jpeg,png,jpg",
        ]);
        // dd($request);
        //check kode penadftaran ada atau tidak
        $kd_simaski = simaksi::cek_kd_simaksi($request->kd_pendaftaran);
        if(count($kd_simaski)!=0){
            $file = $request->file('file');
            if($file->move(base_path('gambar_upload'),$file->getClientOriginalName())){
                $data = [
                    "id_simaksi" => $request->kd_pendaftaran,
                    "file_name" => $file->getClientOriginalName(),
                    "paid_by" => Auth::user()->id,
                    "created_at" => Carbon::now(),
                ];
                simaksi::insPembayaran($data);
                simaksi::UpStatusPembayaran($request->kd_pendaftaran);
                return redirect('/pembayaranSimaksi')->with('berhasil','Bukti Pembayaran Anda Berhasil Di Upload');
            }
        }else{
            return redirect('/pembayaranSimaksi')->with('status','Kode Pendaftaran Tidak Ditemukan');
        }
    }

    public function HistorySimaksi(){
        $data_simaksi = simaksi::dataSimaksiById(Auth::user()->id);
        $status = 'Belum Dibayar';
        if (count($data_simaksi)!=0) {
            if($data_simaksi[0]->status==1){
                $status = 'Menunggu Konfirmasi';
            }elseif($data_simaksi[0]->status==2){
                $status = 'Lunas';
            }
        }
        return view('contentUser/history', compact('data_simaksi','status'));
    }

    public function detailSimaksi($id)
    {
        return simaksi::detailSimaksi($id);
    }
}
