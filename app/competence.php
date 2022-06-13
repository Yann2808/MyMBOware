<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations;

class competence extends Model
{
    
    /**
     * Une eavluation peut evaluer plusieurs compétences
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * 
     */

     public function evaluations()
     {
        return $this -> belongsToMany('App\evaluation', 'competence_evaluation', 'eval_id', 'comp_id') -> withPivot('note');
     }
}
