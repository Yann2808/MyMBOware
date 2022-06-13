<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations;

use Illuminate\Support\Facades\Auth;

class evaluation extends Model
{
    
    /**
     * Une eavluation peut evaluer plusieurs compétences
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * 
     */

     public function competences()
     {
        return $this -> belongsToMany('App\competence', 'competence_evaluation', 'comp_id', 'eval_id') -> withPivot('note');
     }
}
