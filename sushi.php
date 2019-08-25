<?php
include("config.php");

$login = "https://allowweb.com/supersatoshi/index.php/dashboard";
$addp  = "https://allowweb.com/supersatoshi/index.php/balance/addPoint";
$reset = "https://allowweb.com/supersatoshi/index.php/dashboard/getDesabledButtons";

$headers   = array();
$headers[] = "X-Requested-With: XMLHttpRequest";
$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$headers[] = "Cookie: __cfduid=$cfduid; ci_session=$ci_session";


function res($reset, $headers){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $reset);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, 'https://allowweb.com/supersatoshi/index.php/dashboard');
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 5.1; A1603 Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.121 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    $result = curl_exec($ch);
    curl_close($ch);
}

function checkmove($headers){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://allowweb.com/supersatoshi/index.php/Dashboard/checkXtwoMoment");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, 'https://allowweb.com/supersatoshi/index.php/dashboard');
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 5.1; A1603 Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.121 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    $result = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    if(!$info){
       return $result;
    }
}
function addpoint($addp ,$ci_session, $cfduid){
    $no = array("1","2","3","4","5");
    foreach($no as $noo){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $addp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, 'https://allowweb.com/supersatoshi/index.php/dashboard');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 5.1; A1603 Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.121 Mobile Safari/537.36');
        curl_setopt($ch, CURLOPT_POST, 1);
        $ua = array();
        $ua[] = "Cookie: __cfduid=$cfduid; ci_session=$ci_session";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
        $data['id'] = $noo;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);
        if(!$info){
           return $result;
        }
        else {
           $json1 = json_decode($result, true);
           if ($json1["message"] == "Invalid Action"){continue;}
           else{
               echo "\033[1;32mMessage\033[1;31m : \033[1;0m".$json1["message"]."\033[1;30m |\033[1;32m Ballance \033[1;31m:\033[1;0m ".$json1["pointBalance"]." Point \n";
               sleep(90);
          }
        }
    }
}



date_default_timezone_set('Asia/Jakarta');
$banner = "\033[1;31m
          #####
         #     # #    #  ####  #    # #
         #       #    # #      #    # #
          #####  #    #  ####  ###### #
               # #    #      # #    # #
         #     # #    # #    # #    # #
          #####   ####   ####  #    # #

\033[1;33m============<\033[1;0m BOT Auto Super Satoshi \033[1;33m>============
\033[1;32mAuthor By  \033[1;31m:\033[1;0m Kadal15         \033[1;30m|\033[1;32m Team \033[1;31m:\033[1;0m Termux Id
\033[1;32mChannel Yt \033[1;31m:\033[1;0m Jejaka Tutorial \033[1;30m|\033[1;31m Take Your Own Risk";

system("clear");
echo $banner;
echo "\n\n\033[1;36mLogin\033[1;0m ";
sleep(1);
echo ".";
sleep(1);
echo ".";
sleep(1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 5.1; A1603 Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.121 Mobile Safari/537.36');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
$info = curl_getinfo($ch);
$info_code = $info["http_code"];
curl_close($ch);
if ($info_code == 200){
    $one = explode('<b  id="pointBalance">', $result);
    $two = explode('</b>', $one[1]);
    echo ".";
    sleep(1);
    echo "!";
    sleep(1);
    echo "\n\033[1;33mLogin Success\n";
    echo "\033[1;32mBallance \033[1;31m:\033[1;0m ".$two[0]." Point\n";
}
else{
  return $result;
}

checkmove($headers);
echo "\n\n\n\033[1;33m==================[\033[1;0m ".date("h:i:sa")." \033[1;33m]==================\n";
$i = 0;
while (True){
	 $i++;
     res($reset, $headers);
     addpoint($addp ,$ci_session, $cfduid);
     if ($i == 4){
     	echo "\n\033[1;31mIklan Bosque......!\n\033[1;0mBantu Subscribe Channel Jejaka Tutorial Di Sana Tempat Ane Share Tutorial Menarik Seputar Termux\n";
     }
     if ($i == 8){
     	echo "\n\033[1;31mIklan Bosque......!\n\033[1;0mKunjungi Juga Blog Jejaka Tutorial Termux Di Sana Tempat Ane Share Tutorial Menarik Seputar Termux\n";
     }
}
?>
