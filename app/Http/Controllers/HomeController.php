<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Gejala;
use App\Models\Member;
use App\Models\Penyakit;
use App\Models\Publisher;
use App\Models\Riwayat;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_gejala = Gejala::count();
        $total_penyakit = Penyakit::count();
        $total_riwayat = Riwayat::whereYear('created_at', date('Y'))->count();

        $data_donut = Penyakit::withCount('penilaians')->get();
        $labels = [];
        $total = [];
        foreach ($data_donut as $value) {
            array_push($labels, $value->nama_penyakit);
            array_push($total, $value->penilaians_count);
        }

        $data_riwayat = []; 
        $labels_bar = [];
        for ($i=1; $i <= 12 ; $i++) { 
            array_push($labels_bar, date('F', mktime(0, 0, 0, $i, 10)));
            array_push($data_riwayat, Riwayat::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', Carbon::create(date('Y'), $i, 1, 0, 0, 0)->month)->count());
        }
        

        $data = [
            'title' => 'Dashboard',
            'labels_donut' => $labels,
            'total_donut' => $total,
            'labels_bar' => $labels_bar,
            'data_riwayat' => json_encode($data_riwayat),
        ];

        return view('home', compact('data','total_gejala', 'total_penyakit', 'total_riwayat'));
    }
}
