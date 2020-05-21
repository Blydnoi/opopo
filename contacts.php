<?php
require_once "./inc/functions.php";

$tmp_type = "php";
$tmp_file = "0.tmp";
?>
<?php
// заголовок страницы, массив контактов
$head["title"] = "Контактная информация";
$GLOBALS["contacts"] = $contacts;
// функция вывода контента
function show_content(){
?>
			<!-- Список товаров -->
			<div class="digiseller-contacts">
			
			<h1>Контактная информация</h1>
			
				<div class="digiseller-breadcrumbs">
				<a href="./" title="Магазин">Магазин</a> > <strong>Контактная информация</strong>
				</div>
				
				<div class="digiseller-contacts-block">
					<?php
					$result = null;
					foreach($GLOBALS["contacts"] as $key => $val){
						if($key){
							switch($key){
								case "fio":
								$result = "<span class=\"digiseller-contacts-label\">Контактное лицо</span>: <span class=\"digiseller-contacts-value\">$val</span><br />\n";
								break;
								
								case "email":
								$result .= "\t\t\t\t\t<span class=\"digiseller-contacts-label\">e-Mail</span>: <span class=\"digiseller-contacts-value\"><a href=\"mailto:$val\">$val</a></span><br />\n";
								break;
								
								case "icq":
								$result .= "\t\t\t\t\t<span class=\"digiseller-contacts-label\">ICQ</span>: <span class=\"digiseller-contacts-value\"><img src=\"http://status.icq.com/online.gif?icq=$val&amp;img=5\" title=\"Статус ICQ пользователя\" /> $val</span><br />\n";
								break;
								
								case "skype":
								$result .= "\t\t\t\t\t<span class=\"digiseller-contacts-label\">Skype</span>: <span class=\"digiseller-contacts-value\"><a href=\"skype:$val?chat\">$val</a></span><br />\n";
								break;
								
								case "wmid":
								$result .= "\t\t\t\t\t<span class=\"digiseller-contacts-label\">wmid</span>: <span class=\"digiseller-contacts-value\">$val</span><br />\n";
								break;
								
								case "phone":
								$result .= "\t\t\t\t\t<span class=\"digiseller-contacts-label\">Телефон</span>: <span class=\"digiseller-contacts-value\">$val</span><br />\n";
								break;}}}
					
					echo $result;
					?>
				</div>			
	
				
			</div>
			<!-- end.Список товаров -->
<?php }
// функция шаблонизации
tmp_open($tmp_type,$tmp_dir,$tmp_file,$head);
?>