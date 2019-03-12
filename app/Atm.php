<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    protected $table = 'atms';
    protected $primaryKey = 'id';
    protected $fillable = ['terminal_id','lokasi','vendor','area','tipe','tanggal',];
}
