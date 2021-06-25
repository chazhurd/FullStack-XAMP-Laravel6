<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ActiveUser;
use App\Models\db_Size;

class ActiveUsersController extends Controller
{
    //two ways to connect to multi DB
    public function index(){
        // return DB::connection('ipr')->table('active_users')->get();
        $activeUsers  = ActiveUser::all();
        $databaseSize = db_Size::all();
        return view('DashboardClone.index',['activeUsers'=>$activeUsers, 'DatabaseSize'=>$databaseSize]);

    }
}
