<?php

class Main {

    public static function getNewsListById($id) {
        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM news WHERE id = " . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem = $result->fetch();
        return $newsItem;
    }

    public static function getNewsList() {

        $db = Db::getConnection();

        $newsList = [];

        $result = $db->query('SELECT * FROM news');

        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $i++;
        }
        return $newsList;
    }

}
