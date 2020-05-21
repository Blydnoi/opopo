<?php
require_once "./config.php";
require_once $inc_path."functions.php";

$tmp_type = "php";
$tmp_file = "0.tmp";
?>
<?php
session_start();
// проверка агентского ID
get_agent_id();

// заголовок страницы
$head["title"] = "О магазине";

// функция вывода контента
function show_content() {
?>
<div id="main_data">
<h3 class="about">Здесь приведены наиболее частые вопросы и ответы на них:</h3>
<!--content-->
		<br><br>
<font color="green">Вопрос: </font>Как мне купить товар?</p>
<font color="red">Ответ: </font>Выбираете нужный товар и нажимаете под ним кнопку "Оплатить"</p><br>
<font color="green">Вопрос: </font>Как я получу товар после оплаты?</p>
<font color="red">Ответ: </font>Как только Вы оплатите товар, он придет Вам на почту. Также Ваши покупки можете посмотреть <a href="http://www.oplata.info/delivery/delivery.asp">тут</a></p><br>
<font color="green">Вопрос: </font>Есть какие-либо гарантия на предоставляемый товар?</p>
<font color="red">Ответ: </font>На ключи/гифты гарантия пожизненная. На аккаунты и т.п. гарантия только на момент продажи<br><br>
<font color="green">Вопрос: </font>Если я часто покупаю у Вас товар, могу ли я получить скидку?</p>
<font color="red">Ответ: </font>Да, практически на весь товар предоставляются скидки в зависимости от кол-ва совершенных Вами покупок<br><br>
<font color="green">Вопрос: </font>Могу ли я получать скидку при оставлении положительного отзыва после покупки товара?</p>
<font color="red">Ответ: </font>Да, после того как Вы оплатили товар, можете оставить положительный отзыв и получить 5-8% от стоимости товара<br><br>
<font color="green">Вопрос: </font>Я купил аккаунт, но не могу войти в него, что делать?</p>
<font color="red">Ответ: </font>В течении 2 часов с момента продажи Вы можете связаться с нами для решения данной проблемы<br><br>
		<!--/content--></div>
<?php }
// функция шаблонизации
tmp_open("php", $tmp_dir, $tmp_file, $head);
?>