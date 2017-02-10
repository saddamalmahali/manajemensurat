<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DisposisiSurat;
use App\SuratMasuk;
use App\SuratKeluar;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jml_masuk = SuratMasuk::count();
        $jml_keluar = SuratKeluar::count();
        $jml_disposisi = DisposisiSurat::count();
        $data = [
            'jml_masuk'=>$jml_masuk,
            'jml_keluar'=>$jml_keluar,
            'jml_disposisi'=>$jml_disposisi
        ];
        return view('home', ['data'=>$data]);
    }

    public function tentang()
    {
        return view('tentang');
    }
}
