<?php
/**
 * Dinamik Bölge Sayfası
 * URL örnekleri:
 *   bolge.php?il=istanbul                         → İl sayfası
 *   bolge.php?il=istanbul&ilce=pendik              → İlçe sayfası
 *   bolge.php?il=istanbul&ilce=pendik&mahalle=kurtköy → Mahalle sayfası
 */

require_once 'inc/functions.php';
require_once 'inc/data-products.php';
require_once 'inc/data-content.php';
require_once 'turkey.php';

$il_slug = $_GET['il'] ?? '';
$ilce_slug = $_GET['ilce'] ?? '';
$mahalle_slug = $_GET['mahalle'] ?? '';
$marka_slug = $_GET['marka'] ?? '';

// Validation
if (!$il_slug || !isset($turkey_data[$il_slug])) {
    header('Location: index.php');
    exit;
}

$il_data = $turkey_data[$il_slug];
$il_name = $il_data['name'];

$marka_name = '';
if ($marka_slug) {
    foreach (get_brands() as $b) {
        if ($b['slug'] === $marka_slug || slugify($b['name']) === $marka_slug) {
            $marka_name = $b['name'];
            break;
        }
    }
}
$klima_suffix = $marka_name ? $marka_name . ' VRF Klima' : 'VRF Klima';

// ============================================
// MAHALLE SAYFASI
// ============================================
if ($ilce_slug && $mahalle_slug) {
    if (!isset($il_data['ilceler'][$ilce_slug])) { header('Location: ' . get_bolge_url($il_slug, '', '', $marka_slug)); exit; }
    $ilce_data = $il_data['ilceler'][$ilce_slug];
    $ilce_name = $ilce_data['name'];
    
    // Sadece "odak" olan ilçelerin mahalle detay sayfalarına izin ver (Thin content engellemek için)
    if (!is_odak_ilce($ilce_slug)) {
        header('Location: ' . get_bolge_url($il_slug, $ilce_slug, '', $marka_slug), true, 301);
        exit;
    }
    
    if (!isset($ilce_data['mahalleler'][$mahalle_slug])) { header('Location: ' . get_bolge_url($il_slug, $ilce_slug, '', $marka_slug)); exit; }
    $mahalle_name = $ilce_data['mahalleler'][$mahalle_slug];

    $active_page = '';
    $page_title = $mahalle_name . ' ' . $klima_suffix . ' | ' . $ilce_name . ', ' . $il_name . ' | ' . SITE_NAME;
    $page_description = $mahalle_name . ' mahallesi, ' . $ilce_name . '/' . $il_name . '\'da ' . $klima_suffix . ' satış, montaj ve servis. Pendik merkezli operasyonumuzla hızlı keşif ve projelendirme.';
    $page_canonical = get_bolge_url($il_slug, $ilce_slug, $mahalle_slug, $marka_slug);

    require_once 'inc/header.php';
    render_breadcrumb([
        ['url' => get_page_url('sayfa', 'index.php'), 'text' => 'Ana Sayfa'],
        ['url' => get_bolge_url($il_slug, '', '', $marka_slug), 'text' => $il_name . ' ' . $klima_suffix],
        ['url' => get_bolge_url($il_slug, $ilce_slug, '', $marka_slug), 'text' => $ilce_name . ' ' . $klima_suffix],
        ['text' => $mahalle_name]
    ]);
    render_local_business_schema(SITE_NAME . ' - ' . $mahalle_name, $page_canonical, $ilce_name, $il_name);
    ?>

    <div class="container" style="padding:40px 0;">
        <div class="grid-12" style="align-items:flex-start;">
            <div style="grid-column:span 7;">
                <span class="badge"><span></span> <?= strtoupper($mahalle_name) ?> MAHALLE HİZMETİ</span>
                <h1 style="line-height:1.15;margin-top:20px;font-size: clamp(2rem, 5vw, 2.8rem);"><?= $mahalle_name ?> <span style="color:var(--secondary);"><?= $klima_suffix ?></span><br>Satış, Montaj ve Servis</h1>
                
                <div class="info-callout" style="margin-top:24px;">
                    <p><strong>📍 <?= $mahalle_name ?>, <?= $ilce_name ?> / <?= $il_name ?></strong></p>
                    <p><?= $mahalle_name ?> mahallesinde <?= $klima_suffix ?> satış, montaj ve servis hizmeti sunuyoruz. Pendik merkezli operasyonumuzla hızlı keşif ve profesyonel projelendirme garantisi veriyoruz. Gree, Mitsubishi Electric, Daikin ve Samsung DVM portföyüyle projenize en uygun çözümü sunarız.</p>
                </div>

                <div style="display:flex;gap:16px;margin-top:28px;">
                    <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>?konum=<?= urlencode($mahalle_name . ', ' . $ilce_name) ?>" class="btn-primary btn-lg">Ücretsiz Keşif İste</a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp btn-lg"><span class="material-symbols-outlined">chat</span>WhatsApp</a>
                </div>
            </div>
            <div style="grid-column:span 5;">
                <?php render_lead_form($mahalle_name . ' İçin Teklif Al', '24 saat içinde ücretsiz kapasite ön raporu.', $mahalle_name . ', ' . $ilce_name); ?>
            </div>
        </div>

        <?php render_seo_blocks($il_name, $ilce_name, $mahalle_name, $klima_suffix, $il_slug, $ilce_slug, $mahalle_slug, $marka_slug); ?>

        <!-- Diğer Mahalleler -->
        <div style="margin-top:80px;">
            <h3 style="color:var(--primary);margin-bottom:8px;"><?= $ilce_name ?> İlçesindeki Diğer Mahalleler</h3>
            <p style="color:#718096;margin-bottom:24px;">← <a href="<?= get_bolge_url($il_slug, $ilce_slug, '', $marka_slug) ?>" style="color:var(--secondary);font-weight:600;"><?= $ilce_name ?> İlçe Sayfasına Dön</a></p>
            <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:12px;">
                <?php foreach ($ilce_data['mahalleler'] as $m_slug => $m_name): ?>
                <a href="<?= get_bolge_url($il_slug, $ilce_slug, $m_slug, $marka_slug) ?>" class="mahalle-link <?= $m_slug === $mahalle_slug ? 'active' : '' ?>"><?= $m_name ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php
    require_once 'inc/footer.php';
    exit;
}

// ============================================
// İLÇE SAYFASI
// ============================================
if ($ilce_slug) {
    if (!isset($il_data['ilceler'][$ilce_slug])) { header('Location: ' . get_bolge_url($il_slug, '', '', $marka_slug)); exit; }
    $ilce_data = $il_data['ilceler'][$ilce_slug];
    $ilce_name = $ilce_data['name'];

    $active_page = '';
    $page_title = $ilce_name . ' ' . $klima_suffix . ' Satış, Montaj ve Servis | ' . $il_name . ' | ' . SITE_NAME;
    $page_description = $ilce_name . ', ' . $il_name . '\'da ' . $klima_suffix . ' satış, montaj ve servis. Pendik merkezli operasyonumuzla aynı gün keşif.';
    $page_keywords = $ilce_name . ' ' . strtolower($klima_suffix) . ', ' . $ilce_name . ' merkezi klima, ' . $ilce_name . ' vrf montaj';
    $page_canonical = get_bolge_url($il_slug, $ilce_slug, '', $marka_slug);

    require_once 'inc/header.php';
    render_breadcrumb([
        ['url' => get_page_url('sayfa', 'index.php'), 'text' => 'Ana Sayfa'],
        ['url' => get_bolge_url($il_slug, '', '', $marka_slug), 'text' => $il_name . ' ' . $klima_suffix],
        ['text' => $ilce_name . ' ' . $klima_suffix]
    ]);
    render_local_business_schema(SITE_NAME . ' - ' . $ilce_name, $page_canonical, $ilce_name, $il_name);
    ?>

    <div class="container" style="padding:40px 0;">
        <div class="grid-12" style="align-items:flex-start;">
            <div style="grid-column:span 7;">
                <span class="badge"><span></span> <?= strtoupper($ilce_name) ?> BÖLGE HİZMETİ</span>
                <h1 style="line-height:1.15;margin-top:20px;font-size: clamp(2rem, 5vw, 3rem);"><?= $ilce_name ?> <span style="color:var(--secondary);"><?= $klima_suffix ?></span><br>Satış, Montaj ve Servis</h1>
                
                <div class="info-callout" style="margin-top:24px;">
                    <p><strong>🏭 <?= $ilce_name ?>, <?= $il_name ?> bölgesinde aynı gün keşif garantisi!</strong></p>
                    <p><?= $ilce_name ?>, <?= $il_name ?> bölgesinde <?= $klima_suffix ?> satış, montaj ve servis hizmeti sunuyoruz. Gree'nin R32 çevreci VRF teknolojisini, Mitsubishi Electric City Multi donanımlarını ve Daikin VRV sistemlerini projenizin mimarisine en uygun şekilde entegre ederiz.</p>
                </div>

                <div class="stats-inline" style="margin-top:32px;">
                    <div><h4>%97</h4><p>Müşteri Memnuniyeti</p></div>
                    <div><h4>2-4 Saat</h4><p>Keşif Süresi</p></div>
                    <div><h4>Aynı Gün</h4><p>Müdahale</p></div>
                </div>

                <div style="display:flex;gap:16px;margin-top:28px;">
                    <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>?konum=<?= urlencode($ilce_name . ', ' . $il_name) ?>" class="btn-primary btn-lg">Ücretsiz Keşif İste</a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp btn-lg"><span class="material-symbols-outlined">chat</span>WhatsApp</a>
                </div>
            </div>
            <div style="grid-column:span 5;">
                <?php render_lead_form($ilce_name . ' İçin Teklif Al', '24 saat içinde ücretsiz kapasite ön raporu.', $ilce_name . ', ' . $il_name); ?>
            </div>
        </div>
    </div>

    <div class="container">
        <?php render_seo_blocks($il_name, $ilce_name, '', $klima_suffix, $il_slug, $ilce_slug, '', $marka_slug); ?>
    </div>

    <?php if (is_odak_ilce($ilce_slug) && !empty($ilce_data['mahalleler'])): ?>
    <!-- Mahalleler -->
    <section style="padding:60px 0;background:var(--bg-section);">
        <div class="container">
            <h2 style="font-size:1.75rem;color:var(--primary);margin-bottom:8px;"><?= $ilce_name ?> Mahallelerinde <?= $klima_suffix ?> Hizmetlerimiz</h2>
            <p style="color:#718096;margin-bottom:32px;">← <a href="<?= get_bolge_url($il_slug, '', '', $marka_slug) ?>" style="color:var(--secondary);font-weight:600;"><?= $il_name ?> İlçelerine Dön</a></p>
            <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:12px;">
                <?php foreach ($ilce_data['mahalleler'] as $m_slug => $m_name): ?>
                <a href="<?= get_bolge_url($il_slug, $ilce_slug, $m_slug, $marka_slug) ?>" class="mahalle-link"><?= $m_name ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- VRF Sistem Tipleri -->
    <section style="padding:80px 0;">
        <div class="container">
            <?php render_section_header('VRF / VRV Sistem Tipleri ve Hizmetlerimiz', $ilce_name . ' bölgesinde sunduğumuz VRF çözümleri.', true); ?>
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
                <a href="<?= get_page_url('sayfa', 'vrf-urunler') ?>" class="system-card">
                    <span class="material-symbols-outlined">ac_unit</span>
                    <h3>Isı Geri Kazanımlı VRF</h3>
                    <p>Eş zamanlı ısıtma ve soğutma yapan Heat Recovery sistemleri. Otel, AVM ve karma kullanımlı binalar için ideal.</p>
                </a>
                <a href="<?= get_page_url('sayfa', 'vrf-urunler') ?>" class="system-card">
                    <span class="material-symbols-outlined">heat_pump</span>
                    <h3>Isı Pompalı VRF</h3>
                    <p>Heat Pump teknolojisiyle tüm bölgelerde ısıtma/soğutma. Fabrika ve ofis binaları için maliyet etkin çözüm.</p>
                </a>
                <a href="<?= get_page_url('sayfa', 'vrf-urunler') ?>" class="system-card">
                    <span class="material-symbols-outlined">air</span>
                    <h3>Yalnız Soğutma VRF</h3>
                    <p>Sunucu odaları ve sıcak iklimlerde sürekli soğutma gereken tesislere özel mühendislik çözümü.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- SEO İçerik -->
    <section style="padding:60px 0;background:white;border-top:1px solid rgba(0,0,0,.05);">
        <div class="container">
            <div class="grid-12" style="gap:60px;">
                <div style="grid-column:span 8;">
                    <h2><?= $ilce_name ?>, <?= $il_name ?>'da VRF Klima Sistemleri</h2>
                    <p style="color:#4A5568;line-height:1.8;margin-bottom:16px;"><?= $ilce_name ?> bölgesinde VRF (Variable Refrigerant Flow) merkezi klima sistemleri, ticari binalar, oteller, hastaneler ve endüstriyel tesisler için en verimli iklimlendirme çözümünü sunar. Inverter kompresör teknolojisi ile %1-%100 kapasitede çalışarak yıllık enerji tüketiminde %30-%45 arası tasarruf sağlar.</p>
                    <p style="color:#4A5568;line-height:1.8;"><?= SITE_DOMAIN ?> Pendik merkezli operasyon ağımızla <?= $ilce_name ?> bölgesine aynı gün keşif garantisi sunuyoruz. Gree, Mitsubishi Electric, Daikin ve Samsung DVM portföyüyle projenize en uygun sistemi kurarız.</p>
                </div>
                <div style="grid-column:span 4;">
                    <div class="sidebar-box">
                        <h4>Neden <?= SITE_DOMAIN ?>?</h4>
                        <ul class="check-list-sm">
                            <li><span class="material-symbols-outlined">check_circle</span>Profesyonel Mühendislik Merkezi</li>
                            <li><span class="material-symbols-outlined">check_circle</span>Pendik Merkezli Hızlı Lojistik</li>
                            <li><span class="material-symbols-outlined">check_circle</span>3D Projelendirme & Isı Yükü</li>
                            <li><span class="material-symbols-outlined">check_circle</span>Periyodik Bakım Anlaşması</li>
                            <li><span class="material-symbols-outlined">check_circle</span>7/24 Acil Arıza Müdahalesi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Diğer İlçeler -->
    <section style="padding:60px 0;background:var(--bg-section);">
        <div class="container">
            <h3 style="font-size:1.5rem;color:var(--primary);margin-bottom:32px;text-align:center;"><?= $il_name ?>'da Diğer İlçelerde <?= $klima_suffix ?> Hizmetlerimiz</h3>
            <div style="display:flex;justify-content:center;gap:12px;flex-wrap:wrap;">
                <?php foreach ($il_data['ilceler'] as $i_slug => $i_data): ?>
                <a href="<?= get_bolge_url($il_slug, $i_slug, '', $marka_slug) ?>" class="ilce-pill <?= $i_slug === $ilce_slug ? 'active' : '' ?>"><?= $i_data['name'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    require_once 'inc/footer.php';
    exit;
}

// ============================================
// İL SAYFASI
// ============================================
$active_page = '';
$page_title = $il_name . ' ' . $klima_suffix . ' Satış, Montaj ve Projelendirme | ' . SITE_NAME;
$page_description = $il_name . ' genelinde ' . $klima_suffix . ' satış, montaj ve projelendirme. Pendik merkezli operasyonumuzla aynı gün keşif. Gree, Mitsubishi, Daikin profesyonel çözümler.';
$page_keywords = $il_name . ' ' . strtolower($klima_suffix) . ', ' . $il_name . ' vrf montaj, ' . $il_name . ' merkezi klima';
$page_canonical = get_bolge_url($il_slug, '', '', $marka_slug);

require_once 'inc/header.php';
render_breadcrumb([
    ['url' => get_page_url('sayfa', 'index.php'), 'text' => 'Ana Sayfa'],
    ['url' => get_page_url('sayfa', 'hizmetler.php'), 'text' => 'VRF Hizmetleri'],
    ['text' => $il_name . ' ' . $klima_suffix]
]);
render_local_business_schema(SITE_NAME . ' - ' . $il_name, $page_canonical, $il_name, $il_name);

$ilce_count = count($il_data['ilceler']);
?>

<div class="container" style="padding:40px 0 60px;">
    <div class="grid-12" style="align-items:flex-start;">
        <div style="grid-column:span 7;">
            <span class="badge"><span></span> <?= strtoupper($il_name) ?> BÖLGE MERKEZİ</span>
            <h1 style="line-height:1.15;margin-top:20px;font-size: clamp(2rem, 5vw, 3.5rem);"><?= $il_name ?> <span style="color:var(--secondary);"><?= $klima_suffix ?></span><br>Satış, Montaj ve Projelendirme</h1>
            <p style="color:#4A5568;font-size:1.15rem;margin-top:24px;line-height:1.8;"><?= $il_name ?>'<?= in_array(mb_substr($il_name, -1), ['a','ı','u','o']) ? 'nın' : (in_array(mb_substr($il_name, -1), ['e','i','ü','ö']) ? 'nin' : 'un') ?> <?= $ilce_count ?> ilçesinde, Pendik lojistik merkezimizden yönetilen güçlü saha operasyon ağımızla ticari ve endüstriyel <?= $klima_suffix ?> projelendirme, satış ve montaj hizmeti sunuyoruz.</p>

            <div class="stats-inline" style="margin-top:32px;">
                <div><h4>%97</h4><p>Müşteri Memnuniyeti</p></div>
                <div><h4><?= $ilce_count ?></h4><p>İlçe Kapsama</p></div>
                <div><h4>2-4 Saat</h4><p>Keşif Süresi</p></div>
            </div>

            <div style="display:flex;gap:16px;margin-top:28px;">
                <a href="<?= get_page_url('sayfa', 'teklif-al.php') ?>?konum=<?= urlencode($il_name) ?>" class="btn-primary btn-lg">Ücretsiz Keşif İste</a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp btn-lg"><span class="material-symbols-outlined">chat</span>WhatsApp</a>
            </div>
        </div>
        <div style="grid-column:span 5;">
            <?php render_lead_form($il_name . ' İçin Teklif Al', 'Projeniz için 24 saat içinde ücretsiz kapasite ön raporu.', $il_name); ?>
        </div>
    </div>
</div>

<div class="container">
    <?php render_seo_blocks($il_name, '', '', $klima_suffix, $il_slug, '', '', $marka_slug); ?>
</div>

<!-- İlçe Grid -->
<section style="padding:80px 0;background:var(--bg-section);">
    <div class="container">
        <?php render_section_header($il_name . ' İlçelerinde ' . $klima_suffix . ' Hizmetlerimiz', 'İlçenizi seçerek bölgenize özel hizmet detaylarını inceleyin.', true); ?>
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;">
            <?php foreach ($il_data['ilceler'] as $i_slug => $i_data): ?>
            <a href="<?= get_bolge_url($il_slug, $i_slug, '', $marka_slug) ?>" class="ilce-card">
                <span class="material-symbols-outlined">location_on</span>
                <?= $i_data['name'] ?>
                <?php if (is_odak_ilce($i_slug)): ?>
                <span class="ilce-count"><?= count($i_data['mahalleler']) ?> Mahalle</span>
                <?php endif; ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- VRF Sistem Tipleri -->
<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('VRF / VRV Sistem Tipleri ve Hizmetlerimiz', 'İhtiyacınıza uygun sistem tipini seçerek detaylı bilgi alın.', true); ?>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
            <a href="<?= get_page_url('sayfa', 'vrf-urunler') ?>" class="system-card"><span class="material-symbols-outlined">ac_unit</span><h3>Isı Geri Kazanımlı VRF</h3><p>Eş zamanlı ısıtma ve soğutma yapan Heat Recovery sistemleri. Otel, AVM ve karma binalar için ideal.</p></a>
            <a href="<?= get_page_url('sayfa', 'vrf-urunler') ?>" class="system-card"><span class="material-symbols-outlined">heat_pump</span><h3>Isı Pompalı VRF</h3><p>Heat Pump teknolojisiyle tüm bölgelerde ısıtma/soğutma. Fabrika ve ofis binaları için maliyet etkin.</p></a>
            <a href="<?= get_page_url('sayfa', 'vrf-urunler') ?>" class="system-card"><span class="material-symbols-outlined">air</span><h3>Yalnız Soğutma VRF</h3><p>Sunucu odaları ve sıcak iklimlerde sürekli soğutma gereken tesislere özel mühendislik çözümü.</p></a>
            <a href="<?= get_page_url('sayfa', 'vrf-hizmetler') ?>#vrf-montaj" class="system-card dark"><span class="material-symbols-outlined">precision_manufacturing</span><h3>VRF Montaj Hizmeti</h3><p>Sertifikalı montaj ekiplerimizle profesyonel kurulum ve devreye alma.</p></a>
            <a href="<?= get_page_url('sayfa', 'vrf-hizmetler') ?>#vrf-servis-bakim" class="system-card dark"><span class="material-symbols-outlined">build</span><h3>VRF Servis & Bakım</h3><p>Periyodik bakım anlaşmaları, acil arıza müdahalesi ve orijinal yedek parça.</p></a>
            <a href="<?= get_page_url('sayfa', 'vrf-hizmetler') ?>#3d-projelendirme" class="system-card dark"><span class="material-symbols-outlined">architecture</span><h3>3D Projelendirme</h3><p>AutoCAD entegrasyonlu ısı yükü hesaplaması ve BMS otomasyon tasarımı.</p></a>
        </div>
    </div>
</section>

<!-- SEO İçerik -->
<section style="padding:60px 0;background:white;border-top:1px solid rgba(0,0,0,.05);">
    <div class="container">
        <div class="grid-12" style="gap:60px;">
            <div style="grid-column:span 8;">
                <h2><?= $il_name ?>'da VRF Klima Sistemleri Neden Tercih Edilir?</h2>
                <p style="color:#4A5568;line-height:1.8;margin-bottom:16px;"><?= $il_name ?>, Türkiye'nin en büyük ticari, endüstriyel ve turizm altyapısına sahip illerinden biridir. AVM'ler, oteller, kurumsal plaza ofisleri, üniversite kampüsleri, hastaneler ve konut projeleri gibi birçok farklı mimari konsepti kapsar. Her biri kendine özgü termal dinamiklere sahip bu binalarda <strong>VRF (Variable Refrigerant Flow)</strong> merkezi klima sistemleri en verimli çözümü sunar.</p>
                <p style="color:#4A5568;line-height:1.8;">VRF sistemleri Inverter kompresör teknolojisi sayesinde %1-%100 arasında değişken kapasiteyle çalışarak geleneksel sistemlere kıyasla yıllık enerji tüketiminde <strong>%30-%45 tasarruf</strong> sağlar. <?= SITE_DOMAIN ?> Pendik merkez ofisimizden <?= $il_name ?>'<?= in_array(mb_substr($il_name, -1), ['a','ı','u','o']) ? 'nın' : 'nin' ?> tüm ilçelerine aynı gün keşif garantisi veriyoruz.</p>
            </div>
            <div style="grid-column:span 4;">
                <div class="sidebar-box">
                    <h4>Neden <?= SITE_DOMAIN ?>?</h4>
                    <ul class="check-list-sm">
                        <li><span class="material-symbols-outlined">check_circle</span>Profesyonel Mühendislik Merkezi</li>
                        <li><span class="material-symbols-outlined">check_circle</span>Pendik Merkezli Hızlı Lojistik</li>
                        <li><span class="material-symbols-outlined">check_circle</span>3D Projelendirme & Isı Yükü</li>
                        <li><span class="material-symbols-outlined">check_circle</span>Periyodik Bakım Anlaşması</li>
                        <li><span class="material-symbols-outlined">check_circle</span>7/24 Acil Arıza Müdahalesi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Diğer İller -->
<section style="padding:60px 0;background:var(--bg-section);">
    <div class="container">
        <h3 style="font-size:1.5rem;color:var(--primary);margin-bottom:32px;text-align:center;">Diğer İllerde <?= $klima_suffix ?> Hizmetlerimiz</h3>
        <div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap;">
            <?php
            $all_service = ['istanbul' => 'İstanbul', 'kocaeli' => 'Kocaeli', 'sakarya' => 'Sakarya', 'yalova' => 'Yalova'];
            foreach ($all_service as $s => $n): ?>
            <a href="<?= get_bolge_url($s, '', '', $marka_slug) ?>" class="ilce-pill <?= $s === $il_slug ? 'active' : '' ?>"><?= $n ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once 'inc/footer.php'; ?>
