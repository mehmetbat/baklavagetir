<?php
// ============================================
// Baklava Getir — İçerik Verileri
// ============================================

// Hizmetler
$services = [
    'toptan-tedarik' => [
        'name'  => 'Toptan Tedarik',
        'slug'  => 'toptan-tedarik',
        'icon'  => 'inventory_2',
        'short' => 'Kafe, restoran, otel ve market için düzenli toptan baklava tedariki. Kademeli miktar indirimi.',
        'steps' => ['İletişim', 'Fiyat teklifi', 'Sipariş onayı', 'Üretim', 'Teslimat'],
    ],
    'hizli-teslimat' => [
        'name'  => 'Hızlı Teslimat',
        'slug'  => 'hizli-teslimat',
        'icon'  => 'local_shipping',
        'short' => 'İstanbul içi aynı gün teslimat, diğer illere anlaşmalı kargo ile güvenli gönderim.',
        'steps' => ['Sipariş', 'Taze üretim', 'Paketleme', 'Gönderim', 'Kapıda teslim'],
    ],
    'hediyelik-kutu' => [
        'name'  => 'Hediyelik Kutu',
        'slug'  => 'hediyelik-kutu',
        'icon'  => 'redeem',
        'short' => 'Bireysel ve kurumsal hediye için özel kutulu baklava setleri.',
        'steps' => ['Kutu seçimi', 'Ürün seçimi', 'Sipariş onayı', 'Paketleme', 'Teslimat'],
    ],
    'kurumsal-fatura' => [
        'name'  => 'Kurumsal Faturalı Satış',
        'slug'  => 'kurumsal-fatura',
        'icon'  => 'receipt_long',
        'short' => 'Firmalar için KDV dahil resmi faturalı satış. Cari hesap açma imkânı.',
        'steps' => ['Firma bilgisi', 'Sözleşme', 'Cari açılış', 'Sipariş', 'Faturalı teslimat'],
    ],
];

// Müşteri segmentleri
$brands = [
    'otel'          => ['name' => 'Oteller',             'slug' => 'otel',         'description' => 'Oda servisi, lobi ve restoran için düzenli baklava tedariki.'],
    'restoran'      => ['name' => 'Restoran & Kafe',     'slug' => 'restoran',     'description' => 'Menü sonu tatlı tabakları için çeşitli baklava seçenekleri.'],
    'market'        => ['name' => 'Market & Pastane',    'slug' => 'market',       'description' => 'Pastane ve marketler için toptan baklava ve tatlı tedariki.'],
    'kurumsal'      => ['name' => 'Kurumsal Firma',      'slug' => 'kurumsal',     'description' => 'Bayram ikramları ve çalışan/müşteri hediye kutusu siparişleri.'],
    'organizasyon'  => ['name' => 'Organizasyon Firmaları', 'slug' => 'organizasyon', 'description' => 'Düğün, nişan ve etkinlik organizasyonları için toplu baklava tedariki.'],
    'kargo'         => ['name' => 'Şehir Dışı Kargo',    'slug' => 'kargo',        'description' => 'Türkiye geneli anlaşmalı kargo ile güvenli gönderim.'],
];

// Sektörler (müşteri tipleri)
$sectors = [
    'otel'          => ['name' => 'Otel & Pansiyon',     'icon' => 'hotel',          'description' => 'Oda servisi, kahvaltı ve restoran için düzenli baklava tedariki.'],
    'kurumsal'      => ['name' => 'Kurumsal Firma',      'icon' => 'corporate_fare', 'description' => 'Bayram ikramları, çalışan ve müşteri hediyelik kutuları.'],
    'restoran'      => ['name' => 'Restoran',            'icon' => 'restaurant',     'description' => 'Menü sonu tatlı sunumları için tepsi ve porsiyon baklava tedariki.'],
    'kafe'          => ['name' => 'Kafe & Pastane',      'icon' => 'local_cafe',     'description' => 'Günlük taze baklava ve tatlı çeşitleri ile kafe vitrininizi zenginleştirin.'],
    'market'        => ['name' => 'Market & Bakkal',     'icon' => 'storefront',     'description' => 'Porsiyonlu ambalajlı baklava ile market raflarında satış.'],
    'organizasyon'  => ['name' => 'Düğün & Organizasyon','icon' => 'celebration',    'description' => 'Düğün, nişan, kına ve etkinliklerde toplu baklava tedariki.'],
    'hediyelik'     => ['name' => 'Hediyelik & E-ticaret','icon' => 'card_giftcard', 'description' => 'Bireysel hediyelik kutular ve e-ticaret için kargolanabilir ambalaj.'],
    'catering'      => ['name' => 'Catering Firması',    'icon' => 'lunch_dining',   'description' => 'Toplu yemek ve catering firmaları için tepsi baklava.'],
];

// Hizmet örnek senaryoları (gerçek referans yerine — tedarik modelimizi anlatır)
$projects = [
    [
        'name'     => 'Otel & Restoran Tedariki',
        'sector'   => 'OTEL',
        'location' => 'İstanbul',
        'capacity' => 'Haftalık düzenli tepsi ve porsiyon siparişi',
        'brand'    => 'Kafe-Restoran-Otel Tedarik',
        'image'    => 'img/baklava-etkinlik-catering.webp',
    ],
    [
        'name'     => 'Kurumsal Bayram Hediyesi',
        'sector'   => 'KURUMSAL',
        'location' => 'Türkiye Geneli',
        'capacity' => '50 adetten başlayan hediyelik kutu',
        'brand'    => 'Hediyelik Kutu Tedarik',
        'image'    => 'img/baklava-kutu-sunum.webp',
    ],
    [
        'name'     => 'Düğün & Organizasyon',
        'sector'   => 'ORGANİZASYON',
        'location' => 'İstanbul ve Çevre İller',
        'capacity' => 'Tepsi baklava ve ikramlık porsiyon',
        'brand'    => 'Toplu Etkinlik Tedarik',
        'image'    => 'img/baklava-vip-teslimat.webp',
    ],
];

// Sıkça Sorulan Sorular
$faqs = [
    [
        'q' => 'Toptan fiyat listesini nasıl alabilirim?',
        'a' => 'Telefon (' . SITE_PHONE . ') veya WhatsApp üzerinden bize ulaşın; güncel toptan fiyat listesini dakikalar içinde ileteceğiz. İletişim formunu doldurarak da teklif talep edebilirsiniz.',
    ],
    [
        'q' => 'Minimum sipariş miktarı nedir?',
        'a' => 'Tepsi baklavalar için minimum 2 tepsi, kilo bazlı siparişlerde 5 kg, hediyelik kutularda ise 10 kutudur. Büyük siparişlerde kademeli indirim uygulanır.',
    ],
    [
        'q' => 'İstanbul içi teslimat süreniz nedir?',
        'a' => 'İstanbul içi siparişler, onay ve hazırlık sonrası genellikle aynı gün veya ertesi gün teslim edilir. Sipariş yoğunluğuna göre süre değişebilir; net teslimat tarihini sipariş onayında bildiriyoruz.',
    ],
    [
        'q' => 'Diğer illere gönderim yapıyor musunuz?',
        'a' => 'Evet. Anlaşmalı kargo firmaları ile Türkiye geneli gönderim yapıyoruz. Kargoya uygun ambalaj uyguluyoruz; soğuk zincir gerektiren ürünlerde özel paketleme yapılır.',
    ],
    [
        'q' => 'Kurumsal faturalı satış yapıyor musunuz?',
        'a' => 'Evet. Firmalar için KDV dahil resmi faturalı satış yapıyoruz. Düzenli sipariş veren müşterilerimize cari hesap açma imkânı sunuyoruz.',
    ],
    [
        'q' => 'Baklavanın raf ömrü ne kadardır?',
        'a' => 'Kuru baklava çeşitleri oda sıcaklığında 3 gün tazeliğini korur. Sütlü ve soğuk baklava grubu +4°C dolapta 2 gün içinde tüketilmelidir. Her ürünün raf ömrü ürün detayında belirtilmiştir.',
    ],
    [
        'q' => 'Ödeme seçenekleri nelerdir?',
        'a' => 'Havale/EFT, kredi kartı ve kapıda ödeme seçenekleri mevcuttur. Kurumsal müşterilerimize vade ve cari hesap imkânı sunulur.',
    ],
    [
        'q' => 'Sipariş iptali ve iade politikanız nedir?',
        'a' => 'Üretime alınmamış siparişlerde iptal mümkündür. Gıda ürünü olması nedeniyle teslim edilen ürünlerde iade kabul edilmez; ancak kalite itirazlarında değişim ya da iade süreci başlatılır.',
    ],
];

// Blog yazıları
$blog_posts = [
    ['slug' => 'gaziantep-baklavasi-neyi-farkli-kilar',          'title' => 'Gaziantep Baklavasını Gerçekten Farklı Kılan 5 Unsur',      'excerpt' => 'Boz fıstık, sade yağ ve su yufkasının tılsımı: Dünyanın en ünlü baklavasının sırrı nedir?',           'date' => '2026-03-28', 'category' => 'Lezzet Kültürü'],
    ['slug' => 'kurumsal-baklava-hediye-rehberi',                'title' => 'Kurumsal Hediye Olarak Baklava: Neden Doğru Seçim?',         'excerpt' => 'Bayramdan yıl sonu hediyelerine kadar kurumsal marka prestijini yaratan baklava stratejileri.',        'date' => '2026-03-14', 'category' => 'Kurumsal'],
    ['slug' => 'baklava-catering-etkinlik-planlama',             'title' => 'Etkinliğinizde Baklava İkramı Nasıl Planlanır?',            'excerpt' => 'Gala, lansman ve resepsiyonlarda baklava servisi: Porsiyon hesabı, sunum ve lojistik ipuçları.',   'date' => '2026-02-28', 'category' => 'Etkinlik'],
    ['slug' => 'glutensiz-baklava-mumkun-mu',                   'title' => 'Glutensiz Baklava Mümkün mü? Özel Diyet Seçenekleri',       'excerpt' => 'Çölyak hastalığı olanlar için pirinç unu bazlı baklava ve düşük şekerli alternatifler.',            'date' => '2026-02-07', 'category' => 'Sağlıklı Yaşam'],
    ['slug' => 'toptan-baklava-fiyatlari-2026',                  'title' => 'Toptan Baklava Fiyatları 2026: Gerçek Maliyet Rehberi',     'excerpt' => 'Kurumsal alımlar için tepsi, kutu ve etkinlik bazlı baklava fiyatlandırma analizi.',               'date' => '2026-01-24', 'category' => 'Maliyet & Tedarik'],
    ['slug' => 'ramazan-bayrami-kurumsal-baklava-planlamasi',    'title' => 'Ramazan Bayramı\'nda Kurumsal Baklava Planlaması',          'excerpt' => 'Erken sipariş, özel ambalaj ve dağıtım lojistiği ile bayram ikramlarını mükemmel kılın.',          'date' => '2026-01-10', 'category' => 'Kurumsal'],
];

function get_services()    { global $services;    return $services; }
function get_service($s)   { global $services;    return $services[$s] ?? null; }
function get_brands()      { global $brands;      return $brands; }
function get_sectors()     { global $sectors;     return $sectors; }
function get_projects()    { global $projects;    return $projects; }
function get_faqs()        { global $faqs;        return $faqs; }
function get_blog_posts()  { global $blog_posts;  return $blog_posts; }
