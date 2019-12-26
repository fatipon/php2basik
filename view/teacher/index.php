<?php
require_once('view/template/header.php');
?>

    <a href="index.php?action=create-teacher" class="btn btn-info">Новый преподаватель</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Преподает предмет</th>
            <th>класный руководитель</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($teacher as $teacher) { ?>
            <tr>
                <td><?= $teacher->firstName ?></td>
                <td><?= $teacher->lastName ?></td>
                <td><?= $teacher->teach ?></td>
                <td><?= $teacher->classroom ?></td>
                <td>
                    <a href="index.php?action=view-teacher&id=<?= $teacher->id ?>" class="btn btn-primary">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="index.php?action=update-teacher&id=<?= $teacher->id ?>" class="btn btn-warning">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="index.php?action=delete-teacher&id=<?= $teacher->id ?>" class="btn btn-danger">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php
require_once('view/template/footer.php');
?>