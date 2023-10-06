<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_photo;
use DB;

class kwm_photo_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('old_kwm_photo')->get();

        foreach($data as $d)
        {
            $bgcareer = new kwm_photo;
            $bgcareer->id = $d->id;
            $bgcareer->mec_id = $d->mec_id;
            $bgcareer->image = $d->image;
            $bgcareer->video = $d->video;
            $bgcareer->datetime = $d->datetime;
            $bgcareer->plate = $d->plate;
            $bgcareer->model = $d->model;
            $bgcareer->j_id = $d->j_id;
            $bgcareer->est_id = $d->est_id;
            $bgcareer->inv_id = $d->inv_id;
           
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
