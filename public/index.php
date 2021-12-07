<?php
    $filepath_ip = '../static/ip_cli.txt';
    $filepath_coord = '../static/car_coord.txt';
if(isset($_GET["x"]) && isset($_GET["y"]))
{
    $ip_client = $_SERVER['HTTP_HOST'];
    if(count(file($filepath_ip)) <= 1)  //(strtotime(date('Y-m-d H:i:s'))-strtotime(filectime($filepath_ip)) > 30) )
    {
        file_put_contents($filepath_ip, $ip_client);
    }
    else
    {
        $ip_cli_in_file = file_get_contents($filepath_ip);
        if(strval($ip_client) != strval($ip_cli_in_file))
        {
            die("UserErrorSecurity");
        }
    }
    file_put_contents($filepath_coord,  $_GET["x"]. ', '. $_GET["y"] . PHP_EOL , FILE_APPEND);

}
else
{
    $file_out = file($filepath_coord);
    $line = $file_out[count($file_out)-1];
    $numbers = explode(', ', $line);
    if(count($numbers) < 2)
    {
        die("Данных нет");
    }
    echo "x=".$numbers[0]. ", y=".$numbers[1]; 
    if((strtotime(date('Y-m-d H:i:s'))-strtotime(filectime($filepath_ip)) > 10))
    {
        die("        Данные не актуальны");
    }
}

?>
