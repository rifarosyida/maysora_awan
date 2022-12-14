<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // public const userindex ='user.index';
    private $userIndex = 'user.index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')){
            $all_user = User::where('id', 'like', '%'.request('search').'%')
                                    ->orwhere('username', 'like', '%'.request('search').'%')
                                    ->orwhere('email', 'like', '%'.request('search').'%')
                                    ->orwhere('status', 'like', '%'.request('search').'%')
                                    ->orwhere('no_hp', 'like', '%'.request('search').'%')
                                    ->orwhere('jenis_kelamin', 'like', '%'.request('search').'%')
                                    ->orwhere('alamat', 'like', '%'.request('search').'%')
                                    ->paginate(5);
            return view('admin.datauser', ['all_user'=>$all_user]);
        } else {
            $user = User::all(); // Mengambil semua isi tabel
            $all_user = User::orderBy('id', 'asc')->paginate(5);
            return view('admin.datauser', ['user' => $user, 'all_user' => $all_user]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'username' => 'required',
            'foto_profil' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'status' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->foto_profil = $request->file('foto_profil')->store('images', 'public');
        $user->status = $request->status;
        $user->no_hp = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->save();


        return redirect()->route($this->userIndex)
        ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.user.detailUser',[
            'user' => $user
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
        $user = User::where('id', $id)->first();
         return view('admin.user.editUser', [
            'user' => $user
        ]);
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
        
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
            'status' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::findOrFail($id);
        if ($request->hasFile('foto_profil')) {
            if ($user->foto && file_exists(storage_path('app/public/'.$user->foto_profil))) {
                Storage::delete('public/'.$user->foto_profil);
            }
            $image_name = $request->file('foto_profil')->store('images','public');
            $user->foto_profil = $image_name;
        }
        
        $user -> username = $request->username;
        if (!$request->password && !$request->password_confirmation) {
        } else {
            $user->password = bcrypt($request->password);
        }
        $user -> email = $request->email;
        $user -> status = $request->status;
        $user -> no_hp = $request->no_hp;
        $user -> jenis_kelamin = $request->jenis_kelamin;
        $user -> alamat = $request->alamat;
        $user -> save();

        return redirect()->route($this->userIndex)
        ->with('success', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (File::exists('storage/'.$user->foto_profil)) {
            File::delete('storage/'.$user->foto_profil);
        }

        User::find($user->id)->delete();
        return redirect()->route($this->userIndex)
            ->with('success','User berhasil dihapus');
    }

    public function profil()
    {
        return view('admin.profilAdmin', [
            'title' => 'Dz Fashion - Profil Admin',
            'user' => Auth::user(),
        ]);
    }

    public function updateprofil(Request $request, $id)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'foto_profil' => 'image|file',
        ]);

        $user = User::findOrFail($id);
        if ($request->hasFile('foto_profil')) {
            if ($user->foto && file_exists(storage_path('app/public/storage/'.$user->foto_profil))) {
                Storage::delete('public/'.$user->foto_profil);
            }
            $image_name = $request->file('foto_profil')->store('images','public');
            $user->foto_profil = $image_name;
            $validateData['foto_profil'] = $image_name;
        }
        User::where('id', $id)
            ->update($validateData);
            
        return redirect()->route('profiladmin')->with('success', 'Profil telah diupdate!');
    }
}
