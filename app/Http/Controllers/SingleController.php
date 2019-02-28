<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Excel;
use File;
use App\Single;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SingleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listsingle = Single::all();
        return view('single.index',compact('listsingle'));
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

    public function singleImport(Request $request) {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            if(!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $single = new Single();
                    $single->id_atm = $value->id_atm;
                    $single->lokasi = $value->lokasi;
                    $single->pengelola = $value->pengelola;
                    $single->jatuh_tempo = $value->jatuh_tempo;
                    $single->denom = $value->denom;
                    $single->performance = $value->performance;
                    $single->transaksi = $value->transaksi;
                    $single->feebased = $value->feebased;
                    $single->ac = $value->ac;
                    $single->cctv = $value->cctv;
                    $single->tanggal = $value->tanggal;
                    $single->save();
                }
            }
        }
        return back();
    }
}
