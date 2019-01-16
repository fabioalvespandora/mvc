<?php

    class Ssh{
        private $atributos;
 
	    public function __construct(){}
	 
	    public function __set($atributo, $valor){
	        $this->atributos[$atributo] = $valor;
	        return $this;
	    }
	 
	    public function __get($atributo){
	        return $this->atributos[$atributo];
	    }
	 
	    public function __isset($atributo){
	        return isset($this->atributos[$atributo]);
        }
        
        public function logar($ip, $user, $pass){
            if (!($connection = ssh2_connect("$ip", 22))) {
                echo "<script>alert('erro: não foi possivel conectar com este IP')</script>";
                return false;
            }
            if (!ssh2_auth_password($connection, "$user", "$pass")) {
                echo "<script>alert('erro: Senha errada, certifique-se de utilizar a senha e usuario corretos!')</script>";
                return false;
            }else{
                echo "<script>alert('completamente conectado')</script>";
                return true;
            }
        }
        public function comando($ip, $user, $pass, $comando){
            $conn = ssh2_connect("$ip", 22);
            ssh2_auth_password($conn, "$user", "$pass");
            $stream = ssh2_shell($conn);

            fwrite($stream, $comando. PHP_EOL);
            sleep(10);
            $data="";
            while($buf = stream_get_contents($stream)){
                $data.=$buf;
            }
            fclose($stream);
            echo $data;
            
        }
    }
?> 