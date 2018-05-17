<?php

class Comment
{
    const SHOW_BY_DEFAULT = 5;

    public static function getComments($id, $count = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM comment WHERE news_id = '$id' ORDER BY id DESC LIMIT " . $count);
        $commentsList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $commentsList[$i]['id'] = $row['id'];
            $commentsList[$i]['news_id'] = $row['news_id'];
            $commentsList[$i]['author_id'] = $row['author_id'];
            $commentsList[$i]['content'] = $row['content'];
            $commentsList[$i]['pubdate'] = $row['pubdate'];
            $i++;
        }

            return $commentsList;


    }

    public static function createComment($options)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO comment (news_id, author_id, content) VALUES (:news_id, :author_id, :content)";
        $result = $db->prepare($sql);

        $result->bindParam(':news_id', $options['news_id'], PDO::PARAM_INT);
        $result->bindParam(':author_id', $options['author_id'], PDO::PARAM_INT);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);

        if ($result->execute()) {

            return $db->lastInsertId();
        }

        return 0;
    }

    public static function getCommentsListAdmin()
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM comment");

        $i = 0;
        while ($row = $result->fetch()) {
            $commentsList[$i]['id'] = $row['id'];
            $commentsList[$i]['news_id'] = $row['news_id'];
            $commentsList[$i]['author_id'] = $row['author_id'];
            $commentsList[$i]['content'] = $row['content'];
            $commentsList[$i]['pubdate'] = $row['pubdate'];
            $commentsList[$i]['status'] = $row['status'];
            $i++;
        }
        return $commentsList;
    }

    public static function updateCommentById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE comment SET content = :content, author_id = :author_id, news_id = :news_id, status = :status WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':content', $options['content'], PDO::PARAM_INT);
        $result->bindParam(':author_id', $options['author_id'], PDO::PARAM_STR);
        $result->bindParam(':news_id', $options['news_id'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }
    /**
     * Возвращает коментарий с указанным id
     */
    public static function getCommentById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM comment WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }
    public static function deleteCommentById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM comment WHERE id = :id';

        // Получение и возврат результатов.
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getTopAutors($count = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(comment.author_id) AS count, comment.author_id AS author_id, user.name AS name FROM comment JOIN user ON comment.author_id = user.id GROUP BY comment.author_id ORDER BY count(author_id)DESC LIMIT " . $count);
        $topAuthor = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $topAuthor[$i]['count'] = $row['count'];
            $topAuthor[$i]['author_id'] = $row['author_id'];
            $topAuthor[$i]['name'] = $row['name'];
            $i++;
        }

        return $topAuthor;
}
public static function getAuthorComents($id) {
        $db = DB::getConnection();

        $result = $db->query("SELECT * FROM comment WHERE author_id = " . $id);
    $comAuthor = [];
    $i = 0;
    while ($row = $result->fetch()) {
        $comAuthor[$i]['id'] = $row['id'];
        $comAuthor[$i]['news_id'] = $row['news_id'];
        $comAuthor[$i]['author_id'] = $row['author_id'];
        $comAuthor[$i]['content'] = $row['content'];
        $comAuthor[$i]['pubdate'] = $row['pubdate'];
        $comAuthor[$i]['status'] = $row['status'];
        $i++;
    }

    return $comAuthor;
}
}
