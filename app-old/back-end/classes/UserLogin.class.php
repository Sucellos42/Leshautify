<?php
include_once('../functions/autoIncludeClasses.inc.php');

class UserLogin extends Dbh {
    private $connection;




    public function __construct()
    {
        $this->connection = $this->connect();
    }

    /**
     *
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public function userCheckAuth (string $email, string $password): mixed
    {
        $sql = "SELECT email, password, id FROM user where email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        $password_hash = $result['password'];
        $verif = password_verify($password, $password_hash);
        if ($verif) {
            return $result;
        }

        return false;

    }






}
