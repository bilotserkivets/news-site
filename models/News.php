<?php

class News {

    const SHOW_BY_DEFAULT = 5;

    /* 
     * Возвращает одну новость из определенной категории и 
     * обновлвение количества просмотров новости
     */
    public static function getNewsListById($category, $id) {

        $id = intval($id);
        // Соедининие с БД
        $db = Db::getConnection();
        // Текст запроса к базе данных
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, "
                . "DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, news.author_id AS author_id, news.content AS content, news.views AS views, category.cat_name AS cat_name FROM news LEFT JOIN category ON news.id = '$id' AND category.cat_name = '$category'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem = $result->fetch();
        
        //Обновление количества просмотров новости
         $updateView = "UPDATE news SET views = views + 1 WHERE id =:id";
       
        // Возвращение и получение результатов
        $update = $db->prepare($updateView);
        $update->bindParam(':id', $id, PDO::PARAM_INT);
       
        $update->execute();
        
        return $newsItem;
    }

    /*
     * Выбор всех новостей категории Политика
     */

    public static function getNewsPolitika($count = self::SHOW_BY_DEFAULT) {
        // Соедининие с БД
        $db = Db::getConnection();

        $newsList = [];
        // Подготовленый запрос к БД
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, "
                . "DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, news.author_id AS author_id, news.content AS content, category.cat_name AS cat_name "
                . "FROM news JOIN category ON category.cat_name = 'politika' AND category.id = news.category_id ORDER BY id DESC LIMIT " . $count);

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $i++;
        }
        return $newsList;
    }

    /*
     * Возвращает все новости с категории Экономика
     */

    public static function getNewsEkonomika($count = self::SHOW_BY_DEFAULT) {
        // Соедининие с БД
        $db = Db::getConnection();

        $newsList = [];
        // Текст запроса к БД
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, "
                . "DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, news.author_id AS author_id, news.content AS content, category.cat_name AS cat_name "
                . "FROM news JOIN category ON category.cat_name = 'ekonomika' AND category.id = news.category_id ORDER BY id DESC LIMIT " . $count);

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];

            $i++;
        }
        return $newsList;
    }

    /*
     * Возвращает все новости с категории Спорт
     */

    public static function getNewsSport($count = self::SHOW_BY_DEFAULT) {
        // Соедининие с БД
        $db = Db::getConnection();

        $newsList = [];
        // Текст запроса к БД
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, "
                . "DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, news.author_id AS author_id, news.content AS content, category.cat_name AS cat_name "
                . "FROM news JOIN category ON category.cat_name = 'sport' AND category.id = news.category_id ORDER BY id DESC LIMIT " . $count);

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];

            $i++;
        }
        return $newsList;
    }

    /**
     * Удаляет новость с вказанним id
     * @param integer $id <p>id товару</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteNewsById($id) {
        // Соедининие с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM news WHERE id = :id';

        // Возврат и получение результатов. Используется подготовлвеный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /*
     * Возвращаен все новости с категории Технологии
     */

    public static function getNewsTehnology($count = self::SHOW_BY_DEFAULT) {
        // Соедининие с БД
        $db = Db::getConnection();

        $newsList = [];
        // Текст запроса к БД
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, "
                . "DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, news.author_id AS author_id, news.content AS content, category.cat_name AS cat_name "
                . "FROM news JOIN category ON category.cat_name = 'tehnology' AND category.id = news.category_id ORDER BY id DESC LIMIT " . $count);

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];

            $i++;
        }
        return $newsList;
    }

    /*
     * Возвращает список новостей с определенной категории
     */

    public static function getNewsCategory($category = false, $page = 1) {

        $limit = News::SHOW_BY_DEFAULT;
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "SELECT news.id AS id, news.title AS title, news.category_id AS category_id, news.pubdate AS pubdate, "
                . "news.author_id AS author_id, news.content AS content, category.cat_name AS cat_name, category.title AS category_title FROM news "
                . "JOIN category ON category.cat_name = :category AND category.id = news.category_id ORDER BY id DESC LIMIT :limit OFFSET :offset";

        $result = $db->prepare($sql);
        $result->bindParam(':category', $category, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение команды
        $result->execute();

        $i = 0;
        $newsCategory = [];
        while ($row = $result->fetch()) {

            $newsCategory[$i]['id'] = $row['id'];
            $newsCategory[$i]['title'] = $row['title'];
            $newsCategory[$i]['category_id'] = $row['category_id'];
            $newsCategory[$i]['content'] = $row['content'];
            $newsCategory[$i]['pubdate'] = $row['pubdate'];
            $newsCategory[$i]['author_id'] = $row['author_id'];
            $newsCategory[$i]['cat_name'] = $row['cat_name'];
            $newsCategory[$i]['category_title'] = $row['category_title'];
            $i++;
        }
        return $newsCategory;
    }
/*
 * Возвращает список новостей с определенной категории
 */   
    public static function getNewsByCategory($categoryId = false) {

        if ($categoryId) {
            // Соедининие с БД
            $db = Db::getConnection();

            $news = [];
            // Текст запрос к БД
            $result = $db->query("SELECT id, category_id, title, content, pubdate FROM news WHERE category_id = " . $categoryId);

            $i = 0;

            while ($row = $result->fetch()) {
                $news[$i]['id'] = $row['id'];
                $news[$i]['category_id'] = $row['category_id'];
                $news[$i]['title'] = $row['title'];
                $news[$i]['content'] = $row['content'];
                $news[$i]['pubdate'] = $row['pubdate'];
                $i++;
            }
            return $news;
        }
    }

    /*
     * Возвращает список тэгов нововти
     */

    public static function getTagsByNews($id) {
        // Соедининие с БД
        $db = Db::getConnection();
        $tagsList = [];
        // Текст запроса к БД
        $result = $db->query("SELECT tags.tag, tags.id, COUNT(news_tags.tagid) AS news_count" .
                " FROM news_tags LEFT JOIN tags ON news_tags.tagid=tags.id" .
                " WHERE news_tags.newsid=" . $id .
                " GROUP BY tags.id");
        $i = 0;
        while ($row = $result->fetch()) {
            $tagsList[$i]['tag'] = $row['tag'];
            $tagsList[$i]['id'] = $row['id'];
            $i++;
        }
        return $tagsList;
    }

    /*
     * Возвращает список всех тэгов
     */

    public static function getTags() {
        // Соединение с БД
        $db = Db::getConnection();
        $tagsList = [];
        // Текст запроса к БД
        $result = $db->query("SELECT news.id, news.title, news_tags.tagid, news_tags.newsid FROM news LEFT JOIN news_tags ON news.id = news_tags.newsid");
        $i = 0;
        while ($row = $result->fetch()) {
            $tagsList[$i]['tag'] = $row['tag'];
            $tagsList[$i]['id'] = $row['id'];
            $i++;
        }
        return $tagsList;
    }
/*
 * Возвращает новости с определенным тэгом
 */
    public static function getNewsByTag($idTag) {
        // Соедининие с БД
        $db = Db::getConnection();

        $newsTag = [];
        // Текст запроса к БД
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, "
                . "DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, news.author_id AS author_id, news.content AS content, category.cat_name AS cat_name "
                . "FROM news JOIN category JOIN news_tags ON news_tags.tagid = " . $idTag . "  AND news.category_id = category.id AND news.id = news_tags.newsid");

        $i = 0;

        while ($row = $result->fetch()) {

            $newsTag[$i]['id'] = $row['id'];
            $newsTag[$i]['title'] = $row['title'];
            $newsTag[$i]['content'] = $row['content'];
            $newsTag[$i]['pubdate'] = $row['pubdate'];
            $newsTag[$i]['cat_name'] = $row['cat_name'];
            $i++;
        }

        return $newsTag;
    }

    /**
     * Возвращает список последних новостей
     * @return array <p>Массив с новостями</p>
     */
    public static function getLastNews($count = self::SHOW_BY_DEFAULT) {
        // Соедининие с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, "
                . "DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, news.author_id AS author_id, news.content AS content, category.cat_name AS cat_name FROM news "
                . " LEFT JOIN category ON category.id = news.category_id ORDER BY id DESC LIMIT " . $count);
        $i = 0;
        $newsList = [];
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $i++;
        }
        return $newsList;
    }

    /**
     * Повертає шлях до зображення
     * @param integer $id
     * @return string <p>Шлях до зображення</p>
     */
    public static function getImage($id) {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с изображениями
        $path = '/webroot/upload/images/';

        // Путь к изображению товара
        $pathToNewsImage = $path . $id . '.jpg';

        return $pathToNewsImage;
    }
    
// Возвращаеи список новостей в определенной категории
    public static function getTotalNewsInCategory($category) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT count(news.id) AS count FROM news JOIN category ON news.category_id = category.id WHERE category.cat_name = :category";

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category', $category, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращает список новостей
     * @return array <p>Массив с новостями</p>
     */
    public static function getNewsList() {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, "
                . "news.author_id AS author_id, news.content AS content, category.cat_name AS cat_name, category.title AS cat_title FROM news "
                . "LEFT JOIN category ON news.category_id = category.id ORDER BY id ASC");

        $newsList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $newsList[$i]['author_id'] = $row['author_id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['cat_title'] = $row['cat_title'];
            $i++;
        }
        return $newsList;
    }

    /**
     * Добавляет новую новость
     * @param array $options <p>Массив с информацией о новости</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createNews($options) {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO news (title, content, category_id, author_id) '
                . 'VALUES (:title, :content, :category_id, :author_id)';

        // Получение и возврат результатов.
        $result = $db->prepare($sql);

        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':author_id', $options['author_id'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    /**
     * Редактирует новость с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о новости</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateNewsById($id, $options) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE news SET title = :title, content = :content, category_id = :category_id WHERE id = :id";

        // Получение и возврат результатов.
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Возвращает новость с указанным id
     * @param integer $id <p>id новости</p>
     * @return array <p>Массив с информацией о новости</p>
     */
    public static function getNewsById($id) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM news WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        
        // Получение и возврат результатов
        return $result->fetch();
    }
/*
 * Возвращает список всех тэгов
 */
    public static function addTags($tag) {

        // Соединение с БД
        $db = Db::getConnection();

        $sql = 'INSERT INTO tags (tag) '
                . 'VALUES (:tag)';

        // Получение и возврат результатов.
        $result = $db->prepare($sql);

        $result->bindParam(':tag', $tag, PDO::PARAM_STR);


        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
/*
 * Возвращает список новостей по количеству просмотров
 */
    public static function getNumberViewsByNews($count = self::SHOW_BY_DEFAULT) {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query("SELECT news.id AS id, news.title AS title, news.category_id AS category_id, "
                . "DATE_FORMAT(news.pubdate, '%H:%i %d.%m.%Y') AS pubdate, news.author_id AS author_id, news.content AS content, news.views AS views, category.cat_name AS cat_name FROM news "
                . " LEFT JOIN category ON category.id = news.category_id ORDER BY views DESC LIMIT " . $count);
        $i = 0;
        $newsList = [];
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['cat_name'] = $row['cat_name'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['pubdate'] = $row['pubdate'];
            $newsList[$i]['views'] = $row['views'];
            $i++;
        }
        
               return $newsList;
    }
}
