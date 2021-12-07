<?php
include_once('../functions/autoIncludeClasses.inc.php');

/**
 * classe qui crée un nouveau user et lie les données user serveur à la base de donnée qui seront rentrées dans le formulaire d'inscription
 */

class UserRegister extends Dbh
{
    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }


    /**
     * retourne true si le mail éxiste déjà
     * @param string $email
     * @return bool
     */
    private function userCheckMail(string $email): bool
    {
        $sql_email = "select email from user where email = :email";
        $stmt_mail = $this->connection->prepare($sql_email);
        $stmt_mail->bindParam(':email', $email);
        $stmt_mail->execute();
        return $stmt_mail->fetch();
    }


    /**
     *insert les données du formulaire en bdd
     * @param $first_name
     * @param $last_name
     * @param $mail
     * @param $password
     * @return bool|void
     */
    public function insertToDB($first_name, $last_name, $mail, $password)
    {

        if ($this->userCheckMail($mail)) {
            return false;
        }

        $sql = 'INSERT INTO user (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)';
        //on hash le password et pour plus sécuriser on met cost à 12 qui sera un temps de reponse pour vérifier le mot de passe
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

        //try catch
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':first_name',  $first_name);
            $stmt->bindParam(':last_name', $last_name) ;
            $stmt->bindParam(':email', $mail);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return true;

        } catch ( Exception $e) {
            die ($e->getMessage());
        }
    }
}