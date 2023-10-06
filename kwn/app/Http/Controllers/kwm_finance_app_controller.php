<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_finance_app;
use DB;

class kwm_finance_app_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_finance_app_old')->get();

        foreach($data as $d)
        {
            $data1=kwm_finance_app::where('id','=',$d->id)->first();

            if($data1)
            {
                $bgcareer = kwm_finance_app::find($d->id);;
                $bgcareer->user_id = $d->user_id;
                $bgcareer->dvl_no = $d->dvl_no;
                $bgcareer->dvl_vr = $d->dvl_vr;
                $bgcareer->dvl_exp = $d->dvl_exp;
                $bgcareer->con_mbl = $d->con_mbl;
                $bgcareer->con_hm = $d->con_hm;
                $bgcareer->con_wk = $d->con_wk;
                $bgcareer->address = $d->address;
                $bgcareer->restype = $d->restype;
                $bgcareer->rent_amnt = $d->rent_amnt;
                $bgcareer->rent_per = $d->rent_per;
                $bgcareer->car_id = $d->car_id;

                $bgcareer->emp_type = $d->emp_type;
                $bgcareer->inc_frq = $d->inc_frq;
                $bgcareer->inc_amnt = $d->inc_amnt;
                $bgcareer->inc_day = $d->inc_day;
                $bgcareer->comp_name = $d->comp_name;
                $bgcareer->comp_addr = $d->comp_addr;
                $bgcareer->ben_type = $d->ben_type;
                $bgcareer->ben_day = $d->ben_day;
                $bgcareer->ben_amnt = $d->ben_amnt;
                $bgcareer->edu_pro = $d->edu_pro;
                $bgcareer->bank_name = $d->bank_name;
                $bgcareer->bank_ac = $d->bank_ac;

                $bgcareer->app2 = $d->app2;
                $bgcareer->app2type = $d->app2type;
                $bgcareer->afname = $d->afname;
                $bgcareer->alname = $d->alname;
                if($d->adob != '0000-00-00')
                {
                    $bgcareer->adob = $d->adob;
                }

                $bgcareer->agender = $d->agender;
                $bgcareer->advl_no = $d->advl_no;
                $bgcareer->advl_vr = $d->advl_vr;
                if($d->advl_exp != '0000-00-00')
                {
                    $bgcareer->advl_exp = $d->advl_exp;
                }
                
                $bgcareer->aemail = $d->aemail;
                $bgcareer->acon_mbl = $d->acon_mbl;
                $bgcareer->acon_hm = $d->acon_hm;
                
                $bgcareer->acon_wk = $d->acon_wk;
                $bgcareer->aaddress = $d->aaddress;
                $bgcareer->arestype = $d->arestype;
                $bgcareer->arent_amnt = $d->arent_amnt;
                $bgcareer->arent_per = $d->arent_per;
                $bgcareer->aemp_type = $d->aemp_type;
                $bgcareer->ainc_frq = $d->ainc_frq;
                $bgcareer->ainc_amnt = $d->ainc_amnt;
                $bgcareer->ainc_day = $d->ainc_day;
                $bgcareer->acomp_name = $d->acomp_name;
                $bgcareer->acomp_addr = $d->acomp_addr;
                $bgcareer->aben_type = $d->aben_type;

                $bgcareer->aben_day = $d->aben_day;
                $bgcareer->aben_amnt = $d->aben_amnt;
                $bgcareer->aedu_pro = $d->aedu_pro;
                $bgcareer->abank_name = $d->abank_name;
                $bgcareer->abank_ac = $d->abank_ac;
                $bgcareer->status = $d->status;
                $bgcareer->apply_datetime = $d->apply_datetime;
                $bgcareer->checked_by = $d->checked_by;
                if($d->checking_date != '0000-00-00 00:00:00')
                {
                    $bgcareer->checking_date = $d->checking_date;
                }
                $bgcareer->updated_at = date("Y-m-d h:i:sa");
                $bgcareer->save();

            }else{
                $bgcareer = new kwm_finance_app;
                $bgcareer->id = $d->id;
                $bgcareer->user_id = $d->user_id;
                $bgcareer->dvl_no = $d->dvl_no;
                $bgcareer->dvl_vr = $d->dvl_vr;
                $bgcareer->dvl_exp = $d->dvl_exp;
                $bgcareer->con_mbl = $d->con_mbl;
                $bgcareer->con_hm = $d->con_hm;
                $bgcareer->con_wk = $d->con_wk;
                $bgcareer->address = $d->address;
                $bgcareer->restype = $d->restype;
                $bgcareer->rent_amnt = $d->rent_amnt;
                $bgcareer->rent_per = $d->rent_per;
                $bgcareer->car_id = $d->car_id;
    
                $bgcareer->emp_type = $d->emp_type;
                $bgcareer->inc_frq = $d->inc_frq;
                $bgcareer->inc_amnt = $d->inc_amnt;
                $bgcareer->inc_day = $d->inc_day;
                $bgcareer->comp_name = $d->comp_name;
                $bgcareer->comp_addr = $d->comp_addr;
                $bgcareer->ben_type = $d->ben_type;
                $bgcareer->ben_day = $d->ben_day;
                $bgcareer->ben_amnt = $d->ben_amnt;
                $bgcareer->edu_pro = $d->edu_pro;
                $bgcareer->bank_name = $d->bank_name;
                $bgcareer->bank_ac = $d->bank_ac;
    
                $bgcareer->app2 = $d->app2;
                $bgcareer->app2type = $d->app2type;
                $bgcareer->afname = $d->afname;
                $bgcareer->alname = $d->alname;
                if($d->adob != '0000-00-00')
                {
                    $bgcareer->adob = $d->adob;
                }
    
                $bgcareer->agender = $d->agender;
                $bgcareer->advl_no = $d->advl_no;
                $bgcareer->advl_vr = $d->advl_vr;
                if($d->advl_exp != '0000-00-00')
                {
                    $bgcareer->advl_exp = $d->advl_exp;
                }
                
                $bgcareer->aemail = $d->aemail;
                $bgcareer->acon_mbl = $d->acon_mbl;
                $bgcareer->acon_hm = $d->acon_hm;
                
                $bgcareer->acon_wk = $d->acon_wk;
                $bgcareer->aaddress = $d->aaddress;
                $bgcareer->arestype = $d->arestype;
                $bgcareer->arent_amnt = $d->arent_amnt;
                $bgcareer->arent_per = $d->arent_per;
                $bgcareer->aemp_type = $d->aemp_type;
                $bgcareer->ainc_frq = $d->ainc_frq;
                $bgcareer->ainc_amnt = $d->ainc_amnt;
                $bgcareer->ainc_day = $d->ainc_day;
                $bgcareer->acomp_name = $d->acomp_name;
                $bgcareer->acomp_addr = $d->acomp_addr;
                $bgcareer->aben_type = $d->aben_type;
    
                $bgcareer->aben_day = $d->aben_day;
                $bgcareer->aben_amnt = $d->aben_amnt;
                $bgcareer->aedu_pro = $d->aedu_pro;
                $bgcareer->abank_name = $d->abank_name;
                $bgcareer->abank_ac = $d->abank_ac;
                $bgcareer->status = $d->status;
                $bgcareer->apply_datetime = $d->apply_datetime;
                $bgcareer->checked_by = $d->checked_by;
                if($d->checking_date != '0000-00-00 00:00:00')
                {
                    $bgcareer->checking_date = $d->checking_date;
                }
                
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
