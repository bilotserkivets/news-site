<?php include ROOT.'/views/layouts/header.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Новини категорії:
                    <small></small>
                </h1>

                <h3></h3>
                <?php foreach($categoryNews as $categoryItem): ?>

                    <h4><a href="/news/<?php echo $categoryItem['cat_name'];?>/<?php echo $categoryItem['id'];?>"><?php echo $categoryItem['title']; ?></a></h4>


                <?php endforeach;?>
<br/>

                <!-- Постраничная навигация -->
                <?php echo $pagination->get(); ?>

            </div>

<?php include ROOT . '/views/layouts/sidebar.php'; ?>

<?php include ROOT.'/views/layouts/footer.php'; ?>