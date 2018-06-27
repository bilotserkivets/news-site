<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/News.php';
include_once ROOT . '/models/User.php';

class SiteController {

    public function actionIndex() {
        $categories = [];
        // Список категорий
        $categories = Category::getCategoriesList();
        // Список количества просмотров новости
        $newsViews = News::getNumberViewsByNews();
        // Список новостей с категории Политика
        $newsPolitika = [];
        $newsPolitika = News::getNewsPolitika();
        // Список новостей с категории Экономика
        $newsEkonomika = [];
        $newsEkonomika = News::getNewsEkonomika();
        // Список новостей с категории Спорт
        $newsSport = [];
        $newsSport = News::getNewsSport();
        // Список новостей с категории Техногогии
        $newsTehnology = [];
        $newsTehnology = News::getNewsTehnology();
        // Список новостей для слайдера
        $lastNews = News::getLastNews();
        // Список авторов с нойбольшим количеством коментариев
        $topAuthors = Comment::getTopAutors();
        // Список последних новостей
        $lastNews = News::getLastNews();
        // Подключение вида
        require_once (ROOT . '/views/site/index.php');
        return true;
    }

}
