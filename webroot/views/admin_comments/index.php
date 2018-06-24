<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<br/>

    <div class="col-md-8">
        <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>
        <a href="/admin/category"><button type="button" class="btn btn-primary">Управління категоріями</button></a>
        <br/>
        <br/>
        <a href="/admin/news/create" "><i class="fa fa-plus"></i><button type="button" class="btn btn-success"> + Додати коментар</button></a>



<h4>Список коментаріїв</h4>

<br/>

<table class="table-bordered table-striped table">
    <tr>
        <th>ID коментарію</th>
        <th>Текст коментарію</th>
        <th>Автор коментарію</th>
        <th>ID новини</th>
        <th>Дата публікації</th>
        <th>Статус</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($commentsList as $comment): ?>
        <tr>
            <td><?php echo $comment['id']; ?></td>
            <td><?php echo $comment['content']; ?></td>
            <?php
            $user = false;
            foreach($author as $name) {
                if($name['id'] == $comment['author_id']) {
                    $user = $name;
                    break;
                }
            }
            ?>
            <td><?php echo $user['name'];?></td>
            <td><?php echo $comment['news_id']; ?></td>
            <td><?php echo $comment['pubdate']; ?></td>
            <td><?php echo $comment['status']; ?></td>
            <td><a href="/admin/comments/update/<?php echo $comment['id']; ?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i><img src="/webroot/upload/icons/check.svg"width="15"></a></td>
            <td><a href="/admin/comments/delete/<?php echo $comment['id']; ?>" title="Видалити"><i class="fa fa-times"></i><img src="/webroot/upload/icons/delete.svg"width="15"></a></td>
        </tr>
    <?php endforeach; ?>
</table>
    </div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>