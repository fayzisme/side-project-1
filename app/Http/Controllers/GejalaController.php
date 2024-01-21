<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGejalaRequest;
use App\Http\Requests\UpdateGejalaRequest;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GejalaController extends Controller
{
    public function api(Request $request)
    {
        $gejalas = Gejala::orderBy('created_at', 'asc')->filter(compact('request'))->get();
        $datatables = datatables()->of($gejalas)->addIndexColumn()->editColumn('created_at', function(Gejala $gejala) {
            return convert_date($gejala->created_at);
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
            'title' => 'Gejala' 
        ];
        return view('gejala', compact('data'));
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
     * @param  \App\Http\Requests\StoreGejalaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGejalaRequest $request)
    {
        // dd($request->all());

        DB::transaction(function () use ($request) {
            try {
                $data = $request->all();
            
                $gejala = new Gejala([
                    'kode_gejala' => $data['kode_gejala'],
                    'nama_gejala' => $data['nama_gejala']
                ]);
            
                // Simpan User dan Member dalam transaksi
                $gejala->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });

        // return redirect()->route('gejala.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        // Gejala telah ditambahkan
        // </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function show(Gejala $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function edit(Gejala $gejala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGejalaRequest  $request
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGejalaRequest $request, Gejala $gejala)
    {
        DB::transaction(function () use ($request, $gejala) {
            try {
                $data = $request->all();

                $gejala->kode_gejala = $data['kode_gejala'];
                $gejala->name_gejala = $data['nama_gejala'];
                
                $gejala->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });
       
        // return redirect()->route('gejala.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">
        // Gejala telah diperbarui
        // </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gejala $gejala)
    {
        // dd($gejala);
        $gejala->delete();
        return redirect()->route('gejala.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">
        Gejala telah dihapus
        </div>');
    }
}
