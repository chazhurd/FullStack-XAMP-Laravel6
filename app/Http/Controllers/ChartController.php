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

    public function showSpecific($id){
        $client = Chart::findOrFail($id);

        return view('charts.update',['client'=>$client]);
    }
    
    public function update(Request $req){
        $client = Chart::findOrFail($req->id);
        $client->type=$req->type;
        $client->amount=$req->amount;
        $client->save();
        
        return redirect('charts')->with('msg', 'Practice Updated');
    }

    public function addPractice(Request $request){
        $chart = new Chart();
        $chart->type= $request->type;
        $chart->amount = $request->amount;
        $chart->save();
        return response()->json($chart);
    }

    public function storedAjax(){
        return redirect('charts')->with('msg', 'Practice Added');
    }
}
