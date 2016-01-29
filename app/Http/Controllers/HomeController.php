<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Custom\ScoreClass;

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
     * @return Response
     */
    public function index()
    {
		$scores = new ScoreClass();
		$ScoreTable = $scores->ScoreTable();
		
        //return view('home');
        return view('home', ['ScoreTable' => $ScoreTable]);
	}
}
