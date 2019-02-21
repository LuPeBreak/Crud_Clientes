<?php



abstract class Conn{
    private static $connection = null;

    public function connect(){
        require __DIR__."/../../Config.php";
        try{
            //verifica se ja existe conexao
            if(self::$connection==null){
                //Definiçao de caracteres para o padrao utf8
                $utf = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                //criando e iniciando a conexao 
                self::$connection = new PDO("mysql:host=$host;dbname=$db", $user, $pass,$utf);
                //configurando modo de erros do pdo para exception
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return self::$connection;
            }
        }catch(PDOException $e){
            die("ERROR: " . $e->getMessage());
        }
    }
}


?>