<?php 
    class Base64{
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
		public function criptografar($string){
			$codificada = base64_encode($string);
			return $codificada;
		} 
		public function descriptografar($string){
			$codificada = base64_decode($string);
			return $codificada;
		} 

    }
?>