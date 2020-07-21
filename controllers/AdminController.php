<?

	class AdminController
	{
		public function actionLogin()
		{
			$result['page']['title'] = 'Вход';

			if(Admin::auth($result))
			{
				header('Location: /');
			}

			View::render('admin/login.php', $result);
			return true;
		}

		public function actionLogout()
		{
			unset($_SESSION['admin']);
			header('Location: /');
			return true;
		}
	}

?>