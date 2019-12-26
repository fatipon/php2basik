<?php
require_once('view/template/header.php');
?>
    <form method="POST" action="index.php?action=<?= $action ?>-teacher">
        <input type="hidden" id="id" name="id" value="<?= isset($teacher->id) ? $teacher->id : '' ?>">

        <div class="form-group">
            <label for="firstName">Имя</label>
            <input type="text" class="form-control" id="first-name" name="firstName" placeholder="Имя"
                   value="<?= isset($teacher->firstName) ? $teacher->firstName : '' ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Фамилия</label>
            <input type="text" class="form-control" id="last-name" name="lastName" placeholder="Фамилия"
                   value="<?= isset($teacher->lastName) ? $teacher->lastName : '' ?>">
        </div>
        <div class="form-group">
            <label for="class">Преподает предмет</label>
            <input type="text" class="form-control" id="teach" name="teach" placeholder="Адрес"
                   value="<?= isset($teacher->teach) ? $teacher->teach : '' ?>">
        </div>
        <div class="form-group">
            <label for="class">Класный руководитель</label>
            <input type="text" class="form-control" id="classroom" name="classroom" placeholder="Адрес"
                   value="<?= isset($teacher->classroom) ? $family->classroom : '' ?>">
        </div>
        <button type="submit" class="btn btn-default">Отправить</button>
    </form>
<?php
require_once('view/template/footer.php');
?>