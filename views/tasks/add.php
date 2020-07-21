<form class="mt-4" id="addForm" method="post">
	<p class="text-center h3 my-2"><?=$result['title_form']?></p>
	<p id="success"><?=$result['success']?></p>
	<p id="not_success"><?=$result['error']?></p>
	<div class="form-group text-center mt-4">
	<label for="usr">Имя пользователя</label><br>
	<input name="name" <?=$result['edit']? 'readonly' : ''?> type="text" id="usr" value="<?=$result['form']['name']?>">
	</div>
	<div class="form-group text-center">
	<label for="email">e-mail</label><br>
	<input name="email" <?=$result['edit']? 'readonly' : ''?> type="email" id="emailAdd" value="<?=$result['form']['email']?>">
	</div>
	<div class="form-group mb-4 text-center">
	  <label for="comment">Текст задачи</label>
	  <textarea name="body" class="form-control" rows="7" id="comment"><?=$result['form']['body']?></textarea>
	</div>
	<?if($result['edit']):?>
		<div class="form-group mb-4 text-center">
			<label class="mr-3" for="status">Выполнено</label>
			<input type="checkbox" <?=$result['form']['status']? 'checked': ''?> name="status">
		</div>
	<?endif?>
	<div class="row justify-content-center">
		<button type="submit" name="add" class="btn btn-success"><?=$result['button']?></button>
	</div>
</form>