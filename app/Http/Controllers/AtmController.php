<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Excel;
use File;
use App\Atm;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class AtmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAtm = Atm::all();

        $atmPooling = DB::table('atms')
                     ->select(
                        DB::raw('count(*) as total_pooling'), 
                        DB::raw("date_format(tanggal, '%M %Y') as months")
                     )
                     ->where('tipe', '=', 'Pooling ATM')
                     ->groupBy('months')
                     ->orderBy('tanggal','asc')
                     ->get();

        $atmDrive = DB::table('atms')
                     ->select(
                        DB::raw('count(*) as total_drive'),
                        DB::raw("date_format(tanggal, '%M %Y') as months")
                     )
                     ->where('tipe', '=', 'Drive Thru')
                     ->groupBy('months')
                     ->orderBy('tanggal','asc')
                     ->get();

        $atmSingle = DB::table('atms')
                     ->select(
                        DB::raw('count(*) as total_single'),
                        DB::raw("date_format(tanggal, '%M %Y') as months")
                     )
                     ->where('tipe', '=', 'Single ATM')
                     ->groupBy('months')
                     ->orderBy('tanggal','asc')
                     ->get();

        $atmCenter = DB::table('atms')
                     ->select(
                        DB::raw('count(*) as total_center'),
                        DB::raw("date_format(tanggal, '%M %Y') as months")
                     )
                     ->where('tipe', '=', 'ATM Center')
                     ->groupBy('months')
                     ->orderBy('tanggal','asc')
                     ->get();

        $kategori = [];
        $total_type_pooling = [];
        $total_type_drive = [];
        $total_type_single = [];
        $total_type_center = [];   

        foreach ($atmPooling as $tp) {
            $kategori[] = $tp->months;
            $total_type_pooling[] = $tp->total_pooling;
        }
        foreach ($atmDrive as $dr) {
            $total_type_drive[] = $dr->total_drive;
        }
        foreach ($atmSingle as $sg) {
            $total_type_single[] = $sg->total_single;
        }
        foreach ($atmCenter as $ct) {
            $total_type_center[] = $ct->total_center;
        }
        // dd(json_encode($kategori));
        return view('atm.index', [
            'listAtm' => $listAtm, 
            'atmPooling' => $atmPooling, 
            'atmDrive'=> $atmDrive, 
            'kategori' => $kategori, 
            'total_type_pooling' => $total_type_pooling, 
            'total_type_drive' => $total_type_drive, 
            'total_type_single' => $total_type_single, 
            'total_type_center' => $total_type_center 
        ]);
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

    public function atmImport(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            if(!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $atm = new Atm();
                    $atm->terminal_id = $value->terminal_id;
                    $atm->lokasi = $value->terminal_location;
                    $atm->vendor = $value->flm_vendor;
                    $atm->area = $value->area;
                    $atm->tipe = $value->type_lokasi;
                    $atm->tanggal = $value->tanggal;
                    $atm->save();
                }
            }
        }
        return back();
    }
}
