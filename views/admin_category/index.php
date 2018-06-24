<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<br/>

<div class="col-md-8">
    <a href="/admin"><button type="button" class="btn btn-primary"">Адмін панель</button></a>
    <a href="/admin/category"><button type="button" class="btn btn-primary">Управління категоріями</button></a>
    <a href="/admin/category/create" "><i class="fa fa-plus"></i><button type="button" class="btn btn-success"> + Додати категорію</button></a>




    <h4>Список категорій</h4>

    <br/>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID категорії</th>
            <th>Назва категорії</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($categoriesList as $category): ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['title']; ?></td>
                <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редагувати"><i class="fa fa-pencil-square-o"></i><img src="/webroot/upload/icons/check.svg"width="15"></a></td>
                <td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Видалити"><i class="fa fa-times"></i><img src="/webroot/upload/icons/delete.svg"width="15"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>