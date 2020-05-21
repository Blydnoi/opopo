<?php
require_once "./inc/functions.php";

$tmp_type = "php";
$tmp_file = "0.tmp";
?>
<?php
// заголовок страницы, ID продавца и пр. параметры
if(!empty($_GET["q"])){
$q = trim(strip_tags($_GET["q"]));
$head["title"] = $q;}

 


else{$head["title"] = "Поиск товаров";}
$GLOBALS["tmp_dir"] = $tmp_dir;
$GLOBALS["goods_count"] = $search["goods_count"];
$GLOBALS["count_page"] = $search["count_page"];
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
			case 10:
			$count = 10000;
			break;
		
			case 20:
			$count = 20000;
			break;
		
			case 50:
			$count = 5000;
			break;
		
			case 100:
			$count = 10000;
			break;
		
			default:
			$count = 10000;}}
	else{
		if(isset($GLOBALS["goods_count"]) and !empty($GLOBALS["goods_count"])){
			switch($GLOBALS["goods_count"]){
				case 10:
				$count = 1000;
				break;
		
				case 20:
				$count = 20000;
				break;
		
				case 50:
				$count = 50000;
				break;
		
				case 100:
				$count = 10000;
				break;
		
				default:
				$count = 10000;}}}
$GLOBALS["goods_count"] = $count;

// функция вывода контента
function show_content(){
$result = "<div class = \"games_blocks_content clear\">";
$req_str = "";

if(!empty($_GET["q"])){
$q = trim(strip_tags($_GET["q"]));}

if(isset($q)){
	if(empty($q)){
	$result .= "<div id=\"digiseller-search-results\">
		<span class=\"digiseller-nothing-found\">".$GLOBALS["mess"]["search_empty"]."</span>
	</div>\n";}
	elseif(strlen($_GET["q"]) < 3){
	$result .= "<div id=\"digiseller-search-results\">
		<span class=\"digiseller-nothing-found\">".$GLOBALS["mess"]["search_short"]."</span>
	</div>\n";}
	else{
	$answer = $GLOBALS["obj"] -> search($GLOBALS["seller_id"],$q,$_REQUEST["page"],$GLOBALS["goods_count"],$GLOBALS["curr_name"]);
	$answer = $GLOBALS["obj"] -> parse_xml($answer);
		
		if($answer -> retval != 0){
		$result .= "<div id=\"digiseller-search-results\"><h2 class=\"padd\">Поиск </h2>
			<span class=\"digiseller-nothing-found\">Ошибка: ".$answer -> retdesc."</span>
		</div>\n";}
		else{
			// страниц - 0
			if((int)$answer -> pages["cnt"] == 0){
			$req_str .= "По запросу&nbsp;&quot;<span class=\"digiseller-bold\" id=\"digiseller-search-query\">$q</span>&quot;&nbsp;найдено товаров:&nbsp;<span class=\"digiseller-bold\" id=\"digiseller-search-total\">0</span>\n";
			$result .= "<div id=\"digiseller-search-results\">
			<span class=\"digiseller-nothing-found\">".$GLOBALS["mess"]["search_not_result"]."</span>
			</div>\n";}
			elseif($_REQUEST["page"] <= (int)($answer -> pages["cnt"])){
			$req_str .= "По запросу&nbsp;&quot;<span class=\"digiseller-bold\" id=\"digiseller-search-query\">$q</span>&quot;&nbsp;найдены товары:&nbsp;<span class=\"digiseller-bold\" id=\"digiseller-search-total\">".$answer -> products."</span>\n";
					$self_url = urlencode("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
          //Переменная для ограничения числа записей в строке
          $box_count = 1;
		
					foreach($answer -> products -> product as $product){
            $img = "<img src=\"https://graph.digiseller.ru/img.ashx?id_d=".$product -> id."&amp;\" alt=\"".$product -> name."\" title=\"".$product -> name."\" />";
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
		 
				  if ($box_count == 1) $result .= "
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

						   if ($box_count == 3) //В строке уже три записи
            {
              $result .= "  ";
              $box_count = 1;
            }
            else
              $box_count += 1;
            }
	 
		 }
			
			else{
				$result .= "<div id=\"digiseller-search-results\">
				<span class=\"digiseller-nothing-found\">".$GLOBALS["mess"]["page_not_found"]."</span>
				</div>\n";}}}}
else{
	$result .= "<div id=\"digiseller-search-results\">
		<span class=\"digiseller-nothing-found\">".$GLOBALS["mess"]["search_not_set"]."</span>
	</div> </div>\n";}
?>
			<h1>Поиск</h1>
			<div class="digiseller-breadcrumbs">
				<a href="./" title="Магазин">Магазин</a> > <strong>Поиск</strong>
			</div>
			<div class="digiseller-options"><div class="digiseller-sortby"><?php echo $req_str; ?>&nbsp;</div>		

						<div id="digiseller-currency">
							<form action="./type_rate.php" method="post" style="margin:0px;padding:0px;">
							<span>Валюта:</span>
								<?php echo get_type_rate(); ?>
							</form>
						</div>
					
				</div>
				
			
				 
					
				<?php echo $result; ?>
				
				 
<?php }

// функция шаблонизации
tmp_open($tmp_type,$tmp_dir,$tmp_file,$head);
?>