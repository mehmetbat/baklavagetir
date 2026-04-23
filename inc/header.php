<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T6QN3WVH');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($page_title)) render_meta($page_title, $page_description ?? '', $page_canonical ?? '', $page_keywords ?? ''); ?>
    <base href="<?= rtrim(SITE_URL, '/') ?>/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;0,800;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/main.js" defer></script>
    <?php if (isset($page_schema) && is_string($page_schema)) echo $page_schema; ?>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T6QN3WVH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Üst Bilgi Barı -->
    <div class="top-bar">
        <div class="container top-bar-inner">
            <span>Toptan fiyat listesi ve sipariş için bizi arayın: <?= SITE_PHONE ?></span>
            <span class="top-bar-right">
                <span class="top-bar-badge">WhatsApp ile Hızlı Sipariş</span>
                <a href="<?= SITE_PHONE_LINK ?>">Hemen Ara</a>
            </span>
        </div>
    </div>

    <!-- Kampanya Bandı -->
    <div class="announcement-bar">
        <div class="marquee-content">
            <span>📞 Toptan fiyat ve sipariş için hemen arayın: <?= SITE_PHONE ?></span>
            <span>💬 WhatsApp'tan anında fiyat listesi isteyin</span>
            <span>🚚 İstanbul içi aynı gün teslimat — diğer şehirlere kargo</span>
            <span>📋 Kurumsal faturalı satış · 47 çeşit baklava · 10 kategori</span>
        </div>
    </div>

    <!-- Ana Navigasyon -->
    <header>
        <div class="container header-container">
            <a href="<?= get_page_url('sayfa', '') ?>" class="logo">
                <h2>Baklava Getir</h2>
                <span class="logo-sub">Toptan Baklava Tedariki</span>
            </a>
            <nav id="main-nav">
                <ul>
                    <?php foreach (get_main_menu() as $item): ?>
                    <li><a href="<?= $item['url'] ?>" class="<?= is_active_page($item['id']) ?>"><?= $item['text'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="header-actions">
                <a href="<?= SITE_WHATSAPP_LINK ?>" aria-label="WhatsApp Sohbet" style="display:flex;align-items:center;justify-content:center;background:#25D366;color:#fff;width:40px;height:40px;border-radius:50%;text-decoration:none;"><span class="material-symbols-outlined">chat</span></a>
                <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>" class="btn-primary">Kurumsal Teklif Al</a>
                <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Menüyü aç">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </header>

    <main>
