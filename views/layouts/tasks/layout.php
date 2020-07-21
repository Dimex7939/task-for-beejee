<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$result['page']['title']?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="<?=LAYOUT?>/css/main.css">
</head>
<div class="mt-3">
    <div class="row justify-content-center">
        <button onclick="window.location.href='/'" <?=URI == '/'? 'disabled': ''?> class="btn btn-primary mr-3">Список задач</button>
        <!-- <button onclick="window.location.href='adminList.html'" class="btn btn-primary mr-3">Список задач (admin)</button> -->
        <button onclick="window.location.href='/add'" <?=URI == '/add'? 'disabled': ''?> class="btn btn-success mr-3">Добавить задачу</button>
        <?if($_SESSION['admin']):?>
        <button onclick="window.location.href='/logout'" class="btn btn-danger">Выйти</button>
        <?else:?>
        <button onclick="window.location.href='/login'" <?=URI == '/login'? 'disabled': ''?> class="btn btn-danger">Войти</button>
        <?endif?>
    </div>
</div>
<body>


    <?=$WORK_AREA?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>