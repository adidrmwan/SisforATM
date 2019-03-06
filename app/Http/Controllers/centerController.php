<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Excel;
use File;
use App\Center;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class centerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCenter = Center::all();
        // return view('single.index',compact('listSingle'));

        $tranCenter = Center::select(
            DB::raw('sum(transaksi) as total'),
            DB::raw("date_format(tanggal, '%M %Y') as months")
        )
        ->groupBy('months')
        ->orderBy('tanggal','asc')
        ->get();

        $kategori = [];
        $total_transaksi = [];
        
         foreach ($tranCenter as $ct) {
            $kategori[] = $ct->months;
            $total_transaksi[] = $ct->total;

        }

        // dd(json_encode($kategori));
        return view('center.index', ['listCenter' => $listCenter, 'tranCenter' => $tranCenter, 'kategori' => $kategori, 'total_transaksi' =>$total_transaksi]);
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

    public function centerImport(Request $request) {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            if(!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $center = new Center();
                    $center->id_atm = $value->id_atm;
                    $center->lokasi = $value->lokasi;
                    $center->pengelola = $value->pengelola;
                    $center->jatuh_tempo = $value->jatuh_tempo;
                    $center->denom = $value->denom;
                    $center->performance = $value->performance;
                    $center->transaksi = $value->transaksi;
                    $center->feebased = $value->feebased;
                    $center->ac = $value->ac;
                    $center->cctv = $value->cctv;
                    $center->tanggal = $value->tanggal;
                    $center->save();
                }
            }
        }
        return back();
    }
}
