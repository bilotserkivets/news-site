<?php include ROOT . '/views/layouts/header.php'; ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <br/>
            <?php if ($result): ?>
                <div class="alert alert-success" role="alert">
                    <p>Ви зареєстровані!</p>
                </div>

            <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <div class="alert alert-danger" role="alert"><?php echo$error ?></div>


                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <h2>Реєстрація на сайті</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ім'я</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введіть ім'я" value="<?php echo $name; ?>">
                        <label for="exampleInputEmail1">Email адреса</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введіть email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" <?php echo $password; ?>>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" value="Регистрация">Зареєструватися</button>
                </form>
            <?php endif; ?>

        </div>

        <?php include ROOT . '/views/layouts/sidebar.php'; ?>

        <?php include ROOT . '/views/layouts/footer.php'; ?>