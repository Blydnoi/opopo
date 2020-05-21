<?php

require_once "./inc/functions.php";
require_once "variables.php";

 ?>



<?
$tmp_type = "php";
$tmp_file = "0.tmp";
?>
<?php
// заголовок страницы, ID продавца и пр. параметры
$head["title"] = $title;
$head["description"] =  $desc;
$head["keywords"] = $keywords;

$GLOBALS["default_gl"] = $default_gl;
$GLOBALS["default_order"] = $default_order;
$GLOBALS["tmp_dir"] = $tmp_dir;
$GLOBALS["category_img_size"] = $main["category_img_size"];
$GLOBALS["goods_img_size"] = $main["goods_img_size"];
// установленная страница(по умолчанию - 1)
get_current_page();
// количество строк и количество страниц
$GLOBALS["rows"] = $default_rows;
$GLOBALS["count_page"] = $main["pages"];

// определение типа валюты
show_other_name_rate();
// определиние порядка сортировки
	if(isset($_SESSION["order"]) and !empty($_SESSION["order"])){
		switch($_SESSION["order"]){
			case "name":
			$order = "name";
			break;
		
			case "nameDESC":
			$order = "nameDESC";
			break;
		
			case "price":
			$order = "price";
			break;
		
			case "priceDESC":
			$order = "priceDESC";
			break;
		
			default:
			$order = "name";}}
	else{
		if(isset($GLOBALS["default_order"]) and !empty($GLOBALS["default_order"])){
			switch($GLOBALS["default_order"]){
				case "name":
				$order = "name";
				break;
		
				case "nameDESC":
				$order = "nameDESC";
				break;
		
				case "price":
				$order = "price";
				break;
		
				case "priceDESC":
				$order = "priceDESC";
				break;
		
				default:
				$order = "name";}}}
$GLOBALS["order"] = $order;
?>

<?
// функция вывода контента
function show_content(){
	$result = "<div class = \"games_blocks_content clear\">";
	
	// определение ID группы товаров
	if(isset($_GET["category_id"]) && !empty($_GET["category_id"])){
	$_GET["category_id"] = abs((int)$_GET["category_id"]);
		if(!empty($_GET["category_id"])){
		$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],$_GET["category_id"],$_REQUEST["page"],$GLOBALS["rows"],$GLOBALS["curr_name"],$GLOBALS["order"]));}
		else {$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],$GLOBALS["default_gl"],$_REQUEST["page"],$GLOBALS["rows"],$GLOBALS["curr_name"],$GLOBALS["order"]));}}
	else{$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],$GLOBALS["default_gl"],$_REQUEST["page"],$GLOBALS["rows"],$GLOBALS["curr_name"],$GLOBALS["order"]));}

	if($answer -> retval != 0){
	$result .= "<p>".$answer -> retdesc."</p>\n";
	echo $answer -> retdesc;}
	else{
		if(isset($answer -> subcategories -> subcategory)){
		$result .= "<div class=\"digiseller-category-blocks\">\n";
			foreach($answer -> subcategories -> subcategory as $subcategory){
				if((int)$subcategory["cnt"] > 0){
			 ;}}
				$result .= "</div>
				<div class=\"digiseller-both\"></div>
				 \n";}
 
	
					 
						 

  //Переменная для ограничения числа записей в строке
  $box_count = 1;

		if($answer -> products["cnt"] > 0){
			if($_REQUEST["page"] > $answer -> pages["cnt"]){
			$result .= "<p>".$GLOBALS["mess"]["page_not_found"]."</p>\n";}
			else{
        $result .= " ";
//        include 'box.php';
				foreach($answer -> products -> product as $product){
        $img = "<img class=\"img-first\" src=\"https://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" alt=\"".$product -> name."\" title=\"".$product -> name."\" />";
					switch($product["icon"]){
						case "sale":
						$html_class_name = " digiseller-newproduct";
						$vitrina_icon = "Новинка!";
						break;
						
						case "new":
						$html_class_name = " digiseller-action";
						$vitrina_icon = "Акция!";
						break;
						
						case "top":
						$html_class_name = " digiseller-lider";
						$vitrina_icon = "Лидер продаж!";
						break;
						
						default:
						$html_class_name = "";
						$vitrina_icon = "&nbsp;";}
						
						$curr_name = $answer -> products -> currency;
						$self_url = urlencode("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);

 if(!empty($_COOKIE["ai"]) && $_COOKIE["ai"] > 0){
$agent = "ai=".$_COOKIE["ai"];}
elseif(!empty($GLOBALS["seller_id"]) && $GLOBALS["seller_id"] > 0){
$agent = "ai=".$GLOBALS["seller_id"];}
else{
$agent = "";}	

            if ($box_count == 1) $result .= " ";
 $result .= " 
 <div class = \"games_buy relative\">
          
          <div class = 'game_icon relative'>
            <a href=\"./goods.php?id=".$product -> id."\">".$img."</a>
          </div>
          <div class = 'game_name relative'>
            <div class = 'name_content'><a href=\"./goods.php?id=".$product -> id."\">".$product -> name."</a></div>
          </div>  
           <div class = 'buy_icon'><a href=\"./goods.php?id=".$product -> id."\">&nbsp;
".$product -> price." ".$curr_name."</a></div>
    
          <!--div class = 'discount'>10%</div-->
        </div>
			";

            if ($box_count == 4) //В строке уже три записи
            {
              $result .= "  <div class=\"clear\"></div> ";
              $box_count = 1;
            }
            else
              $box_count += 1;
            }
						
        }}} 
		$result .= "   </div>\n<!-- end.Список товаров -->
 
	
 \n";
	echo $result;}
?>
		 
<?php
// функция шаблонизации
tmp_open($tmp_type,$tmp_dir,$tmp_file,$head);
?>