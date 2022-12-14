<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProdukController extends Controller
{
    private $indexPage = 'produk.index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    if (request('search')){
        $all_produk = Produk::with('kategori')
                                ->orWhere('nama_produk', 'like', '%'.request('search').'%')
                                ->orWhere('kategori_id', 'like', '%'.request('search').'%')
                                ->orWhereHas('kategori', function($query) {
                                    $query->where('nama_kategori', 'like', '%' .request('search'). '%');
                                })
                                ->paginate(
                                    $perPage = 5, $columns = ['*'], $pageName = 'produk'
                                );
                                return view('admin.dataproduk', compact('all_produk'));
    } else {
        $produk = Produk::with('kategori')->get(); // Mengambil semua isi tabel
        $all_produk = Produk::orderBy('id', 'asc')->paginate(5);
        return view('admin.dataproduk', ['produk' => $produk, 'all_produk' => $all_produk]);
        
    }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_kategori = Kategori::all();
        $all_supplier = Supplier::all();
        return view('admin.produk.createProduk',[
            'all_kategori' => $all_kategori,
            'all_supplier' => $all_supplier
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string',
            'foto_produk' => 'nullable',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'diskon' => 'nullable',
            'deskripsi' => 'required',
            'kategori_id' => 'required|integer',
            'supplier_id' => 'required|integer',
        ]);

        if($request->file('foto_produk')){
            $validatedData['foto_produk'] = $request->file('foto_produk')->store('images', 'public');
        }

        Produk::create($validatedData);

        return redirect()->route('produk.index')
        ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::where('id', $id)->first();

        return view('admin.produk.detailProduk',[
            'produk' => $produk
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
        $produk = Produk::where('id', $id)->first();
        $all_kategori = Kategori::all();
        $all_supplier = Supplier::all();
        return view('admin.produk.editProduk',[
            'produk' => $produk,
            'all_kategori' => $all_kategori,
            'all_supplier' => $all_supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $rules= [
            'nama_produk' => 'required',
            'foto_produk' => 'nullable',
            'harga' => 'required',
            'stok' => 'required',
            'diskon' => 'nullable',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
        ];
        $validatedData = $request->validate($rules);
        if($request->file('foto_produk')){
            $validatedData['foto_produk'] = $request->file('foto_produk')->store('images', 'public');
        }

        Produk::where('id', $produk->id)
        ->update($validatedData);

        return redirect()->route($this->indexPage)
        ->with('success', 'Produk berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if (File::exists('storage/'.$produk->foto_produk)) {
            File::delete('storage/'.$produk->foto_produk);
        }

        Produk::find($produk->id)->delete();
        return redirect()->route($this->indexPage)
            ->with('success','Produk berhasil dihapus');

     }   

     public function cetak_pdf(){
        $all_produk = Produk::all();
        $pdf = PDF::loadview('admin.produk_cetakPdf',['all_produk'=>$all_produk]);
        return $pdf->stream();
     }
}
