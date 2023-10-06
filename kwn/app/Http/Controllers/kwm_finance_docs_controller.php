<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_finance_docs;
use DB;

class kwm_finance_docs_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_finance_doc_old')->get();

        foreach($data as $d)
        {

            $data1=kwm_finance_docs::where('id','=',$d->id)->first();

            if($data1)
            {
                $bgcareer = kwm_finance_docs::find($d->id);
                $bgcareer->app_id = $d->app_id;
                $bgcareer->type = $d->type;
                $bgcareer->path = $d->path;
                $bgcareer->datetime = $d->datetime;
                $bgcareer->updated_at = date("Y-m-d h:i:sa");
               
                $bgcareer->save();
            }else{
                $bgcareer = new kwm_finance_docs;
                $bgcareer->id = $d->id;
                $bgcareer->app_id = $d->app_id;
                $bgcareer->type = $d->type;
                $bgcareer->path = $d->path;
                $bgcareer->datetime = $d->datetime;
             
               
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
