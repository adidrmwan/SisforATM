<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    protected $table = 'drive';
    protected $primaryKey = 'id';
    protected $fillable = ['id_atm','lokasi','pengelola','jatuhtempo','denom','performance','transaksi','feebased','ac','cctv','tanggal',];
}
