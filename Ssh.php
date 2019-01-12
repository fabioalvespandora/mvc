 <?php 
 /*
class SSH { 
    // SSH Host 
    private $ssh_host = '192.168.15.11'; 
    // SSH Port 
    private $ssh_port = 22; 
    // SSH Server Fingerprint 
    private $ssh_server_fp = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; 
    // SSH Username 
    private $ssh_auth_user = 'sysadmin'; 
    // SSH Public Key File 
    private $ssh_auth_pub = '/home/sysadmin/.ssh/id_rsa.pub'; 
    // SSH Private Key File 
    private $ssh_auth_priv = '/home/sysadmin/.ssh/id_rsa'; 
    // SSH Private Key Passphrase (null == no passphrase) 
    private $ssh_auth_pass; 
    // SSH Connection 
    private $connection; 
    
    public function connect() { 
        if (!($this->connection = ssh2_connect($this->ssh_host, $this->ssh_port))) { 
            throw new Exception('Cannot connect to server'); 
        } 
        $fingerprint = ssh2_fingerprint($this->connection, SSH2_FINGERPRINT_MD5 | SSH2_FINGERPRINT_HEX); 
        if (strcmp($this->ssh_server_fp, $fingerprint) !== 0) { 
            throw new Exception('Unable to verify server identity!'); 
        } 
        if (!ssh2_auth_pubkey_file($this->connection, $this->ssh_auth_user, $this->ssh_auth_pub, $this->ssh_auth_priv, $this->ssh_auth_pass)) { 
            throw new Exception('Autentication rejected by server'); 
        } 
    } 
    public function exec($cmd) { 
        if (!($stream = ssh2_exec($this->connection, $cmd))) { 
            throw new Exception('SSH command failed'); 
        } 
        stream_set_blocking($stream, true); 
        $data = ""; 
        while ($buf = fread($stream, 4096)) { 
            $data .= $buf; 
        } 
        fclose($stream); 
        return $data; 
    } 
    public function disconnect() { 
        $this->exec('echo "EXITING" && exit;'); 
        $this->connection = null; 
    } 
    public function __destruct() { 
        $this->disconnect(); 
    } 
}
*/
/* Notify the user if the server terminates the connection */
function my_ssh_disconnect($reason, $message, $language) {
    printf("Server disconnected with reason code [%d] and message: %s\n",
           $reason, $message);
  }
  
  $methods = array(
    'kex' => 'diffie-hellman-group1-sha1',
    'client_to_server' => array(
      'crypt' => '3des-cbc',
      'comp' => 'none'),
    'server_to_client' => array(
      'crypt' => 'aes256-cbc,aes192-cbc,aes128-cbc',
      'comp' => 'none'));
  
  $callbacks = array('disconnect' => 'my_ssh_disconnect');
  
  $connection = ssh2_connect('192.168.15.11', 22, $methods, $callbacks);
  if (!$connection) die('Connection failed');
?>
