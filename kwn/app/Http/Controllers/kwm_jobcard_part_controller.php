<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_jobcard;
use App\Models\kwm_jobcard_part;
use DB;

class kwm_jobcard_part_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('kwm_jobcards')->select('id','descr')->get();

        // print_r($data);
        // exit;

        foreach($data as $d)
        {
          
            $descr = explode("|",$d->descr);
         

            $total = count($descr);

            // print_r($total);
            // exit;

            for($i=0; $i<$total; $i++)
            {
                if($d->descr != '')
                {
                    $parts = new kwm_jobcard_part;

                    $parts->jc_id = $d->id;
    
                    if(array_key_exists($i,$descr) && $descr != '')
                    {
                        $descr2 = DB::table('parts_master')->select('PartId')->where('PartName',$descr[$i])->first();
    
                        if(empty($descr2))
                        {
                            $insert = DB::table('parts_master')->insertGetId(['PartName' => $descr[$i],'ParentId' =>'0']);
    
                            $parts->part_id = $insert;

                            $parts->part_no = $insert;
    
                        }else{
                            $parts->part_id = $descr2->PartId;

                            $parts->part_no = $descr2->PartId;
                        }
                    
                    }
                    
                   
    
                    $res=$parts->save();

                    print_r($parts);
                }
                

                
                ini_set('max_execution_time', 300);
            }
           
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
