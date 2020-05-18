<?php

/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 30/04/2020
 * Time: 16:32
 */
include_once "Conexao.php";
class Users extends Conexao
{
    private $con;

    public function __construct() {
        $this->con = parent::getConnection();
    }

    public function newUser($name, $email, $password){
        $token = md5($password);
        try{
            $query = "INSERT INTO users (`name`, email, password, token) VALUES (?,?,?,?)";
            $sql = $this->con->prepare($query);
            $sql->bind_param(
                'ssss',
                $name,
                $email,
                $password,
                $token
            );

            $sql->execute();
            $data = $sql->insert_id;
        } catch (Exeception $e){
            $data = $e->getMessage();
        }
        return $data;
    }

    public function showUsers(){
        try{
            $query = "SELECT u.name, u.email, u.id, COUNT(d.id) as drink_counter  FROM users as u
                        LEFT JOIN drink as d ON u.id = d.id_users WHERE 1";
            $sql = $this->con->prepare($query);
            $sql->execute();
            $result = $sql->get_result();
            $dados = $result->fetch_all(MYSQLI_ASSOC);

        }
        catch (Exception $Erro){
            print_r($Erro->getMessage());
            $dados = null;
        }
        return $dados;
    }


    public function authorizeUser($token){
        try{
            $query = "SELECT id FROM users WHERE token = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('s',$token);

            $sql->execute();
            $result = $sql->get_result();
            $dados = $result->fetch_all(MYSQLI_ASSOC);

        }
        catch (Exception $Erro){
            print_r($Erro->getMessage());
            $dados = null;
        }
        return $dados;
    }

    public function getUserId($idUser){
        try{
            $query = "SELECT u.name, u.email, u.id, COUNT(d.id) as drink_counter, SUM(d.ml) as drink_ml  FROM users as u
                        LEFT JOIN drink as d ON u.id = d.id_users WHERE u.id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('i',$idUser);
            $sql->execute();
            $result = $sql->get_result();
            $dados = $result->fetch_all(MYSQLI_ASSOC);

        }catch (Exception $Erro){
            print_r($Erro->getMessage());
            $dados = null;
        }
        return $dados;
    }

    public function historyUser($id){
        try{
            $query = "SELECT * FROM drink WHERE id_users = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('i',$id);
            $sql->execute();
            $result = $sql->get_result();
            $dados = $result->fetch_all(MYSQLI_ASSOC);

        }catch (Exception $Erro){
            print_r($Erro->getMessage());
            $dados = null;
        }
        return $dados;
    }

    public function rankingUser (){
        try{
            $query = "SELECT u.name, SUM(d.ml) as drink_ml FROM drink as d LEFT JOIN users as u ON u.id = d.id_users
                      GROUP BY d.id_users ORDER BY drink_ml DESC ";
            $sql = $this->con->prepare($query);
            $sql->execute();
            $result = $sql->get_result();
            $dados = $result->fetch_all(MYSQLI_ASSOC);

        }catch (Exception $Erro){
            print_r($Erro->getMessage());
            $dados = null;
        }
        return $dados;
    }
    public function deleteUser($idUser){
        try{
            $query = "DELETE FROM users where id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('i', $idUser );
            $data =$sql->execute();
        }
        catch(Exception $Erro){
            $data=$Erro->getMessage();
        }
        return $data;

    }

    public function loginUser($email, $password){
        try{
            $query = "SELECT token, id as iduser, email, `name` FROM users WHERE email = ? AND password= ? ";
            $sql = $this->con->prepare($query);
            $sql->bind_param('ss',$email, $password);
            $sql->execute();
            $result = $sql->get_result();
            $dados = $result->fetch_all(MYSQLI_ASSOC);

        }
        catch (Exception $Erro){
            print_r($Erro->getMessage());
            $dados = $Erro->getMessage();
        }
        return $dados;

    }


    public function insertDrink($ml, $id, $now){
        try{
            $query = "INSERT INTO drink( ml, id_users, `data`) VALUES (?,?,?)";
            $sql = $this->con->prepare($query);
            $sql->bind_param('iis', $ml,$id, $now);
            $data =$sql->execute();
        }
        catch(Exception $Erro){
            $data=$Erro->getMessage();
        }
        return $data;
    }

    public function updataUser($id , $name, $email, $password){
        try{
            $query = "UPDATE users 
                          SET `name`= ?, email= ?, password= ?
                      WHERE id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('sssi',
                $name, $email, $password, $id
            );
            $data =$sql->execute();
        }
        catch(Exception $Erro){
            $data=$Erro->getMessage();
        }
        return $data;
    }

}