<?php
require_once "./inc/functions.php";

$tmp_type = "php";
$tmp_file = "0.tmp";
?>
<?php

// заголовок страницы, массив контактов
if((isset($_GET["id"]))&&(!empty($_GET["id"]))){
  $_GET["id"] = abs((int)$_GET["id"]);
  $id = $_GET['id'];
	if(!empty($_GET["id"])){
		$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_info($_GET["id"],$GLOBALS["currency"]));
    if($answer -> retval != 0){
      $head["title"] = "Описание товара";
    }
    else{
  $head["title"] = "Купить " . $answer -> product -> name . "";
    }
  }
}
$head["description"] = $answer->product->info;
$head["keywords"] = "купить кс го, купить стим, купить гта 5, стим аккаунт, ключ стим, игра стим, купить battlefield 1, купить аккаунт, рандом стим, купить кс го дешево, кс го, кс го купить, купить кс го за 100 рублей, купить battlefield 4";
$GLOBALS["img_size"] = $info_goods["img_size"];
show_other_name_rate();
// функция вывода контента
function show_content(){
$result = "<div class = 'common_block content_games'>
    <div class = 'block_wrapper games_block'>
      <div class = 'item_content clear'>";
?>
			<!-- Список товаров -->
		<?php
				if(!isset($_GET["id"]) or empty($_GET["id"])){
				$result .= "<meta http-equiv=\"refresh\" content=\"0; url=index.php\" />\n";}
				else{
				$_GET["id"] = abs((int)$_GET["id"]);
					if(empty($_GET["id"])){
					$result .= "<meta http-equiv=\"refresh\" content=\"0; url=index.php\" />\n";}
					else{
					$answer = $GLOBALS["obj"] -> parse_xml($GLOBALS["obj"] -> goods_info($_GET["id"],$GLOBALS["currency"]));
						if($answer -> retval != 0){
						$result .= "<p>".$GLOBALS["mess"]["service_error"]."</p>\n";}
						else{
						$cat = $answer -> product -> categories -> category;
						$self_url = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
						
								$product = $answer -> product;
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
?>
<?php				
 if(!empty($_COOKIE["ai"]) && $_COOKIE["ai"] > 0){
$agent = "ai=".$_COOKIE["ai"];}
elseif(!empty($GLOBALS["seller_id"]) && $GLOBALS["seller_id"] > 0){
$agent = "ai=".$GLOBALS["seller_id"];}
else{
$agent = "";}	
	
					 
					 		 if(!empty($answer -> product -> previews_img -> preview_img -> img_real)){
						$prev_img_real = $answer -> product -> previews_img -> preview_img -> img_real;
						$a = "<a href=\"$prev_img_real\" id=\"digiseller-article-img-preview\" rel=\"prettyPhoto[a]\">
							<img src=\"https://graph.digiseller.ru/img.ashx?id_d=".$answer -> product -> id."&amp;maxlength=".$GLOBALS["img_real"]."\" alt=\"\" />\n					
							</a>\n";}
						else{$a = "<img src=\"https://graph.digiseller.ru/img.ashx?id_d=".$answer -> product -> id."&amp;maxlength=".$GLOBALS["img_size"]."\" alt=\"\" />\n";}
			   
						 
						$result .= "      <div class = 'block_header_game clear'>
          <span class = 'block_game_name'>Купить ".$answer -> product -> name."</span>
          
        </div> ";?>
		  
		 <div class = 'under_header_block clear'>
          
          <span class = 'shop_category'><i class = 'folder_icon icon'></i>Главная <?php echo get_name_categories($cat); ?>  </span>
        </div> 

</script>
<?php



?>


				<?php		 
 $result .= " 
  <div class = 'pro_info clear'>
          <div class = 'left_block_item'>
      
            <div class = 'image_shop_item'>
             <a href=\"$prev_img_real\" id=\"digiseller-article-img-preview\" rel=\"prettyPhoto[a]\">
							<img src=\"https://graph.digiseller.ru/img.ashx?id_d=".$answer -> product -> id."&amp".$GLOBALS["img_real"]."\" alt=\"\" width=\"200px\" height=\"200px\" />\n					
							</a>	 
            </div>
          
<div class = 'content_right_block_item'>
          
          <span class = 'block_game_price'>".$answer -> product -> prices -> wmr." ".$GLOBALS["curr_name"]."</span>
          <div class = 'container_price'>
          <span class = 'in_shop'><i class = 'file_icon icon'></i><span class = 'green_shop'>В наличии</span></span>
            
            </div>
        
<script type='text/javascript'>
	function question(){
    confirm('Вы соглашаетесь с пользовательским соглашением?')?location.href='http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&".$agent."&curr=WMR':false;
};
</script>

           <div class = 'buy_item relative'><a class = 'full_link' onclick = 'question();'></a>КУПИТЬ</div>
            <div class = 'plus_buy_container'>
          <div class = 'plus_buy'>
              <div class = 'info_plus_buy'>
                <img src = 'templates/0/images/box.png' align='left'><span>Гарантии</span>
              </div>
            </div>

          <div class = 'plus_buy'>
              <div class = 'info_plus_buy'>
                <img src = 'templates/0/images/box.png' align='left'><span>Отзывы</span>
              </div>
            </div>
          </div>
</div>
 
 ";				
							  ?>
<?php 		 
			 
					 
						
 $result .= " <div id='owl-demo' class='owl-carousel'>";
							if(!empty($answer -> product -> previews_img["cnt"]) && $answer -> product -> previews_img["cnt"] > 1 or !empty($answer -> product -> previews_video["cnt"]) && $answer -> product -> previews_video["cnt"] > 0){
					 
								if(!empty($answer -> product -> previews_img["cnt"]) && $answer -> product -> previews_img["cnt"] > 1)
										{
									foreach($answer -> product -> previews_img -> preview_img as $preview_img){									
																
							$result .= "	 				  
							  
                <div class='item'> <a href=\"".$preview_img -> img_real."\" target=\"_blank\" title=\"\" rel=\"prettyPhoto[a]\">
									<img src=\"".$preview_img -> img_real."\" width=\"80\" height=\"80\" alt=\"\" />
								</a>			</div>
        
               

               ";}}
			   
								if(!empty($answer -> product -> previews_video["cnt"]) && $answer -> product -> previews_video["cnt"] > 0){
									foreach($answer -> product -> previews_video -> preview_video as $preview_video){
										if($preview_video -> type == "youtube"){
										$video_url = "http://www.youtube.com/watch?v=".$preview_video -> id;}
										elseif($preview_video -> type == "vimeo"){
										$video_url = "http://vimeo.com/".$preview_video -> id;}
									
									$result .= "   <div class='item'><a href=\"$video_url\" title=\"#\" class=\"digiseller-videothumb\" target=\"_blank\" rel=\"prettyPhoto[a]\">
								<img src=\"".$preview_video -> preview."\" alt=\"\" width='201' height='97' />
								<span></span>
							</a></div>\n";}}
							$result .= " \n";}
							
						$self_url = urlencode("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
 $result .= "</div> 
 
 
 <div class = 'info_shop_item'>

              <div class = 'header_info_shop_item'>
                <ul class = 'category_info clear'>
                  <li class = 'current' data-idslide = '.descrp'>Описание</li>
                  <li data-idslide = '.activation'>Активация</li>
                  <li data-idslide = '.review'>Отзывы </li>
                  <li data-idslide = '.discount_item'>Скидка</li>
                </ul>
              </div>
              <div class = 'content_info_game clear'>
  

           
        <div class = 'slide_content_info_game descrp active'>

        
		
		";
 	
	 
									if(trim($answer -> product -> info)){
											$result .= "<div>
											".nl2br($answer -> product -> info)."
											</div>\n";}
									$result .= "
	  </div>
	  <div class = 'slide_content_info_game rules'>
    		 ";
									if(trim($answer -> product -> add_info) != ""){
											$result .= "<div class=\"\">
										 
											".nl2br($answer -> product -> add_info)."
											</div>\n";}
											$result .= "
                </div>
        <div class = 'slide_content_info_game activation'>
       <ol class='tovar-activation-list'>
								
										<li>• Получите оплаченный товар в разделе <a href='https://www.oplata.info/info/'> МОИ ПОКУПКИ</a> </li>
										<li>• Если не установлен Steam, Origin, Uplay клиент, скачайте и установите его.</li>
										<li>• Войдите в свой аккаунт Steam, Origin, Uplay или зарегистрируйтеновый, если у вас его еще нет.</li>
										<li>• Перейдите в раздел «Игры».</li>
										<li>• Введите ключ активации.</li>
										<li>• После этого игра отобразится в разделе «Мои игры».</li>
							 </ol>
                </div>

        <div class = 'slide_content_info_game review'>
       ";
							 
											
											$count_responses = ((int)$answer -> product -> statistics -> good_reviews) + ((int)$answer -> product -> statistics -> bad_reviews);
								if($count_responses > 0){
								$responses_content = "Отзывы ($count_responses)";}
								else{$responses_content = "Отзывы (0)";}
									$result .= "
	 
		 
	 
		<div class=\"digiseller-reviews_content\">";
									if($resp_block = file_get_contents("http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/resp_block.php?id_goods=".$_GET["id"])){
									$result .= $resp_block;}
									$result .= "</div>
		 
                </div>
      <div class = 'slide_content_info_game discount_item'>
      Cкидка постоянным покупателям выдаются автоматически!
      </div>
              </div>
            </div>
        </div>
          
        <div class = 'right_block_item'>
          <div class = 'vk_head'>
            <img src = 'templates/0/images/vkhead.png' align='left' target='_blank'>
            <p>Вконтакте</p>
            <a href = '/'>vk.com/id364080456</a>
          </div>
          
          
          <div class = 'other_buy_info'>
          <div class = 'content_right_block_item relative clear'>
            <div class = 'inputs clear relative'>
              <div class = 'choose_payment relative clear'>
                <div class = 'choose_pick payment_pick'><span>WebMoney</span><i class = 'arrow_drop_choose icon'></i></div>
              </div>
			  
			  
           <div class=\"choose_curse relative clear\">
                <div class=\"choose_pick curse_pick\">  
				<span>
				Рубль
</span><i class = 'arrow_drop_choose icon'></i>
			  </form>
				
				</div>
              </div>

            <div class = 'drop_menu_pick payment_drop'>
            <div class = 'arrow_top_tooltip'></div>
            <ul class = 'menu_content'>
              <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent." &curr=PCR'>Яндекс деньги</a></li> 
			  <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent." &curr=QSR'>QIWI</a></li> 
              <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent."&curr=RCC'>Сбербанк</a></li> 
              <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent."&curr=RUB '>Терминал</a></li>
			  <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent." &curr=MTS'>МТС</a></li> 
			  <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent." &curr=BTC'>Bitcoin</a></li> 
			  <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent." &curr=BLN'>Билайн</a></li>
   			  <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent." &curr=PRR'>Почта России</a></li> 
			  <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent." &curr=BNK'>Интернет-банкинг</a></li>
 			  <li class = 'drop_li'><a href = 'http://www.oplata.info/asp/pay_wm.asp?id_d=".$product -> id."&amp;".$agent." &curr=PPR'>WM-карта</a></li> 
            </ul>
          </div>
		  
		 
			  
          <div class = 'drop_menu_pick curse_drop'>
            <div class = 'arrow_top_tooltip arrow-left-abs'></div>
            <ul class = 'menu_content' >
			<form action=\"type_rate.php\" method=\"post\">
			   	<select name=\"rt\" onchange=\"this.form.submit()\">
					<option selected=\"\">Выбрать</option>
						<option value=\"wmr\">Рубль</option>
						<option value=\"wmz\">Доллар</option>
						<option value=\"wme\">Евро</option>
						<option value=\"wmu\">Грн.</option>
						</select>
            </ul>
          </div>
		  
		 

            </div>
            <div class = 'last_buy'>
              <div class = 'head_last_buy'>Последняя покупка</div>
              <div class = 'last_buy_image relative'>
             <!-- последняя продажа -->
<div id=\"last_sale\">&nbsp;</div>
<!-- /последняя продажа -->
                <div class = 'back_hover'></div>
              </div>
            </div>

          </div>
          </div>

        </div>
        </div>
		
 
      </div>
    </div>
    </div>\n"; }}}
						 
						 
							
							
							
echo $result;
			?>			
	 
<?php }
// функция шаблонизации
tmp_open($tmp_type,$tmp_dir,$tmp_file,$head);
?>