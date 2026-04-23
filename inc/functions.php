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
 * Dinamik SEO URL oluşturucu
 */
function get_bolge_url($il_slug, $ilce_slug = '', $mahalle_slug = '', $marka_slug = '') {
    $base = rtrim(SITE_URL, '/');
    if ($marka_slug) {
        $url = $base . '/' . slugify($marka_slug) . '-vrf/' . $il_slug;
    } else {
        $url = $base . '/vrf-klima/' . $il_slug;
    }
    
    if ($ilce_slug) {
        $url .= '/' . $ilce_slug;
        if ($mahalle_slug) {
            $url .= '/' . $mahalle_slug;
        }
    }
    return $url;
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
 * Hizmet bölgelerini getir (turkey.php'den)
 */
function get_service_regions() {
    return ['istanbul', 'kocaeli', 'sakarya', 'yalova'];
}

/**
 * İl verisi getir
 */
function get_il_data($il_slug) {
    global $turkey_data;
    if (empty($turkey_data)) {
        require_once __DIR__ . '/../turkey.php';
    }
    if (isset($turkey_data[$il_slug])) {
        return $turkey_data[$il_slug];
    }
    return null;
}

/**
 * İlçe verisi getir
 */
function get_ilce_data($il_slug, $ilce_slug) {
    $il = get_il_data($il_slug);
    if ($il && isset($il['ilceler'][$ilce_slug])) {
        return $il['ilceler'][$ilce_slug];
    }
    return null;
}

/**
 * Bu ilçe SEO ve hizmet odağında mı? (OSB ve Çevre ilçeler)
 */
function is_odak_ilce($ilce_slug) {
    $odaklar = [
        'pendik', 'tuzla', 'kartal', 'maltepe', 'sultanbeyli', 'sancaktepe',
        'gebze', 'dilovasi', 'cayirova', 'kartepe', 'izmit', 'basiskele',
        'arifiye', 'hendek', 'sogutlu', 'karasu', 'adapazari', 'erenler',
        'altinova', 'ciftlikkoy'
    ];
    return in_array($ilce_slug, $odaklar);
}

/**
 * Tüm hizmet illlerini getir
 */
function get_all_service_iller() {
    global $turkey_data;
    if (empty($turkey_data)) {
        require_once __DIR__ . '/../turkey.php';
    }
    $iller = [];
    $service_slugs = get_service_regions();
    foreach ($service_slugs as $slug) {
        if (isset($turkey_data[$slug])) {
            $iller[$slug] = $turkey_data[$slug];
        }
    }
    return $iller;
}

/**
 * Lead capture form
 */
function render_lead_form($title = 'Ücretsiz Keşif ve Teklif Al', $subnet = 'Projeniz için 24 saat içinde ücretsiz kapasite ön raporu.', $location = '') {
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
                <label>PROJE TİPİ</label>
                <select class="input-control" name="proje_tipi">
                    <option>Fabrika / Üretim Tesisi</option>
                    <option>Otel / Turizm</option>
                    <option>Plaza / Ofis</option>
                    <option>AVM / Mağaza</option>
                    <option>Villa / Rezidans</option>
                    <option>Hastane / Sağlık</option>
                    <option>Okul / Eğitim</option>
                    <option>Diğer</option>
                </select>
            </div>
            <div class="input-group">
                <label>ALAN (M²)</label>
                <input type="number" class="input-control" name="alan" placeholder="Örn: 1500">
            </div>
            <div class="input-group">
                <label>TAHMİNİ ALAN (M²)</label>
                <input type="number" class="input-control" name="alan" placeholder="Örn: 2500">
            </div>
            <div class="input-group">
                <label>TELEFON *</label>
                <input type="tel" class="input-control" name="telefon" placeholder="05xx xxx xx xx" required>
            </div>
            <button type="submit" class="btn-primary btn-full" style="margin-top:10px;">WHATSAPP İLE GÖNDER</button>
        </form>
        <div class="lead-form-wa">
            <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp"><span class="material-symbols-outlined">chat</span>WhatsApp Danışma</a>
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
 * Alt kısım bölge listesi SEO eklentisi
 */
function render_bottom_regions() {
    $iller = get_all_service_iller();
    echo '<section style="padding:60px 0;background:var(--bg-section);border-top:1px solid #E2E8F0;">';
    echo '<div class="container">';
    echo '<h2 style="font-size:1.75rem;color:var(--primary);margin-bottom:32px;text-align:center;">Hizmet Bölgelerimiz</h2>';
    echo '<div class="grid-12" style="gap:24px;">';
    foreach ($iller as $il_slug => $il_data) {
        echo '<div style="grid-column:span 3;">';
        echo '<h3 style="font-size:1.2rem;margin-bottom:16px;"><a href="'.get_bolge_url($il_slug).'" style="color:var(--primary);">'.$il_data['name'].' VRF Klima</a></h3>';
        echo '<ul style="list-style:none;padding:0;margin:0;">';
        foreach ($il_data['ilceler'] as $ilce_slug => $ilce_data) {
            echo '<li style="margin-bottom:8px;"><a href="'.get_bolge_url($il_slug, $ilce_slug).'" style="color:#718096;text-decoration:none;font-size:0.95rem;">› '.$ilce_data['name'].'</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    echo '</div></div></section>';
}

/**
 * Bölge Sayfaları için SEO Odaklı Dinamik İçerik Blokları
 */
function render_seo_blocks($il_name, $ilce_name, $mahalle_name, $klima_suffix, $il_slug, $ilce_slug, $mahalle_slug, $marka_slug) {
    // Kurumsal veriler
    $aylar_tr = ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'];
    $current_month = $aylar_tr[date('n') - 1];
    $current_year = date('Y');
    
    // Konum isimlendirmeleri
    $bolge_adi = $mahalle_name ? "$mahalle_name, $ilce_name" : ($ilce_name ? "$ilce_name, $il_name" : $il_name);
    $kisa_bolge = $mahalle_name ?: ($ilce_name ?: $il_name);
    
    // Tip tespiti: İstatistikleri gerçekçi kılmak için (İl, İlçe, Mahalle)
    $seed = crc32($il_slug . $ilce_slug . $mahalle_slug . $marka_slug);
    
    if ($mahalle_name) {
        // Mahalle seviyesi
        $memnuniyet = 98 + ($seed % 2); // 98-99
        $montaj_sayisi = 4 + ($seed % 6); // 4-9
    } elseif ($ilce_name) {
        // İlçe seviyesi
        $memnuniyet = 96 + ($seed % 3); // 96-98
        $montaj_sayisi = 18 + ($seed % 28); // 18-45
    } else {
        // İl seviyesi
        $memnuniyet = 95 + ($seed % 3); // 95-97
        $montaj_sayisi = 120 + ($seed % 80); // 120-199
    }
    
    // Popüler ürünleri seç (Rastgele 3 ürün)
    $all_products = get_products();
    $pop_idx = $seed % max(1, count($all_products) - 3);
    $popular_products = array_slice($all_products, $pop_idx, 3);
    
    ?>
    <div style="margin-top:40px;padding:32px;background:#F7FAFC;border-radius:12px;border:1px solid #E2E8F0;">
        <!-- Hedef İstatistikler -->
        <p style="font-size:1rem;color:#2D3748;margin-bottom:20px;">
            <span class="material-symbols-outlined" style="font-size:1.4rem;vertical-align:middle;color:#48bb78;">verified</span>
            Bölge memnuniyet oranımız: <strong>%<?= $memnuniyet ?></strong> | Son 30 günde <strong><?= $bolge_adi ?></strong> ve çevresinde <strong><?= $montaj_sayisi ?></strong> yetkili <?= $klima_suffix ?> montaj, servis ve periyodik bakım işlemi başarıyla tamamlandı.
        </p>

        <!-- İhtiyaç Bağlantısı -->
        <p style="font-size:1rem;color:#4A5568;margin-bottom:20px;line-height:1.7;">
            <span class="material-symbols-outlined" style="font-size:1.4rem;vertical-align:middle;color:#4299e1;">apartment</span>
            <strong><?= $kisa_bolge ?> bölgesinin</strong> iklim koşulları ve mimari yapı grafiği (konut yoğunluğu, ticari plazalar ve sanayi alanları) göz önüne alındığında, yüksek enerji tasarrufu sağlayan <?= $klima_suffix ?> sistemlerimiz; akıllı iklimlendirme sensörleri ve taze hava entegrasyonuyla iç mekan hava kalitenizi maksimize etmek için bölgeye tam uyum sağlar.
        </p>

        <!-- Kampanya & Dönemsel Etki -->
        <p style="font-size:1rem;color:#4A5568;margin-bottom:20px;line-height:1.7;">
            <span class="material-symbols-outlined" style="font-size:1.4rem;vertical-align:middle;color:#ed8936;">campaign</span>
            <strong>Kampanya — <?= $current_month ?> <?= $current_year ?>:</strong> <?= $kisa_bolge ?> bölgesine özel <?= $klima_suffix ?> donanımlarında avantajlı kampanya fiyatları stoklarımızdadır. Yaz veya kış sezonu yoğunlukları başlamadan, doğrudan keşif randevusu oluşturabilir ve profesyonel mühendislik ekibimizin özel indirimlerinden faydalanabilirsiniz.
        </p>

        <!-- Bölgesel Satış Argümanı -->
        <p style="font-size:1rem;color:#4A5568;line-height:1.7;">
            <span class="material-symbols-outlined" style="font-size:1.4rem;vertical-align:middle;color:#3182ce;">local_shipping</span>
            <strong>Bölgesel Lojistik & Mühendislik:</strong> <?= $bolge_adi ?> sınırlarındaki oteller, alışveriş merkezleri, fabrika üretim sahaları, plazalar ve villa projeleri için kurumsal kapasite raporlama, ücretsiz AutoCAD borulama çizimi ve anahtar teslim kurulum alanında 7/24 hizmetinizdeyiz. Pendik operasyon merkezimiz üzerinden bölgenize garantili ve çok daha hızlı müdahale gerçekleştiriyoruz.
        </p>
    </div>

    <!-- Popüler Tercihler Listesi -->
    <div style="margin-top:32px;">
        <h4 style="font-size:1.25rem;color:var(--primary);margin-bottom:16px;">🔥 <?= $kisa_bolge ?> Bölgesindeki Popüler <?= $klima_suffix ?> Modelleri</h4>
        <div style="display:flex;gap:12px;flex-wrap:wrap;">
            <?php foreach ($popular_products as $p): ?>
            <a href="<?= get_page_url('urun', $p['slug']) ?>" style="display:inline-flex;align-items:center;gap:8px;background:#fff;border:1px solid #E2E8F0;padding:8px 16px;border-radius:30px;color:#4A5568;text-decoration:none;font-size:0.9rem;font-weight:600;box-shadow:0 2px 4px rgba(0,0,0,0.02);transition:all .2s;" onmouseover="this.style.borderColor='var(--secondary)';this.style.color='var(--secondary)';" onmouseout="this.style.borderColor='#E2E8F0';this.style.color='#4A5568';">
                <span class="material-symbols-outlined" style="font-size:1.1rem;color:var(--secondary);">trending_up</span> <?= $p['name'] ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}
