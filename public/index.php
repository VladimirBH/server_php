<?php
$filepath_ip = '../static/ip_cli.txt';
$filepath_coord = '../static/car_coord.txt';

$ip_client = $_SERVER['HTTP_HOST'];
if(filesize($filepath_ip) == 0 || filectime($filepath_ip))
{
    $fp = fopen($filepath_ip, 'w');
    fputs($fp, $ip_client);
    fclose($fp);
}
else
{
    $fp = fopen($filepath_ip, 'r');
    if($ip_client != fgets($fp))
    {
        fclose($fp);
        die("UserErrorSecurity");
    }
    fclose($fp);
}
//$file_in =fopen($filepath_coord, 'w');
file_put_contents($filepath_coord,  PHP_EOL . $_GET["x"]. ', '. $_GET["y"], FILE_APPEND);
//fclose($file_in);
?>