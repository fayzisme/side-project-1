<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenyakitRequest;
use App\Http\Requests\UpdatePenyakitRequest;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyakitController extends Controller
{
    public function api(Request $request)
    {
        $penyakits = Penyakit::orderBy('created_at', 'asc')->filter(compact('request'))->get();
        $datatables = datatables()->of($penyakits)->addIndexColumn()->editColumn('created_at', function(Penyakit $penyakit) {
            return convert_date($penyakit->created_at);
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
            'title' => 'Penyakit' 
        ];
        return view('penyakit', compact('data'));
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
     * @param  \App\Http\Requests\StorePenyakitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenyakitRequest $request)
    {
        // dd($request->all());

        DB::transaction(function () use ($request) {
            try {
                $data = $request->all();
            
                $penyakit = new Penyakit([
                    'kode_penyakit' => $data['kode_penyakit'],
                    'nama_penyakit' => $data['nama_penyakit']
                ]);
            
                // Simpan User dan Member dalam transaksi
                $penyakit->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });

        // return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        // Penyakit telah ditambahkan
        // </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyakit $penyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenyakitRequest  $request
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenyakitRequest $request, Penyakit $penyakit)
    {
        DB::transaction(function () use ($request, $penyakit) {
            try {
                $data = $request->all();

                $penyakit->kode_penyakit = $data['kode_penyakit'];
                $penyakit->name_penyakit = $data['nama_penyakit'];
                
                $penyakit->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });
       
        // return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">
        // Penyakit telah diperbarui
        // </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyakit $penyakit)
    {
        // dd($penyakit);
        $penyakit->delete();
        return redirect()->route('penyakit.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">
        Penyakit telah dihapus
        </div>');
    }
}
