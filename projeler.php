<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
$active_page = 'projeler';
$page_title = 'Referans VRF Projeleri | ' . SITE_NAME;
$page_description = '1250+ başarılı VRF klima projesi. AVM, otel, fabrika, plaza, hastane ve rezidans projelerimiz.';
$page_canonical = 'projeler.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Projeler']]);
?>
<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('Referans Projelerimiz', '1.250\'yi aşkın başarılı VRF projesi.'); ?>
        <div class="grid-12" style="gap:20px;">
            <?php foreach (get_projects() as $i => $p): ?>
            <div class="ref-card" style="grid-column:span <?= $i < 2 ? 6 : 4 ?>;">
                <img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>" loading="lazy" decoding="async">
                <div class="ref-overlay">
                    <span class="ref-badge"><?= $p['sector'] ?></span>
                    <h3><?= $p['name'] ?></h3>
                    <p class="ref-detail"><?= $p['location'] ?> — <?= $p['brand'] ?></p>
                    <p class="ref-detail"><?= $p['capacity'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php 
render_bottom_regions();
require_once 'inc/footer.php'; 
?>
