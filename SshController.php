<?php 
class SshController extends Controller{
    public function index($dados){
        $ip      = (int) $dados['ip'];
        return $this->view('login');
    }
    public function logar(){
        $ssh = new Ssh;
        $ssh->usuario = $this->request->usuario;
        $ssh->senha = $this->request->senha;
        $ssh->ip = $this->request->ip;
        $ip = $ssh->ip;
        $usuario = $ssh->usuario;
        $senha = $ssh->senha;
        if($ssh->logar($ip, $usuario, $senha)){
            return $this->view('comando', ['ssh' => $ssh]);
            
        }
    }
    public function comando(){
        if (isset($_POST["comando"])) {
        $ssh = new Ssh;
        $ssh->usuario = $this->request->usuario;
        $ssh->senha = $this->request->senha;
        $ssh->ip = $this->request->ip;
        $ip = $ssh->ip;
        $usuario = $ssh->usuario;
        $senha = $ssh->senha;
        $cc = $_POST["comando"];
        $result = $ssh->comando($ip, $usuario, $senha, $cc);
        $ssh->result = $result;
        return $this->view('comando', ['ssh' => $ssh]);
        }else{
            echo "erro";
        }
    }
}

?>