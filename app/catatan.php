<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catatan extends Model
{
    protected $fillable = [
        'id_pengajuan','id_status','catatan','iduser'
    ];
}
