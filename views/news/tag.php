<?php include ROOT.'/views/layouts/header.php'; ?>
    <!-- ####################################################################################################### -->
    <div class="wrapper">
        <div class="container">

            <h3>Новини з тегом:</h3>
            <?php foreach($tagNews as $newsItem): ?>

                <h4><a href="/news/<?php echo $newsItem['cat_name'];?>/<?php echo $newsItem['id'];?>"><?php echo $newsItem['title']; ?></a></h4>


            <?php endforeach;?>
            <br class="clear" />
        </div>
    </div>



<?php include ROOT.'/views/layouts/footer.php'; ?>