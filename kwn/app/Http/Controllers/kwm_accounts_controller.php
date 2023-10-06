<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_accounts;
use DB;

class kwm_accounts_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_account_old')->get();

        foreach($data as $d)
        {

            $data1 = kwm_accounts::where('id','=',$d->id)->first();

            if($data1)
            {
                $account =kwm_accounts::find($d->id);
                $account->user_id = $d->user_id;
                $account->c_no = $d->c_no;
                $account->c_type = $d->c_type;
                $account->updated_at = date("Y-m-d h:i:sa");
                $account->save();

                // print_r(1);exit;
            }else{
                $account = new kwm_accounts;
                $account->user_id = $d->user_id;
                $account->c_no = $d->c_no;
                $account->c_type = $d->c_type;
    
                $res=$account->save();
                // print_r(2);exit;
            }
            

            print_r($account);
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
