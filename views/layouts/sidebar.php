
<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Last News -->
    <div class="card my-4">
        <h5 class="card-header">Останні новини</h5>
        <div class="card-body">
            <div class="row">

                <ul class="list-unstyled mb-0">
                    <?php foreach ($lastNews as $news): ?>
                        <div><?php echo $news['pubdate']; ?></div>
                        <li>
                            <a href="/news/<?php echo $news['cat_name']; ?>/<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>
    <!-- Authors -->
    <div class="card my-4">
        <h5 class="card-header">ТОП-5 коментаторів</h5>
        <div class="card-body">
            <div class="row">

                <ul class="list-unstyled mb-0">
                    <?php foreach ($topAuthors as $author): ?>
                        <li>
                            <a href="/comments/<?php echo $author['author_id']; ?>"> <?php echo $author['name']; ?></a> - <?php echo $author['count']; ?> коментарів
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>

    </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->