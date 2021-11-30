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
    public function userCheckMail(string $email)
    {

//        $sql_email = "SELECT pseudo, email FROM user WHERE email = :email";
        $sql_email = "select email from user where email = :email";
        $stmt_mail = $this->connection->prepare($sql_email);
        $stmt_mail->bindParam(':email', $email);
        $stmt_mail->execute();
        $stmt_mail->fetch();

        //empty regarde si la variable est vide
        //donc ici return true si fetch contient quelque chose et false si var est vide
//        return !empty($var);

    }
/*    /**
     * retourne true si il y'a un pseudo correspondant
     * @param string $pseudo
     * @return bool
     */
    /*private function userCheckPseudo (string $pseudo) :bool {

        $sql_pseudo = "SELECT pseudo FROM user WHERE pseudo = :pseudo";
        $stmt_pseudo = $this->connection->prepare($sql_pseudo);
        $stmt_pseudo->bindParam(':pseudo', $pseudo);
        $stmt_pseudo->execute();
        $var = $stmt_pseudo->fetch();

        return !empty($var);

    }*/
    /**
     *insert les données du formulaire en bdd
     * @param $first_name
     * @param $last_name
     * @param $mail
     * @param $pseudo
     * @param $password
     */
    public function insertToDB($first_name, $last_name, $mail, $pseudo, $password)
    {
        $this->userCheckMail($mail);

        $sql = 'INSERT INTO user (first_name, last_name, pseudo, email, password) VALUES (:first_name, :last_name, :pseudo, :email, :password)';
        //on hash le password et pour plus sécuriser on met cost à 12 qui sera un temps de reponse pour vérifier le mot de passe
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

        //try catch
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':first_name',  $first_name);
            $stmt->bindParam(':last_name', $last_name) ;
            $stmt->bindParam(':email', $mail);
            $stmt->bindParam(':pseudo', $pseudo);

            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return true;

        } catch ( Exception $e) {
            die ($e->getMessage());
        }
    }
}