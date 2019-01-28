<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;
// use App\Observers\GrowlogStageObserver;
use App\Models\Growlogs\Stage;


class GrowlogStage extends Model
{
  protected $date = ['stage_start','stage_end'];

  protected $fillable = [
      'stage_start',
      'stage_end'
  ];

//nombre etapa
  public function stage()
  {
      return $this->belongsTo('App\Models\Growlogs\Stage');
  }

  //seguimiento al que pertenece
  public function growlog()
  {
      return $this->belongsTo('App\Models\Growlogs\Growlog');
  }

  //stage previa en base al weight del objeto
    //retorna null si no pilla el objeto
  public function prevStage()
  {
    $stage = $this->stage;
    $weight = $stage->weight;
    $growlog = $this->growlog;
    $prevStage_weight = intval($weight) - 1;
    if(Stage::where('weight',$prevStage_weight)->first()){
          $prevStage = Stage::where('weight',$prevStage_weight)->first();
          return GrowlogStage::where('growlog_id',$growlog->id)->where('stage_id',$prevStage->id)->first();
    }
    else {
      return null;
    }
  }
  //stage proxima en base al weight del objeto
  //retorna null si no pilla el objeto
  public function nextStage()
  {
    $stage = $this->stage;
    $weight = $stage->weight;
    $growlog = $this->growlog;
    $nextStage_weight = intval($weight) + 1;
    if(Stage::where('weight',$nextStage_weight)->first()){
          $nextStage = Stage::where('weight',$nextStage_weight)->first();
          return GrowlogStage::where('growlog_id',$growlog->id)->where('stage_id',$nextStage->id)->first();
    }
    else {
      return null;
    }
  }


}
