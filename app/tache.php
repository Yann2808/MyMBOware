<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tache extends Model
{
    protected $fillable = [
        'Id_objectif', 'id_tache', 'libellé_tache', 'description_tache', 'date_début', 'date_fin'
    ];

}
