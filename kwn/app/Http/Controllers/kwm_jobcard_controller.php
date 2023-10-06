<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_jobcard;
use DB;


class kwm_jobcard_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_jobcard_old')->get();

        foreach($data as $d)
        {
            $data1=kwm_jobcard::where('id','=',$d->id)->first();

            if($data1)
            {
                $quote = kwm_jobcard::find($d->id);
                $quote->mec_id = $d->mec_id;
                $quote->wofc_id = $d->wofc_id;
                $quote->rep_id = $d->rep_id;
                $quote->est_id = $d->est_id;
                $quote->descr = $d->descr;
                $quote->note = $d->note;
                $quote->mec_note = $d->mec_note;
                $quote->starttime = $d->starttime;
                $quote->endtime = $d->endtime;
                $quote->datetime = $d->datetime;
                $quote->status = $d->status;
                $quote->sup = $d->sup;
                $quote->add_by = $d->add_by;
                $quote->car = $d->car;
                $quote->cust = $d->cust;
                $quote->hnote = $d->hnote;
                $quote->image1 = $d->image1;
                $quote->image2 = $d->image2;
                $quote->crt_car_date = $d->crt_car_date;
                $quote->odo = $d->odo;
                $quote->seen = $d->seen;
                $quote->updated_at = date("Y-m-d h:i:sa");
                $quote->save();
            }else{
                $quote = new kwm_jobcard;
                $quote->mec_id = $d->mec_id;
                $quote->wofc_id = $d->wofc_id;
                $quote->rep_id = $d->rep_id;
                $quote->est_id = $d->est_id;
                $quote->descr = $d->descr;
                $quote->note = $d->note;
                $quote->mec_note = $d->mec_note;
                $quote->starttime = $d->starttime;
                $quote->endtime = $d->endtime;
                $quote->datetime = $d->datetime;
                $quote->status = $d->status;
                $quote->sup = $d->sup;
                $quote->add_by = $d->add_by;
                $quote->car = $d->car;
                $quote->cust = $d->cust;
                $quote->hnote = $d->hnote;
                $quote->image1 = $d->image1;
                $quote->image2 = $d->image2;
                $quote->crt_car_date = $d->crt_car_date;
                $quote->odo = $d->odo;
                $quote->seen = $d->seen;
                
               
    
                $res=$quote->save();
            }
            

            print_r($quote);
            ini_set('max_execution_time', 300);
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
