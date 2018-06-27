<?php

include_once ROOT . '/models/News.php';
include_once ROOT . '/components/Pagination.php';
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Comment.php';

class NewsController {

    public function actionIndex() {
        $newsList = [];
        // Список новостей категории Политика
        $newsList = News::getNewsPolitika();
        // Список категорий
        $categories = Category::getCategoriesList();
        // Количество просмотров новости
        $newsViews = News::getNumberViewsByNews();
        // Автор
        $author = User::getUsers();
        // Список новостей для слайдера
        $lastNews = News::getLastNews();
        // Подключение вида
        require_once (ROOT . '/views/site/index.php');
        return true;
    }

    
    public function actionCategory($category, $page = 1) {

        // Список последних новостей
        $lastNews = News::getLastNews();
        // Список авторов
        $topAuthors = Comment::getTopAutors();

        $categoryNews = [];
        // Список новостей в категории
        $categoryNews = News::getNewsCategory($category, $page);
        // Список категорий
        $categories = Category::getCategoriesList();
        // Количество просмотров новости
        $newsViews = News::getNumberViewsByNews();
        // Все новости категории
        $total = News::getTotalNewsInCategory($category);
        // Пагинация
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');
        // Подключение вида 
        require_once (ROOT . '/views/news/category.php');
        return true;
    }

    public function actionView($category, $id) {
        $tags = [];
        // Получение новости c определенной категории по id
        $oneNews = News::getNewsListById($category, $id);
        // Список новостей для слайдера
        $lastNews = News::getLastNews();
        // Список категорий
        $categories = Category::getCategoriesList();
        // Количество просмотров новости
        $newsViews = News::getNumberViewsByNews();
        // Полудение коментариев новости
        $comments = Comment::getComments($id);
        // Получение тєгов новости
        $tags = News::getTagsByNews($id);
        // Полученин автора
        $author = User::getUsers();

        // Обработка формы
        $options = [];
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы

            $options['content'] = $_POST['content'];
            $options['news_id'] = $id;
            $options['author_id'] = $_SESSION['user'];
        }

        // Флаг ошибок в форме
        $errors = false;


        if (!isset($options['content']) || empty($options['content'])) {
            $errors[] = 'Заповніть поля';
        }
        // Созданин коментария
        Comment::createComment($options);
        // Список авторов с нойбольшим количеством комментариев
        $topAuthors = Comment::getTopAutors();
        // Подключаем вид
        require_once (ROOT . '/views/news/view.php');
        return true;
    }

    public function actionTagnews($idTag) {
        // Список категорий
        $categories = Category::getCategoriesList();
        // Количество просмотров новости
        $newsViews = News::getNumberViewsByNews();
        
        $tagNews = [];
        // Список новостей с определенным тэгом
        $tagNews = News::getNewsByTag($idTag);
        // Список авторов с нойбольшим количеством комментариев
        $topAuthors = Comment::getTopAutors();
        // Список последних новостей
        $lastNews = News::getLastNews();
        // Подключение вида
        require_once (ROOT . '/views/news/tag.php');
        return true;
    }

}
