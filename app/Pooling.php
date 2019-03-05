<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pooling extends Model
{
    protected $table = 'pooling';
    protected $primaryKey = 'id';
    protected $fillable = ['id_atm','lokasi','pengelola','jatuhtempo','denom','performance','transaksi','feebased','ac','cctv','tanggal',];
}
