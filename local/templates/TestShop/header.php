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
	//    Переменные подключил в template_styles.scss
	//		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/_vars.min.css');

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

<div class="container">
	<div class="header">
		<div class="header_logo">
			<a href="/">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.jpg" alt=""></a>
		</div>
		<div class="header_content">
			<div class="header_content_row">
				<span>Вязаные игрушки <i>ручной работы</i></span>
			</div>
			<div class="header_content_row">
				<?php
				// Поиск по заголовкам - http://dev.1c-bitrix.ru/user_help/settings/search/components_2/search_title.php
				$APPLICATION->IncludeComponent(
					"bitrix:search.title",
					".default",
					array(
						"NUM_CATEGORIES" => "1",
						"TOP_COUNT" => "5",
						"ORDER" => "date",
						"USE_LANGUAGE_GUESS" => "Y",
						"CHECK_DATES" => "N",
						"SHOW_OTHERS" => "N",
						"PAGE" => "#SITE_DIR#search/index.php",
						"CATEGORY_0_TITLE" => "",
						"CATEGORY_0" => array(
							0 => "iblock_tyres_shop",
						),
						"COMPONENT_TEMPLATE" => ".default",
						"SHOW_INPUT" => "Y",
						"INPUT_ID" => "title-search-input",
						"CONTAINER_ID" => "title-search",
						"CATEGORY_0_iblock_tyres_shop" => array(
							0 => "6",
						)
					),
					false
				);
				?>
			</div>
			<div class="header_content_row">
				<?php
				$APPLICATION->IncludeComponent("bitrix:menu", "main_menu", array(
					"ALLOW_MULTI_SELECT" => "N",  // Разрешить несколько активных пунктов одновременно
					"CHILD_MENU_TYPE" => "left",  // Тип меню для остальных уровней
					"DELAY" => "N",  // Откладывать выполнение шаблона меню
					"MAX_LEVEL" => "1",  // Уровень вложенности меню
					"MENU_CACHE_GET_VARS" => array(  // Значимые переменные запроса
						0 => "",
					),
					"MENU_CACHE_TIME" => "3600",  // Время кеширования (сек.)
					"MENU_CACHE_TYPE" => "A",  // Тип кеширования
					"MENU_CACHE_USE_GROUPS" => "Y",  // Учитывать права доступа
					"ROOT_MENU_TYPE" => "top",  // Тип меню для первого уровня
					"USE_EXT" => "N",  // Подключать файлы с именами вида .тип_меню.menu_ext.php
				),
					false
				); ?>
			</div>
		</div>
		<div class="header_cart">
			<a class="header_cart_auth" href="#">
				<svg>
					<use xlink:href="#icons8-манускрипт-50"></use>
				</svg>
				Войти
			</a>
			<?php
			// Ссылка на корзину
			$APPLICATION->IncludeComponent(
				"bitrix:sale.basket.basket.line",
				"small_basket",
				array(
					"COMPONENT_TEMPLATE" => "small_basket",
					"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
					"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
					"SHOW_NUM_PRODUCTS" => "Y",
					"SHOW_TOTAL_PRICE" => "Y",
					"SHOW_EMPTY_VALUES" => "Y",
					"SHOW_PERSONAL_LINK" => "Y",
					"PATH_TO_PERSONAL" => SITE_DIR."personal/",
					"SHOW_AUTHOR" => "N",
					"PATH_TO_AUTHORIZE" => "",
					"SHOW_REGISTRATION" => "Y",
					"PATH_TO_REGISTER" => SITE_DIR."login/",
					"PATH_TO_PROFILE" => SITE_DIR."personal/",
					"SHOW_PRODUCTS" => "N",
					"POSITION_FIXED" => "N",
					"HIDE_ON_BASKET_PAGES" => "N"
				),
				false
			);
			?>
		</div>
	</div>
</div>




