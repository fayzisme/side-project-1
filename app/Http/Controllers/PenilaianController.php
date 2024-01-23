<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenilaianRequest;
use App\Http\Requests\UpdatePenilaianRequest;
use App\Models\Gejala;
use App\Models\Penilaian;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function api(Request $request)
    {
        $penilaians = Penilaian::with(['penyakit', 'gejala'])->orderBy('id', 'asc')->get();

        foreach ($penilaians as $key => $penilaian) {
            $penilaian->kode_penyakit = $penilaian->penyakit->kode_penyakit;
            $penilaian->nama_penyakit = $penilaian->penyakit->nama_penyakit;
            $penilaian->kode_gejala = $penilaian->gejala->kode_gejala;
            $penilaian->nama_gejala = $penilaian->gejala->nama_gejala;
        }

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
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();
        $data = [
            'title' => 'Penilaian' 
        ];
        return view('penilaian', compact('data', 'penyakits', 'gejalas'));
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
                    'bobot_penilaian' => $data['bobot_penilaian']
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
                $penilaian->bobot_penilaian = $data['bobot_penilaian'];
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
