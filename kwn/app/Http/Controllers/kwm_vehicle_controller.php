<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_vehicle;
use App\Models\kwm_user;
use DB;

class kwm_vehicle_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('old_kwm_vehicle')->get();

        foreach($data as $d)
        {
            $bgcareer = new kwm_vehicle;
            $bgcareer->id = $d->id;
            $bgcareer->user_id = $d->user_id;
            $bgcareer->plateno = $d->plateno;
            $bgcareer->make = $d->make;
            $bgcareer->model = $d->model;
            $bgcareer->year = $d->year;
           
           
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

            $car = explode("|",$d->car);

            if($d->cust != '' && $cust[2] != '')
            {
                $data1 = kwm_user::where('email','=',$cust[2])->first();

                $data2 = kwm_vehicle::where('user_id','=',$data1->id)->first();

                // print_r($data1->id);
                // print_r($data2);exit;
                if($data2)
                {
                    $bgcareer = kwm_vehicle::where('user_id','=',$data1->id)->first();
                    $bgcareer->plateno = $car[0];
                    $bgcareer->make = $car[1];
                    $bgcareer->model = $car[2];
                    $bgcareer->year = $car[3];
                    $bgcareer->vin = $car[4];
                    $bgcareer->chasis = $car[5];
                    $bgcareer->updated_at = date("Y-m-d h:i:sa");
                    $bgcareer->save();
                }else{
                    $bgcareer = new kwm_vehicle;
                    $bgcareer->user_id = $data1->id;
                    $bgcareer->plateno = $car[0];
                    $bgcareer->make = $car[1];
                    $bgcareer->model = $car[2];
                    $bgcareer->year = $car[3];
                    $bgcareer->vin = $car[4];
                    $bgcareer->chasis = $car[5];

                    $res=$bgcareer->save();

                    
                }

                // print_r($bgcareer);
                ini_set('max_execution_time', 300);
            }

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
