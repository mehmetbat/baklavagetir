<?php
require_once 'inc/functions.php';
require_once 'inc/data-products.php';
$active_page = 'urunler';

$active_cat = $_GET['kategori'] ?? 'tumu';
$cats = get_product_categories();
$all_products = get_products();

if ($active_cat !== 'tumu' && isset($cats[$active_cat])) {
    $cat_data = $cats[$active_cat];
    $list_products = get_products($active_cat);
    $page_title = $cat_data['name'] . ' — Toptan Baklava Kataloğu | ' . SITE_NAME;
    $page_description = 'Gaziantep ustası üretimi ' . $cat_data['name'] . ' çeşitleri. Kurumsal ve toptan siparişlerde günlük taze, soğuk zincir teslimat.';
} else {
    $active_cat = 'tumu';
    $list_products = $all_products;
    $page_title = 'Baklava Koleksiyonu — 47 Çeşit Toptan Baklava | ' . SITE_NAME;
    $page_description = 'Klasik baklavalar, sarmalar, dürümler, kadayıflar, özel çeşitler, sütlü & soğuk baklava, şerbetli tatlılar, börekler, tepsi baklavalar ve hediyelik kutular.';
}

$page_canonical = 'urunler.php' . ($active_cat !== 'tumu' ? '?kategori=' . $active_cat : '');
require_once 'inc/header.php';
render_breadcrumb([
    ['url' => 'index.php', 'text' => 'Ana Sayfa'],
    ['text' => $active_cat === 'tumu' ? 'Baklava Koleksiyonu' : $cats[$active_cat]['name']]
]);
?>

<section style="padding:60px 0 20px;">
    <div class="container">
        <?php render_section_header(
            $active_cat === 'tumu' ? 'Baklava Koleksiyonumuz' : $cats[$active_cat]['name'],
            $active_cat === 'tumu' ? '47 çeşit — Gaziantep ustası üretimi, günlük taze, toptan ve kurumsal fiyatlarla.' : $cats[$active_cat]['short']
        ); ?>
    </div>
</section>

<!-- Kategori Filtre Tabları -->
<section style="padding:0 0 20px;">
    <div class="container">
        <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;padding:16px 0;border-bottom:1px solid #E2E8F0;">
            <a href="urunler.php" class="cat-chip <?= $active_cat === 'tumu' ? 'active' : '' ?>" style="padding:10px 18px;border-radius:30px;text-decoration:none;font-weight:600;font-size:.92rem;background:<?= $active_cat === 'tumu' ? 'var(--secondary, #8B4513)' : '#F7FAFC' ?>;color:<?= $active_cat === 'tumu' ? '#fff' : '#2D3748' ?>;border:1px solid <?= $active_cat === 'tumu' ? 'var(--secondary, #8B4513)' : '#E2E8F0' ?>;">Tüm Kategoriler</a>
            <?php foreach ($cats as $cs => $c): ?>
            <a href="urunler.php?kategori=<?= $cs ?>" class="cat-chip <?= $active_cat === $cs ? 'active' : '' ?>" style="padding:10px 18px;border-radius:30px;text-decoration:none;font-weight:600;font-size:.92rem;background:<?= $active_cat === $cs ? 'var(--secondary, #8B4513)' : '#F7FAFC' ?>;color:<?= $active_cat === $cs ? '#fff' : '#2D3748' ?>;border:1px solid <?= $active_cat === $cs ? 'var(--secondary, #8B4513)' : '#E2E8F0' ?>;display:inline-flex;align-items:center;gap:6px;"><span class="material-symbols-outlined" style="font-size:18px;"><?= $c['icon'] ?></span><?= $c['name'] ?> <span style="opacity:.7;font-weight:400;">(<?= count(array_filter($all_products, fn($p) => $p['category'] === $cs)) ?>)</span></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Ürün Kartları -->
<section style="padding:40px 0 80px;">
    <div class="container">
        <div class="grid-12" style="gap:24px;">
            <?php foreach ($list_products as $p): ?>
            <a href="<?= get_page_url('urun', $p['slug']) ?>" class="product-card" style="grid-column:span 3;position:relative;">
                <?php if (!empty($p['campaign'])): ?>
                <span style="position:absolute;top:12px;left:12px;background:#E53E3E;color:#fff;padding:4px 10px;border-radius:20px;font-size:.72rem;font-weight:700;z-index:2;letter-spacing:.5px;">KAMPANYA</span>
                <?php endif; ?>
                <div class="product-card-img"><img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>" loading="lazy" decoding="async"></div>
                <span class="product-card-brand"><?= $cats[$p['category']]['name'] ?></span>
                <h3><?= $p['name'] ?></h3>
                <p><?= $p['short'] ?></p>
                <div class="product-card-specs">
                    <span><strong><?= $p['price'] ?></strong> / <?= $p['unit'] ?></span>
                    <span><?= $p['slice'] ?></span>
                </div>
                <span class="link-arrow">Detayları İncele <span class="material-symbols-outlined">arrow_forward</span></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Kurumsal Sunum Seçenekleri -->
<section style="padding:80px 0;background:var(--bg-section, #F7FAFC);">
    <div class="container">
        <?php render_section_header('Kurumsal Sunum Seçenekleri', 'Etkinliğinizin konseptine özel sunum paketi belirleyin.'); ?>
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

<?php
render_bottom_regions();
require_once 'inc/footer.php';
?>
