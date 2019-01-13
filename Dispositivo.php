<?php 
	class Dispositivo{
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


	    //cadastrar dispositivo
	    public function save(){
        $colunas = $this->preparar($this->atributos);
	        if (!isset($this->id)) {
	            $query = "INSERT INTO dispositivos (".
	                implode(', ', array_keys($colunas)).
	                ") VALUES (".
	                implode(', ', array_values($colunas)).");";
	        } else {
	            foreach ($colunas as $key => $value) {
	                if ($key !== 'id') {
	                    $definir[] = "{$key}={$value}";
	                }
	            }
	            $query = "UPDATE dispositivos SET ".implode(', ', $definir)." WHERE id='{$this->id}';";
	        }
	        if ($conexao = Conexao::getInstance()) {
	            $stmt = $conexao->prepare($query);
	            if ($stmt->execute()) {
	                return $stmt->rowCount();
	            }
	        }
	        return false;
   		}

   		// Tornar valores aceitos para a sintaxe sql
   		private function escapar($dados){
	        if (is_string($dados) & !empty($dados)) {
	            return "'".addslashes($dados)."'";
	        } elseif (is_bool($dados)) {
	            return $dados ? 'TRUE' : 'FALSE';
	        } elseif ($dados !== '') {
	            return $dados;
	        } else {
	            return 'NULL';
	        }
    	}

    	// verificar se os dados podem ser salvos
    	private function preparar($dados){
	        $resultado = array();
	        foreach ($dados as $k => $v) {
	            if (is_scalar($v)) {
	                $resultado[$k] = $this->escapar($v);
	            }
	        }
	        return $resultado;
    	}

    	// Listar os dispositivos cadastrados
    	public static function all(){
	        $conexao = Conexao::getInstance();
	        $stmt    = $conexao->prepare("SELECT * FROM dispositivos;");
	        $result  = array();
	        if ($stmt->execute()) {
	            while ($rs = $stmt->fetchObject(Dispositivo::class)) {
	                $result[] = $rs;
	            }
	        }
	        if (count($result) > 0) {
	            return $result;
	        }
	        return false;
		}


    	//Encontrar pelo ID
    	public static function find($id){
	        $conexao = Conexao::getInstance();
	        $stmt    = $conexao->prepare("SELECT * FROM dispositivos WHERE id='{$id}';");
	        if ($stmt->execute()) {
	            if ($stmt->rowCount() > 0) {
	                $resultado = $stmt->fetchObject('Dispositivo');
	                if ($resultado) {
	                    return $resultado;
	                }
	            }
	        }
	        return false;
    	}

    	//Excluir dispositivo
    	public static function destroy($id){
	        $conexao = Conexao::getInstance();
	        if ($conexao->exec("DELETE FROM dispositivos WHERE id='{$id}';")) {
	            return true;
	        }
	        return false;
    	}	

	}
?>