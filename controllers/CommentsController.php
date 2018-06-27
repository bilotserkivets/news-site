<?php

class CommentsController {

    public function actionView($id) {
        // Получение автора коментария
        $authorComments = Comment::getAuthorComents($id);
        // Получение автора
        $author = User::getUsers();
        //Получение авторов с найбольшим количеством коментариев
        $topAuthors = Comment::getTopAutors();
        // Список последних новостей
        $lastNews = News::getLastNews();
        // Подключение вида
        require_once(ROOT . '/views/comments/view.php');
        return true;
    }

}
