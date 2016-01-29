<?php

namespace App\Custom;
use Auth;
require_once('../app/Custom/meekrodb/db.class.php');


class AdminClass
{
	public function isAdmin()
	{
		\DB::$user = 'euro2016';
		\DB::$password = 'hllau860509';
		\DB::$dbName = 'Euro2016';

		$row = \DB::queryFirstRow("select * from userroles where userid = %i;", Auth::user()->id);
		if(\DB::count() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function test()
	{
		return 'test';
	}
}
