<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
require_once 'inc/data-products.php';
$active_page = 'markalar';
$page_title = 'VRF Klima Markaları — Gree, Mitsubishi, Daikin, Samsung | ' . SITE_NAME;
$page_description = 'Portföyümüzde yer alan Gree, Mitsubishi Electric, Daikin, Samsung DVM, LG ve Toshiba VRF klima markaları.';
$page_canonical = 'markalar.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Markalar']]);
?>
<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('VRF Mühendislik Portföyümüz', 'Projenize en uygun markayı mühendislik etiğiyle seçiyoruz.'); ?>
        <div class="grid-12" style="gap:24px;">
            <?php foreach (get_brands() as $b): ?>
            <div class="brand-card" id="<?= $b['slug'] ?>" style="grid-column:span 4;">
                <h3><?= $b['name'] ?></h3>
                <p style="color:#4A5568;line-height:1.7;margin-top:12px;"><?= $b['description'] ?></p>
                <div class="brand-meta">
                    <span><strong>Kuruluş:</strong> <?= $b['founded'] ?></span>
                    <span><strong>Menşei:</strong> <?= $b['origin'] ?></span>
                </div>
                <p style="font-size:.9rem;color:var(--secondary);font-weight:600;margin-top:12px;">🔧 <?= $b['specialty'] ?></p>
                <a href="urunler.php" class="link-arrow" style="margin-top:16px;">Baklava Koleksiyonunu İncele →</a>
                
                <div style="margin-top:20px;padding-top:16px;border-top:1px solid #E2E8F0;">
                    <p style="font-size:0.85rem;color:#718096;margin-bottom:8px;"><strong><?= $b['name'] ?> Hizmet Bölgelerimiz:</strong></p>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;">
                        <?php foreach (get_all_service_iller() as $il_slug => $il_data): ?>
                        <a href="<?= get_bolge_url($il_slug, '', '', $b['slug']) ?>" style="font-size:0.85rem;background:#EDF2F7;color:#2D3748;padding:4px 10px;border-radius:20px;text-decoration:none;"><?= $il_data['name'] ?></a>
                        <?php endforeach; ?>
                    </div>
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
