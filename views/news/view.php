<?php include ROOT . '/views/layouts/header.php'; ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- Title -->
            <h1 class="mt-4"><?php echo $oneNews['title']; ?></h1>

            <hr>

            <!-- Date/Time -->
            <p>Опубліковано <?php echo $oneNews['pubdate'] ?></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="/webroot/upload/images/<?php echo $oneNews['id']; ?>.jpg" alt="">

            <hr>

            <!-- Post Content -->
            <p align="justify"><?php echo $oneNews['content']; ?></p>

            <?php echo "Теги: "; ?>
            <?php foreach ($tags as $tagItam): ?>
                <a class="badge badge-success" href="/news/<?php echo $tagItam['id']; ?>"><?php echo $tagItam['tag']; ?></a>

            <?php endforeach; ?>

            <hr>

            <h6>Залишати коментар можуть лише авторизовані користувачі!</h6>
            <br/>
            <?php if (isset($_SESSION['user'])): ?>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Залишити коментар:</h5>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="3" placeholder="Напишіть коментар"></textarea>
                            </div>
                            <br/>
                            <input type="submit" name="submit" value="Відправити"class="btn btn-primary">
                        </form>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Single Comment -->
            <?php foreach ($comments as $commentItem): ?>
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <?php
                        $user = false;
                        foreach ($author as $name) {
                            if ($name['id'] == $commentItem['author_id']) {
                                $user = $name;
                                break;
                            }
                        }
                        ?>
                        <h5 class="mt-0"><?php echo $user['name']; ?></h5>
                        <?php echo $commentItem['content']; ?>

                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Comment with nested comments -->
        </div>

        <?php include ROOT . '/views/layouts/sidebar.php'; ?>
        <?php include ROOT . '/views/layouts/footer.php'; ?>

