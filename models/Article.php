<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 06/05/2016
 * Time: 11:19
 */
class Article
{
    private $_name,
            $_description,
            $_date,
            $_auteur;

    /**
     * articles constructor.
     * @param $_name
     * @param $_description
     * @param $_date
     * @param $_auteur
     */
    public function __construct()
    {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    /**
     * @param null $_name
     * @param null $_description
     * @param null $_date
     * @param null $_auteur
     */
    public function __construct4($_name = null, $_description = null, $_date = null, $_auteur = null) {
        $this->_name = $_name;
        $this->_description = $_description;
        $this->_date = $_date;
        $this->_auteur = $_auteur;
    }

    /**
     * @param stdClass $article
     * @return Article
     */
    public function __construct1(stdClass $article) {
        $this->setName($article->title);
        $this->setDescription($article->description);
        $this->setDate($article->date);
        $this->setAuteur($article->auteur);
    }

    public static function all_affiche($choix =null){
        $db = new coDB();
        $der_id = $db->pdo_query('SELECT count(id) AS der_id FROM articles');
        if($choix == 0){
            $tab = [];
            for($indice=$der_id[0]->der_id;$indice>=1;$indice--){
                $data = $db->pdo_query('SELECT * FROM articles WHERE id = ?',[$indice]);
                if(!empty($data)){
                    array_push($tab, $data[0]);
                }
            }
        }
        else{
            $tab = [];
            for($indice=$der_id[0]->der_id;$indice>=1;$indice--){
                $data = $db->pdo_query('SELECT * FROM articles WHERE id = ? AND theme = ?',[$indice,$choix]);
                if(!empty($data)){
                    array_push($tab, $data[0]);
                }
            }
        }
        return $tab;

    }

    public static function three_affiche(){
        $db = new coDB();
        $der_id = $db->pdo_query('SELECT count(id) AS der_id FROM articles');
        $tab = [];
        $data = $db->pdo_query('SELECT * FROM articles WHERE id = ?',[$der_id[0]->der_id]);
        if(!empty($data)){
            array_push($tab, $data[0]);
        }
        else{
            $article = new Article();
            $article->setAuteur("")->setDate("")->setDescription("")->setName("");
            array_push($tab, $article);
        }
        $data = $db->pdo_query('SELECT * FROM articles WHERE id = ?',[$der_id[0]->der_id-1]);
        if(!empty($data)){
            array_push($tab, $data[0]);
        }
        else{
            $article = new Article();
            $article->setAuteur("")->setDate("")->setDescription("")->setName("");
            array_push($tab, $article);
        }
        $data = $db->pdo_query('SELECT * FROM articles WHERE id = ?',[$der_id[0]->der_id-2]);
        if(!empty($data)){
            array_push($tab, $data[0]);
        }
        else{
            $article = new Article();
            $article->setAuteur("")->setDate("")->setDescription("")->setName("");
            array_push($tab, $article);
        }
        return $tab;

    }

    public static function add_article($title,$article,$theme){
            $db = new coDB();
            $user = User::findById($_SESSION['id']);
            $name = $user->getFirstName()." ".$user->getName();
            $db->pdo_exec('INSERT INTO articles SET title = ?, description = ?, auteur = ?, theme = ?',[$title,$article,$name,$theme]);
    }

    public static function findById($id){
        $db = new coDB();
        $data = $db->pdo_query('SELECT * FROM articles WHERE id = ? ', [$id]);
        $article = new Article($data[0]->title, $data[0]->description, $data[0]->date, $data[0]->auteur);
        return $article;
    }

    public static function delete(){
        $db = new coDB();
        $db->pdo_exec('DELETE FROM articles WHERE title = ?',[$_SESSION['name_article']]);
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
     * @return Article
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     * @return Article
     */
    public function setDescription($description)
    {
        $this->_description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @param mixed $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->_date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->_auteur;
    }

    /**
     * @param mixed $auteur
     * @return Article
     */
    public function setAuteur($auteur)
    {
        $this->_auteur = $auteur;
        return $this;
    }


}