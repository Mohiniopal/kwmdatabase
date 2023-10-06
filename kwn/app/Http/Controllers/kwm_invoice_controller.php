<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_invoice;
use DB;

class kwm_invoice_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_invoice_old')->get();

        foreach($data as $d)
        {

            $data1=kwm_invoice::where('id','=',$d->id)->first();

            if($data1)
            {
                $quote = kwm_invoice::find($d->id);
                $quote->wofc_id = $d->wofc_id;
                $quote->rep_id = $d->rep_id;
                $quote->est_id = $d->est_id;
                $quote->descr = $d->descr;
                $quote->qty = $d->qty;
                $quote->cprice = $d->cprice;
                $quote->uprice = $d->uprice;
                $quote->dis = $d->dis;
                $quote->amnt = $d->amnt;
                $quote->pgst = $d->pgst;
                $quote->sub = $d->sub;
                $quote->gst = $d->gst;
                $quote->ttl = $d->ttl;
                $quote->datetime = $d->datetime;
                $quote->idatetime = $d->idatetime;
                $quote->pay = $d->pay;
                $quote->pay_type = $d->pay_type;
                $quote->status = $d->status;
                $quote->custype = $d->custype;
                $quote->car_coll = $d->car_coll;
                $quote->car_col_date = $d->car_col_date;
                $quote->crt_car = $d->crt_car;
                $quote->crt_car_date = $d->crt_car_date;
                $quote->add_by = $d->add_by;
                $quote->sup = $d->sup;
                $quote->odo = $d->odo;
                $quote->car = $d->car;
                $quote->cust = $d->cust;
                $quote->note = $d->note;
                $quote->hnote = $d->hnote;
                $quote->updated_at = date("Y-m-d h:i:sa");
    
                $res=$quote->save();

            }else{
                $quote = new kwm_invoice;
                $quote->wofc_id = $d->wofc_id;
                $quote->rep_id = $d->rep_id;
                $quote->est_id = $d->est_id;
                $quote->descr = $d->descr;
                $quote->qty = $d->qty;
                $quote->cprice = $d->cprice;
                $quote->uprice = $d->uprice;
                $quote->dis = $d->dis;
                $quote->amnt = $d->amnt;
                $quote->pgst = $d->pgst;
                $quote->sub = $d->sub;
                $quote->gst = $d->gst;
                $quote->ttl = $d->ttl;
                $quote->datetime = $d->datetime;
                $quote->idatetime = $d->idatetime;
                $quote->pay = $d->pay;
                $quote->pay_type = $d->pay_type;
                $quote->status = $d->status;
                $quote->custype = $d->custype;
                $quote->car_coll = $d->car_coll;
                $quote->car_col_date = $d->car_col_date;
                $quote->crt_car = $d->crt_car;
                $quote->crt_car_date = $d->crt_car_date;
                $quote->add_by = $d->add_by;
                $quote->sup = $d->sup;
                $quote->odo = $d->odo;
                $quote->car = $d->car;
                $quote->cust = $d->cust;
                $quote->note = $d->note;
                $quote->hnote = $d->hnote;
               
    
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
