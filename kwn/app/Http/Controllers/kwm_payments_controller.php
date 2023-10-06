<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_payments;
use DB;

class kwm_payments_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('old_kwm_payment')->get();

        foreach($data as $d)
        {
            $aleave = explode("|",$d->aleave);
            $bleave = explode("|",$d->bleave);
            $sleave = explode("|",$d->sleave);
            $pleave = explode("|",$d->pleave);

            $total = count($aleave);

            for($i=0; $i<$total; $i++)
            {
                
                    if($d->aleave != '' && $d->sleave != '' && $d->pleave != '' && $d->bleave != '')
                    {
                        $bgcareer = new kwm_payments;
                        $bgcareer->fdate = $d->fdate;
                        $bgcareer->tdate = $d->tdate;
                        $bgcareer->pdate = $d->pdate;
                        $bgcareer->emp_id = $d->emp_id;
                        $bgcareer->pay_frq = $d->pay_frq;
                        $bgcareer->whour = $d->whour;
                        $bgcareer->rate = $d->rate;
                        $bgcareer->paye = $d->paye;
                        $bgcareer->kiwi = $d->kiwi;
                        $bgcareer->sloan = $d->sloan;
                        $bgcareer->child = $d->child;
                        $bgcareer->total = $d->total;
                        $bgcareer->ac_no = $d->ac_no;
                        $bgcareer->datetime = $d->datetime;
    
                        if($aleave[$i] != '')
                        {
                            $bgcareer->aleave = $aleave[$i];
                        }else{
                            $bgcareer->aleave = null;
                        }
    
                        if($sleave[$i] != '')
                        {
                            $bgcareer->sleave = $sleave[$i];
                        }else{
                            $bgcareer->sleave = null;
                        }
    
                        if($pleave[$i] != '')
                        {
                            $bgcareer->pleave = $pleave[$i];
                        }else{
                            $bgcareer->pleave = null;
                        }

                        if($bleave[$i] != '')
                        {
                            $bgcareer->bleave = $bleave[$i];
                        }else{
                            $bgcareer->bleave = null;
                        }
    
                       
                    
                        $res=$bgcareer->save();
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
