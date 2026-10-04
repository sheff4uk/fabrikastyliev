<?php
// Пересобирает sitemap.xml из data.php. Запускать из корня сайта после добавления моделей:
//   php tools/make-sitemap.php
if (PHP_SAPI !== "cli") {
	exit;
}
chdir(__DIR__ . "/..");
include "data.php";

$base = "https://fabrikaprestol.ru";
$pages = array(
	"/" => "1.0",
	"/table" => "0.9",
	"/chair" => "0.9",
	"/gallery" => "0.7",
	"/address" => "0.7",
	"/contact" => "0.6",
	"/about" => "0.5",
	"/certificates" => "0.3",
	"/sout" => "0.2",
);
foreach ($products as $t => $list) {
	foreach ($list as $key => $v) {
		$pages["/{$t}/{$key}"] = "0.8";
	}
}

$date = date("Y-m-d");
$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
foreach ($pages as $path => $priority) {
	$xml .= "\t<url><loc>" . htmlspecialchars($base . $path, ENT_XML1) . "</loc><lastmod>{$date}</lastmod><priority>{$priority}</priority></url>\n";
}
$xml .= "</urlset>\n";
file_put_contents("sitemap.xml", $xml);
echo "sitemap.xml: " . count($pages) . " адресов\n";
