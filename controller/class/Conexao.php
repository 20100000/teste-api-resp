<?php
/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 19/07/2019
 * Time: 10:39
 */
abstract class Conexao
{
    protected $user = "root";
    protected $senha = "" ;
    protected $bd = "test";
    protected $server = "localhost";


    public function __construct() {

    }


    public function getConnection()
    {
        try {
            $con = mysqli_connect($this->server, $this->user, $this->senha) or die("Falha ao conectar com o banco de dados");
            mysqli_select_db($con, $this->bd);

        }catch (Exception $Erro){
           print_r($Erro->getMessage());
           exit();
        }
        return $con;
    }

}