<?

class Admin
{
	public static function auth(&$result)
	{
		$requisPath = ROOT.'/config/admin.php';
		$requisites = include($requisPath);
		if(isset($_POST['auth']))
		{
			$login = trim(htmlspecialchars($_POST['login']));
			$password = trim($_POST['pass']);

			if(empty($login) || empty($password))
			{
				$result['error'] = 'Заполните все поля.';
				return false;
			}

			if($login == $requisites['login'] && $password == $requisites['password'])
			{
				$_SESSION['admin'] = true;
				return true;
			}
			else
			{
				$result['error'] = 'Введенные данные неверны.';
				$result['login'] = $login;
				return false;
			}
		}
		return false
	}
}

?>