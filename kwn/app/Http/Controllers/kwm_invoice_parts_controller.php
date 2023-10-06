<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_invoice;
use App\Models\kwm_invoice_part;
use DB;


class kwm_invoice_parts_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_invoices')->select('id','est_id','descr','qty','cprice','uprice','dis','amnt','pgst')->get();

        foreach($data as $d)
        {
            $dis = explode("|",$d->dis);
            $descr = explode("|",$d->descr);
            $qty = explode("|",$d->qty);
            $cprice = explode("|",$d->cprice);
            $uprice = explode("|",$d->uprice);
            $amnt = explode("|",$d->amnt);
            $pgst = explode("|",$d->pgst);

            $total = count($dis);

            // print_r($total);
            // exit;

            for($i=0; $i<$total; $i++)
            {
                if($i>0)
                {
                    if($d->dis != '' && $d->descr != '' && $d->qty != '' && $d->cprice != '' && $d->uprice != '' && $d->amnt != '' && $d->pgst != '')
                    {
                        $parts = new kwm_invoice_part;

                        $parts->est_id = $d->est_id;
        
                        if(array_key_exists($i,$descr) && $descr != '')
                        {
                            $descr2 = DB::table('parts_master')->select('PartId')->where('PartName',$descr[$i])->first();
        
                            if(empty($descr2))
                            {
                                $insert = DB::table('parts_master')->insertGetId(['PartName' => $descr[$i],'ParentId' =>'0']);
        
                                $parts->parts_no = $insert;
        
                            }else{
                                $parts->parts_no = $descr2->PartId;
                            }
                        
                        }
                        
                        if($qty[$i] != '')
                        {
                            $parts->qty = $qty[$i];
                        }else{
                            $parts->qty = null;
                        }
                        
                        if($cprice[$i] != '')
                        {
                            $parts->cprice = $cprice[$i];
                        }else{
                            $parts->cprice = null;
                        }
                        
                        if($uprice[$i] != '')
                        {
                            $parts->uprice = $uprice[$i];
                        }else{
                            $parts->uprice = null;
                        }
                        
                        if($dis[$i] != '')
                        {
                            $parts->dis = $dis[$i];
                        }else{
                            $parts->dis = null;
                        }
                        
                        if($amnt[$i] != '')
                        {
                            $parts->amnt = $amnt[$i];
                        }else{
                            $parts->amnt = null;
                        }
                    
                        if($pgst[$i] != '')
                        {
                            $parts->pgst = $pgst[$i];
                        }else{
                            $parts->pgst = null;
                        }
        
                        $res=$parts->save();

                        print_r($parts);
                    }
                }
                

                
                ini_set('max_execution_time', 300);
            }
           
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
