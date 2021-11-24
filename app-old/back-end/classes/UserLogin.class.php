<?php


class UserLogin extends Dbh {
    private $connection;




    function __construct()
    {
        $this->connection = $this->connect();
    }

    public function userCheckAuth (string $email, string $password) {
        $sql = "SELECT email, password, id from user 
                where email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        $password_hash = $result['password'];
        $verif = password_verify($password, $password_hash);
        if ($verif) {
            return $result;
        } else return false;

    }


}
