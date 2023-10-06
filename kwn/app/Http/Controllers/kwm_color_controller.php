<?php

namespace App\Http\Controllers;
use App\Models\kwm_color;
use DB;

use Illuminate\Http\Request;

class kwm_color_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_color_old')->get();

        foreach($data as $d)
        {
            $data1=kwm_color::where('id','=',$d->id)->first();

            if($data1)
            {
                $bgcareer = kwm_color::find($d->id);
                $bgcareer->event = $d->event;
                $bgcareer->color = $d->color;
                $bgcareer->text = $d->text;
                $bgcareer->updated_at = date("Y-m-d h:i:sa");
                
                $bgcareer->save();
            }else{
                $bgcareer = new kwm_color;
                $bgcareer->id = $d->id;
                $bgcareer->event = $d->event;
                $bgcareer->color = $d->color;
                $bgcareer->text = $d->text;
               
                
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
