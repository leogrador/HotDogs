<?php


class User
{
    private $name;
    private $password;
    private $email;
    private $id_user;

    /**
     * User constructor.
     * @param $name
     * @param $password
     * @param $email
     * @param $id_user
     */
    public function __construct()
    {
    //contrutor vazio so para ser instanciado, os dados vem dps com o login e o registo
    }

    public  function register($name)//aqui fica a treta toda que escreves po registo
    {
//        $connexion = mysqli_connect("localhost", "root", "");
//        mysqli_select_db($connexion, "hotdog");
//
//        $req = 'INSERT INTO user (login, mdp, email) VALUES ("' . $login . '","' . $mdp . '", "' . $email . '");';
//        mysqli_query($connexion, $req);
//
//        mysqli_close($connexion);
        //codigo para aceder a bd
        //querry---> $user.$this->getName()....
        $this->name= $name;//variaveis que passaste por parametro
    }

    public function login($email, $pass)
    {
        //codigo para ir buscar a base de dados
        $this->name = "e";//cenas que foste buscar a base de dados
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }


}