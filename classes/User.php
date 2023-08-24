<?php
include('conexao/conexao.php');

$db=new Conexao();
class User{
    private $conn;
    public function __construct($db){
        $this->conn=$db;
    }
    public function cadastrar($nome,$email,$senha,$confSenha){
        if ($senha === $confSenha){

            $nomeExistente = $this->verificarNomeExistente($nome);
            $emailExistente = $this->verificarEmailExistente($email);
            if($nomeExistente){
                print "<script> alert ('E-mail e/ou nome de usuário já cadastrado')</script>";
                return false;
            }


            $senhaCriptografada = password_hash($senha,PASSWORD_DEFAULT);
            $sql="INSERT INTO users (nome, email, senha) VALUES (?,?,?)";

            $stmt= $this->conn->prepare($sql);
            $stmt->bindValue(1,$nome);
            $stmt->bindValue(2,$email);
            $stmt->bindValue(3,$senhaCriptografada);
            $result=$stmt->execute();
            return $result;
        }else{
            return false;
        }
    }

    private function verificarNomeExistente($nome){
        $sql = "SELECT COUNT(*) FROM users WHERE nome = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1,$nome);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    private function verificarEmailExistente($email){
        $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1,$email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    public function logar($nome, $senha){
        $sql = "SELECT * FROM users WHERE nome = :nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nome' ,$nome);
        $stmt->execute();

        if($stmt->rowCount() == 1){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($senha,$user['senha'])){
                return true;
            }
        }

        return false;
    }

}
?>