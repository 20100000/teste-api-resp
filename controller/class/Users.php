<?php

/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 31/03/2020
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
        $cont = 0;
        $token = md5($password);
        try{
            $query = "INSERT INTO users (`name`, email, password, drink_counter, token) VALUES (?,?,?,?,?)";
            $sql = $this->con->prepare($query);
            $sql->bind_param(
                'sssis',
                $name,
                $email,
                $password,
                $cont,
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
            $query = "SELECT id, `name`, email,drink_counter FROM users WHERE 1";
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
            $query = "SELECT id, `name`, email, drink_counter FROM users WHERE id = ?";
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
        $token = md5($password);
        try{
            $query = "SELECT token, id as iduser, email, `name`, drink_counter FROM users WHERE email = ? AND password= ? ";
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


    public function insertDrink($id){
        try{
            $query = "UPDATE users
                        SET drink_counter = drink_counter + 1
                      WHERE id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('i',
                $id
            );
            $data =$sql->execute();
        }
        catch(Exception $Erro){
        $data=$Erro->getMessage();
        }
        return $data;
    }

    public function updateUser($id , $name, $email, $password){
        $token = md5($password);
        try{
            $query = "UPDATE users 
                          SET `name`= ?, email= ?, password= ?, token = ? 
                      where id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('ssssi',
                $name, $email, $password, $token, $id
            );
            $data =$sql->execute();
        }
        catch(Exception $Erro){
            $data=$Erro->getMessage();
        }
        return $data;
    }

}