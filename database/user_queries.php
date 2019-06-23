<?php


function getUserByAuthId(PDO $db, $auth_string): int
{
    $query = "
        SELECT 
            user_id
        FROM 
            forum.authentications
        WHERE 
            auth_string = ?
        ";

    $stmt = $db->prepare($query);
    $stmt->execute([$auth_string]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($data && $data['user_id']){
        return intval($data['user_id']);
    }

    return -1;

}

function issueAthenticationString(PDO $db, int $user_id): string
{
    $query = "
        SELECT
          auth_string
        FROM
          forum.authentications
        WHERE
          user_id = ?
    ";

    $stmt = $db->prepare($query);
    $stmt->execute([$user_id]);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($data && $data['auth_string']){
        return $data['auth_string'];
    }

    $auth_string = uniqid();

    $query = "
        INSERT INTO 
            forum.authentications 
            (
            user_id,
            auth_string
            ) 
        VALUES (
            ?,
            ?
        )
         ";

    $stmt = $db->prepare($query);
    $stmt->execute([$user_id, $auth_string]);

    return $auth_string;

}

/**
 * @param PDO $db
 * @param string $username
 * @param string $password
 * @return int
 */
function verifyUser(PDO $db, string $username, string $password): int
{
    $query = "
         SELECT 
            user_id,
            username,
            password
         FROM forum.users
         WHERE
            username = ?
            ";

    $stmt = $db->prepare($query);

    if(!$stmt->execute([$username])){
        return -1;
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $passwordHash = $user['password'];

    $result = password_verify($password, $passwordHash);

    if(!$result){
        return -1;
    }

    return intval($user['user_id']);

}


/**
 * @param PDO $db
 * @param string $username
 * @param string $password
 * @param string $confirm_password
 * @return bool
 * @throws Exception
 */
function registerUser (PDO $db, string $username, string $password, string $confirm_password)
{
    $query = "
        INSERT INTO
          forum.users(
            username, 
            password
            )
        VALUES (
            ?,
            ?
          )
    ";

    if($password !== $confirm_password){

        throw new Exception('Password not miss match!');
        redirect('register.php');
    }else {
        $stm = $db->prepare($query);
        $result = $stm->execute([$username, password_hash($password, PASSWORD_ARGON2I)]);
        return $result;
    }






}