<?php
// Роутер для локальной проверки сайта встроенным сервером PHP. Повторяет правила tools/htaccess-rules.conf.
// Запуск из корня сайта:  php -S 127.0.0.1:8080 tools/router.php
if (PHP_SAPI !== "cli-server") {
	exit;
}

$root = dirname(__DIR__);
$uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

// Как на хостинге: служебные скрипты закрыты
if (strpos($uri, "/tools/") === 0 || preg_match('~^/(config|functions|catalog|data|header|footer)\.php$~', $uri)) {
	http_response_code(403);
	exit;
}
// Существующие файлы (картинки, стили, старые адреса *.php) сервер отдаёт сам
if ($uri !== "/" && is_file($root . $uri)) {
	return false;
}

chdir($root);
if (preg_match('~^/(table|chair)/?$~', $uri, $m)) {
	$_GET["type"] = $m[1];
	$script = "prodlist.php";
}
elseif (preg_match('~^/(table|chair)/([A-Za-z0-9_-]+)/?$~', $uri, $m)) {
	$_GET["name"] = $m[2];
	$script = "product.php";
}
elseif (preg_match('~^/(gallery|about|contact|address|certificates|sout|feedback)/?$~', $uri, $m)) {
	$script = $m[1] . ".php";
}
elseif ($uri === "/") {
	$script = "index.php";
}
else {
	http_response_code(404);
	$script = "404.php";
}
$_SERVER["SCRIPT_NAME"] = "/" . $script;
require $root . "/" . $script;
