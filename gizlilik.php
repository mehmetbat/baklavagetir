<?php
require_once 'inc/functions.php';
$active_page = '';
$page_title = 'Gizlilik Politikası | ' . SITE_NAME;
$page_description = 'Web sitemizin gizlilik politikası ve çerez kullanımı hakkında bilgi.';
$page_canonical = 'gizlilik.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Gizlilik Politikası']]);
?>
<section style="padding:80px 0;"><div class="container" style="max-width:800px;">
<h1 style="font-size:2rem;color:var(--primary);">Gizlilik Politikası</h1>
<p style="color:var(--text-secondary);line-height:1.8;margin-top:24px;"><?= SITE_COMPANY ?> olarak web sitemizi ziyaret eden kullanıcılarımızın gizliliğine saygı duyuyoruz. Bu gizlilik politikası, sitemiz aracılığıyla toplanan bilgilerin nasıl kullanıldığını açıklar.</p>
<h3 style="color:var(--primary);margin-top:32px;">Toplanan Bilgiler</h3>
<p style="color:var(--text-secondary);line-height:1.8;margin-top:12px;">İletişim formları ve teklif talep formları aracılığıyla ad, telefon, e-posta ve proje detayları gibi bilgiler toplanmaktadır. Bu bilgiler yalnızca hizmet sunumu amacıyla kullanılır.</p>
<h3 style="color:var(--primary);margin-top:32px;">Çerez Kullanımı</h3>
<p style="color:var(--text-secondary);line-height:1.8;margin-top:12px;">Web sitemiz, kullanıcı deneyimini iyileştirmek amacıyla çerezler kullanabilir. Çerezler, tarayıcı ayarlarınız aracılığıyla yönetilebilir.</p>
</div></section>
<?php require_once 'inc/footer.php'; ?>
