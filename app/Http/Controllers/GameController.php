<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Custom\MatchesModel;
use Validator;
use Auth;
use Log;
use App\Custom\ScoreClass;

require_once('../app/Custom/meekrodb/db.class.php');

class GameController extends Controller
{
	public function index()
	{
		if(!(\Gate::allows('admin-check'))) //only for non-admin
		{
			$matches = $this->getMatches('A');
			$matches16 = $this->getMatches('B');
			$matches8 = $this->getMatches('C');
			$matches4 = $this->getMatches('D');
			$matches2 = $this->getMatches('E');

			$ownscore = new ScoreClass();
			$totalscore = $ownscore->Scores(Auth::user()->id);
			
		return view('Game.index',['matches' => $matches, 'matches16' => $matches16, 'matches8' => $matches8, 'matches4' => $matches4, 'matches2' => $matches2, 'totalscore' => $totalscore]);
		}
		else
		{
			return Redirect::action('AdminController@index');
		}
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

	private function Scores()
	{
		\DB::$user = 'euro2016';
		\DB::$password = 'hllau860509';
		\DB::$dbName = 'Euro2016';

		$adminscore = \DB::query("select * from Scores where UserID = 4");	
		$NoOfMatches = \DB::count();

		$userscore = \DB::query("select * from Scores where UserID = %i", Auth::user()->id);	

		$totalscore = 0;

		foreach($adminscore as $ascore)
		{
			foreach($userscore as $uscore)
			{
				if($uscore['MatchID'] == $ascore['MatchID'])
				{
					if($uscore['CountryHome'] == $ascore['CountryHome'] && $uscore['CountryAway'] == $ascore['CountryAway'])
					{
						$totalscore += 3;			
					}
					else if($uscore['CountryHome'] > $uscore['CountryAway'] && $ascore['CountryHome'] > $ascore['CountryAway'])
					{
						$totalscore += 1;			
					}
					else if($uscore['CountryHome'] < $uscore['CountryAway'] && $ascore['CountryHome'] < $ascore['CountryAway'])
					{
						$totalscore += 1;			
					}
					else if($uscore['CountryHome'] == $uscore['CountryAway'] && $ascore['CountryHome'] == $ascore['CountryAway'])
					{
						$totalscore += 1;			
					}
				}
			}			
		}

		return $totalscore;
	//	return View('Game.Scores', ['adminscore' => $adminscore, 'userscore' => $userscore, 'totalscore' => $totalscore]);
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

			//where B.CountryGroup in ('A','B','C','D','E','F')
			//where D.UserID = %i
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
			$object->CountryHomeScore = $row['CountryHomeScore'];// == '' ? '&nbsp;' : $row['CountryHomeScore'];
			$object->CountryAwayScore = $row['CountryAwayScore'];// == '' ? '&nbsp;' : $row['CountryAwayScore'];
			$object->CountryHomeScoreLabel = 'CountryHomeScoreLabel'.$row['MatchID'];// == '' ? '&nbsp;' : $row['CountryAwayScore'];
			$object->CountryAwayScoreLabel = 'CountryAwayScoreLabel'.$row['MatchID'];// == '' ? '&nbsp;' : $row['CountryAwayScore'];
			$mArray[] = $object;
		}

		\DB::disconnect();

		return $mArray;
	}

}
