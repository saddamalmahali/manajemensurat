<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\SuratKeluar;
use App\JenisSurat;
use App\DisposisiSurat;
use App\TujuanDisposisi;
class SuratController extends Controller
{
    public function home()
    {
        return view('home');

    }

    public function index_surat_masuk()
    {
        $sm = new SuratMasuk();
        $sm = $sm->paginate('9');
        return view('surat_masuk.index', ['data_surat'=>$sm]);
    }

    public function tambah_surat_masuk()
    {
        $data_jenis = JenisSurat::all();

        return view('surat_masuk.tambah', ['data_jenis'=>$data_jenis]);
    }

    public function simpan_surat_masuk(Request $request)
    {
        $this->validate($request, [
            'no_agendasm'=>'required',
            'kode_jenis'=>'required',
            'tanggal'=>'required',
            'pengirim'=>'required',
            'tgl_sm'=>'required',
            'no_sm'=>'required',
            'perihal'=>'required',
            'ringkasan'=>'required',
            'pengolah'=>'required',
        ]);

        $surat_masuk = new SuratMasuk();
        $surat_masuk->no_agendasm = $request->input('no_agendasm');
        $surat_masuk->kode_jenis = $request->input('kode_jenis');
        $surat_masuk->tanggal = date('Y-m-d', strtotime($request->input('tanggal')));
        $surat_masuk->pengirim = $request->input('pengirim');
        $surat_masuk->tgl_sm = date('Y-m-d', strtotime($request->input('tgl_sm')));
        $surat_masuk->no_sm = $request->input('no_sm');
        $surat_masuk->perihal = $request->input('perihal');
        $surat_masuk->tgl_perihal = date('Y-m-d', strtotime($request->input('tgl_perihal')));
        $surat_masuk->tmptwkt_perihal = $request->input('tmptwkt_perihal');
        $surat_masuk->ringkasan = $request->input('ringkasan');
        $surat_masuk->pengolah = $request->input('pengolah');

        if ($request->file('gambar') != null) {
            $destinationPath = 'img'; // upload path
            $extension = $request->file('gambar')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('gambar')->move($destinationPath, $fileName); // uploading file to given path
            $surat_masuk->gambar = $fileName;
        }

        if($surat_masuk->save())
        {
            $request->session()->flash('sukses', 'Berhasil Menyimpan Data!');
            return redirect('/surat_masuk/index');
        }

    }

    public function update_surat_masuk($id)
    {
        $data_jenis = JenisSurat::all();
        $surat_masuk = SuratMasuk::where('indexsm', '=', $id)->limit(1)->first();
        return view('surat_masuk.update', ['surat_masuk'=>$surat_masuk, 'data_jenis'=>$data_jenis]);
    }

    public function simpan_update_surat_masuk(Request $request)
    {
        $this->validate($request, [
            'no_agendasm'=>'required',
            'kode_jenis'=>'required',
            'tanggal'=>'required',
            'pengirim'=>'required',
            'tgl_sm'=>'required',
            'no_sm'=>'required',
            'perihal'=>'required',
            'ringkasan'=>'required',
            'pengolah'=>'required',
        ]);

        $id_sm = $request->input('id');
        $surat_masuk = SuratMasuk::where('indexsm', '=', $id_sm)->limit(1)->first();
        $surat_masuk->no_agendasm = $request->input('no_agendasm');
        $surat_masuk->kode_jenis = $request->input('kode_jenis');
        $surat_masuk->tanggal = date('Y-m-d', strtotime($request->input('tanggal')));
        $surat_masuk->pengirim = $request->input('pengirim');
        $surat_masuk->tgl_sm = date('Y-m-d', strtotime($request->input('tgl_sm')));
        $surat_masuk->no_sm = $request->input('no_sm');
        $surat_masuk->perihal = $request->input('perihal');
        $surat_masuk->tgl_perihal = date('Y-m-d', strtotime($request->input('tgl_perihal')));
        $surat_masuk->tmptwkt_perihal = $request->input('tmptwkt_perihal');
        $surat_masuk->ringkasan = $request->input('ringkasan');
        $surat_masuk->pengolah = $request->input('pengolah');

        if ($request->file('gambar') != null) {
            $destinationPath = 'img'; // upload path
            $extension = $request->file('gambar')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('gambar')->move($destinationPath, $fileName); // uploading file to given path
            $surat_masuk->gambar = $fileName;
        }

        if($surat_masuk->save())
        {
            $request->session()->flash('sukses', 'Berhasil Merubah Data!');
            return redirect('/surat_masuk/index');
        }
    }

    public function view_surat_masuk($id)
    {
        $surat_masuk = SuratMasuk::where('indexsm', '=',$id)->limit(1)->first();

        return view('surat_masuk.view', ['surat_masuk'=>$surat_masuk]);
    }

    public function hapus_surat_masuk(Request $request)
    {
        $sm  = SuratMasuk::where('indexsm', '=',$request->input('id'))->first();

        if($sm->delete()){
            return json_encode('sukses');
        }
    }

    
    public function index_surat_keluar()
    {
        $sk = new SuratKeluar();
        $sk = $sk->paginate('9');
        return view('surat_keluar.index', ['data_surat_keluar'=>$sk]);
    }

    public function tambah_surat_keluar()
    {
        $data_jenis = JenisSurat::all();

        return view('surat_keluar.tambah', ['data_jenis'=>$data_jenis]);
    }

    public function simpan_surat_keluar(Request $request)
    {
        $this->validate($request, [
            'no_agendask'=>'required',
            'tanggal_sk'=>'required',
            'kode_jenis'=>'required',
            'perihal_sk'=>'required',
            'ket_sk'=>'required'
        ]);

        $surat_keluar = new SuratKeluar();
        $surat_keluar->no_agendask = $request->input('no_agendask');
        $surat_keluar->kode_jenis = $request->input('kode_jenis');
        $surat_keluar->tanggal_sk = date('Y-m-d', strtotime($request->input('tanggal_sk')));
        $surat_keluar->perihal_sk = $request->input('perihal_sk');
        $surat_keluar->ket_sk = $request->input('ket_sk');

        if ($request->file('gambar_sk') != null) {
            $destinationPath = 'img'; // upload path
            $extension = $request->file('gambar_sk')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('gambar_sk')->move($destinationPath, $fileName); // uploading file to given path
            $surat_keluar->gambar_sk = $fileName;
        }

        if($surat_keluar->save())
        {
            $request->session()->flash('sukses', 'Berhasil Menyimpan Data!');
            return redirect('/surat_keluar/index');
        }

    }

    public function update_surat_keluar($id)
    {
        $data_jenis = JenisSurat::all();
        $surat_keluar = SuratKeluar::find($id);
        return view('surat_keluar.update', ['surat_keluar'=>$surat_keluar, 'data_jenis'=>$data_jenis]);
    }

    public function simpan_update_surat_keluar(Request $request)
    {
        $this->validate($request, [
            'no_agendask'=>'required',
            'tanggal_sk'=>'required',
            'kode_jenis'=>'required',
            'perihal_sk'=>'required',
            'ket_sk'=>'required'
        ]);

        $surat_keluar = SuratKeluar::find($request->input('id'));
        $surat_keluar->no_agendask = $request->input('no_agendask');
        $surat_keluar->kode_jenis = $request->input('kode_jenis');
        $surat_keluar->tanggal_sk = date('Y-m-d', strtotime($request->input('tanggal_sk')));
        $surat_keluar->perihal_sk = $request->input('perihal_sk');
        $surat_keluar->ket_sk = $request->input('ket_sk');

        if ($request->file('gambar_sk') != null) {
            $destinationPath = 'img'; // upload path
            $extension = $request->file('gambar_sk')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('gambar_sk')->move($destinationPath, $fileName); // uploading file to given path
            $surat_keluar->gambar_sk = $fileName;
        }

        if($surat_keluar->save())
        {
            $request->session()->flash('sukses', 'Berhasil Update Data!');
            return redirect('/surat_keluar/index');
        }

    }

    public function view_surat_keluar($id)
    {
        $surat_keluar = SuratKeluar::find($id);

        return view('surat_keluar.view', ['surat_keluar'=>$surat_keluar]);
    }

    public function hapus_surat_keluar(Request $request)
    {
        $sk = SuratKeluar::find($request->input('id'));

        if($sk->delete()){
            return json_encode('sukses');
        }
    }

    public function index_disposisi()
    {
        $disposisi = new DisposisiSurat();
        $disposisi = $disposisi->paginate('9');

        return view('disposisi.index', ['data_disposisi'=>$disposisi]);
    }

    public function tambah_disposisi()
    {
        $d = DisposisiSurat::select('indexsm')->get();
        $sm = SuratMasuk::whereNotIn('indexsm', $d)->get();
        $td = TujuanDisposisi::all();
        return view('disposisi.tambah', ['data_sm'=>$sm, 'data_td'=>$td]);

    }

    public function simpan_disposisi(Request $request)
    {
        $this->validate($request, [
            'tanggal_disposisi'=>'required',
            'indexsm'=>'required',
            'kode_organisasi'=>'required',
            'sifat'=>'required',
            'tindakan'=>'required'

        ]);

        $disposisi = new DisposisiSurat();
        $disposisi->tanggal_disposisi = date('Y-m-d', strtotime($request->input('tanggal_disposisi')));
        $disposisi->indexsm = $request->input('indexsm');
        $disposisi->kode_organisasi = $request->input('kode_organisasi');
        $disposisi->sifat = $request->input('sifat');
        $disposisi->tindakan = $request->input('tindakan');
        $disposisi->catatan = $request->input('catatan');

        if($disposisi->save())
        {
            $request->session()->flash('sukses', 'Berhasil Update Data!');
            return redirect('/disposisi/index');
        }
    }

    public function hapus_disposisi(Request $request)
    {
        $disposisi = DisposisiSurat::find($request->input('id'));

        if($disposisi->delete()){
            return json_encode('sukses');
        }
    }

    public function update_disposisi($id)
    {
        $disposisi = DisposisiSurat::find($id);
        $td = TujuanDisposisi::all();
        return view('disposisi.update', ['disposisi'=>$disposisi, 'data_td'=>$td]);
    }

    public function simpan_update_disposisi(Request $request)
    {
        $this->validate($request, [
            'tanggal_disposisi'=>'required',
            'kode_organisasi'=>'required',
            'sifat'=>'required',
            'tindakan'=>'required'

        ]);

        $disposisi = DisposisiSurat::find($request->input('id'));
        $disposisi->tanggal_disposisi = date('Y-m-d', strtotime($request->input('tanggal_disposisi')));
        $disposisi->kode_organisasi = $request->input('kode_organisasi');
        $disposisi->sifat = $request->input('sifat');
        $disposisi->tindakan = $request->input('tindakan');
        $disposisi->catatan = $request->input('catatan');

        if($disposisi->save())
        {
            $request->session()->flash('sukses', 'Berhasil Update Data!');
            return redirect('/disposisi/index');
        }
    }

    public function laporan_surat_masuk(Request $request)
    {
        return view('laporan.surat_masuk');
    }

    public function laporan_surat_keluar(Request $request)
    {
        return view('laporan.surat_keluar');
    }
    public function laporan_disposisi(Request $request)
    {
        return view('laporan.disposisi');
    }
    
}
