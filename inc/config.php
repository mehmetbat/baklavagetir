<?php
// ============================================
// Baklava Getir — Site Konfigürasyonu
// ============================================

// Base URL — localhost'ta dinamik, prodüksiyon'da sabit
$is_local = in_array($_SERVER['HTTP_HOST'] ?? '', ['localhost', '127.0.0.1', '127.0.0.1:8002', 'localhost:8002', 'localhost:8080', '127.0.0.1:8080']);
$base_url = $is_local
    ? 'http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '/'
    : 'https://baklavagetir.com/';

define('SITE_NAME', 'Baklava Getir');
define('SITE_TAGLINE', 'Toptan Baklava ve Tatlı Tedariki');
define('SITE_URL', rtrim($base_url, '/'));
define('SITE_DOMAIN', 'baklavagetir.com');
define('SITE_PHONE', '0532 622 11 55');
define('SITE_PHONE_LINK', 'tel:+905326221155');
define('SITE_WHATSAPP', '0532 622 11 55');
define('SITE_WHATSAPP_LINK', 'https://wa.me/905326221155');
define('SITE_EMAIL', 'siparis@baklavagetir.com');
define('SITE_ADDRESS', 'Levent, Beşiktaş / İstanbul');
define('SITE_COMPANY', 'Baklava Getir Gıda A.Ş.');
define('SITE_YEAR', date('Y'));

// Teslimat bölgeleri
define('SERVICE_CITIES', ['İstanbul Avrupa', 'İstanbul Anadolu', 'Kocaeli', 'Bursa']);
define('SERVICE_CITIES_TEXT', 'İstanbul, Kocaeli ve Bursa');

// Ana menü
function get_main_menu() {
    return [
        ['url' => '/',           'text' => 'Ana Sayfa',     'id' => 'anasayfa'],
        ['url' => '/urunler',    'text' => 'Ürünler',       'id' => 'urunler'],
        ['url' => '/hizmetler',  'text' => 'Hizmetlerimiz', 'id' => 'hizmetler'],
        ['url' => '/hakkimizda', 'text' => 'Hakkımızda',    'id' => 'hakkimizda'],
        ['url' => '/sss',        'text' => 'SSS',           'id' => 'sss'],
        ['url' => '/blog',       'text' => 'Blog',          'id' => 'blog'],
        ['url' => '/iletisim',   'text' => 'İletişim',      'id' => 'iletisim'],
    ];
}

// Aktif sayfa tespiti
function is_active_page($page_id) {
    global $active_page;
    return (isset($active_page) && $active_page === $page_id) ? 'active' : '';
}
