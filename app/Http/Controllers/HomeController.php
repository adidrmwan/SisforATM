<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Excel;
use File;
use App\Single;
use \App\Center;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listSingle = Single::all();
        $listCenter = Center::all();

        $tranSingle = Single::select(
            DB::raw('sum(transaksi) as total'),
            DB::raw("date_format(tanggal, '%M %Y') as months")
        )
        ->groupBy('months')
        ->orderBy('tanggal','asc')
        ->get();

        $tranCenter = Center::select(
            DB::raw('sum(transaksi) as total'),
            DB::raw("date_format(tanggal, '%M %Y') as months")
        )
        ->groupBy('months')
        ->orderBy('tanggal','asc')
        ->get();

        $kategori = [];
        $total_transaksi_single = [];
        $total_transaksi_center = [];
        // dd($kategori);
         foreach ($tranSingle as $sg) {
            $kategori[] = $sg->months;
            $total_transaksi_single[] = $sg->total;

        }
        
         foreach ($tranCenter as $ct) {
            $total_transaksi_center[] = $ct->total;

        }


        return view('home', ['listCenter' => $listCenter, 'tranCenter' => $tranCenter, 'kategori' => $kategori, 'total_transaksi_center' => $total_transaksi_center, 'total_transaksi_single' => $total_transaksi_single]);
    }

}
