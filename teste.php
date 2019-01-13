<?php
$command_capture = "ls";
$command_capture2 = "mkdir pasta_teste";


if (!($connection = ssh2_connect("192.168.15.11", 22))) {
    echo "fail: unable to establish connection";
} 
if (!ssh2_auth_password($connection, "sysadmin", "devmaster")) {
    echo "fail: unable to authenticate";
}
$stream = ssh2_shell($connection);

fwrite($stream, $command_capture. PHP_EOL);
sleep(1);
fwrite($stream, $command_capture2 . PHP_EOL);
sleep(5);
$data="";
while($buf = stream_get_contents($stream)){
    $data.=$buf;
}
echo $data;
fclose($stream);
?> 