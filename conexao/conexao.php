<?php
class Conexao{
    private $host="localhost";
    private $user="root";
    private $senha="";
    private $banco="user";
    public $conn;
    public function getConnection(){
        $this->conn=null;
        try{
            $this->conn=new PDO("mysql:host=" .$this->host.";dbname=".$this->banco,$this->user,$this->senha);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOEXCEPTION $e){
            echo "Erro na conexão: ". $e->getMessage();
        }
        return $this->conn;
    }
}
?>