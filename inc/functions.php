<?php
// ============================================
// Yardımcı Fonksiyonlar
// ============================================
require_once __DIR__ . '/config.php';

/**
 * Türkçe slug oluştur
 */
function slugify($text) {
    if (empty($text)) return '';
    $tr = ['ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','ç','Ç',' ','_'];
    $en = ['s','s','i','i','g','g','u','u','o','o','c','c','-','-'];
    $text = str_replace($tr, $en, $text);
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\-]/', '', $text);
    $text = preg_replace('/-+/', '-', $text);
    return trim($text, '-');
}

/**
 * Dinamik sayfa, blog, ürün URL oluşturucu
 */
function get_page_url($type, $slug = '') {
    $base = rtrim(SITE_URL, '/');
    if ($type === 'urun' && $slug) return $base . '/urun/' . $slug;
    if ($type === 'blog' && $slug) return $base . '/blog/' . $slug;
    if ($type === 'sayfa' && $slug) return $base . '/' . $slug;
    return $base . '/';
}

/**
 * Breadcrumb oluştur
 */
function render_breadcrumb($items) {
    $schema_items = [];
    echo '<nav aria-label="Breadcrumb"><ul class="breadcrumb">';
    foreach ($items as $i => $item) {
        $pos = $i + 1;
        if (isset($item['url'])) {
            echo '<li><a href="' . $item['url'] . '">' . $item['text'] . '</a></li>';
            $item_url = (strpos($item['url'], 'http') === 0) ? $item['url'] : (SITE_URL . '/' . ltrim($item['url'], '/'));
            $schema_items[] = '{"@type":"ListItem","position":' . $pos . ',"name":"' . $item['text'] . '","item":"' . $item_url . '"}';
        } else {
            echo '<li>' . $item['text'] . '</li>';
            $schema_items[] = '{"@type":"ListItem","position":' . $pos . ',"name":"' . $item['text'] . '"}';
        }
    }
    echo '</ul></nav>';
    
    // Schema.org BreadcrumbList
    echo '<script type="application/ld+json">{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[' . implode(',', $schema_items) . ']}</script>';
}

/**
 * Schema.org LocalBusiness
 */
function render_local_business_schema($name, $url, $locality = 'Pendik', $region = 'İstanbul') {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => $name,
        'url' => SITE_URL . '/' . $url,
        'telephone' => SITE_PHONE,
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => $locality,
            'addressRegion' => $region,
            'addressCountry' => 'TR'
        ],
        'priceRange' => '$$$$',
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => '4.9',
            'reviewCount' => '312'
        ]
    ];
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
}

/**
 * FAQPage schema
 */
function render_faq_schema($faqs) {
    $entities = [];
    foreach ($faqs as $faq) {
        $entities[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']]
        ];
    }
    $schema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $entities];
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
}

/**
 * Dinamik meta tag oluştur
 */
function render_meta($title, $description, $canonical = '', $keywords = '') {
    echo '<title>' . htmlspecialchars($title) . '</title>' . PHP_EOL;
    echo '<meta name="description" content="' . htmlspecialchars($description) . '">' . PHP_EOL;
    if ($keywords) echo '<meta name="keywords" content="' . htmlspecialchars($keywords) . '">' . PHP_EOL;
    if ($canonical) {
        $href = (strpos($canonical, 'http') === 0) ? $canonical : (SITE_URL . '/' . ltrim($canonical, '/'));
        echo '<link rel="canonical" href="' . $href . '">' . PHP_EOL;
    }
}


/**
 * Lead capture form
 */
function render_lead_form($title = 'Toptan Sipariş Teklif Al', $subnet = 'Fiyat listesi ve sipariş onayı için dakikalar içinde dönüş yapıyoruz.', $location = '') {
    ?>
    <div class="contact-form-card" style="position:sticky;top:100px;">
        <h3><?= $title ?></h3>
        <p style="font-size:0.9rem;color:#718096;margin-bottom:20px;"><?= $subnet ?></p>
        <form class="lead-form" onsubmit="sendToWhatsApp(event, this)">
            <?php if ($location): ?>
            <input type="hidden" name="location" value="<?= htmlspecialchars($location) ?>">
            <?php endif; ?>
            <div class="input-group">
                <label>AD SOYAD *</label>
                <input type="text" class="input-control" name="ad_soyad" placeholder="Adınız Soyadınız" required>
            </div>
            <div class="input-group">
                <label>MÜŞTERİ TİPİ</label>
                <select class="input-control" name="musteri_tipi">
                    <option>Kafe / Restoran</option>
                    <option>Otel / Pansiyon</option>
                    <option>Market / Pastane</option>
                    <option>Kurumsal Firma</option>
                    <option>Düğün / Organizasyon</option>
                    <option>Bireysel</option>
                    <option>Diğer</option>
                </select>
            </div>
            <div class="input-group">
                <label>ÜRÜN / ÇEŞİT</label>
                <input type="text" class="input-control" name="urun" placeholder="Örn: Fıstıklı Baklava">
            </div>
            <div class="input-group">
                <label>TAHMİNİ MİKTAR</label>
                <input type="text" class="input-control" name="miktar" placeholder="Örn: 10 kg veya 5 tepsi">
            </div>
            <div class="input-group">
                <label>TELEFON *</label>
                <input type="tel" class="input-control" name="telefon" placeholder="05xx xxx xx xx" required>
            </div>
            <button type="submit" class="btn-primary btn-full" style="margin-top:10px;">WHATSAPP İLE GÖNDER</button>
        </form>
        <div class="lead-form-wa">
            <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp"><span class="material-symbols-outlined">chat</span>WhatsApp'tan Yaz</a>
        </div>
    </div>
    <?php
}

/**
 * Section header
 */
function render_section_header($title, $subtitle = '', $center = false) {
    $align = $center ? 'text-align:center;' : '';
    echo '<div class="section-header" style="' . $align . '">';
    echo '<h2>' . $title . '</h2>';
    if ($subtitle) echo '<p class="section-subtitle">' . $subtitle . '</p>';
    echo '<div class="divider"' . ($center ? ' style="margin:16px auto 0;"' : ' style="margin-top:16px;"') . '></div>';
    echo '</div>';
}

/**
 * Alt kısım kategori listesi (SEO iç link silosu)
 */
function render_bottom_regions() {
    $cats = get_product_categories();
    echo '<section style="padding:60px 0;background:var(--bg-section);border-top:1px solid #E2E8F0;">';
    echo '<div class="container">';
    echo '<h2 style="font-size:1.75rem;color:var(--primary);margin-bottom:32px;text-align:center;">Tüm Baklava Kategorileri</h2>';
    echo '<div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;">';
    foreach ($cats as $cs => $c) {
        $count = count(get_products($cs));
        echo '<a href="'.get_page_url('sayfa','urunler').'?kategori='.$cs.'" style="display:inline-flex;align-items:center;gap:6px;background:#fff;border:1px solid #E2E8F0;padding:10px 18px;border-radius:30px;color:#2D3748;text-decoration:none;font-weight:600;font-size:.92rem;"><span class="material-symbols-outlined" style="font-size:18px;">'.$c['icon'].'</span>'.$c['name'].' <span style="opacity:.6;font-weight:400;">('.$count.')</span></a>';
    }
    echo '</div></div></section>';
}

