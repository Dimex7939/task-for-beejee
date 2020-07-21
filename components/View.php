<?

class View
{
	public static function render($view, $result)
	{
		$paramPath = ROOT.'/config/site.php';
		$param = include($paramPath);

		$layout = ROOT.'/views/layouts/'.$param['layout'].'/layout.php';

		$view_file = ROOT.'/views/'.$view;

		define('LAYOUT', '/views/layouts/'.$param['layout']);
		define('IMAGE', '/assets/files/');

		if(file_exists($layout))
		{
			if(file_exists($view_file))
			{
				Application::setResultBefore($result);
				ob_start();
				include_once $view_file;
				$WORK_AREA = ob_get_contents();
				ob_end_clean();
			}

			include_once $layout;
		}
		else
		{
			die('Шаблон не найден');
		}
	}



	public static function debug($param)
	{
		echo '<pre>';
		print_r($param);
		echo '</pre>';
	}

	public static function render404()
	{
		$paramPath = ROOT.'/config/site.php';
		$param = include($paramPath);

		$layout = ROOT.'/views/layouts/'.$param['layout'].'/404.php';

		if(file_exists($layout))
		{
			header("HTTP/1.0 404 Not Found");
			header("Status: 404 Not Found");
			include_once $layout;
			die();
		}
		else
		{
			die('Шаблон не найден');
		}
	}
}

?>