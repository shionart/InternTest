<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    //
    protected $table = 'absen';
    protected $fillable = ['tanggal','waktu','kerja','keterangan'];
}
