<?php
require_once('view/template/header.php');
?>
    <form method="POST" action="index.php?action=<?= $action ?>-family">
        <input type="hidden" id="id" name="id" value="<?= isset($family->id) ? $family->id : '' ?>">

        <div class="form-group">
            <label for="firstName">Имя</label>
            <input type="text" class="form-control" id="first-name" name="firstName" placeholder="Имя"
                   value="<?= isset($family->firstName) ? $family->firstName : '' ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Фамилия</label>
            <input type="text" class="form-control" id="last-name" name="lastName" placeholder="Фамилия"
                   value="<?= isset($family->lastName) ? $family->lastName : '' ?>">
        </div>
        <div class="form-group">
            <label for="class">Адрес</label>
            <input type="text" class="form-control" id="adress" name="address" placeholder="Адрес"
                   value="<?= isset($family->address) ? $family->address : '' ?>">
        </div>
        <button type="submit" class="btn btn-default">Отправить</button>
    </form>
<?php
require_once('view/template/footer.php');
?>