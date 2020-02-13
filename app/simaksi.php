<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class simaksi extends Model
{
    // protected ('data')
    static function insDataSimaksi($data)
    {
        return DB::table('data_simaksi')
                    ->insert($data);
    }

    static function insPesertaSimaksi($data)
    {
        return DB::table('daftar_peserta')
                    ->insert($data);
    }

    static function cek_kd_simaksi($id)
    {
        return DB::table('data_simaksi')
                    ->where('id_simaksi',$id)
                    ->get();
    }

    static function insPembayaran($data)
    {
        return DB::table('data_pembayaran')
                    ->insert($data);
    }

    static function dataSimaksiById($id)
    {
        return DB::table('data_simaksi')
                    ->where('id_user',$id)
                    ->get();

    }

    static function detailSimaksi($id)
    {
        return DB::table('data_simaksi')
                    ->join('daftar_peserta','data_simaksi.id_simaksi','=','daftar_peserta.id_simaksi')
                    ->where('data_simaksi.id_simaksi',$id)
                    ->orderBy('daftar_peserta.nama_peserta','asc')
                    ->get();
    }
}
