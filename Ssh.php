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
        public function comando($comando){
            $stream = ssh2_shell($connection);

            fwrite($stream, $comando. PHP_EOL);
            sleep(10);
            $data="";
            while($buf = stream_get_contents($stream)){
                $data.=$buf;
            }
            echo $data;
            fclose($stream);
        }
    }
/*
$command_capture = "ls";
$command_capture2 = "mkdir pasta_teste";


if (!($connection = ssh2_connect("192.168.15.11", 22))) {
    echo "fail: unable to establish connection";
} 
if (!ssh2_auth_password($connection, "sysadmin", "devmaster")) {
    echo "fail: unable to authenticate";
}
$stream = ssh2_shell($connection);

fwrite($stream, $command_capture. PHP_EOL);
sleep(1);
fwrite($stream, $command_capture2 . PHP_EOL);
sleep(5);
$data="";
while($buf = stream_get_contents($stream)){
    $data.=$buf;
}
echo $data;
fclose($stream);
*/
?> 