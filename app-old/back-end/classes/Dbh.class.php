<?php


class Dbh {
    private $db_name = 'leshautify';
    private $db_user = 'admin';
    private $db_host = 'localhost';
    private $db_password = 'password';

    protected function connect () {
        try {

            //se connecter à mysql
            $pdo = new PDO ("mysql:host=$this->db_host; dbname=$this->db_name", $this->db_user, $this->db_password );
            //g compri (merci Nicolas)
            //quand j'ai une erreur je renvois une exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Met les infos sous forme d'objet quand il fetch
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //met les infos fetch sous form de tableau
//            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        return $pdo;
    }


}