<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_wof_sheets;
use DB;

class kwm_wof_sheet_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('old_kwm_wof_sheet')->get();

        foreach($data as $d)
        {
            $bgcareer = new kwm_wof_sheets;
            $bgcareer->id = $d->id;
            $bgcareer->book_id = $d->book_id;
            $bgcareer->fuel = $d->fuel;
            $bgcareer->odo = $d->odo;
            $bgcareer->rodo = $d->rodo;
            $bgcareer->curr_exp_date = $d->curr_exp_date;
            $bgcareer->insp_date = $d->insp_date;

            $bgcareer->re_insp_date = $d->re_insp_date;
            $bgcareer->insp_sts = $d->insp_sts;
            $bgcareer->re_insp_sts = $d->re_insp_sts;
            $bgcareer->insp_id = $d->insp_id;
            $bgcareer->re_insp_id = $d->re_insp_id;
            if($d->wof_exp == '0000-00-00')
            {

            }else{
                $bgcareer->wof_exp = $d->wof_exp;
            }
            
            $bgcareer->wof_label = $d->wof_label;

            $bgcareer->sys_auth = $d->sys_auth;
            $bgcareer->insp_result = $d->insp_result;
            $bgcareer->tyre_l_1 = $d->tyre_l_1;
            $bgcareer->tyre_r_1 = $d->tyre_r_1;
            $bgcareer->tyre_l_2 = $d->tyre_l_2;
            $bgcareer->tyre_r_2 = $d->tyre_r_2;
            $bgcareer->tyre_rl_1 = $d->tyre_rl_1;

            $bgcareer->tyre_rr_1 = $d->tyre_rr_1;
            $bgcareer->tyre_rl_2 = $d->tyre_rl_2;
            $bgcareer->tyre_rr_2 = $d->tyre_rr_2;
            $bgcareer->sb_i_l_1 = $d->sb_i_l_1;
            $bgcareer->sb_i_l_2 = $d->sb_i_l_2;
            $bgcareer->sb_i_r_1 = $d->sb_i_r_1;
            $bgcareer->sb_i_r_2 = $d->sb_i_r_2;

            $bgcareer->sb_i_mi_1 = $d->sb_i_mi_1;
            $bgcareer->sb_i_mi_2 = $d->sb_i_mi_2;
            $bgcareer->sb_r_l_1 = $d->sb_r_l_1;
            $bgcareer->sb_r_l_2 = $d->sb_r_l_2;
            $bgcareer->sb_r_r_1 = $d->sb_r_r_1;
            $bgcareer->sb_r_r_2 = $d->sb_r_r_2;
            $bgcareer->sb_r_mi_1 = $d->sb_r_mi_1;

            $bgcareer->sb_r_mi_2 = $d->sb_r_mi_2;
            $bgcareer->pb_i_l_1 = $d->pb_i_l_1;
            $bgcareer->pb_i_l_2 = $d->pb_i_l_2;
            $bgcareer->pb_i_r_1 = $d->pb_i_r_1;
            $bgcareer->pb_i_r_2 = $d->pb_i_r_2;
            $bgcareer->pb_r_l_1 = $d->pb_r_l_1;
            $bgcareer->pb_r_l_2 = $d->pb_r_l_2;

            $bgcareer->pb_r_r_1 = $d->pb_r_r_1;
            $bgcareer->pb_r_r_2 = $d->pb_r_r_2;
            $bgcareer->reject_list = $d->reject_list;
            $bgcareer->comment = $d->comment;
            $bgcareer->recomment = $d->recomment;
            $bgcareer->amount = $d->amount;
            $bgcareer->ptype = $d->ptype;

            $bgcareer->status = $d->status;
            $bgcareer->datetime = $d->datetime;
            $bgcareer->add_phone = $d->add_phone;
           
           
            $res=$bgcareer->save();

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
