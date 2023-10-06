<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_invoice_part;
use App\Models\kwm_jobcard;
use App\Models\kwm_invoice;
use DB;

class test2_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
    {
        $data = DB::table('kwm_invoice')->select('id','descr','qty','cprice','uprice','dis','amnt','pgst')->get();

        // print_r($data);
        // exit;

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
                if($d->dis != '' && $d->descr != '' && $d->qty != '' && $d->cprice != '' && $d->uprice != '' && $d->amnt != '' && $d->pgst != '')
                {
                    $parts = new kwm_invoice_part;

                    $parts->est_id = $d->id;
    
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
                }
                

                print_r($parts);
                ini_set('max_execution_time', 300);
            }
           
        }
    }
    //  public function index(Request $request)
    //  {
    //     $data = DB::table('kwm_invoice')->get()->toArray();

    //     // print_r($data);
    //     // exit;

    //     foreach($data as $d)
    //     {
    //         $quote = new kwm_invoice;
    //         $quote->wofc_id = $d->wofc_id;
    //         $quote->rep_id = $d->rep_id;
    //         $quote->est_id = $d->est_id;
    //         $quote->descr = $d->descr;
    //         $quote->qty = $d->qty;
    //         $quote->cprice = $d->cprice;
    //         $quote->uprice = $d->uprice;
    //         $quote->dis = $d->dis;
    //         $quote->amnt = $d->amnt;
    //         $quote->pgst = $d->pgst;
    //         $quote->sub = $d->sub;
    //         $quote->gst = $d->gst;
    //         $quote->ttl = $d->ttl;
    //         $quote->datetime = $d->datetime;
    //         $quote->idatetime = $d->idatetime;
    //         $quote->pay = $d->pay;
    //         $quote->pay_type = $d->pay_type;
    //         $quote->status = $d->status;
    //         $quote->custype = $d->custype;
    //         $quote->car_coll = $d->car_coll;
    //         $quote->car_col_date = $d->car_col_date;
    //         $quote->crt_car = $d->crt_car;
    //         $quote->crt_car_date = $d->crt_car_date;
    //         $quote->add_by = $d->add_by;
    //         $quote->sup = $d->sup;
    //         $quote->odo = $d->odo;
    //         $quote->car = $d->car;
    //         $quote->cust = $d->cust;
    //         $quote->note = $d->note;
    //         $quote->hnote = $d->hnote;
           

    //         $res=$quote->save();
    //     }

    //     print_r($quote);
    //     exit;
    //  }

    //  public function index(Request $request)
    //  {
    //      $data = DB::table('kwm_jobcards')->select('id','descr')->get();
 
    //      // print_r($data);
    //      // exit;
 
    //      foreach($data as $d)
    //      {
           
    //          $descr = explode("|",$d->descr);
          
 
    //          $total = count($descr);
 
    //          // print_r($total);
    //          // exit;
 
    //          for($i=0; $i<$total; $i++)
    //          {
    //              if($d->descr != '')
    //              {
    //                  $parts = new kwm_jobcard_part;
 
    //                  $parts->jc_id = $d->id;
     
    //                  if(array_key_exists($i,$descr) && $descr != '')
    //                  {
    //                      $descr2 = DB::table('parts_master')->select('PartId')->where('PartName',$descr[$i])->first();
     
    //                      if(empty($descr2))
    //                      {
    //                          $insert = DB::table('parts_master')->insertGetId(['PartName' => $descr[$i],'ParentId' =>'0']);
     
    //                          $parts->part_id = $insert;

    //                          $parts->part_no = $insert;
     
    //                      }else{
    //                          $parts->part_id = $descr2->PartId;

    //                          $parts->part_no = $descr2->PartId;
    //                      }
                     
    //                  }
                     
                    
     
    //                  $res=$parts->save();
    //              }
                 
 
    //              print_r($parts);
    //              ini_set('max_execution_time', 300);
    //          }
            
    //      }
    //  }

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
