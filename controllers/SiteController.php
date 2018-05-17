<?php

include_once ROOT. '/models/Category.php';
include_once ROOT. '/models/News.php';
include_once ROOT. '/models/User.php';

class SiteController
{
public function actionIndex() {
        $categories = [];
        $categories = Category::getCategoriesList();


    $newsPolitika = [];
    $newsPolitika = News::getNewsPolitika();

    $newsEkonomika = [];
    $newsEkonomika = News::getNewsEkonomika();

    $newsSport = [];
    $newsSport = News::getNewsSport();

    $newsTehnology = [];
    $newsTehnology = News::getNewsTehnology();
    // Список новостей для слайдера
    $lastNews = News::getLastNews();

    $topAuthors = Comment::getTopAutors();




    require_once (ROOT.'/views/site/index.php');

    return true;
}
}