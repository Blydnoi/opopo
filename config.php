<?php
require_once "variables.php";
// настройки шаблона
$inc_path = "./inc/";
$tmp_dir = "./templates/0/";

// общие настройки
// id продавца
$seller_id = $seller;
// тип валюты (по умолчанию)
$default_rt = "wmr";

// сортировка товаров (по умолчанию)
$default_order = $_GET['orderstr'];
// количество строк (по умолчанию)
$default_rows = 1000;
// id группы товаров (по умолчанию)
$default_gl = "0";
// URL логотипа
$logo = array($GLOBALS["tmp_dir"]."/img/logo_shop.png",true);
// горизонтальное меню (true - отображать, false - нет)
$hor_menu = true;
// форма поиска (true - отображать, false - нет)
$search_form = true;
// вертикальное меню (true - отображать, false - нет)
$ver_menu = true;
// отображение поисковой формы (true - отображать, false - нет)
$search_status = true;
// отображение верхнего меню (true - отображать, false - нет)
$top_menu_status = true;
// отображение списка категорий (true - отображать, false - нет)
$categories_status = true;

// главная страница
// отображаемая нумерация страниц
$main["pages"] = 5;
// размер изображения категории
$main["category_img_size"] = 130;
// размер изображения товара
$main["goods_img_size"] = 600;

// страница с листингом товаров
// количество товаров на странице
$listing["goods_count"] = 10;
// отображаемая нумерация страниц
$listing["pages"] = 3;
// размер изображения
$listing["img_size"] = 270;

// страница описания товара
// тип отображаемых отзывов
$info_goods["resp_block_dt"] = "good";
// количество строк
$info_goods["resp_block_row"] = 10;
// отображаемая нумерация страниц
$info_goods["resp_block_pages"] = 5;
// размер изображения
$info_goods["img_size"] = 270;

// страница контактов
$contacts["fio"] = "Имя";
$contacts["email"] = "ваш email ";
$contacts["skype"] = "ваш skype";
 
$contacts["wmid"] = "wmid";
// страница отзывов
// тип отображаемых отзывов
$responses["default_type"] = "good";
// отображаемая нумерация страниц
$responses["pages"] = 5;

// параметры поиска
// количество товаров на странице
$search["goods_count"] = 30;
// отображаемая нумерация страниц
$search["count_page"] = 5;
$search["img_size"] = 600;
//агент webmoney
$GLOBALS['agent'] = $seller_id;	

?>
