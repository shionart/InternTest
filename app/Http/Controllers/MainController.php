<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class MainController extends Controller
{
    Public function index(){
        $absen_log = \App\Absen::all();
        return view('index',['absensi'=>$absen_log]);
        
    }
}
?>