<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;
use App\Models\Growlogs\GrowlogStage;
// use App\Transformers\GrowlogTransformer;


class Growlog extends Model
{
  protected $fillable = [
      'name', 'user_id',
  ];

  protected $dates = ['date' ];
    //transformador para la api
  //public $transformer = GrowlogTransformer::Class;

  //Usuario dueño del seguimiento
  public function user()
  {
      return $this->belongsTo('App\Models\Users\User');
  }
  //Variedad del seguimiento
  public function strain()
  {
      return $this->belongsTo('App\Models\Strains\Strain');
  }
  //bitacora diaria del seguimiento
  public function days()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogDays\GrowlogDay', 'growlog_id')
                  ->orderBy('date', 'desc');
  }

  //estapas del seguimiento
  public function growlogStages()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogStage', 'growlog_id');
  }

  //Etapa actual
  public function actualStage()
  {
      $growlogStage = $this->hasMany('App\Models\Growlogs\GrowlogStage', 'growlog_id')->where('stage_start','<=',today())->where('stage_end',null)->first();
      if($growlogStage == null) //modelo default si no se encuentra alguna etapa
      {
        $stage = new GrowlogStage;
        $stage->name = '-Sin estado-';
        $stage->class = 'secondary';
      } else {
        $stage = $growlogStage->stage;
      }
      return $stage;
  }

//todas las imagenes del seguimiento.
  public function images()
  {
      return $this->hasManyThrough('App\Models\Growlogs\GrowlogDays\GrowlogDayImage', 'App\Models\Growlogs\GrowlogDay', 'growlog_id','growlog_day_id','id','id');
  }
}
