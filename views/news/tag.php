<?php include ROOT.'/views/layouts/header.php'; ?>
    <!-- ####################################################################################################### -->
    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Новини:
                <small></small>
            </h1>

            <h3></h3>
            <?php foreach($tagNews as $newsItem): ?>

                <h4><a href="/news/<?php echo $newsItem['cat_name'];?>/<?php echo $newsItem['id'];?>"><?php echo $newsItem['title']; ?></a></h4>


            <?php endforeach;?>

    </div>


<?php include ROOT . '/views/layouts/sidebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>