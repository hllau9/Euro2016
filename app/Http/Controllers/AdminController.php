<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Custom\MatchesModel;
use App\Custom\ScoreClass;
use Validator;
use Auth;
use Log;
require_once('../app/Custom/meekrodb/db.class.php');

class AdminController extends Controller
{
	public function index()
	{
		if(\Gate::allows('admin-check'))
		{
			
			$matches = $this->getMatches('A');
			$matches16 = $this->getMatches('B');
			$matches8 = $this->getMatches('C');
			$matches4 = $this->getMatches('D');
			$matches2 = $this->getMatches('E');
			
			$countrydropdown = $this->CountryDropdown();
			
			return view('Admin.index',
				['matches' => $matches, 
				'matches16' => $matches16, 
				'matches8' => $matches8, 
				'matches4' => $matches4, 
				'matches2' => $matches2,
				'countrydropdown' => $countrydropdown
			]);
		}
		else
		{
			return Redirect::action('HomeController@index'); 
		}
	}
	
	private function getMatches($MatchType) 
	{
		\DB::$user = 'euro2016';
		\DB::$password = 'hllau860509';
		\DB::$dbName = 'Euro2016';

		$results = \DB::query("
			select A.MatchID, A.CountryHomeID, A.CountryAwayID, A.TimeAndDate, B.CountryName CountryHomeName, B.Flag CountryHomeFlag, 
			C.CountryName CountryAwayName, C.Flag CountryAwayFlag, B.CountryGroup, D.CountryHome CountryHomeScore, D.CountryAway CountryAwayScore 
			from Matches A
			join Countries B on B.CountryID = A.CountryHomeID
			join Countries C on C.CountryID = A.CountryAwayID
			left join Scores D on D.MatchID = A.MatchID and D.UserID = %i
			where A.MatchType = %s 
			;", Auth::user()->id, $MatchType);

		$mArray = [];	
		foreach($results as $row)
		{
			$object = new MatchesModel();
			$object->MatchID = $row['MatchID'];
			$object->CountryHomeName = $row['CountryHomeName'];
			$object->CountryAwayName = $row['CountryAwayName'];
			$object->TimeAndDate = $row['TimeAndDate'];
			$object->CountryHomeFlag = $row['CountryHomeFlag'];
			$object->CountryAwayFlag = $row['CountryAwayFlag'];
			$object->CountryHomeScore = $row['CountryHomeScore'];
			$object->CountryAwayScore = $row['CountryAwayScore'];
			$object->CountryHomeScoreLabel = 'CountryHomeScoreLabel'.$row['MatchID'];
			$object->CountryAwayScoreLabel = 'CountryAwayScoreLabel'.$row['MatchID'];
			$object->CountryHomeID = $row['CountryHomeID'];
			$object->CountryAwayID = $row['CountryAwayID'];
			$object->CountryHomeNameLabel = 'CountryHomeNameLabel'.$row['MatchID'];
			$object->CountryAwayNameLabel = 'CountryAwayNameLabel'.$row['MatchID'];

			$mArray[] = $object;
		}

		\DB::disconnect();

		return $mArray;
	}

	public function SubmitScore(Requests\ScoreEntryRequest $request) // continue working on ScoreEntryRequest, form validation
	{
		$input = $request->all();

		\DB::$user = 'euro2016';
		\DB::$password = 'hllau860509';
		\DB::$dbName = 'Euro2016';
	
		$row = \DB::queryFirstRow("select * from Scores where MatchID = %i and UserID = %i", $request->matchid, Auth::user()->id);		
		$count = \DB::count();

		if($count == 0) {
		\DB::insert('Scores', array(
				'MatchID' => $request->matchid,
				'UserID' => Auth::user()->id,
				'CountryHome' => $request->CountryHomeScore, 
				'CountryAway' => $request->CountryAwayScore
			));
		}
		else {
		\DB::update('Scores', array(
				'CountryHome' => $request->CountryHomeScore, 
				'CountryAway' => $request->CountryAwayScore
			), "ID=%i", $row['ID']);
		}
		
		\DB::disconnect();

		return json_encode($input);
	}	
	
	public function SubmitScoreFinal(Requests\ScoreEntryFinalRequest $request) // continue working on ScoreEntryRequest, form validation
	{
		$input = $request->all();

		\DB::$user = 'euro2016';
		\DB::$password = 'hllau860509';
		\DB::$dbName = 'Euro2016';
	
		$row = \DB::queryFirstRow("select * from Scores where MatchID = %i and UserID = %i", $request->matchid, Auth::user()->id);		
		$count = \DB::count();

		//Log::info($count.' '.$request->matchid);

		\DB::startTransaction();

		if($count == 0) {
			\DB::insert('Scores', array(
				'MatchID' => $request->matchid,
				'UserID' => Auth::user()->id,
				'CountryHome' => $request->CountryHomeScore, 
				'CountryAway' => $request->CountryAwayScore
			));
		}
		else {
		\DB::update('Scores', array(
				'CountryHome' => $request->CountryHomeScore, 
				'CountryAway' => $request->CountryAwayScore
			), "ID=%i", $row['ID']);
		}


		$affectedcount = \DB::affectedRows();

		\DB::update('Matches', array(
			'CountryHomeID' => $request->CountryHomeID, 
			'CountryAwayID' => $request->CountryAwayID
			), "MatchID=%i", $request->matchid);

		\DB::commit();

		\DB::disconnect();
		
		// retrieve country names and flag
	        $countrynamehome = \DB::queryFirstRow("select CountryName, Flag from Countries where CountryID = %i",$request->CountryHomeID);
	        $countrynameaway = \DB::queryFirstRow("select CountryName, Flag from Countries where CountryID = %i",$request->CountryAwayID);


		$input['CountryHomeID'] = $countrynamehome['CountryName'];
		$input['CountryAwayID'] = $countrynameaway['CountryName'];
		$input['CountryHomeImage'] = $countrynamehome['Flag'];
		$input['CountryAwayImage'] = $countrynameaway['Flag'];
		//$input['CountryHID'] = $request->CountryHomeID;	
		//$input['CountryAID'] = $request->CountryAwayID;	
		return json_encode($input);
	}	
	
	public function Scores()
	{
		$scores = new ScoreClass();
		$ScoreTable = $scores->ScoreTable();
		
		return View("Admin.Scores",['ScoreTable' => $ScoreTable]);
	}	

	private function CountryDropdown()
	{
		\DB::$user = 'euro2016';
		\DB::$password = 'hllau860509';
		\DB::$dbName = 'Euro2016';

		$results = \DB::query("select CountryID, CountryName from Countries;");

		/*
		$results = \DB::query("select A.CountryID, A.CountryName, B.selected from Countries A	
			left join (
				select X.CountryID, 'selected' selected from Countries X
				join Matches Y on Y.CountryHomeID = X.CountryID
				where Y.MatchID = %i
				)B on B.CountryID = A.CountryID
				;", $matchid);
		*/
		return $results;
 
	}
	
}
