<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
$active_page = 'hizmetler';
$page_title = 'VRF Klima Hizmetleri — Montaj, Servis, Projelendirme | ' . SITE_NAME;
$page_description = 'VRF klima montaj, servis, bakım, ücretsiz keşif ve 3D projelendirme hizmetleri. Pendik merkezli sertifikalı ekiplerimizle profesyonel çözümler.';
$page_canonical = 'hizmetler.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Hizmetler']]);
?>

<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('Çözüm ve Hizmetlerimiz', 'Profesyonel VRF iklimlendirme hizmetleri.'); ?>
        <?php foreach (get_services() as $s): ?>
        <div class="service-block" id="<?= $s['slug'] ?>">
            <div class="grid-12" style="gap:40px;align-items:flex-start;">
                <div style="grid-column:span 7;">
                    <div class="service-icon-lg"><span class="material-symbols-outlined"><?= $s['icon'] ?></span></div>
                    <h2><?= $s['name'] ?></h2>
                    <p style="color:#4A5568;line-height:1.8;margin-top:16px;"><?= $s['description'] ?></p>
                    <div style="margin-top:24px;">
                        <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>" class="btn-primary">Bu Hizmet İçin Teklif Al</a>
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
        <h2 style="color:white;margin-bottom:16px;">Projeniz İçin Doğru Hizmeti mi Arıyorsunuz?</h2>
        <p style="color:rgba(255,255,255,.9);margin-bottom:24px;">Uzman mühendislerimiz projenizi değerlendirsin. Ücretsiz keşif ve teklif.</p>
        <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>" class="btn-primary btn-lg" style="background:white;color:var(--primary);">Ücretsiz Keşif İste</a>
    </div>
</section>

<?php 
render_bottom_regions();
require_once 'inc/footer.php'; 
?>
