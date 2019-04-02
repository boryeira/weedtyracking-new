<?php

namespace App\Http\Controllers\Growlogs;

use App\Http\Controllers\Controller;
use App\Models\Growlogs\Growlog;
use App\Models\Growlogs\GrowlogDays\GrowlogDay;
// use App\Http\Requests\StageRequest;
use Illuminate\Http\Request;
use Session;

class GrowlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $growlogDays =  GrowlogDay::orderBy('updated_at','desc')->simplePaginate(16);
        return view('growlogs.index')->with('growlogDays',$growlogDays);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('growlogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request);

          //request()->file('image')->storeAs('public/files/vouchers/', $bill->id.'_'.$request->voucher_number.'.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function show(Growlog $growlog)
    {

      $days = $growlog->days()->paginate(5);
      return view('growlogs.show')->with('growlog',$growlog)->with('days',$days);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Growlog $growlog)
    {
        return view('growlogs.edit')->with('growlog',$growlog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Growlog $growlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Growlog $growlog)
    {
        //
    }

    public function stages(StageRequest $request, Growlog $growlog)
    {
      dd($request->all());
    }


}
