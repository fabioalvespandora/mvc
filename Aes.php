<?php

    Class Aes{
        public $atributos;
 
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
        public function criptografia(){
            
        }
    }

$plaintext = 'My secret message 1234';
$password = '3sc3RLrpd17';

// CBC has an IV and thus needs randomness every time a message is encrypted
$method = 'aes-256-cbc';

// Must be exact 32 chars (256 bit)
// You must store this secret random key in a safe place of your system.
$key = substr(hash('sha256', $password, true), 0, 32);
echo "Password:" . $password . "\n";

// Most secure key
//$key = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));

// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// Most secure iv
// Never ever use iv=0 in real live. Better use this:
// $ivlen = openssl_cipher_iv_length($method);
// $iv = openssl_random_pseudo_bytes($ivlen);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));

// My secret message 1234
$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);

echo 'plaintext=' . $plaintext . "\n";
echo 'cipher=' . $method . "\n";
echo 'encrypted to: ' . $encrypted . "\n";
echo 'decrypted to: ' . $decrypted . "\n\n";

?>