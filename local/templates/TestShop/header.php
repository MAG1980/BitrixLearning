<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
?>
<!doctype html>
<html lang="ru">
<head>
	<?

	use Bitrix\Main\Page\Asset;

	//Подключение JS
	//В SITE_TEMPLATE_PATH хранится путь к директории с шаблоном сайта
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery-3.6.4.min.js');
	//Подключение CSS
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/bootstrap-grid.min.css');

	//В том числе автоматически подключает style.css и template_styles.css шаблона сайта,
	//а также стили и скрипты JS внутри компонентов
	$APPLICATION->ShowHead();
	?>
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0">
	<title><?php $APPLICATION->ShowTitle() ?></title>
</head>
<body>
<?php
$APPLICATION->ShowPanel();
?>
