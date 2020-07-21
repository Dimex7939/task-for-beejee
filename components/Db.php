<?
	class Db
	{
		public static function getConnection()
		{
			$paramPath = ROOT.'/config/db.php';
			$param = include($paramPath);

			$db = new mysqli($param['host'], $param['user'], $param['password'], $param['database']);
  			if ($db->connect_errno) 
  			{
      			die("Не удалось подключиться к MySQL: " . $db->connect_error);
  			}

  			return $db;
		}
		
	}

?>