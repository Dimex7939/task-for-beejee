<?
	class Tasks
	{

		public static function getById($id)
		{
			$db = Db::getConnection();

			$res = $db->query("SELECT t.id, t.name, t.email, t.body, t.status, t.edit_by_admin, t.date FROM tasks t WHERE t.id=$id");

			if($row = $res->fetch_assoc())
				$task = $row;
			else
				return false;

			return $task;
		}

		public static function getList($count = 6, $page = 1, $sort)
		{
			$page = intval($page);
			$count = intval($count);

			$sort_by = empty($sort['sort_by'])? 'id' : $sort['sort_by'];
			$sort_desc = $sort['sort_desc'] == ''? 'DESC' : $sort['sort_desc'];
			$sort_desc = $sort_desc? 'DESC' : '';

			$offset = ($page-1) * $count;

			$db = Db::getConnection();

			$res = $db->query("SELECT t.id, t.name, t.email, t.body, t.status, t.edit_by_admin, t.date FROM tasks t ORDER BY t.$sort_by $sort_desc LIMIT $count OFFSET $offset");
			while($row = $res->fetch_assoc())
			{
				$TaskList[] = $row;
			}

			return $TaskList;
		}

		public static function addEdit(&$result)
		{
			if(isset($_POST['add']))
			{
				$name = trim(htmlspecialchars($_POST['name']));
				$email = trim(htmlspecialchars($_POST['email']));
				$body = trim(htmlspecialchars($_POST['body']));
				$status = $_POST['status'];
				$status = $status == 'on'? 1: 0;
				if(empty($name) || empty($email) || empty($body))
				{
					$error = 'Не все поля заполнены';
				}
				if($result['edit'] && !$_SESSION['admin'])
				{
					$error = 'Для выполнения данной операции требуется авторизация.';
				}
				if(empty($error))
				{
					if($result['edit'])
					{
						$id = $result['form']['id']; 
						$updated_by_admin = $body == $result['form']['body']? false : true;
						$answer = self::edit($body, $status, $updated_by_admin, $id);
					}
					else
					{	
						$answer = self::save($name,$email,$body);
					}
					if($answer)
						return true;
				}
				
				$result['error'] = $error;

				$result['form'] = array(
					'name' => $name,
					'email' => $email,
					'body' => $body,
					'status' => $status
				);

				return false;

			}
			return false;
		}

		public static function save($name,$email,$body)
		{

			$db = Db::getConnection();

			$res = $db->query("INSERT INTO tasks (name,email,body) VALUES ('$name','$email','$body')");

			if($res == true)
			{
				return true;
			}
			else
			{
				echo 'Ошибка: '.$db->error;
				return false;
			}

		}

		public static function edit($body, $status, $updated_by_admin, $id)
		{
			$db = Db::getConnection();

			$res = $db->query("UPDATE tasks SET body = '$body', status = '$status' , edit_by_admin = '$updated_by_admin' WHERE id=$id");

			if($res == true)
			{
				return true;
			}
			else
			{
				echo 'Ошибка: '.$db->error;
				return false;
			}
		}

		public static function getTotalTasks()
		{
			$db = Db::getConnection();
			$res = $db->query("SELECT count(id) AS count FROM tasks");
			$row = $res->fetch_assoc();

			return $row['count'];
		}

	}




?>