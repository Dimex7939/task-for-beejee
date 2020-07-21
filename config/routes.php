<?
// 'URL Адрес' => 'Контроллер/Метод'
	return array(
		'login' => 'Admin/login',
		'logout' => 'Admin/logout',

		'edit/([0-9]+)' => 'tasks/edit/$1',
		'add' => 'tasks/add',

		'page-([0-9]+)' => 'tasks/list/$1',
		'' => 'tasks/list'
	);
?>