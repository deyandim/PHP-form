<?php

function getQuestionByCategoryId(PDO $db, int $categoryId): array
{
    $query = "
         SELECT
            q.id,
            q.title,
            q.author_id,
            u.username,
            c.name,
            q.created_on,
            COUNT(a.id) AS answers_count
         FROM forum.questions AS q 
         LEFT JOIN forum.answers AS a 
         ON q.id = a.question_id
         INNER JOIN forum.categories AS c 
         ON q.category_id = c.id
         INNER JOIN forum.users AS u 
         ON q.author_id = u.user_id
         WHERE c.id = ?
         GROUP BY
            q.id,
            q.title,
            q.author_id,
            u.username,
            c.name,
            q.created_on
         ORDER BY
            q.created_on DESC, 
            answers_count DESC
         ";


    $stmt = $db->prepare($query);
    $stmt->execute([$categoryId]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * @param PDO $db
 * @return array
 */
function getAllCategories(PDO $db): array
{
    $query = "
        SELECT
          c.id,
          c.name,
          COUNT(q.id) AS question_count
        FROM forum.categories AS c
        LEFT JOIN forum.questions AS q 
        ON c.id = q.category_id
        GROUP BY 
          c.id,
          c.name 
        ORDER BY
          question_count DESC,
          c.name ASC 
        ";

    $stmt = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    return $stmt;

}