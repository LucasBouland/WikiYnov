<?php
require 'core/Database.php';
require 'core/coDB.php';

class User
{
    private $_id,
        $_name,
        $_first_name,
        $_job,
        $_password,
        $_email;

    /**
     * User constructor.
     * @param $_id
     * @param $_name
     * @param $_first_name
     * @param null $_job
     * @param $_password
     * @param $_email
     */
    public function __construct($_id = null, $_name = null, $_first_name = null, $_job = null,  $_password = null, $_email = null)
    {
        $this->_id = $_id;
        $this->_name = $_name;
        $this->_first_name = $_first_name;
        $this->_job = $_job;
        $this->_password = $_password;
        $this->_email = $_email;
    }
    /* crée un nouvel utilisateur dans la DB */
    public static function create($name,$last_name,$email,$password)
    {
        $db = new coDB();
        $job = "abonne";
        $connected = 0; // verifier si necessaire
        $sql = "INSERT INTO users
                SET name = :name,
                last_name = :last_name,
                password = :password,
                email = :email,
                job = :job,
                connected = :connected";
        $stmt= $db->prepare($sql);
        $stmt->bindParam(':name',$name,PDO::PARAM_STR,255);
        $stmt->bindParam(':last_name',$last_name,PDO::PARAM_STR,255);
        $stmt->bindParam(':password',$password,PDO::PARAM_STR,255);
        $stmt->bindParam(':email',$email,PDO::PARAM_STR,255);
        $stmt->bindParam(':job',$job,PDO::PARAM_STR,255);
        $stmt->bindParam(':connected',$connected,PDO::PARAM_STR,255);
        $stmt->execute();

    }
    /* vérifie si l'adresse mail est déja enregistrée*/
    public static function exists($email, $password)
    {
        $db = new coDB();
        $exist = 'SELECT COUNT(id_user) FROM users WHERE email = :mail AND password = :pwd';
        $stmt = $db->prepare($exist);
        $stmt->bindParam(':mail',$email,PDO::PARAM_STR,255);
        $stmt->bindParam(':pwd',$password,PDO::PARAM_STR,255);
        $stmt->execute();
        $count = $stmt->fetchColumn();
       return $count;
    }

    /* verifie si l'adresse mail a déja été enregistrée */
     public static function checkAvailable($email)
    {
        $db = new coDB();
        $exist = 'SELECT COUNT(email) FROM users WHERE email = :mail ';
        $stmt = $db->prepare($exist);
        $stmt->bindParam(':mail',$email,PDO::PARAM_STR,255);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        var_dump($count);
        return $count;
    }
    /* cherche un utilisateur par son adresse mail + mdp */
    public static function findByCredentials($email, $password)
    {
        $db = new coDB();
        $data = $db->pdo_query('SELECT * FROM users WHERE email = ? AND password = ?;', [$email, $password]);
        $user = new User($data[0]->id_user, $data[0]->name, $data[0]->last_name, $data[0]->job, $data[0]->password, $data[0]->email);
        return $user;
    }
    public function update(){
        // Update
    }
    
    public function delete(){
        // delete
    }
    /* cherche un utilisateur par son id_user */
    public static function findById($id){
        $db = new coDB();
        $data = $db->pdo_query('SELECT * FROM users WHERE id_user = ? ', [$id]);
        $user = new User($data[0]->id_user, $data[0]->name, $data[0]->last_name, $data[0]->job, $data[0]->password, $data[0]->email);
        return new $user;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param mixed $id
     * @return mixed $this
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param mixed $name
     * @return mixed $this
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->_first_name;
    }
    /**
     * @param mixed $first_name
     * @return mixed $this
     */
    public function setFirstName($first_name)
    {
        $this->_first_name = $first_name;
        return $this;
    }

    /**
     * @return null
     */
    public function getJob()
    {
        return $this->_job;
    }

    /**
     * @param null $job
     * @return $this
     */
    public function setJob($job)
    {
        $this->_job = $job;
        return $this;
    }

    public function getPassword()
    {
        return $this->_password;
    }
    /**
     * @param mixed $password
     * @return mixed $this
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }
    /**
     * @param mixed $email
     * @return mixed $this
     */
    public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }
}