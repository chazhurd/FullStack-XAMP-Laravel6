<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;

class ChartController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index(){
        $chartData = Chart::all();

        return view('charts.index', ['chartData'=>$chartData]);

    }

    public function show($id){
        $chartData = Chart::findOrFail($id);

        return view('charts.details',['chartData'=>$chartData]);
    }

    public function create(){

        return view('charts.create');
    }

    public function store(){
        $clientData = new Chart();

        $clientData->type = request('type');
        $clientData->amount = request('amount');

        $clientData->save();

        return redirect('charts')->with('msg', 'Practice Added');
    }

    public function destroy($id){
        $client = Chart::findOrFail($id);

        $client->delete();

        return redirect('charts')->with('msg','Practice Removed');
    }
}
