<?php


function getAllTags(PDO $db): array
{
    $query = "
            SELECT
              t.id,
              t.name,
              COUNT(q.id) AS question_count
            FROM 
              forum.questions_tags AS qt
            INNER JOIN forum.tags AS t ON qt.tag_id = t.id
            INNER JOIN forum.questions AS q ON qt.question_id = q.id
            GROUP BY
              t.id,
              t.name
            ORDER BY
              question_count DESC,
              t.name ASC
            ";

    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addTags(PDO $db, array $tags)
{
    $existing_tags = getAllTags($db);
    foreach ($tags as $tag){
        if(!in_array($tag, $existing_tags)){
            $query = "
            INSERT INTO forum.tags(name)
            VALUES (?)
        
            ";

            $stmt = $db->prepare($query);
            $stmt->execute([$tag]);
        }

    }


}