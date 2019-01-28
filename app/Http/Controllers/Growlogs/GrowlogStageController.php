<?php

namespace App\Http\Controllers\Growlogs;

use App\Http\Controllers\Controller;
use App\Models\Growlogs\Growlog;
use App\Models\Growlogs\GrowlogStage;
use App\Http\Requests\StageRequest;
use Illuminate\Http\Request;
use Redirect;

class GrowlogStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Growlog $growlog)
    {
      return 'hola: ';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function show(Growlog $growlog, GrowlogStage $growlogstage )
    {
      return 'hola: '.$growlog.' chao: '.$growlogstage;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Growlog $growlog, GrowlogStage $growlogstage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Growlog $growlog, GrowlogStage $growlogstage)
    {
      $growlogstage->update(['stage_start' => $request->date]);
      return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Growlog $growlog, GrowlogStage $growlogstage)
    {
        //
    }

}
