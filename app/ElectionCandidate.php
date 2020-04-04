<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionCandidate extends Model
{
    public function party()
    {
        return $this->belongsTo('App\FederalElectionParty');
    }

    public function electorate(){
        return $this->belongsTo('App\Electorate');
    }
}
