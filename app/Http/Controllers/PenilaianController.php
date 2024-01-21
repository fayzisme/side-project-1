<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenilaianRequest;
use App\Http\Requests\UpdatePenilaianRequest;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function api(Request $request)
    {
        $penilaians = Penilaian::orderBy('created_at', 'asc')->filter(compact('request'))->get();
        $datatables = datatables()->of($penilaians)->addIndexColumn()->editColumn('created_at', function(Penilaian $penilaian) {
            return convert_date($penilaian->created_at);
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
            'title' => 'Penilaian' 
        ];
        return view('penilaian', compact('data'));
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
     * @param  \App\Http\Requests\StorePenilaianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenilaianRequest $request)
    {
        // dd($request->all());

        DB::transaction(function () use ($request) {
            try {
                $data = $request->all();
            
                $penilaian = new Penilaian([
                    'id_penyakit' => $data['id_penyakit'],
                    'id_gejala' => $data['id_gejala'],
                    'bobot_nilai' => $data['bobot_nilai']
                ]);
            
                // Simpan User dan Member dalam transaksi
                $penilaian->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });

        // return redirect()->route('penilaian.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        // Penilaian telah ditambahkan
        // </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(Penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenilaianRequest  $request
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenilaianRequest $request, Penilaian $penilaian)
    {
        DB::transaction(function () use ($request, $penilaian) {
            try {
                $data = $request->all();

                $penilaian->id_penyakit = $data['id_penyakit'];
                $penilaian->id_gejala = $data['id_gejala'];
                $penilaian->bobot_nilai = $data['bobot_nilai'];
                $penilaian->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });
       
        // return redirect()->route('penilaian.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">
        // Penilaian telah diperbarui
        // </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        // dd($penilaian);
        $penilaian->delete();
        return redirect()->route('penilaian.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">
        Penilaian telah dihapus
        </div>');
    }
}
