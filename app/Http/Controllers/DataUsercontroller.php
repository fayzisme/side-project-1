<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataUsercontroller extends Controller
{
    public function diagnosa(){

        return view('diagnosa');
    }
    
    public function result(){

        return view('result');
    }

    public function simpanData(Request $request){
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'umur' => $request->input('umur'),
        ];
        // dd($data);
              session(['data' => $data]);

        return view('diagnosa', ['data' => $data])->with('success', 'Terimakasih Telah Mengisi identisas');
    }
    public function riwayats(Request $request){

        $diagnosa = [
            'demam' => $request->input('demam'),
            'mual' => $request->input('mual'),
            'pilek' => $request->input('pilek'),
        ];
        $datas = $request->except('_token');

        $filteredData = $request->only(['nama', 'alamat', 'umur']);
        
        $data = [
            'data_jawaban' => $diagnosa,
            'datas' => $filteredData,
        ];
        
        // dd($data);
        return redirect()->route('result')->with('success', 'SuccesFuly');
    }

}
