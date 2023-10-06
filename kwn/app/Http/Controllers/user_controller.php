<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_user;
use App\Models\kwm_quotes;
use DB;

class user_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('old_kwm_user')->get();

        foreach($data as $d)
        {
            $bgcareer = new kwm_user;
            $bgcareer->id = $d->id;
            $bgcareer->fname = $d->fname;
            $bgcareer->lname = $d->lname;
            $bgcareer->email = $d->email;
            $bgcareer->password = $d->password;
            $bgcareer->dob = $d->dob;
            $bgcareer->gender = $d->gender;
            $bgcareer->phone = $d->phone;
            $bgcareer->hphone = $d->hphone;
            $bgcareer->wphone = $d->wphone;

            $bgcareer->address = $d->address;
            $bgcareer->type = $d->type;
            $bgcareer->emp_type = $d->emp_type;
            $bgcareer->tax_code = $d->tax_code;
            $bgcareer->kiwi = $d->kiwi;
            $bgcareer->std = $d->std;
            $bgcareer->child_to = $d->child_to;
            $bgcareer->child_from = $d->child_from;
            $bgcareer->child_amt = $d->child_amt;
           
            $bgcareer->chash = $d->chash;
            $bgcareer->fhash = $d->fhash;
            $bgcareer->datetime = $d->datetime;
            $bgcareer->status = $d->status;
            $bgcareer->image = $d->image;

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
        $data = DB::table('kwm_quotes')->get();
        foreach($data as $d)
        {
            $cust = explode("|",$d->cust);

            $total = count($cust);

            // for($i=0; $i<$total; $i++)
            // {
            //     if($i=2)
            //     {
                    if($d->cust != '' && $cust[2] != '')
                    {
                        $data1 = kwm_user::where('email','=',$cust[2])->first();

                        if($data1)
                        {
                            $bgcareer = kwm_user::where('email','=',$cust[2])->first();
                            $bgcareer->fname = $cust[0];
                            $bgcareer->email = $cust[2];
                            $bgcareer->phone = $cust[1];
                            $bgcareer->address = $cust[3];
                            $bgcareer->updated_at = date("Y-m-d h:i:sa");
                            $bgcareer->save();
                        }else{
                            $bgcareer = new kwm_user;
                            $bgcareer->fname = $cust[0];
                            $bgcareer->email = $cust[2];
                            $bgcareer->phone = $cust[1];
                            $bgcareer->address = $cust[3];

                            $res=$bgcareer->save();

                            print_r($bgcareer);
                            ini_set('max_execution_time', 300);
                        }
                    }
            //     }
            // }

            
        }

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
