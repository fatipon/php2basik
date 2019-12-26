<?php
require_once('view/template/header.php');
?>
    <div class="panel panel-default">
        <div class="panel-heading">Просмотр преподавателей</div>
        <div class="panel-body">
            <p>
                <strong>Имя: </strong><?= $teacher->firstName ?>
            </p>
            <p>
                <strong>Фамилия: </strong><?= $teacher->lastName ?>
            </p>
            <p>
                <strong>Преподает: </strong><?= $teacher->teach ?>
            </p>
            <p>
                <strong>Класнный руководитель: </strong><?= $teacher->classroom ?>
            </p>
        </div>
    </div>
<?php
require_once('view/template/footer.php');
?>