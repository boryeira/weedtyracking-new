<?php

namespace App\Models\Growlogs\GrowlogDays;

use Illuminate\Database\Eloquent\Model;
// use App\Transformers\GrowlogDayTransformer;
// use App\Observers\GrowlogDayObserver;


class GrowlogDay extends Model
{
  protected $dates = [
      'date'
  ];
  //transformador para la api
  //public $transformer = GrowlogDayTransformer::Class;

  //seguimiento al que pertenece.
  public function growlog()
  {
      return $this->belongsTo('App\Models\Growlogs\Growlog');
  }
  //imagenes del dia
  public function images()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogDays\GrowlogDayImage');
  }
  //textos del dia
  public function texts()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogDays\GrowlogDayText');
  }
  //etapa del dia
  public function stage()
  {
      return $this->belongsTo('App\Models\Growlogs\Stage');
  }

}
