<?php 
class DispositivosController extends Controller
{
 
    
    public function listar(){
        $dispositivos = dispositivo::all();
        return $this->view('grade', ['dispositivos' => $dispositivos]);
    }
 
    public function criar(){
        return $this->view('form');
    }
 
    
    public function editar($dados){
        $id      = (int) $dados['id'];
        $dispositivo = dispositivo::find($id);
 
        return $this->view('form', ['dispositivo' => $dispositivo]);
    }
 

    public function salvar(){
        $dispositivo             = new dispositivo;
        $dispositivo->hostname   = $this->request->hostname;
        $dispositivo->ip         = $this->request->ip;
        $dispositivo->tipo       = $this->request->tipo;
        $dispositivo->fabricante = $this->request->fabricante;
        if ($dispositivo->save()) {
            return $this->listar();
        }
    }
 
    public function atualizar($dados){
        $id                      = (int) $dados['id'];
        $dispositivo             = dispositivo::find($id);
        $dispositivo->hostname   = $this->request->hostname;
        $dispositivo->ip         = $this->request->ip;
        $dispositivo->tipo       = $this->request->tipo;
        $dispositivo->fabricante = $this->request->fabricante;
        $dispositivo->save();
 
        return $this->listar();
    }
 

    public function excluir($dados){
        $id      = (int) $dados['id'];
        $dispositivo = dispositivo::destroy($id);
        return $this->listar();
    }
}
?>