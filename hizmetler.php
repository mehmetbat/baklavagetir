<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
$active_page = 'hizmetler';
$page_title = 'Hizmetlerimiz — Toptan Tedarik, Teslimat, Hediyelik Kutu | ' . SITE_NAME;
$page_description = 'Toptan baklava tedariki, hızlı teslimat, hediyelik kutu ve kurumsal faturalı satış hizmetlerimiz. 10 kategori, 47 çeşit baklava ve tatlı.';
$page_canonical = 'hizmetler';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Hizmetler']]);
?>

<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('Hizmetlerimiz', 'Toptan ve kurumsal baklava tedariki için sunduğumuz hizmetler.'); ?>
        <?php foreach (get_services() as $s): ?>
        <div class="service-block" id="<?= $s['slug'] ?>">
            <div class="grid-12" style="gap:40px;align-items:flex-start;">
                <div style="grid-column:span 7;">
                    <div class="service-icon-lg"><span class="material-symbols-outlined"><?= $s['icon'] ?></span></div>
                    <h2><?= $s['name'] ?></h2>
                    <p style="color:#4A5568;line-height:1.8;margin-top:16px;"><?= $s['short'] ?></p>
                    <div style="margin-top:24px;display:flex;gap:10px;flex-wrap:wrap;">
                        <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">call</span>Hemen Ara</a>
                        <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">chat</span>WhatsApp</a>
                    </div>
                </div>
                <div style="grid-column:span 5;">
                    <div class="process-steps">
                        <h4>Süreç Adımları</h4>
                        <ol>
                            <?php foreach ($s['steps'] as $step): ?>
                            <li><?= $step ?></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="section-cta-banner">
    <div class="container" style="text-align:center;">
        <h2 style="color:white;margin-bottom:16px;">Toptan Sipariş için Bize Ulaşın</h2>
        <p style="color:rgba(255,255,255,.9);margin-bottom:24px;">Fiyat listesi, çeşit detayı ve sipariş onayı için dakikalar içinde dönüş yapıyoruz.</p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary btn-lg" style="background:white;color:var(--primary);"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">call</span><?= SITE_PHONE ?></a>
            <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp btn-lg"><span class="material-symbols-outlined" style="vertical-align:middle;margin-right:6px;">chat</span>WhatsApp'tan Yaz</a>
        </div>
    </div>
</section>

<?php 
render_bottom_regions();
require_once 'inc/footer.php'; 
?>
