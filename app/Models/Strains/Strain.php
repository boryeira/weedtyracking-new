<?php

namespace App\Models\Strains;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Strain extends Model
{
		use SoftDeletes;
    protected $table = 'strains';

    public function bank()
    {
        return $this->belongsTo('App\Models\Strains\Bank');
    }


}
