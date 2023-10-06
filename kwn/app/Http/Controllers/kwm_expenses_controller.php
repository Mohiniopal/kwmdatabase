<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_expenses;
use DB;

class kwm_expenses_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('old_kwm_expense')->get();

        foreach($data as $d)
        {
            $item = explode("|",$d->item);
            $qty = explode("|",$d->qty);
            $price = explode("|",$d->price);

            $total = count($item);

            for($i=0; $i<$total; $i++)
            {
                if($i>0)
                {
                    if($d->item != '' && $d->qty != '' && $d->price)
                    {
                        $bgcareer = new kwm_expenses;
                        $bgcareer->sup_id = $d->sup_id;
                        $bgcareer->sup_name = $d->sup_name;
                        $bgcareer->inv_no = $d->inv_no;
                        $bgcareer->inv_date = $d->inv_date;
                        $bgcareer->total = $d->total;
                        $bgcareer->datetime = $d->datetime;
    
                        if($item[$i] != '')
                        {
                            $bgcareer->item = $item[$i];
                        }else{
                            $bgcareer->item = null;
                        }
    
                        if($qty[$i] != '')
                        {
                            $bgcareer->qty = $qty[$i];
                        }else{
                            $bgcareer->qty = null;
                        }
    
                        if($price[$i] != '')
                        {
                            $bgcareer->price = $price[$i];
                        }else{
                            $bgcareer->price = null;
                        }
    
                       
                    
                        $res=$bgcareer->save();
                    }
                }
                
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
