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
    public function userCheckMail () :bool {

//        $sql_email = "SELECT pseudo, email FROM user WHERE email = :email";
        $sql_email = "select email from user";
        $stmt_mail = $this->connection->prepare($sql_email);
//        $stmt_mail->bindParam(':email', $email);
        $stmt_mail->execute();
        $var = $stmt_mail->fetchAll();

        //empty regarde si la variable est vide
        //donc ici return true si fetch contient quelque chose et false si var est vide
        return !empty($var);

    }



    /**
     * retourne true si il y'a un pseudo correspondant
     * @param string $pseudo
     * @return bool
     */
    private function userCheckPseudo (string $pseudo) :bool {

        $sql_pseudo = "SELECT pseudo FROM user WHERE pseudo = :pseudo";
        $stmt_pseudo = $this->connection->prepare($sql_pseudo);
        $stmt_pseudo->bindParam(':pseudo', $pseudo);
        $stmt_pseudo->execute();
        $var = $stmt_pseudo->fetch();

        return !empty($var);

    }


    /**
     *insert les données du formulaire en bdd
     * @param $first_name
     * @param $last_name
     * @param $mail
     * @param $pseudo
     * @param $password
     *
     *
     */
    public function insertToDB($first_name, $last_name, $mail, $pseudo, $password)

    {
        $this->userCheckMail($mail);
        $this->userCheckPseudo($pseudo);

        $sql = 'INSERT INTO user (first_name, last_name, pseudo, email, password) VALUES (:first_name, :last_name, :pseudo, :email, :password)';

        $password = password_hash($password, PASSWORD_DEFAULT);

        //try catch
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':first_name',  $first_name);
            $stmt->bindParam(':last_name', $last_name) ;
            $stmt->bindParam(':email', $mail);
            $stmt->bindParam(':pseudo', $pseudo);

            $stmt->bindParam(':password', $password);
            $stmt->execute();
        } catch ( Exception $e) {
            die ($e->getMessage());
        }


    }


}