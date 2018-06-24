
<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Пошук</h5>
        <div class="card-body">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Шукати...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Шукати!</button>
                </span>
            </div>
        </div>
    </div>
    <!-- Last News -->
    <div class="card my-4">
        <h5 class="card-header">Останні новини</h5>
        <div class="card-body">
            <div class="row">

                <ul class="list-unstyled mb-0">
                    <?php foreach($lastNews as $news): ?>
                        <div><?php echo $news['pubdate'];?></div>
                        <li>
                            <a href="/news/<?php echo $news['cat_name'];?>/<?php echo $news['id']; ?>"><?php echo $news['title'];?></a>
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
                        <?php foreach($topAuthors as $author):?>
                        <li>
                            <a href="/comments/<?php echo $author['author_id']; ?>"> <?php echo $author['name'];?></a> - <?php echo $author['count'];?> коментарів
                        </li>
                        <?php endforeach; ?>
                    </ul>

            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>

</div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->