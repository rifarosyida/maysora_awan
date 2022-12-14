<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')){
            $all_supplier = Supplier::where('nama_supplier', 'like', '%'.request('search').'%')
                                    ->orwhere('id', 'like', '%'.request('search').'%')
                                    ->paginate(5);
            return view('admin.datasupplier', ['all_supplier'=>$all_supplier]);
        } else {
            $supplier = Supplier::all(); // Mengambil semua isi tabel
            $all_supplier = Supplier::orderBy('id', 'asc')->paginate(5);
            return view('admin.datasupplier', ['supplier' => $supplier, 'all_supplier' => $all_supplier]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.createSupplier');
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
            'nama_supplier' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
        ]);

        // if($request->file('gambar')){
        //     $validatedData['gambar'] = $request->file('gambar')->store('images', 'public');
        // }

        if ($request->file('gambar')) {
            $gambar_name = $request->file('gambar');
            // $gambar_name = $request->file('gambar')->store('gambars', 'public');
            $storage = new StorageClient([
                'keyFilePath' => public_path('key.json')
            ]);

            $bucketName = env('GOOGLE_CLOUD_BUCKET');
            $bucket = $storage->bucket($bucketName);

            //get filename with extension
            $filenamewithextension = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_FILENAME);
            // $filenamewithextension = $request->file('gambar')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('gambar')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

            Storage::put('public/uploads/' . $filenametostore, fopen($request->file('gambar'), 'r+'));

            $filepath = storage_path('app/public/uploads/' . $filenametostore);

            $object = $bucket->upload(
                fopen($filepath, 'r'),
                [
                    'predefinedAcl' => 'publicRead'
                ]
            );

            // delete file from local disk
            Storage::delete('public/uploads/' . $filenametostore);
            $validatedData['gambar'] = $filenametostore;
        }


        Supplier::create($validatedData);

        return redirect()->route('supplier.index')
        ->with('success', 'Supplier berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::where('id', $id)->first();

        return view('admin.supplier.detailSupplier',[
            'supplier' => $supplier
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
        $supplier = Supplier::where('id', $id)->first();
         return view('admin.supplier.editSupplier', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules= [
            'nama_supplier' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
        ];

        $validatedData = $request->validate($rules);
        // if($request->file('gambar')){
        //     $validatedData['gambar'] = $request->file('gambar')->store('images', 'public');
        // }

        $storage = new StorageClient([
            'keyFilePath' => public_path('key.json')
        ]);

        $supplier = Supplier::find($supplier->id);

        $bucketName = env('GOOGLE_CLOUD_BUCKET');
        $bucket = $storage->bucket($bucketName);
        $object = $bucket->object($supplier->gambar);

        if ($request->file('gambar')) {
            if ($supplier->gambar && $object != null) {
                $object->delete();
                //get filename with extension
                $filenamewithextension = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_FILENAME);
                // $filenamewithextension = $request->file('gambar')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('gambar')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                Storage::put('public/uploads/' . $filenametostore, fopen($request->file('gambar'), 'r+'));

                $filepath = storage_path('app/public/uploads/' . $filenametostore);

                $object = $bucket->upload(
                    fopen($filepath, 'r'),
                    [
                        'predefinedAcl' => 'publicRead'
                    ]
                );

                // delete file from local disk
                Storage::delete('public/uploads/' . $filenametostore);
            }

            $image_name = $filenametostore;
        } else {
            $image_name = $supplier->gambar;
        }
        $supplier->gambar = $image_name;
        $supplier->nama_supplier = $validatedData['nama_supplier'];
        $supplier->deskripsi = $validatedData['deskripsi'];
        $supplier->save();

        // Supplier::where('id', $supplier->id)
        // ->update($validatedData);

        return redirect()->route('supplier.index')
        ->with('success', 'Supplier berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // if (File::exists('storage/'.$supplier->gambar)) {
        //     File::delete('storage/'.$supplier->gambar);
        // }

        $storage = new StorageClient([
            'keyFilePath' => public_path('key.json')
        ]);

        $supplier = Supplier::find($supplier->id);

        $bucketName = env('GOOGLE_CLOUD_BUCKET');
        $bucket = $storage->bucket($bucketName);
        $object = $bucket->object($supplier->gambar);



        $object->delete();
        $supplier->delete();


        // Supplier::find($supplier->id)->delete();
        return redirect()->route('supplier.index')
            ->with('success','Supplier berhasil dihapus');
    }
}
