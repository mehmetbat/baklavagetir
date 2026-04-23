<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
$active_page = 'sektorler';
$page_title = 'Müşteri Segmentleri — Otel, Restoran, Kafe, Market | ' . SITE_NAME;
$page_description = 'Oteller, restoranlar, kafeler, marketler, organizasyon ve catering firmaları için toptan baklava ve tatlı tedariki.';
$page_canonical = 'sektorler';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Sektörler']]);
?>
<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('Kimler İçin Üretiyoruz?', 'Kafe, restoran, otel, market, organizasyon — her müşteri tipi için uygun çözüm.'); ?>
        <div class="grid-12" style="gap:24px;">
            <?php foreach (get_sectors() as $key => $s): ?>
            <div class="sector-detail-card" id="<?= $key ?>" style="grid-column:span 6;">
                <span class="material-symbols-outlined sector-icon"><?= $s['icon'] ?></span>
                <h3><?= $s['name'] ?></h3>
                <p style="color:#4A5568;line-height:1.7;margin-top:12px;"><?= $s['description'] ?></p>
                <div style="margin-top:16px;display:flex;gap:10px;flex-wrap:wrap;">
                    <a href="<?= SITE_PHONE_LINK ?>" class="link-arrow"><span class="material-symbols-outlined" style="font-size:16px;vertical-align:middle;">call</span> Fiyat için Ara</a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="link-arrow"><span class="material-symbols-outlined" style="font-size:16px;vertical-align:middle;">chat</span> WhatsApp</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
