<?php

class Category {

    public static function getCategoriesList() {
        $db = Db::getConnection();

        $categoryList = [];

        $result = $db->query('SELECT id, title, cat_name FROM category');

        $i = 0;
        while ($row = $result->fetch()) {

            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['title'] = $row['title'];
            $categoryList[$i]['cat_name'] = $row['cat_name'];
            $i++;
        }

        return $categoryList;
    }

    /**
     * Возвращает массив категорий для списка в админпанели <br/>
     * (при этом в результат попадают и включенные и выключенные категории)
     * @return array <p>Массив категорий</p>
     */
    public static function getCategoriesListAdmin() {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, title FROM category ORDER BY id ASC');

        // Получение и возврат результатов
        $categoryList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['title'] = $row['title'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCategoryById($id) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM category WHERE id = :id';

        // Получение и возврат результатов
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирование категории с заданным id
     */
    public static function updateCategoryById($id, $title) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE category SET title = :title WHERE id = :id";

        // Получение и возврат результатов.
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Возвращает категорию с указанным id
     */
    public static function getCategoryById($id) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM category WHERE id = :id';


        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    /**
     * Добавляет новую категорию
     */
    public static function createCategory($title) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO category (title) '
                . 'VALUES (:title)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        return $result->execute();
    }

}
