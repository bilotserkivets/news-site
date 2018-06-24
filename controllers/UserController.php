<?php

/**
 * Контроллер UserController
 */
class UserController {

    /**
     * Action для страницы "Регистрация"
     */
    public function actionRegister() {
        $lastNews = News::getLastNews();
        $topAuthors = Comment::getTopAutors();
        $categories = Category::getCategoriesList();
        $newsViews = News::getNumberViewsByNews();
        // Переменные для формы
        $name = false;
        $email = false;
        $password = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = "Ім'я не повинно бути коротше 2-х символів";
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Невірний email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не повинен бути коротше 6-ти символів';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такий email вже використовується';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($name, $email, $password);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/user/register.php');
        return true;
    }

    /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin() {
        $lastNews = News::getLastNews();
        $topAuthors = Comment::getTopAutors();
        $categories = Category::getCategoriesList();
        $newsViews = News::getNumberViewsByNews();
        // Переменные для формы
        $email = false;
        $password = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Невірний email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не повинен бути коротше 6-ти символів';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Не вірні дані для входу на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout() {

        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);

        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }

}
