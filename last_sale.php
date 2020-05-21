<?php
require_once "./config.php";
require_once "./inc/functions.php";

$obj = new core;
$answer = @$obj -> parse_xml($obj -> get_last_sale($seller_id));

// если ошибок нет
if($answer && $answer -> retval == 0) {
$date_sale = $answer -> last_sale -> date_sale;
$date_sale = explode(" ", $date_sale);
$lsd = $date_sale[0];
$lst = $date_sale[1];

// определение текущей даты
$now_date = date("d.m.Y");

// анализ даты
if($lsd == $now_date) {
$dec_last_sale = "сегодня(".$lst.")\r\n"; }
else {
$dec_last_sale = $lsd."(".$lst.")\r\n"; }

$id = $answer -> last_sale -> id_goods;
$answer1 = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_info($id ,$GLOBALS["currency"]));

$img = "<img src=\"https://graph.digiseller.ru/img.ashx?id_d=".$answer -> last_sale -> id_goods."&amp;\" style=\"max-width: 330px;\" alt=\"".$answer -> last_sale -> name_goods."\" title=\"".$answer -> last_sale -> name_goods."\" /></br>";

$message = " 
<ul><li><a href=\"./goods.php?id=".$answer -> last_sale -> id_goods."\">".$img." <span class=\"font-14-1 hov\">".$answer -> last_sale -> name_goods."</span> </a></li><br>"; 
//$message = mb_convert_encoding($message,'windows-1251','UTF-8');

echo $message; }
?>