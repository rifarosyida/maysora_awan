<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class KategoriController extends Controller
{
    public function index()
    {
    if (request('search')){
        $all_kategori = Kategori::where('nama_kategori', 'like', '%'.request('search').'%')->paginate(5);
        return view('admin.datakategori', ['all_kategori'=>$all_kategori]);
    } else {
        $kategori = Kategori::all(); // Mengambil semua isi tabel
        $all_kategori = Kategori::orderBy('id', 'asc')->paginate(5);
        return view('admin.datakategori', ['kategori' => $kategori, 'all_kategori' => $all_kategori]);
    }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.createKategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
           ]);
        //fungsi eloquent untuk menambah data
        Kategori::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama kategori
        return redirect()->route('kategori.index')
        ->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //menampilkan detail data dengan menemukan/berdasarkan id kategori
         $kategori = Kategori::where('id', $id)->first();

        return view('admin.kategori.detailKategori',[
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //menampilkan detail data dengan menemukan berdasarkan id Kategori untuk diedit
        $kategori = Kategori::where('id', $id)->first();
         return view('admin.kategori.editKategori', [
            'kategori' => $kategori
        ]);
    }
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Kategori::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('kategori.index')
        ->with('success', 'Data Kategori Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //fungsi eloquent untuk menghapus data
       Kategori::find($id)->delete();
       return redirect()->route('kategori.index')
       -> with('success', 'Data Kategori Berhasil Dihapus');   
    }
    public function search(Request $request){
        $keyword = $request -> cari;
        $all_kategori = Kategori::where('nama_kategori','like',"%". $keyword . "%") -> paginate(5);
        return view('admin.datakategori', compact('all_kategori'));
    // ->withQueryString();
    }
}

