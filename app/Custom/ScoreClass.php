<?php
namespace App\Custom;

require_once('../app/Custom/meekrodb/db.class.php');

class ScoreClass
{	
	public function ScoreTable()
		{
			\DB::$user = 'euro2016';
			\DB::$password = 'hllau860509';
			\DB::$dbName = 'Euro2016';

			$adminscore = \DB::query("select * from Scores where UserID = 4");	

			$users = \DB::query("select id from users where id != 4");

			$scorearray = array();

			foreach($users as $user)
			{
				$userscore = \DB::query("select A.*, B.name from Scores A
										join users B on B.id = A.UserID
										where A.UserID = %i"
										, $user['id']);
				$totalscore = 0;  
				foreach($userscore as $uscore)
				{
					foreach($adminscore as $ascore)
					{
						//$totalscore = 0;
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
				$scorearray += [$uscore['name'] => $totalscore];
			}

			return $scorearray;
			//return View("Admin.Scores",['scorearray' => $scorearray]);
		}
	
	public function Scores($userid)
	{
		\DB::$user = 'euro2016';
		\DB::$password = 'hllau860509';
		\DB::$dbName = 'Euro2016';

		$adminscore = \DB::query("select * from Scores where UserID = 4");	
		$NoOfMatches = \DB::count();

		$userscore = \DB::query("select * from Scores where UserID = %i", $userid);	

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
	}
	
	
}

