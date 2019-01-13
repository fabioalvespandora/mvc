<?php 
class CriptoController extends Controller{
    
    public function index(){
        return $this->view('etapa3');
        return $this->view('footer');
    }
    public function criptografar(){
        if (isset($_POST["texto"])) {
        $texto = $_POST["texto"];
        $cesar = new Cesar;
        $criptografado = $cesar->criptografia($texto, 1);
        $cesar->texto = $this->request->texto;
        $cesar->cripto = $criptografado;

        $aes = new Aes;
        $criptografadoAes = $aes->criptografia($texto);
        $aes->cripto = $criptografadoAes;
        return $this->view('etapa3final', ['cesar' => $cesar,'aes' => $aes]);
        }else{
            echo "<script>alert('erro')</script>";
        }
    }
    public function descriptografar(){
        if (isset($_POST["texto"])) {
        $texto = $_POST["texto"];
        $cesar = new Cesar;
        $criptografado = $cesar->descriptografia($texto, 1);
        $cesar->texto = $this->request->texto;
        $cesar->cripto = $criptografado;

        $aes = new Aes;
        $criptografadoAes = $aes->descriptografia($texto);
        $aes->cripto = $criptografadoAes;


        return $this->view('etapa3final', ['cesar' => $cesar, 'aes' => $aes]);
        }else{
            echo "<script>alert('erro')</script>";
        }
    }
}