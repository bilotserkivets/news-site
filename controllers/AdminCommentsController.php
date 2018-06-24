<?php

/**
 * Created by PhpStorm.
 * User: Apach
 * Date: 08.05.2018
 * Time: 22:55
 */
class AdminCommentsController extends AdminBase {

    /**
     * Action для страници "Управление комментариями"
     */
    public function actionIndex() {

        // Проверка доступа
        self::checkAdmin();

        // Получаем список комментариев
        $commentsList = Comment::getCommentsListAdmin();
        $author = User::getUsers();
        // Подключаєм вид
        require_once(ROOT . '/views/admin_comments/index.php');
        return true;
    }

    /**
     * Action для страници "Добавить комментарий"
     */
    public function actionCreate() {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options = [];
            $options['content'] = $_POST['content'];
            $options['author_id'] = $_SESSION['user'];
            $options['news_id'] = $_POST['category_id'];


            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заповніть поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый коментарий
                $id = News::createNews($options);

                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/webroot/upload/images/{$id}.jpg");
                    }
                };

                // Перенаправляем пользователя на страницу управления новостями
                header("Location: /admin/news");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать коментарий"
     */
    public function actionUpdate($id) {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном коментарии
        $comment = Comment::getCommentById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['content'] = $_POST['content'];
            $options['author_id'] = $_SESSION['user'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            $id = Comment::updateCommentById($id, $options);

            // Перенаправляем пользователя на страницу управлениями коментариями
            header("Location: /admin/comments");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_comments/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить коментарий"
     */
    public function actionDelete($id) {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем коментарий
            Comment::deleteCommentById($id);

            // Перенаправляем пользователя на страницу управлениями коментариями
            header("Location: /admin/comments");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_comments/delete.php');
        return true;
    }

}
