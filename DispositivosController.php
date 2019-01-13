<?php 
class DispositivosController extends Controller
{
 
    
    public function listar(){
        $dispositivos = Dispositivo::all();
        return $this->view('grade', ['dispositivos' => $dispositivos]);
    }
 
    public function criar(){
        return $this->view('form');
    }
 
    
    public function editar($dados){
        $id      = (int) $dados['id'];
        $dispositivo = Dispositivo::find($id);
 
        return $this->view('form', ['dispositivo' => $dispositivo]);
    }
 

    public function salvar(){
        $dispositivo             = new Dispositivo;
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
        $dispositivo             = Dispositivo::find($id);
        $dispositivo->hostname   = $this->request->hostname;
        $dispositivo->ip         = $this->request->ip;
        $dispositivo->tipo       = $this->request->tipo;
        $dispositivo->fabricante = $this->request->fabricante;
        $dispositivo->save();
 
        return $this->listar();
    }
 

    public function excluir($dados){
        $id      = (int) $dados['id'];
        $dispositivo = Dispositivo::destroy($id);
        return $this->listar();
    }
}
?>