<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function api(Request $request)
    {   
        $user_now = $request->id??null;
        $users = User::where('id', '<>', $user_now)->orderBy('id', 'desc')->get();
        $datatables = datatables()->of($users)->addIndexColumn()->editColumn('created_at', function(User $user) {
            return convert_date($user->created_at);
        })->make(true);

        
        return $datatables;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'User' 
        ];
        return view('admin', compact('data'));
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
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request->all());

        DB::transaction(function () use ($request) {
            try {
                $data = $request->all();
            
                $user = new User([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10)
                ]);
            
                // Simpan User dan Member dalam transaksi
                $user->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
                dd($e);
            }
        });

        // return redirect()->route('user.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        // User telah ditambahkan
        // </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::transaction(function () use ($request, $user) {
            try {
                $data = $request->all();

                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = Hash::make($data['password']);
                $user->email_verified_at = now();
                $user->remember_token = Str::random(10);
                
                $user->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
                dd($e);
            }
        });
       
        // return redirect()->route('user.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">
        // User telah diperbarui
        // </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        User::find($id)->delete();
        // $user->delete();
        // $user->forceDelete();
        return redirect()->route('admin.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">
        User telah dihapus
        </div>');
    }
}