<?

	class TasksController
	{
		public function actionList($page = 1)
		{
			$page = $page > 0 ? intval($page) : 1;
			$num = 3;

			if(isset($_POST['sort_btn']))
			{
				$_SESSION['sort'] = $_POST['sort'];
				$_SESSION['sort_desc'] = $_POST['sort_desc'];
			}

			$sort = ['sort_by' => $_SESSION['sort'], 'sort_desc' => $_SESSION['sort_desc']];

			$result['page']['title'] = 'Список задач';

			$result['tasks'] = Tasks::getList($num ,$page, $sort);

			$total = Tasks::getTotalTasks();

			$pagination = new Pagination($total, $page, $num, 'page-');

			$result['pagination'] = $pagination->get();

			View::render('tasks/list.php', $result);
			return true;
		}

		public function actionAdd()
		{
			$result['page']['title'] = 'Добавить задачу';
			$result['title_form'] = 'Добавление задачи';
			$result['button'] = 'Добавить';

			if(Tasks::addEdit($result))
			{
				$result['success'] = 'Задача добавлена';
			}
			
			View::render('tasks/add.php', $result);
			return true;
		}

		public function actionEdit($id)
		{
			$result['edit'] = true;
			$result['page']['title'] = 'Редактировать задачу';
			$result['title_form'] = 'Редактирование задачи';
			$result['button'] = 'Изменить';
			$result['form'] = Tasks::GetById($id);
			if(empty($result['form']))
			{
				View::render404();
				return true;
			}
			if(Tasks::addEdit($result))
			{
				$result['success'] = 'Задача обновлена';
			}
			View::render('tasks/add.php', $result);
			return true;
		}

	}



?>