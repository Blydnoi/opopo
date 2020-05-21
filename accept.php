<?php
require_once "./inc/functions.php";

$tmp_type = "php";
$tmp_file = "0.tmp";
?>
<?php
$head["title"] = "Соглашение";
function show_content(){
$titles = "Соглашение";
$tmp_dir = "/templates/0/";
?>
			<h1><?php echo $titles ?></h1>
			
			<div class="digiseller-breadcrumbs">
            	<a href="/">Главная страница</a> &gt; <strong><?php echo $titles ?></strong>
            </div>
 
			<div class="acceptBoxing">
				<div class="acBtop">Покупая товар в нашем магазине, Вы соглашаетесь со следующими правилами!</div>
				<div class="acceptBox">
					<div class="pageBleft"><span style="background:#F2CA06;">1</span></div>
					<div class="pageBright">Гарантия на игровые аккаунты только на момент продажи!(После того как товар оказался в Ваших руках, мы за него не несем никакой ответственности)</div>
				</div>
				
				<div class="acceptBox">
					<div class="pageBleft"><span style="background:#B7C1CA;">2</span></div>
					<div class="pageBright">Аккаунты, которые имеют доступ к почте, Вами должны провериться в течение 10 минут! Если Вы написали в Тех.Поддержку по поводу неработоспособности более чем через 10 минут, то это будет расценено как кража аккаунта и полная клевета с Вашей стороны (Замен в таком случает производиться не будет!!)</div>
				</div>
				
				<div class="acceptBox">
					<div class="pageBleft"><span style="background:#6F4D1B;">3</span></div>
					<div class="pageBright">Если Вы напишите отзыв, который содержит клевету, Мы вправе Вам выдать блокировку (Совершать покупки в магазине Вы больше не сможете)</div>
				</div>
				
				<div class="acceptBox">
					<div class="pageBleft"><span>4</span></div>
					<div class="pageBright">В случае, если Вы оставили отрицательный отзыв, но полученный товар рабочий, мы так же вправе выдать Вам запрет на дальнейшие покупки в магазине  </div>
				</div>
				
				<div class="acceptBox">
					<div class="pageBleft"><span>5</span></div>
					<div class="pageBright">На все ключи, находящиеся в магазине распространяется пожизненная гарантия!</div>
				</div>
				
				<div class="acceptBox">
					<div class="pageBleft"><span>6</span></div>
					<div class="pageBright">Претензии на счет ключей не принимаются не в каком виде (Это будет расценено как обман, и мы вправе Вам выдать запрет на дальнейшие покупки в магазине  )</div>
				</div>
				
				<div class="acceptBox">
					<div class="pageBleft"><span>7</span></div>
					<div class="pageBright">Для своего оправдания рекомендуем записывать видео с момента покупки до полной проверки полученного товара!</div>
				</div>
				
				<div class="acceptBox">
					<div class="pageBleft"><span>8</span></div>
					<div class="pageBright">
						Форма заявки в ТЕХ.Поддержку для устранение конфликта с магазином:
						<ul>
						<li>Приветствие</li>
						<li>Описать всю сущность Вашей проблемы</li>
						<li>Как Вы хотите, чтобы Мы решили Вашу проблему (Все требования в пределах разумного)</li>
						</ul>
					</div>
				</div>
				
				<div class="acceptBox" style="border-top:1px #EDECEC solid;">
					<div class="pageBleft"></div>
					<div class="pageBright">
						<strong>Так же Мы рекомендуем Вам почитать следующие инструкции:</strong>
						 	<br />Защита купленного: <a href="/">Инструкция</a>
					</div>
				</div>
			</div>
			
			
<?php }
tmp_open($tmp_type,$tmp_dir,$tmp_file,$head);
?>