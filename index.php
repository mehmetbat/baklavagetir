<?php
$active_page   = 'anasayfa';
$page_title    = 'Baklava Getir | Toptan Baklava — Gaziantep Baklavası Tedariki';
$page_description = 'Toptan baklava ve tatlı tedariki. 10 kategori, 47 çeşit. Fiyat listesi ve hızlı sipariş için arayın veya WhatsApp\'tan yazın.';
$page_keywords = 'toptan baklava, baklava tedarikçisi, gaziantep baklavası, toptan tatlı, kurumsal baklava, baklava fiyat';
$page_canonical = 'index.php';

require_once 'inc/functions.php';
require_once 'inc/data-products.php';
require_once 'inc/data-content.php';
require_once 'inc/header.php';

// Organization Schema
$org_schema = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'FoodEstablishment',
    'name'     => 'Baklava Getir — Toptan Baklava',
    'url'      => SITE_URL,
    'telephone'=> SITE_PHONE,
    'servesCuisine' => 'Turkish Baklava',
    'address'  => ['@type' => 'PostalAddress', 'streetAddress' => 'Levent', 'addressLocality' => 'Beşiktaş', 'addressRegion' => 'İstanbul', 'postalCode' => '34330', 'addressCountry' => 'TR'],
    'areaServed' => array_map(fn($c) => ['@type' => 'State', 'name' => $c], SERVICE_CITIES)
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo '<script type="application/ld+json">' . $org_schema . '</script>';
?>

<!-- Hero -->
<section class="hero">
    <div class="hero-blob"></div>
    <div class="container">
        <div class="grid-12" style="align-items:center;">
            <div class="hero-content" style="grid-column:span 7;">
                <div class="badge"><span></span>TOPTAN BAKLAVA TEDARİKİ</div>
                <h1>Toptan Baklava<br>Siparişiniz <span>Telefon Kadar Yakın</span></h1>
                <p class="hero-desc">10 kategori, 47 çeşit baklava ve tatlı. İstanbul içi aynı gün teslimat, diğer illere kargo. Fiyat listesi ve sipariş için hemen arayın ya da WhatsApp'tan yazın — dakikalar içinde dönüş.</p>
                <div class="hero-cta">
                    <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary btn-lg"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">call</span>Hemen Ara: <?= SITE_PHONE ?></a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-outline btn-lg"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">chat</span>WhatsApp'tan Yaz</a>
                </div>
                <div class="hero-badges">
                    <div class="hero-badge-item"><span class="material-symbols-outlined">local_shipping</span>Aynı Gün Teslimat (İstanbul)</div>
                    <div class="hero-badge-item"><span class="material-symbols-outlined">inventory_2</span>Diğer İllere Kargo</div>
                    <div class="hero-badge-item"><span class="material-symbols-outlined">receipt_long</span>Kurumsal Faturalı Satış</div>
                </div>
            </div>
            <div style="grid-column:span 5;display:flex;align-items:center;">
                <div class="hero-image">
                    <img src="img/hero-baklava.webp" alt="Toptan Baklava — Gaziantep Fıstıklı Çeşitler" loading="eager" decoding="async">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- İstatistikler -->
<section class="section-stats">
    <div class="container">
        <div class="grid-12">
            <div class="stat-card" style="grid-column:span 2;text-align:center;">
                <div class="icon"><span class="material-symbols-outlined">category</span></div>
                <h3>10</h3><p>Ürün Kategorisi</p>
            </div>
            <div class="stat-card" style="grid-column:span 2;text-align:center;">
                <div class="icon"><span class="material-symbols-outlined">bakery_dining</span></div>
                <h3>47</h3><p>Baklava ve Tatlı Çeşidi</p>
            </div>
            <div class="stat-card" style="grid-column:span 2;text-align:center;">
                <div class="icon"><span class="material-symbols-outlined">local_shipping</span></div>
                <h3>Aynı Gün</h3><p>İstanbul İçi Teslimat</p>
            </div>
            <div class="brand-banner" style="grid-column:span 6;display:flex;flex-direction:column;justify-content:center;">
                <p class="brand-banner-label">Hemen İletişime Geçin</p>
                <h3>Fiyat Listesi ve Sipariş için Arayın</h3>
                <div style="display:flex;gap:12px;margin-top:14px;flex-wrap:wrap;">
                    <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">call</span><?= SITE_PHONE ?></a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">chat</span>WhatsApp</a>
                    <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>" class="btn-outline"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">request_quote</span>Teklif Al</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kategori Vitrini -->
<section class="section-products" style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('10 Kategori · 47 Çeşit', 'Klasikten özel çeşide, kadayıftan soğuk baklavaya — tam kapsamlı koleksiyon.'); ?>
        <div class="grid-12" style="gap:16px;">
            <?php foreach (get_product_categories() as $cs => $c):
                $cat_count = count(get_products($cs)); ?>
            <a href="urunler.php?kategori=<?= $cs ?>" style="grid-column:span 3;background:#fff;border:1px solid #E2E8F0;border-radius:12px;padding:22px;text-decoration:none;color:#2D3748;transition:.2s;display:block;" onmouseover="this.style.borderColor='#8B4513';this.style.transform='translateY(-3px)';" onmouseout="this.style.borderColor='#E2E8F0';this.style.transform='none';">
                <span class="material-symbols-outlined" style="font-size:36px;color:#8B4513;"><?= $c['icon'] ?></span>
                <h4 style="margin-top:10px;font-size:1.05rem;"><?= $c['name'] ?> <span style="color:#A0AEC0;font-weight:400;font-size:.85rem;">(<?= $cat_count ?>)</span></h4>
                <p style="color:#4A5568;font-size:.88rem;margin-top:6px;line-height:1.5;"><?= $c['short'] ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Öne Çıkan Ürünler -->
<section style="padding:40px 0 80px;background:var(--bg-section, #F7FAFC);">
    <div class="container">
        <?php render_section_header('Öne Çıkan Ürünler', 'Toptan siparişte en çok tercih edilen baklava çeşitlerimiz.'); ?>
        <div class="grid-12" style="gap:24px;">
            <?php $cats_map = get_product_categories(); foreach (get_featured_products(8) as $p): ?>
            <a href="<?= get_page_url('urun', $p['slug']) ?>" class="product-card" style="grid-column:span 3;position:relative;">
                <?php if (!empty($p['campaign'])): ?>
                <span style="position:absolute;top:12px;left:12px;background:#E53E3E;color:#fff;padding:4px 10px;border-radius:20px;font-size:.72rem;font-weight:700;z-index:2;letter-spacing:.5px;">KAMPANYA</span>
                <?php endif; ?>
                <div class="product-card-img"><img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>" loading="lazy" decoding="async"></div>
                <span class="product-card-brand"><?= $cats_map[$p['category']]['name'] ?></span>
                <h3><?= $p['name'] ?></h3>
                <p><?= $p['short'] ?></p>
                <div class="product-card-specs">
                    <span><strong><?= $p['price'] ?></strong> / <?= $p['unit'] ?></span>
                    <span><?= $p['slice'] ?></span>
                </div>
                <span class="link-arrow">Sipariş Ver <span class="material-symbols-outlined">arrow_forward</span></span>
            </a>
            <?php endforeach; ?>
        </div>
        <div style="text-align:center;margin-top:36px;">
            <a href="urunler.php" class="btn-primary btn-lg">Tüm Koleksiyonu Gör (47 Çeşit) →</a>
        </div>
    </div>
</section>

<!-- Sunum Tipleri -->
<section class="section-indoor">
    <div class="container">
        <?php render_section_header('Kurumsal Sunum Seçenekleri', 'Etkinliğinizin konseptine, misafirinizin profiline özel sunum paketi belirleyin.'); ?>
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">
            <?php foreach (get_indoor_types() as $t): ?>
            <div class="indoor-card">
                <span class="material-symbols-outlined indoor-card-icon"><?= $t['icon'] ?></span>
                <h4><?= $t['name'] ?></h4>
                <p><?= $t['short'] ?></p>
                <span class="indoor-card-ideal">İdeal: <?= $t['ideal_for'] ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Hizmetler -->
<section class="section-services">
    <div class="container">
        <?php render_section_header('Lüks Ayrıcalıklarımız'); ?>
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">
            <?php foreach (get_services() as $s): ?>
            <a href="hizmetler.php#<?= $s['slug'] ?>" class="service-tile">
                <span class="material-symbols-outlined"><?= $s['icon'] ?></span>
                <h4><?= $s['name'] ?></h4>
                <p><?= $s['short'] ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Teslimat Bölgeleri -->
<section class="section-regions">
    <div class="container">
        <?php render_section_header('Teslimat Bölgeleri', 'İstanbul içi aynı gün teslimat, diğer illere anlaşmalı kargo ile gönderim.', true); ?>
        <div class="grid-12" style="gap:24px;">
            <?php
            $bolgeler = [
                ['name' => 'İstanbul Avrupa', 'icon' => 'location_city', 'note' => 'Aynı Gün Teslimat'],
                ['name' => 'İstanbul Anadolu', 'icon' => 'castle',        'note' => 'Aynı Gün Teslimat'],
                ['name' => 'Kocaeli',          'icon' => 'local_shipping','note' => 'Ertesi Gün Kargo'],
                ['name' => 'Türkiye Geneli',   'icon' => 'map',           'note' => 'Anlaşmalı Kargo'],
            ];
            foreach ($bolgeler as $b): ?>
            <div class="region-card" style="grid-column:span 3;">
                <span class="material-symbols-outlined"><?= $b['icon'] ?></span>
                <h3><?= $b['name'] ?></h3>
                <p><?= $b['note'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Müşteri Sektörleri -->
<section class="section-sectors">
    <div class="container">
        <?php render_section_header('Kimler İçin Üretiyoruz?', 'Her sektörün ikram standardı farklıdır; her birine özel çözümlerimiz var.'); ?>
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">
            <?php foreach (array_slice(get_sectors(), 0, 8) as $key => $s): ?>
            <a href="<?= get_page_url('sayfa', 'sektorler') ?>#<?= $key ?>" class="sector-card">
                <span class="material-symbols-outlined"><?= $s['icon'] ?></span>
                <h4><?= $s['name'] ?></h4>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Referanslar -->
<section class="section-projects">
    <div class="container">
        <?php render_section_header('Başarı Hikayelerimiz'); ?>
        <div class="grid-12" style="gap:20px;">
            <?php foreach (array_slice(get_projects(), 0, 3) as $i => $p): ?>
            <div class="ref-card" style="grid-column:span <?= $i === 0 ? 6 : 3 ?>;">
                <img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>" loading="lazy" decoding="async">
                <div class="ref-overlay">
                    <span class="ref-badge"><?= $p['sector'] ?></span>
                    <h3><?= $p['name'] ?></h3>
                    <p class="ref-detail"><?= $p['location'] ?> — <?= $p['brand'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div style="text-align:center;margin-top:32px;">
            <a href="<?= get_page_url('sayfa', 'sektorler') ?>" class="btn-outline">Müşteri Segmentlerimizi Gör →</a>
        </div>
    </div>
</section>

<!-- Neden Biz -->
<section class="section-why">
    <div class="container">
        <div class="grid-12" style="gap:60px;align-items:center;">
            <div style="grid-column:span 5;">
                <div class="why-image-block">
                    <div class="why-badge">Baklava Getir</div>
                    <img src="img/baklava-neden-biz.webp" alt="Toptan Baklava Üretim" loading="lazy" decoding="async">
                </div>
            </div>
            <div style="grid-column:span 7;">
                <h2>Neden Baklava Getir?</h2>
                <p class="why-desc">10 kategori, 47 çeşit baklava ve tatlıyı tek tedarikçiden sipariş edin. Toptan müşterilerimiz için net fiyatlandırma, hızlı iletişim ve güvenli teslimat.</p>
                <div class="grid-12" style="gap:16px;">
                    <div class="why-feature" style="grid-column:span 6;"><span class="material-symbols-outlined">bakery_dining</span><div><h4>Günlük Taze Üretim</h4><p>Siparişinize göre hazırlanır</p></div></div>
                    <div class="why-feature" style="grid-column:span 6;"><span class="material-symbols-outlined">local_shipping</span><div><h4>Hızlı Teslimat</h4><p>İstanbul içi aynı gün, diğer iller kargo</p></div></div>
                    <div class="why-feature" style="grid-column:span 6;"><span class="material-symbols-outlined">receipt_long</span><div><h4>Kurumsal Fatura</h4><p>KDV dahil, resmi faturalı satış</p></div></div>
                    <div class="why-feature" style="grid-column:span 6;"><span class="material-symbols-outlined">chat</span><div><h4>WhatsApp Sipariş</h4><p>Anında fiyat ve sipariş onayı</p></div></div>
                </div>
                <div style="margin-top:28px;display:flex;gap:12px;flex-wrap:wrap;">
                    <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">call</span>Fiyat için Ara</a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">chat</span>WhatsApp'tan Yaz</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sipariş Süreci -->
<section class="section-tech">
    <div class="container">
        <?php render_section_header('Sipariş Süreci', 'Dört basit adımda toptan baklava siparişi.', true); ?>
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">
            <div class="tech-feature"><span class="material-symbols-outlined">call</span><h4>1. İletişime Geçin</h4><p>Telefon veya WhatsApp ile ihtiyacınızı bildirin.</p></div>
            <div class="tech-feature"><span class="material-symbols-outlined">request_quote</span><h4>2. Fiyat Teklifi</h4><p>Seçtiğiniz çeşitler için net fiyatlı teklif gönderelim.</p></div>
            <div class="tech-feature"><span class="material-symbols-outlined">bakery_dining</span><h4>3. Taze Üretim</h4><p>Onaylı siparişiniz gününde taze üretilir.</p></div>
            <div class="tech-feature"><span class="material-symbols-outlined">local_shipping</span><h4>4. Teslimat</h4><p>İstanbul içi aynı gün, diğer iller kargo ile gönderim.</p></div>
        </div>
        <div style="text-align:center;margin-top:32px;">
            <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary btn-lg"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">call</span>Sipariş için Şimdi Ara: <?= SITE_PHONE ?></a>
        </div>
    </div>
</section>

<!-- İletişim CTA Bandı -->
<section class="section-reviews" style="background:#2D3748;">
    <div class="container" style="text-align:center;">
        <h2 style="color:white;font-size:2.25rem;margin-bottom:12px;">Sipariş için Bize Ulaşın</h2>
        <p style="color:#CBD5E0;font-size:1.1rem;max-width:680px;margin:0 auto 32px;">Toptan fiyat listesi, ürün detayları ve teslimat bilgisi için tercih ettiğiniz kanaldan yazın. Aynı gün dönüş yapıyoruz.</p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
            <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary btn-lg"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">call</span>Hemen Ara: <?= SITE_PHONE ?></a>
            <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp btn-lg"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">chat</span>WhatsApp</a>
            <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>" class="btn-outline btn-lg" style="color:white;border-color:#CBD5E0;"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">request_quote</span>Teklif Formu</a>
        </div>
    </div>
</section>

<!-- SEO + SSS -->
<section class="section-seo">
    <div class="container grid-12" style="gap:60px;">
        <div style="grid-column:span 8;">
            <h2>Toptan Baklava ve Tatlı Tedariki</h2>
            <p><strong>Baklava Getir</strong>, kafe-restoran, otel, market ve kurumsal müşteriler için toptan baklava ve tatlı tedarikçisidir. 10 kategori altında 47 çeşit ürün; klasik baklavalardan sarmalara, dürümlerden kadayıflara, sütlü-soğuk tatlılara kadar geniş bir yelpaze sunuyoruz.</p>
            <h3>Neden Baklava Getir?</h3>
            <ul class="check-list">
                <li><span class="material-symbols-outlined">check_circle</span><span><strong>Geniş Ürün Yelpazesi:</strong> 47 farklı baklava ve tatlı çeşidi — siparişinizin tamamını tek tedarikçiden karşılayın.</span></li>
                <li><span class="material-symbols-outlined">check_circle</span><span><strong>Net Fiyatlandırma:</strong> KDV dahil açık fiyat listesi. Toptan alımlarda adet/kilo bazlı kademeli indirim.</span></li>
                <li><span class="material-symbols-outlined">check_circle</span><span><strong>Hızlı Teslimat:</strong> İstanbul içi aynı gün, diğer illere anlaşmalı kargo ile güvenli gönderim.</span></li>
                <li><span class="material-symbols-outlined">check_circle</span><span><strong>Kurumsal Fatura:</strong> Resmi, KDV dahil faturalı satış. Firmalar için cari hesap açma imkânı.</span></li>
            </ul>
            <p style="margin-top:20px;"><strong>Hızlı iletişim:</strong> Telefon (<a href="<?= SITE_PHONE_LINK ?>"><?= SITE_PHONE ?></a>) veya <a href="<?= SITE_WHATSAPP_LINK ?>">WhatsApp</a> üzerinden anlık fiyat listesi ve sipariş onayı alın.</p>
        </div>
        <div style="grid-column:span 4;">
            <div class="faq-sidebar">
                <h4>Sıkça Sorulan Sorular</h4>
                <?php foreach (array_slice(get_faqs(), 0, 3) as $faq): ?>
                <div class="faq-item-mini">
                    <h5><?= $faq['q'] ?></h5>
                    <p><?= $faq['a'] ?></p>
                </div>
                <?php endforeach; ?>
                <a href="<?= get_page_url('sayfa', 'sss.php') ?>" class="link-arrow">Tüm SSS →</a>
            </div>
        </div>
    </div>
</section>

<?php render_faq_schema(array_slice(get_faqs(), 0, 3)); ?>

<!-- Lead Gen Banner -->
<section class="section-cta-banner">
    <div class="container grid-12" style="align-items:center;">
        <div style="grid-column:span 7;color:white;">
            <h2>Size Özel Kurumsal Teklif Alın</h2>
            <p>Etkinliğinizin tarihi, misafir sayısı ve konseptinizi paylaşın — 24 saat içinde size özel fiyatlandırma ve sunum planı hazırlayalım.</p>
        </div>
        <div style="grid-column:span 5;">
            <div style="display:flex;flex-direction:column;gap:12px;">
                <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary" style="font-size:1.05rem;padding:16px 28px;background:white;color:var(--primary);box-shadow:0 8px 32px rgba(0,0,0,.15);width:100%;text-align:center;">
                    <span class="material-symbols-outlined" style="font-size:1.3rem;vertical-align:middle;margin-right:8px;">call</span>
                    Hemen Ara: <?= SITE_PHONE ?>
                </a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp" style="font-size:1.05rem;padding:16px 28px;width:100%;text-align:center;justify-content:center;">
                    <span class="material-symbols-outlined" style="font-size:1.3rem;vertical-align:middle;margin-right:8px;">chat</span>
                    WhatsApp'tan Yaz
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'inc/footer.php'; ?>
