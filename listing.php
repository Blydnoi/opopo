<?php
require_once "./inc/functions.php";

$tmp_type = "php";
$tmp_file = "0.tmp";
?>
<?php
// заголовок страницы и пр. параметры
$head["title"] = "Список товаров";
$head["description"] = "В нашем магазине можно купить ключи steam дешево, купить steam аккаунт дешево, купить steam cs go, купить стим.";
$head["keywords"] = "магазин аккаунтов steam, магазин ключей стим, купить аккаунты steam, warface, world of tanks, minecraft, origin, uplay, продажа аккаунтов, бесплатные steam ключи, раздача аккаунтов, купить CS:GO, Купить cs, купить GTA 5";

$GLOBALS["order"] = $default_order;
$GLOBALS["default_gl"] = $default_gl;
$GLOBALS["tmp_dir"] = $tmp_dir;
$GLOBALS["img_size"] = $listing["img_size"];
// установленная страница(по умолчанию - 1)
get_current_page();
// количество строк и количество страниц
$GLOBALS["goods_count"] = $listing["goods_count"];
$GLOBALS["count_page"] = $listing["pages"];
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

// определиние количества выводимых товаров
	if(isset($_SESSION["goods_count"]) and !empty($_SESSION["goods_count"])){
		switch($_SESSION["goods_count"]){
			case 8:
			$count = 8;
			break;
		
			case 20:
			$count = 20;
			break;
		
			case 50:
			$count = 50;
			break;
		
			case 100:
			$count = 100;
			break;
		
			default:
			$count = 8;}}
	else{
		if(isset($GLOBALS["goods_count"]) and !empty($GLOBALS["goods_count"])){
			switch($GLOBALS["goods_count"]){
				case 8:
				$count = 8;
				break;
		
				case 20:
				$count = 20;
				break;
		
				case 50:
				$count = 50;
				break;
		
				case 100:
				$count = 100;
				break;
		
				default:
				$count = 8;}}}
$GLOBALS["goods_count"] = $count;

// функция вывода контента
function show_content(){
$result = " <div class = \"games_blocks_content clear\">";
	// определение ID группы товаров
	if(isset($_GET["category_id"]) && !empty($_GET["category_id"])){
	$_GET["category_id"] = abs((int)$_GET["category_id"]);
		if(!empty($_GET["category_id"])){
		$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],$_GET["category_id"],$_REQUEST["page"],$GLOBALS["goods_count"],$GLOBALS["curr_name"],$GLOBALS["order"]));}
		else {$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],$GLOBALS["default_gl"],$_REQUEST["page"],$GLOBALS["goods_count"],$GLOBALS["curr_name"],$GLOBALS["order"]));}}
	else{$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_list($GLOBALS["seller_id"],$GLOBALS["default_gl"],$_REQUEST["page"],$GLOBALS["goods_count"],$GLOBALS["curr_name"],$GLOBALS["order"]));}	
	
	if($answer -> retval != 0){
	$result .= "<p>".$answer -> retdesc."</p>\n";
	echo $answer -> retdesc;}
	else{
		$cat = $answer -> categories -> category;
 	  
		$result .= " 
		
		<div class=\"block_header_game clear\">
          <span class=\"block_game_name\">".get_name_categories($cat)."</span>
 
        </div>
		
	 
 \r\n";
		$url_check="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if(!empty($answer -> subcategories -> subcategory)){
			$result .= "<div class=\"digiseller-category-blocks\" style=\"display:none\">\n";
			foreach($answer -> subcategories -> subcategory as $subcategory){
				$result .= "<div>
					<a href=\"listing.php?category_id=".$subcategory -> id."\"><img src=\"https://graph.digiseller.ru/img.ashx?idn=1&amp;maxlength=".$GLOBALS["img_size"]."\" alt=\"\"></a>
					<a href=\"listing.php?category_id=".$subcategory -> id."\">".$subcategory -> name."<span>&nbsp;(".$subcategory["cnt"].")</span></a>
				</div>\n";}
				$result .= "</div>
				<div class=\"digiseller-both\"></div>\n";}
		
		if($answer -> categories -> category["cnt"] == 0){
		$result .= "<p>".$GLOBALS["mess"]["goods_not_found"]."</p>\n";}
		
		else{
			if($_REQUEST["page"] > $answer -> pages["cnt"]){
			$result .= "<p>".$GLOBALS["mess"]["page_not_found"]."</p>\n";}
			
			else{
			$result .= "<div id=\"digiseller-productList\">				     
<div class=\"order\"><span>
							<form action='./goods_order.php' method='post\'>
							 ".get_order()."
							</form>
						</span></div>
						 \n";

          //Переменная для ограничения числа записей в строке
          $box_count = 1;
		
					foreach($answer -> products -> product as $product){
              $img = "<img class=\"img-first\" src=\"https://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" alt=\"".$product -> name."\" title=\"".$product -> name."\" />";
							switch($product["icon"]){
							case "new":
							$html_class_name = "new";
							$vitrina_icon = "Новинка!";
							break;
							
							case "sale":
							$html_class_name = "action";
							$vitrina_icon = "Акция!";
							break;
							
							case "top":
							$html_class_name = "lider";
							$vitrina_icon = "Лидер продаж!";
							break;
							
							default:
							$html_class_name = "Icon";
							$vitrina_icon = "&nbsp;";}
				
			$curr_name = $answer -> products -> currency;
				$self_url = urlencode("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);

            if ($box_count == 1) $result .= "<ul class=\"products\">";

     if(!empty($_COOKIE["ai"]) && $_COOKIE["ai"] > 0){
$agent = "id_agent=".$_COOKIE["ai"];}
elseif(!empty($GLOBALS["seller_id"]) && $GLOBALS["seller_id"] > 0){
$agent = "id_agent=".$GLOBALS["seller_id"];}
else{
$agent = "";}	
              $result .= "<div class = \"games_buy relative\">
          
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
              $result .= "<div class=\"clear\"></div> ";
              $box_count = 1;
            }
            else
              $box_count += 1;
            }
			
        }
		
		
				// вывод номерации страниц
				$result .= " </div><div style=\"clear: both;\"></div>
			 \n";
					if((int)($answer -> pages["cnt"]) > 0){
					$result .= "<div class=\"navigation_pages\"><div class = 'pages clear'><ul class = 'pages_content'>\n";
					$cp = (int)($answer -> pages -> num);
					$ap = (int)($answer -> pages["cnt"]);
					$url = "category_id=".$_REQUEST["category_id"];
					$result .= show_num_pages($cp,$ap,$GLOBALS["count_page"],$url,"./listing.php");
					$result .= "</ul>";
					$result .= "<div class=\"digiseller-pager-rows sort_category relative\">  <div class = \"sort_pick\">
					<form action=\"./goods_count.php\" method=\"post\">
					<span>Выводить на странице:</span>&nbsp;
					".get_goods_count()."
					</form>
					</div></div>\n";
					$result .= "</div>
					</div>
				</div>
					
					 \n";}}}
echo $result;}
// функция шаблонизации
tmp_open($tmp_type,$tmp_dir,$tmp_file,$head);
?>