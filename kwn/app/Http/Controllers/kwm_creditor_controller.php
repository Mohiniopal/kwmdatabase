<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_creditor;
use DB;

class kwm_creditor_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_creditor_old')->get();

        foreach($data as $d)
        {
            $data1=kwm_creditor::where('id','=',$d->id)->first();

            if($data1)
            {
                $bgcareer = kwm_creditor::find($d->id);;
                $bgcareer->name = $d->name;
                $bgcareer->inv_number = $d->inv_number;
                $bgcareer->inv_date = $d->inv_date;
                $bgcareer->item = $d->item;
                $bgcareer->qty = $d->qty;
                $bgcareer->stm_no = $d->stm_no;
                $bgcareer->stm_date = $d->stm_date;
                $bgcareer->pay_due_date = $d->pay_due_date;
                $bgcareer->updated_at = date("Y-m-d h:i:sa");
               
                
                $res=$bgcareer->save();
            }else{
                $bgcareer = new kwm_creditor;
                $bgcareer->id = $d->id;
                $bgcareer->name = $d->name;
                $bgcareer->inv_number = $d->inv_number;
                $bgcareer->inv_date = $d->inv_date;
                $bgcareer->item = $d->item;
                $bgcareer->qty = $d->qty;
                $bgcareer->stm_no = $d->stm_no;
                $bgcareer->stm_date = $d->stm_date;
                $bgcareer->pay_due_date = $d->pay_due_date;
               
               
                
                $res=$bgcareer->save();
            }
            

            print_r($bgcareer);
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
