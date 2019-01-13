<?php 
class CriptoController extends Controller{
    
    public function index(){
        return $this->view('etapa3');
        return $this->view('footer');
    }
    public function criptografar(){
        $texto = $_POST["texto"];
        $cesar = new Cesar;
        $criptografado = $cesar->criptografia($texto, 1);
        $cesar->texto = $this->request->texto;
        $cesar->cripto = $criptografado;
        return $this->view('etapa3final', ['cesar' => $cesar]);
    }
    public function descriptografar(){
        $texto = $_POST["texto"];
        $cesar = new Cesar;
        $criptografado = $cesar->descriptografia($texto, 1);
        $cesar->texto = $this->request->texto;
        $cesar->cripto = $criptografado;
        return $this->view('etapa3final', ['cesar' => $cesar]);
    }
}