<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = 'center';
    protected $primaryKey = 'id';
    protected $fillable = ['id_atm','lokasi','pengelola','jatuhtempo','denom','performance','transaksi','feebased','ac','cctv','tanggal',];
}
