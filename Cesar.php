<?php 
    class Cesar{
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
        
        public function criptografia($t, $d) { // Função para criptografia
            // Define lista de caracteres do alfabeto
            $string = ""; //variavel para retornar o texto criptografado
            $a = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ');
            $texto1 = strtr(utf8_decode($t),utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ+'),'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy-');
            $b = str_split($texto1); // Cria uma lista com os caracteres separados
            $num = strlen($texto1); // Conta o número de caracteres do texto
            $max = count($a) - 1; // Define o valor máximo como o total de letras possíveis menos 1 (por causa do caractere espaço)
            for($i=0; $i<$num; ++$i){ // Enquanto valor for menos que o número de caracteres do texto, executa (loop)
                if($b[$i] == in_array($b[$i], $a)){ // Se o caractere procesado estiver na lista de caracteres aceitos, prossegue
                    foreach($a as $chave => $valor){ // Converte letras para números de acordo com a ordenação da letra na lista do alfabeto
                        if($b[$i] == $valor){
                        $c[$valor] = $chave;
                        }
                    }
                }
            }
            for($i=0; $i < $num ; $i++) {
                   $number = $c[$b[$i]]; 
                   if ($number == '26') {
                       $last = ' ';
                   } else {
                       if ($d < 0) { 
                       $final = $number + $d; 
                       } else {
                       $final = $number + $d; 
                       }
                       if ($final < 0) {
                        $last = $a[$final + $max];
                       } elseif ($final > $max - 1) { 
                           $last = $a[$final - $max];
                       } else {
                           $last = $a[$final]; 
                       }
                   }
                   $string .= $last;
            }
            return $string;
        }

        public function descriptografia($t, $d) { 
            $string = ""; //variavel para retornar o texto descriptografado
            $a = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ');
            $texto1 = strtr(utf8_decode($t),utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ+'),'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy-');
            $b = str_split($texto1);
            $num = strlen($texto1);
            $max = count($a) - 1;
            for($i=0; $i<$num; ++$i){
                if($b[$i] == in_array($b[$i], $a)){
                    foreach($a as $chave => $valor){
                        if($b[$i] == $valor){
                        $c[$valor] = $chave;
                        }
                    }
                }
            }
            for($i=0; $i < $num ; $i++) {
                   $number = $c[$b[$i]];
                   if ($number == '26') {
                       $last = ' ';
                   } else {
                       if ($d < 0) {
                       $final = $number - $d;
                       } else {
                       $final = $number - $d;
                       }
                       if ($final < 0) { 
                        $last = $a[$final + $max];
                       } elseif ($final > $max - 1) {
                           $last = $a[$final - $max];
                       } else { // Ou então
                           $last = $a[$final];
                       }
                   }
                   $string .= $last;
            }
            return $string;
        }
        
    }
?>