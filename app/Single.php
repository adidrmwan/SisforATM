<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Single extends Model
{
    protected $table = 'single';
    protected $primaryKey = 'id';
    protected $fillable = ['id_atm','lokasi','pengelola','jatuhtempo','denom','performance','transaksi','feebased','ac','cctv','tanggal',];
}
