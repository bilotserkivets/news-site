<?php include ROOT.'/views/layouts/header.php'; ?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">
           <!-- Blog Entries Column -->

    <div class="col-md-8">
        <br/>
        <!-- Slider -->
        <div class="sl">
            <?php foreach($lastNews as $news): ?>
        <div class="sl__slide">
           <a href="#"><img src="/webroot/upload/images/<?php echo $news['id'];?>.jpg" alt="Картинка слайда" class="sl__image">
            <div class="sl__text">
                <h5 class="sl__zag"><?php echo $news['title'];?></h5>
            </div>
               </a>
        </div>
        <?php endforeach;?>
        </div>
                <!-- Blog Post -->
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="/news/<?php echo $categories[0]['cat_name'];?>"><h2 class="card-title">Політика</h2></a>
                        <?php foreach($newsPolitika as $newsItem):?>
                        <table>
                        <tr>
                            <td> <a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><img src="/webroot/upload/images/<?php echo $newsItem['id'];?>.jpg" width="250" hspace="5" vspace="5"></a><td>
                            <td> <div><a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><?php echo $newsItem['title']?></a></div>
                                <div><?php echo mb_substr($newsItem['content'], 0, 150) . '...'?></div>
                            </td>
                        </tr>
                            </table>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by

                    </div>
                </div>

                <!-- Blog Post -->
                <div class="card mb-4">

                    <div class="card-body">
                        <a href="/news/<?php echo $categories[1]['cat_name'];?>"><h2 class="card-title">Економіка</h2></a>
                        <?php foreach($newsEkonomika as $newsItem):?>
                            <table>
                                <tr>
                                    <td> <a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><img src="/webroot/upload/images/<?php echo $newsItem['id'];?>.jpg" width="250" hspace="5" vspace="5"></a><td>
                                    <td> <div><a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><?php echo $newsItem['title']?></a></div>
                                        <div><?php echo mb_substr($newsItem['content'], 0, 150) . '...'?></div>
                                    </td>
                                </tr>
                            </table>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by

                    </div>
                </div>

                <!-- Blog Post -->
                <div class="card mb-4">

                    <div class="card-body">
                        <a href="/news/<?php echo $categories[2]['cat_name'];?>"><h2 class="card-title">Спорт</h2></a>
                        <?php foreach($newsSport as $newsItem):?>
                            <table>
                                <tr>
                                    <td> <a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><img src="/webroot/upload/images/<?php echo $newsItem['id'];?>.jpg" width="250" hspace="5" vspace="5"></a><td>
                                    <td> <div><a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><?php echo $newsItem['title']?></a></div>
                                        <div><?php echo mb_substr($newsItem['content'], 0, 150) . '...'?></div>
                                    </td>
                                </tr>
                            </table>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by

                    </div>
                </div>

                <!-- Blog Post -->
                <div class="card mb-4">

                    <div class="card-body">
                        <a href="/news/<?php echo $categories[3]['cat_name'];?>"><h2 class="card-title">Технології</h2></a>
                        <?php foreach($newsTehnology as $newsItem):?>
                            <table>
                                <tr>
                                    <td> <a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><img src="/webroot/upload/images/<?php echo $newsItem['id'];?>.jpg" width="250" hspace="5" vspace="5"></a><td>
                                    <td> <div><a href="/news/<?php echo $newsItem['cat_name']?>/<?php echo $newsItem['id']?>"><?php echo $newsItem['title']?></a></div>
                                        <div><?php echo mb_substr($newsItem['content'], 0, 150) . '...'?></div>
                                    </td>
                                </tr>
                            </table>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by

                    </div>
                </div>
    </div>

<?php include ROOT . '/views/layouts/sidebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>