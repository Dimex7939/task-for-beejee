<div class="container">
    <form class="mt-4" id="adminList" method="post">
        <p class="text-center h3 mt-2 mb-4">Список задач</p>
        <div class="form-group">
            <label for="sel1">Выберите сортировку:</label>
            <select name="sort" class="form-control" id="sel1">
                <option value="id">ID</option>
                <option <?=$_SESSION['sort'] == 'name'? 'selected' : ''?> value="name">Имя пользователя</option>
                <option <?=$_SESSION['sort'] == 'email'? 'selected' : ''?> value="email">E-mail</option>
                <option <?=$_SESSION['sort'] == 'status'? 'selected' : ''?> value="status">Статус</option>
            </select>
        </div>
        <div class="form-group">
            <select name="sort_desc" class="form-control" id="sel1">
                <option <?=$_SESSION['sort_desc']? '' : 'selected'?> value="0">По возрастанию</option>
                <option <?=$_SESSION['sort_desc']? 'selected' : ''?> value="1">По убыванию</option>
            </select>
        </div>
        <button type="submit" name="sort_btn" class="btn btn-primary">Сортировать</button>
        <?if(!empty($result['tasks'])):?>
            <?foreach($result['tasks'] as $task):?>
                <div class="row mt-5" id="taskAdmin">
                    <div class="col-4">
                        <p class="font-weight-bold">Имя пользователя</p>
                        <p><?=$task['name']?></p>
                        <p class="font-weight-bold mt-4">e-mail</p>
                        <p><?=$task['email']?></p>
                    </div>
                    <div class="col-5">
                        <p class="font-weight-bold">Текст задачи</p>
                        <textarea class="form-control" rows="7" id="comment" readonly=""><?=$task['body']?></textarea>
                    </div>
                    <div class="col-2">
                        <p class="font-weight-bold">Статус</p>
                        <p id="<?=$task['status']? 'success': 'not_success'?>"><?=$task['status']? 'Выполнено': 'Не выполнено'?></p>
                        <p id="editAdmin"><?=$task['edit_by_admin']? 'Отредактировано администратором': ''?></p>
                    </div>
                    <?if($_SESSION['admin']):?>
                    <div class="col-1">
                        <a href="/edit/<?=$task['id']?>"><i class="fas fa-edit" id="iconEdit"></i></a>
                    </div>
                    <?endif?>
                </div>
            <?endforeach?>
        <?else:?>
            <p>Список задач пуст</p><br>
        <?endif?>
        <?=$result['pagination'];?>
    </form>
</div>