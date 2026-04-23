<?php
/**
 * Dinamik Site Haritası (Sitemap XML)
 */
ini_set('memory_limit', '256M');
set_time_limit(120);

require_once 'inc/config.php';
require_once 'inc/functions.php';
require_once 'inc/data-products.php';
require_once 'inc/data-content.php';

$cache_file = __DIR__ . '/sitemap.xml';
$cache_ttl  = 86400; // 24 saat

if (isset($_GET['refresh']) && file_exists($cache_file)) unlink($cache_file);

if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_ttl) {
    header('Content-Type: application/xml; charset=utf-8');
    readfile($cache_file);
    exit;
}

ob_start();
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

$today    = date('Y-m-d');
$site_url = rtrim(SITE_URL, '/');

function add_url($path, $priority = '0.8', $changefreq = 'weekly') {
    global $today, $site_url;
    $loc = (strpos($path, 'http') === 0) ? $path : ($site_url . '/' . ltrim($path, '/'));
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc) . "</loc>\n";
    echo "    <lastmod>{$today}</lastmod>\n";
    echo "    <changefreq>{$changefreq}</changefreq>\n";
    echo "    <priority>{$priority}</priority>\n";
    echo "  </url>\n";
}

// 1. ANA SAYFALAR
add_url('', '1.0', 'daily');
add_url('urunler', '0.9', 'weekly');
add_url('hizmetler', '0.8', 'monthly');
add_url('hakkimizda', '0.7', 'monthly');
add_url('iletisim', '0.7', 'monthly');
add_url('sss', '0.6', 'monthly');
add_url('teklif-al', '0.6', 'monthly');
add_url('blog', '0.7', 'weekly');
add_url('kvkk', '0.3', 'yearly');
add_url('gizlilik', '0.3', 'yearly');

// 2. KATEGORİ SAYFALARI
foreach (get_product_categories() as $cs => $c) {
    add_url('urunler?kategori=' . $cs, '0.85', 'weekly');
}

// 3. ÜRÜN DETAY SAYFALARI (pretty URL)
foreach (get_products() as $product) {
    add_url('urun/' . $product['slug'], '0.8', 'monthly');
}

// 4. BLOG YAZILARI
foreach (get_blog_posts() as $post) {
    add_url('blog/' . $post['slug'], '0.7', 'monthly');
}

echo '</urlset>';

$xml_content = ob_get_clean();
file_put_contents($cache_file, $xml_content);

header('Content-Type: application/xml; charset=utf-8');
echo $xml_content;
