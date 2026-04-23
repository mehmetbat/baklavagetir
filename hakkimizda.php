<?php
require_once 'inc/functions.php';
$active_page = '';
$page_title = 'Hakkımızda — ' . SITE_NAME;
$page_description = 'VRF iklimlendirme çözüm merkezi. Pendik merkezli operasyonumuzla İstanbul, Kocaeli, Yalova ve Sakarya bölgesinde hizmet veriyoruz.';
$page_canonical = 'hakkimizda.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Hakkımızda']]);
?>
<section style="padding:80px 0;">
    <div class="container">
        <div class="grid-12" style="gap:60px;align-items:center;">
            <div style="grid-column:span 6;">
                <h1 style="font-size:clamp(1.8rem, 4vw, 2.5rem);color:var(--primary);margin-bottom:20px;">VRF İklimlendirme<br>Mühendisliği</h1>
                <p style="color:#4A5568;line-height:1.8;margin-bottom:16px;"><?= SITE_DOMAIN ?> olarak projenizin mimarisine, kapasitesine ve bütçesine en uygun sistemi kuran profesyonel <strong>İklimlendirme Mühendisleriyiz</strong>.</p>
                <p style="color:#4A5568;line-height:1.8;margin-bottom:16px;">Projenize en uygun çözümü tarafsız mühendislik etiğiyle öneren ortağınızız.</p>
                <p style="color:#4A5568;line-height:1.8;">Pendik'teki lojistik ve operasyon merkezimizden <?= SERVICE_CITIES_TEXT ?> bölgesine aynı gün keşif garantisi veriyoruz. Bugüne dek <strong>1.250'yi aşkın</strong> projeyi başarıyla tamamladık.</p>
            </div>
            <div style="grid-column:span 6;">
                <div class="why-image-block"><div class="why-badge">1250+ Proje</div><img src="img/vrf-klima-neden-biz-hakkimizda-vrf.webp" alt="VRF Klima Mühendislik Ekibi" loading="lazy" decoding="async"></div>
            </div>
        </div>
    </div>
</section>
<section style="padding:60px 0;background:var(--bg-section);">
    <div class="container">
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px;">
            <div class="stat-card" style="text-align:center;"><div class="icon"><span class="material-symbols-outlined">groups</span></div><h3>1250+</h3><p>Tamamlanan Proje</p></div>
            <div class="stat-card" style="text-align:center;"><div class="icon"><span class="material-symbols-outlined">apartment</span></div><h3>4 İl</h3><p>Hizmet Bölgesi</p></div>
            <div class="stat-card" style="text-align:center;"><div class="icon"><span class="material-symbols-outlined">star</span></div><h3>%97</h3><p>Memnuniyet Oranı</p></div>
            <div class="stat-card" style="text-align:center;"><div class="icon"><span class="material-symbols-outlined">engineering</span></div><h3>6</h3><p>Marka Portfolyo</p></div>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
