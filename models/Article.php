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
     * Article constructor.
     * @param $_name
     * @param $_description
     * @param $_date
     * @param $_auteur
     */
    public function __construct($_name, $_description, $_date, $_auteur)
    {
        $this->_name = $_name;
        $this->_description = $_description;
        $this->_date = $_date;
        $this->_auteur = $_auteur;
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