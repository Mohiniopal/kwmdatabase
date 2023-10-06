<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_invoice;
use App\Models\kwm_jobcard;
use App\Models\kwm_quote;
use App\Models\kwm_user;
use App\Models\kwm_vehicle;
use App\Models\kwm_wof_book;
use App\Models\kwm_wof_sheet;
use App\Models\kwm_quote_part;
use DB;

class test_controller extends Controller
{
    /**-
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('kwm_quotes')->select('id','descr','qty','cprice','uprice','dis','amnt','pgst')->get();

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
                    $parts = new kwm_quote_part;

                    $parts->est_id = $d->id;
    
                    if(array_key_exists($i,$descr) && $descr != '')
                    {
                        $descr2 = DB::table('parts_master')->select('PartId')->where('PartName',$descr[$i])->first();
    
                        if(empty($descr2))
                        {
                            $insert = DB::table('parts_master')->insertGetId(['PartName' => $descr[$i],'ParentId' =>'0']);
    
                            $parts->part_id = $insert;
    
                        }else{
                            $parts->part_id = $descr2->PartId;
                        }
                    
                    }
                    
                    if($qty[$i] != '')
                    {
                        $parts->qty = trim(str_replace('Â', '', $qty[$i]),"/");
                    }else{
                        $parts->qty = null;
                    }
                    
                    if($cprice[$i] != '')
                    {
                        $parts->cprice = trim(str_replace('Â', '', $cprice[$i]),"/");
                    }else{
                        $parts->cprice = null;
                    }
                    
                    if($uprice[$i] != '')
                    {
                        $parts->uprice = trim(str_replace('Â', '', $uprice[$i]),"/");
                    }else{
                        $parts->uprice = null;
                    }
                    
                    if($dis[$i] != '')
                    {
                        $parts->dis = trim(str_replace('Â', '', $dis[$i]),"/");
                    }else{
                        $parts->dis = null;
                    }
                    
                    if($amnt[$i] != '')
                    {
                        $parts->amnt = trim(str_replace('Â', '', $amnt[$i]),"/");
                    }else{
                        $parts->amnt = null;
                    }
                
                    if($pgst[$i] != '')
                    {
                        $parts->pgst = trim(str_replace('Â', '', $pgst[$i]),"/");
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
    //     $data = DB::table('kwm_quotes_new')->get()->toArray();

    //     // print_r($data);
    //     // exit;

    //     foreach($data as $d)
    //     {
    //         $quote = new kwm_quote;
    //         $quote->wofc_id = $d->wofc_id;
    //         $quote->rep_id = $d->rep_id;
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
    //         $quote->status = $d->status;
    //         $quote->custype = $d->custype;
    //         $quote->sup = $d->sup;
    //         $quote->odo = $d->odo;
    //         $quote->cust = $d->cust;
    //         $quote->car = $d->car;
    //         $quote->note = $d->note;
    //         $quote->hnote = $d->hnote;
           

    //         $res=$quote->save();
    //     }

    //     print_r($quote);
    //     exit;
    //  }
    // public function index(Request $request)
    // {
    //     $data = DB::table('kwm_wof_sheet')->get()->toArray();

        
    //     foreach($data as $d)
    //     {
    //         // $data1 = kwm_vehicle::select('plateno')->where('plateno',$d->plateno)->first();

    //         // if($data1)
    //         // {

    //         // }else{
    //             $invoice = new kwm_wof_sheet;
    //             $invoice->cus_id = $d->cus_id;
    //             $invoice->car_id = $d->car_id;
    //             $invoice->apdatetime = $d->apdatetime;
    //             $invoice->datetime = $d->datetime;
    //             $invoice->status = $d->status;
    //             $invoice->attend_by = $d->attend_by;
    //             $res=$invoice->save();
                
    //         // }
    //     //   print_r($data1);
    //     }

    //     echo 1;
    //             exit;
    // }
    // public function index(Request $request)
    // {
    //     $data = DB::table('old_kwm_quote')->get()->toArray();

        
    //     foreach($data as $d)
    //     {
    //     //    print_r($d);
    //         $cust = $d->cust;
    //         $car = $d->car;
    //         if($d->uprice != '')
    //         {
    //             $dis = explode("|",$d->dis);
    //             $descr = explode("|",$d->descr);
    //             $qty = explode("|",$d->qty);
    //             $cprice = explode("|",$d->cprice);
    //             $uprice = explode("|",$d->uprice);
    //             $amnt = explode("|",$d->amnt);
    //             $pgst = explode("|",$d->pgst);

    //             $total = count($dis);

    //             // print_r($total);
    //             // exit;
    //         }
        
    //         if($total && $d->uprice != '')
    //         {

    //             for($i=0; $i<$total; $i++)
    //             {
    //                 $invoice = new kwm_quote;
    //                 $invoice->wofc_id = $d->wofc_id;
    //                 $invoice->rep_id = $d->rep_id;
                    
    //                 if(array_key_exists($i,$descr))
    //                 {
    //                     $invoice->descr = $descr[$i];
    //                 }else{
    //                     $invoice->descr = '';
    //                 }
                 
    //                 if(array_key_exists($i,$qty))
    //                 {
    //                     $invoice->qty = $qty[$i];
    //                 }else{
    //                     $invoice->qty = '';
    //                 }
                  
    //                 if(array_key_exists($i,$cprice))
    //                 {
    //                     $invoice->cprice = $cprice[$i];
    //                 }else{
    //                     $invoice->cprice = '';
    //                 }
                 
    //                 if(array_key_exists($i,$uprice))
    //                 {
    //                     $invoice->uprice = $uprice[$i];
    //                 }else{
    //                     $invoice->uprice = '';
    //                 }
                    
                   
    //                 if(array_key_exists($i,$amnt))
    //                 {
    //                     $invoice->amnt = $amnt[$i];
    //                 }else{
    //                     $invoice->amnt = '';
    //                 }
               
    //                 if(array_key_exists($i,$pgst))
    //                 {
    //                     $invoice->pgst = $pgst[$i];
    //                 }else{
    //                     $invoice->pgst = '';
    //                 }

    //                 $invoice->sub = $d->sub;
    //                 $invoice->gst = $d->gst;
    //                 if($d->datetime != '0000-00-00')
    //                 {
    //                     $invoice->datetime = $d->datetime;
    //                 }
    //                 if($d->idatetime != '0000-00-00 00:00:00')
    //                 {
    //                     $invoice->idatetime = $d->idatetime;
    //                 }
                    
    //                 $invoice->ttl = $d->ttl;
    //                 $invoice->status = $d->status;
    //                 $invoice->custype = $d->custype;
    //                 $invoice->sup = $d->sup;
    //                 $invoice->odo = $d->odo;
    //                 $invoice->add_by = $d->add_by;
    //                 $invoice->note = $d->note;
    //                 $invoice->hnote = $d->hnote;
    //                 $invoice->cust = $cust;
    //                 $invoice->car = $car;
    //                 if(array_key_exists($i,$dis))
    //                 {
    //                     $invoice->dis = $dis[$i];
    //                 }else{
    //                     $invoice->dis = '';
    //                 }

                
                
    //                 $res=$invoice->save();
                    
                    
    //             }
               
    //         }else{
    //             $invoice = new kwm_quote;
    //             $invoice->wofc_id = $d->wofc_id;
    //             $invoice->rep_id = $d->rep_id;
                
    //             $invoice->sub = $d->sub;
    //             $invoice->gst = $d->gst;
    //             if($d->datetime != '0000-00-00')
    //             {
    //                 $invoice->datetime = $d->datetime;
    //             }
    //             if($d->idatetime != '0000-00-00 00:00:00')
    //             {
    //                 $invoice->idatetime = $d->idatetime;
    //             }
                
    //             $invoice->ttl = $d->ttl;
    //             $invoice->status = $d->status;
    //             $invoice->custype = $d->custype;
    //             $invoice->sup = $d->sup;
    //             $invoice->odo = $d->odo;
    //             $invoice->add_by = $d->add_by;
    //             $invoice->note = $d->note;
    //             $invoice->hnote = $d->hnote;
    //             $invoice->cust = $cust;
    //             $invoice->car = $car;
    //             $res=$invoice->save();
    //         }
           
                

    //         ini_set('max_execution_time', 180);    
               
    //     }
    //     print_r($invoice);
    //     exit;
        
    // } 

    // public function index(Request $request)
    // {
    //     $data = DB::table('old_kwm_invoice')->get()->toArray();

        
    //     foreach($data as $d)
    //     {
    //     //    print_r($d);
    //         $cust = $d->cust;
    //         $car = $d->car;
    //         if($d->uprice != '')
    //         {
    //             $dis = explode("|",$d->dis);
    //             $descr = explode("|",$d->descr);
    //             $qty = explode("|",$d->qty);
    //             $cprice = explode("|",$d->cprice);
    //             $uprice = explode("|",$d->uprice);
    //             $amnt = explode("|",$d->amnt);
    //             $pgst = explode("|",$d->pgst);

    //             $total = count($dis);

    //             // print_r($total);
    //             // exit;
    //         }
        
    //         if($total)
    //         {

    //             for($i=0; $i<$total; $i++)
    //             {
    //                 $invoice = new kwm_invoice;
    //                 $invoice->wofc_id = $d->wofc_id;
    //                 $invoice->rep_id = $d->rep_id;
    //                 $invoice->est_id = $d->est_id;
                    
    //                 $invoice->sub = $d->sub;
    //                 $invoice->gst = $d->gst;
    //                 if($d->datetime != '0000-00-00')
    //                 {
    //                     $invoice->datetime = $d->datetime;
    //                 }
    //                 if($d->idatetime != '0000-00-00 00:00:00')
    //                 {
    //                     $invoice->idatetime = $d->idatetime;
    //                 }
                    
    //                 $invoice->ttl = $d->ttl;
    //                 $invoice->pay = $d->pay;
    //                 $invoice->pay_type = $d->pay_type;
    //                 $invoice->car_coll = $d->car_coll;
    //                 $invoice->car_col_date = $d->car_col_date;
    //                 $invoice->crt_car = $d->crt_car;
    //                 $invoice->crt_car_date = $d->crt_car_date;
    //                 $invoice->status = $d->status;
    //                 $invoice->custype = $d->custype;
    //                 $invoice->sup = $d->sup;
    //                 $invoice->odo = $d->odo;
    //                 $invoice->add_by = $d->add_by;
    //                 $invoice->note = $d->note;
    //                 $invoice->hnote = $d->hnote;
    //                 $invoice->cust = $cust;
    //                 $invoice->car = $car;

    //                 if(array_key_exists($i,$dis))
    //                 {
    //                     $invoice->dis = $dis[$i];
    //                 }else{
    //                     $invoice->dis = '';
    //                 }

    //                 if(array_key_exists($i,$descr))
    //                 {
    //                     $invoice->descr = $descr[$i];
    //                 }else{
    //                     $invoice->descr = '';
    //                 }
                 
    //                 if(array_key_exists($i,$qty))
    //                 {
    //                     $invoice->qty = $qty[$i];
    //                 }else{
    //                     $invoice->qty = '';
    //                 }
                  
    //                 if(array_key_exists($i,$cprice))
    //                 {
    //                     $invoice->cprice = $cprice[$i];
    //                 }else{
    //                     $invoice->cprice = '';
    //                 }
                 
    //                 if(array_key_exists($i,$uprice))
    //                 {
    //                     $invoice->uprice = $uprice[$i];
    //                 }else{
    //                     $invoice->uprice = '';
    //                 }
                    
                   
    //                 if(array_key_exists($i,$amnt))
    //                 {
    //                     $invoice->amnt = $amnt[$i];
    //                 }else{
    //                     $invoice->amnt = '';
    //                 }
               
    //                 if(array_key_exists($i,$pgst))
    //                 {
    //                     $invoice->pgst = $pgst[$i];
    //                 }else{
    //                     $invoice->pgst = '';
    //                 }
                
    //                 $res=$invoice->save();
                    
                    
    //             }
               
    //         }
           
    //         ini_set('max_execution_time', 180);    
               
    //     }
    //     print_r($invoice);
    //     exit;
        
    // } 


    // public function index(Request $request)
    // {
    //     $data = DB::table('old_kwm_jobcard')->get()->toArray();

        
    //     foreach($data as $d)
    //     {
    //     //    print_r($d);
          
    //         if($d->descr != '')
    //         {
               
    //             $descr = explode("|",$d->descr);
               
    //             $total = count($descr);

    //             // print_r($total);
    //             // exit;
    //         }
        
    //         if($total)
    //         {

    //             for($i=0; $i<$total; $i++)
    //             {
    //                 $invoice = new kwm_jobcard;
    //                 $invoice->mec_id = $d->mec_id;
    //                 $invoice->wofc_id = $d->wofc_id;
    //                 $invoice->rep_id = $d->rep_id;
    //                 $invoice->est_id = $d->est_id;
    //                 $invoice->note = $d->note;
    //                 $invoice->mec_note = $d->mec_note;
    //                 $invoice->starttime = $d->starttime;
    //                 $invoice->endtime = $d->endtime;
    //                 $invoice->status = $d->status;
    //                 $invoice->sup = $d->sup;
    //                 $invoice->add_by = $d->add_by;
    //                 $invoice->hnote = $d->hnote;
    //                 $invoice->image1 = $d->image1;
    //                 $invoice->image2 = $d->image2;
    //                 $invoice->crt_car_date = $d->crt_car_date;
    //                 $invoice->odo = $d->odo;
    //                 $invoice->seen = $d->seen;

    //                 if($d->datetime != '0000-00-00')
    //                 {
    //                     $invoice->datetime = $d->datetime;
    //                 }
                   
    //                 $invoice->cust = $d->cust;
    //                 $invoice->car = $d->car;

                    

    //                 if(array_key_exists($i,$descr))
    //                 {
    //                     $invoice->descr = $descr[$i];
    //                 }else{
    //                     $invoice->descr = '';
    //                 }
                 
                   
                
    //                 $res=$invoice->save();
                    
                    
    //             }
               
    //         }
           
    //         ini_set('max_execution_time', 180);    
               
    //     }
    //     print_r($invoice);
    //     exit;
        
    // } 
    //$values = explode(",",$projects->skill_name);

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $data = DB::table('old_kwm_quote')->get()->toArray();

    //     foreach($data as $d)
    //     {
    //         $invoice=kwm_quote::where('cust',$d->cust)->first();

    //         if($invoice)
    //         {
    //             print_r($d->cust);
    //             echo '<br>'. 1 .'<br>';
    //         }else{
    //             print_r($d->cust);
    //             echo '<br>'. 0 .'<br>';
    //         }
    //         ini_set('max_execution_time', 180);
    //     }
    //     exit;
    // }

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
