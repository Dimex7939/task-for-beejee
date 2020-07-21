<?
	class Router
	{
		private $routes;

		public function __construct()
		{
			$routesPath = ROOT.'/config/routes.php';
			$this->routes = include($routesPath);
		}

		public function getURI()
		{
			if(!empty($_SERVER['REQUEST_URI']))
			{
				return trim($_SERVER['REQUEST_URI'], '/');
			}
		}

		public function run()
		{
			$uri = $this->getURI();

			global $error404;
			$error404 = true;

			foreach($this->routes as $uriPattern => $path) 
			{
				if(preg_match("~$uriPattern~", $uri))
				{
					$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

					$segments = explode('/', $internalRoute);
					$controllerName = array_shift($segments).'Controller';
					$controllerName = ucfirst($controllerName);

					$actionName = 'action'.ucfirst(array_shift($segments));

					$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

					$parameters = $segments;

					if(file_exists($controllerFile))
					{
						include_once($controllerFile);
					}

					$controllerObject = new $controllerName;
					//$result = $controllerObject->$actionName($parameters);

					$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

					if($result != null)
					{
						$error404 = false;
						break;
					}
				}
			}

			if($error404)
			{
				View::render404();
			}
		}
	}
?>