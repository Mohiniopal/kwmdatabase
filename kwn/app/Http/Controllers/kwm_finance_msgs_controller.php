<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_finance_msgs;
use DB;

class kwm_finance_msgs_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_finance_msg_old')->get();

        foreach($data as $d)
        {
            $data1= kwm_finance_msgs::where('id','=',$d->id)->first();

            if($data1)
            {
                $bgcareer = kwm_finance_msgs::find($d->id);
                $bgcareer->f_id = $d->f_id;
                $bgcareer->user_id = $d->user_id;
                $bgcareer->msg = $d->msg;
                $bgcareer->datetime = $d->datetime;
                $bgcareer->seen = $d->seen;
                $bgcareer->updated_at = date("Y-m-d h:i:sa");
                $res=$bgcareer->save();

            }else{
                $bgcareer = new kwm_finance_msgs;
                $bgcareer->id = $d->id;
                $bgcareer->f_id = $d->f_id;
                $bgcareer->user_id = $d->user_id;
                $bgcareer->msg = $d->msg;
                $bgcareer->datetime = $d->datetime;
                $bgcareer->seen = $d->seen;
               
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
