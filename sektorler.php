<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
$active_page = 'sektorler';
$page_title = 'Sektörel VRF Çözümleri — Otel, Fabrika, Plaza, Hastane | ' . SITE_NAME;
$page_description = 'Her sektörün iklimlendirme ihtiyacı farklıdır. Otel, fabrika, plaza, AVM, hastane, eğitim ve veri merkezi VRF çözümleri.';
$page_canonical = 'sektorler.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Sektörler']]);
?>
<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('Sektörel VRF İklimlendirme Çözümlerimiz', 'Her sektörün iklimlendirme ihtiyacı farklıdır. Biz bunu biliyoruz.'); ?>
        <div class="grid-12" style="gap:24px;">
            <?php foreach (get_sectors() as $key => $s): ?>
            <div class="sector-detail-card" id="<?= $key ?>" style="grid-column:span 6;">
                <span class="material-symbols-outlined sector-icon"><?= $s['icon'] ?></span>
                <h3><?= $s['name'] ?></h3>
                <p style="color:#4A5568;line-height:1.7;margin-top:12px;"><?= $s['description'] ?></p>
                <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>" class="link-arrow" style="margin-top:16px;">Bu Sektör İçin Teklif Al →</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
