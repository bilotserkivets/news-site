<?php

/**
 * Контроллер AdminNewsController
 * Управление Новостями в админпанели
 */
class AdminNewsController extends AdminBase {

    /**
     * Action для страници "Управление новостями"
     */
    public function actionIndex() {

        // Проверка доступа
        self::checkAdmin();

        // Получаем список новостей
        $newsList = News::getNewsList();
        $author = User::getUsers();

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/index.php');
        return true;
    }

    /**
     * Action для страници "Добавить новость"
     */
    public function actionCreate() {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options = [];
            $options['title'] = $_POST['title'];
            $options['content'] = $_POST['content'];
            $options['category_id'] = $_POST['category_id'];
            $options['author_id'] = $_SESSION['user'];

            $tag = $_POST['tag'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заповніть поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую новость
                $id = News::createNews($options);

                //Добавляем тег
                News::addTags($tag);
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
     * Action для страницы "Редактировать новость"
     */
    public function actionUpdate($id) {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретной новости
        $news = News::getNewsById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования.
            $options['title'] = $_POST['title'];
            $options['content'] = $_POST['content'];
            $options['category_id'] = $_POST['category_id'];

            // Сохраняем изменения
            if (News::updateNewsById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управления новостями
            header("Location: /admin/news");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить новость"
     */
    public function actionDelete($id) {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем новость
            News::deleteNewsById($id);

            // Перенаправляем пользователя на страницу управлениями новостями
            header("Location: /admin/news");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/delete.php');
        return true;
    }

}
