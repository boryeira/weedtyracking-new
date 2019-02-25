<?php

namespace App\Http\Controllers\Growlogs;

use App\Http\Controllers\Controller;
use App\Models\Growlogs\GrowlogDays\GrowlogDay;
use App\Models\Growlogs\GrowlogDays\GrowlogDayText;
use App\Models\Growlogs\GrowlogDays\GrowlogDayImage;
use App\Models\Growlogs\Growlog;

use App\Http\Requests\Growlogs\DayRequest;
use Illuminate\Http\Request;
use Session;
use Storage;
use Carbon\Carbon;

class GrowlogDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'entre';
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
    public function store(DayRequest $request, Growlog $growlog )
    {

      dd($request->all());
        $growlogDay = new GrowlogDay;
        $growlogDay->growlog_id = $growlog->id;
        $growlogDay->date = Carbon::createFromFormat('d/m/Y', $request->date);

        if($growlogDay->save())
        {
          //condicional de imagenes
          if($request->file('images'))
          {

            foreach ( $request->file('images') as $img) {
              $path = $img->store('growlogs/'.$growlog->id);
              $raw = Storage::url($path);

              $growlogDayImage = new GrowlogDayImage;
              $growlogDayImage->growlog_day_id = $growlogDay->id;
              $growlogDayImage->raw = $raw;
              $growlogDayImage->save();
            }
          }

          //condicional de texto
          if($request->text!=null)
          {
            $growlogDayText = new GrowlogDayText;
            $growlogDayText->growlog_day_id = $growlogDay->id;
            $growlogDayText->content = $request->text;
            $growlogDayText->save();
          }




          Session::flash('success', 'Vitacora Actualizada!');
          return  redirect('/growlogs/'.$growlog->id);

        } else {

          Session::flash('warning', 'Seguimiento ya creado. Puedes editarlo AQUI');
          return  redirect('/growlogs/'.$growlog->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrowlogDay  $growlogDay
     * @return \Illuminate\Http\Response
     */
    public function show(Growlog $growlog, GrowlogDay $day)
    {
        return view('growlogs.days.show')
                    ->with('growlog',$growlog)
                    ->with('day',$day);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrowlogDay  $growlogDay
     * @return \Illuminate\Http\Response
     */
    public function edit(GrowlogDay $growlogDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrowlogDay  $growlogDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrowlogDay $growlogDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrowlogDay  $growlogDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrowlogDay $growlogDay)
    {
        //
    }
}
