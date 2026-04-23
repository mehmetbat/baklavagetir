<?php
require_once 'inc/functions.php';
require_once 'inc/data-products.php';
$active_page = 'hakkimizda';
$page_title = 'Hakkımızda — ' . SITE_NAME;
$page_description = 'Baklava Getir — kafe, restoran, otel, market ve kurumsal müşteriler için toptan baklava ve tatlı tedarikçisi. 10 kategori, 47 çeşit.';
$page_canonical = 'hakkimizda';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Hakkımızda']]);
?>
<section style="padding:80px 0;">
    <div class="container">
        <div class="grid-12" style="gap:60px;align-items:center;">
            <div style="grid-column:span 6;">
                <h1 style="font-size:clamp(1.8rem, 4vw, 2.5rem);color:var(--primary);margin-bottom:20px;">Baklava Getir<br>Toptan Baklava Tedariki</h1>
                <p style="color:#4A5568;line-height:1.8;margin-bottom:16px;"><strong><?= SITE_NAME ?></strong>, kafe-restoran, otel, market, organizasyon firmaları ve kurumsal müşteriler için geniş çeşitli <strong>toptan baklava ve tatlı tedarikçisidir</strong>.</p>
                <p style="color:#4A5568;line-height:1.8;margin-bottom:16px;">Kataloğumuzda <strong>10 kategori altında 47 çeşit</strong> baklava ve tatlı bulunur: klasik baklavalar, sarmalar, dürümler, kadayıflar, özel çeşitler, sütlü & soğuk tatlılar, şerbetli tatlılar, börekler, tepsi baklavalar ve hediyelik kutular.</p>
                <p style="color:#4A5568;line-height:1.8;">İstanbul içi aynı gün teslimat, diğer illere anlaşmalı kargo ile güvenli gönderim yapıyoruz. Kurumsal müşterilerimize KDV dahil resmi faturalı satış ve cari hesap imkânı sunuyoruz.</p>
                <div style="margin-top:28px;display:flex;gap:12px;flex-wrap:wrap;">
                    <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">call</span>Hemen Ara: <?= SITE_PHONE ?></a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">chat</span>WhatsApp</a>
                </div>
            </div>
            <div style="grid-column:span 6;">
                <div class="why-image-block"><div class="why-badge">47 Çeşit</div><img src="img/baklava-urunler-tepsi.webp" alt="Toptan Baklava Çeşitleri" loading="lazy" decoding="async"></div>
            </div>
        </div>
    </div>
</section>
<section style="padding:60px 0;background:var(--bg-section);">
    <div class="container">
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px;">
            <div class="stat-card" style="text-align:center;"><div class="icon"><span class="material-symbols-outlined">category</span></div><h3>10</h3><p>Ürün Kategorisi</p></div>
            <div class="stat-card" style="text-align:center;"><div class="icon"><span class="material-symbols-outlined">bakery_dining</span></div><h3>47</h3><p>Baklava ve Tatlı Çeşidi</p></div>
            <div class="stat-card" style="text-align:center;"><div class="icon"><span class="material-symbols-outlined">local_shipping</span></div><h3>Aynı Gün</h3><p>İstanbul İçi Teslimat</p></div>
            <div class="stat-card" style="text-align:center;"><div class="icon"><span class="material-symbols-outlined">receipt_long</span></div><h3>KDV Dahil</h3><p>Kurumsal Fatura</p></div>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
