<?php

/**
 * Created by PhpStorm.
 * User: Apach
 * Date: 10.05.2018
 * Time: 21:52
 */
class CommentsController {

    public function actionView($id) {
        $authorComments = Comment::getAuthorComents($id);
        $author = User::getUsers();
        $topAuthors = Comment::getTopAutors();
        // Список последних новостей
        $lastNews = News::getLastNews();

        require_once(ROOT . '/views/comments/view.php');
        return true;
    }

}
