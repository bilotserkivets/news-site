<?php include ROOT.'/views/layouts/header.php'; ?>
<!-- Page Content -->
<div class="container">

    <divbr class="row">
    <br/>
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="my-4">Сторінка коментаріїв автора:

            </h1>
            <!-- Single Comment -->
            <?php foreach($authorComments as $com): ?>
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <?php
                        $user = false;
                        foreach($author as $name) {
                            if($name['id'] == $com['author_id']) {
                                $user = $name;
                                break;
                            }
                        }
                        ?>
                        <h5 class="mt-0"><?php echo $user['name'];?></h5>
                        <?php echo $com['content']; ?>

                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Comment with nested comments -->

        </div>

        <?php include ROOT.'/views/layouts/sidebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>

