<?php
require_once 'inc/functions.php';
require_once 'inc/data-products.php';
$slug = $_GET['slug'] ?? '';
$product = get_product($slug);
if (!$product) { header('Location: urunler.php'); exit; }

require_once 'inc/data-content.php';
$active_page = 'urunler';
$cats = get_product_categories();
$cat = $cats[$product['category']];

$page_title = $product['name'] . ' — ' . $product['price'] . ' / ' . $product['unit'] . ' | ' . SITE_NAME;
$page_description = $product['short'] . ' Gaziantep usta üretimi, günlük taze, soğuk zincir teslimat. ' . $product['price'] . ' / ' . $product['unit'] . '.';
$page_canonical = get_page_url('urun', $slug);
require_once 'inc/header.php';
render_breadcrumb([
    ['url' => 'index.php', 'text' => 'Ana Sayfa'],
    ['url' => get_page_url('sayfa', 'urunler.php'), 'text' => 'Baklava Koleksiyonu'],
    ['url' => 'urunler.php?kategori=' . $cat['slug'], 'text' => $cat['name']],
    ['text' => $product['name']]
]);

$schema = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'Product',
    'name'     => $product['name'],
    'category' => $cat['name'],
    'description' => $product['short'],
    'brand'    => ['@type' => 'Brand', 'name' => 'Baklava Getir'],
    'offers'   => [
        '@type' => 'Offer',
        'price' => preg_replace('/\D/', '', $product['price']),
        'priceCurrency' => 'TRY',
        'availability' => 'https://schema.org/InStock',
    ],
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => $product['rating'],
        'reviewCount' => $product['review_count'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo '<script type="application/ld+json">' . $schema . '</script>';
?>

<section style="padding:40px 0 60px;">
    <div class="container">
        <div class="grid-12" style="align-items:flex-start;gap:40px;">
            <div style="grid-column:span 6;">
                <div class="product-hero-img" style="position:relative;">
                    <?php if (!empty($product['campaign'])): ?>
                    <span style="position:absolute;top:16px;left:16px;background:#E53E3E;color:#fff;padding:6px 14px;border-radius:20px;font-size:.8rem;font-weight:700;z-index:2;letter-spacing:.5px;">KAMPANYA</span>
                    <?php endif; ?>
                    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" loading="lazy" decoding="async">
                </div>
                <div class="product-trust-row">
                    <div><span class="material-symbols-outlined">verified</span><p>Günlük Taze Üretim</p></div>
                    <div><span class="material-symbols-outlined">ac_unit</span><p>Soğuk Zincir Teslimat</p></div>
                    <div><span class="material-symbols-outlined">workspace_premium</span><p>Gaziantep Ustası</p></div>
                </div>
            </div>
            <div style="grid-column:span 6;">
                <span class="badge"><span></span> <?= strtoupper($cat['name']) ?></span>
                <h1 style="font-size:clamp(1.8rem, 4vw, 2.5rem);line-height:1.2;margin-top:16px;"><?= $product['name'] ?></h1>
                <div style="display:flex;align-items:center;gap:12px;margin-top:12px;">
                    <div style="color:#F6AD55;font-size:1.1rem;"><?= str_repeat('★', floor($product['rating'])) ?><?= ($product['rating'] - floor($product['rating']) >= .5) ? '½' : '' ?></div>
                    <span style="color:#718096;font-size:.9rem;"><?= $product['rating'] ?> · <?= $product['review_count'] ?> değerlendirme</span>
                </div>
                <p style="color:#4A5568;margin-top:20px;line-height:1.7;"><?= $product['short'] ?></p>

                <div style="margin-top:24px;padding:20px;background:#FFF8F0;border:1px solid #FED7AA;border-radius:12px;display:flex;align-items:baseline;gap:12px;">
                    <span style="font-size:2.2rem;font-weight:800;color:#8B4513;"><?= $product['price'] ?></span>
                    <span style="color:#718096;font-size:1rem;">/ <?= $product['unit'] ?></span>
                    <span style="margin-left:auto;font-size:.85rem;color:#4A5568;">Min. Sipariş: <strong><?= $product['min_order'] ?></strong></span>
                </div>

                <div class="specs-grid">
                    <?php foreach ($product['specs'] as $label => $val): ?>
                    <div class="spec-item"><span class="spec-label"><?= $label ?></span><p class="spec-value"><?= $val ?></p></div>
                    <?php endforeach; ?>
                </div>

                <div style="margin-top:28px;display:flex;gap:12px;">
                    <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>?urun=<?= urlencode($product['name']) ?>" class="btn-primary btn-lg" style="flex:1;text-align:center;">Bu Ürün İçin Teklif Al</a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp btn-lg"><span class="material-symbols-outlined">chat</span>WhatsApp</a>
                </div>
                <p style="font-size:.85rem;color:#718096;margin-top:16px;text-align:center;">* Toptan siparişlerde özel fiyatlandırma. Kurumsal müşterilerimize faturalı satış.</p>
            </div>
        </div>
    </div>
</section>

<section style="padding:60px 0;background:white;border-top:1px solid rgba(0,0,0,.05);">
    <div class="container">
        <div class="grid-12" style="gap:60px;">
            <div style="grid-column:span 8;">
                <h2><?= $product['name'] ?> — Ürün Hikayesi</h2>
                <p style="color:#4A5568;line-height:1.8;margin-top:16px;"><?= $product['description'] ?></p>

                <h3 style="margin-top:32px;">Öne Çıkan Özellikler</h3>
                <ul class="check-list" style="margin-top:16px;">
                    <?php foreach ($product['features'] as $f): ?>
                    <li><span class="material-symbols-outlined">check_circle</span><span><?= $f ?></span></li>
                    <?php endforeach; ?>
                </ul>

                <h3 style="margin-top:32px;">İçerikler</h3>
                <div style="display:flex;flex-wrap:wrap;gap:10px;margin-top:14px;">
                    <?php foreach ($product['ingredients'] as $ing): ?>
                    <span style="background:#F7FAFC;border:1px solid #E2E8F0;padding:8px 14px;border-radius:20px;font-size:.9rem;color:#2D3748;"><?= $ing ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div style="grid-column:span 4;">
                <div class="sidebar-box">
                    <h4>Benzer <?= $cat['name'] ?></h4>
                    <ul style="list-style:none;padding:0;">
                        <?php foreach (get_related_products($slug, 6) as $p): ?>
                        <li style="margin-bottom:10px;">
                            <a href="<?= get_page_url('urun', $p['slug']) ?>" class="sidebar-link">
                                <span class="material-symbols-outlined">arrow_forward</span><?= $p['name'] ?>
                                <span style="color:#8B4513;font-weight:600;font-size:.85rem;margin-left:auto;"><?= $p['price'] ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="urunler.php?kategori=<?= $cat['slug'] ?>" class="link-arrow" style="margin-top:16px;display:inline-block;">Tüm <?= $cat['name'] ?> →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'inc/footer.php'; ?>
