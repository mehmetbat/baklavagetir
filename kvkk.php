<?php
require_once 'inc/functions.php';
$active_page = '';
$page_title = 'KVKK Aydınlatma Metni | ' . SITE_NAME;
$page_description = 'Kişisel verilerin korunması kanunu kapsamında aydınlatma metni.';
$page_canonical = 'kvkk.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'KVKK']]);
?>
<section style="padding:80px 0;"><div class="container" style="max-width:800px;">
<h1 style="font-size:2rem;color:var(--primary);">KVKK Aydınlatma Metni</h1>
<p style="color:var(--text-secondary);line-height:1.8;margin-top:24px;"><?= SITE_COMPANY ?> olarak kişisel verilerinizin güvenliği konusunda büyük özen gösteriyoruz. 6698 sayılı Kişisel Verilerin Korunması Kanunu (KVKK) kapsamında, tarafımıza ilettiğiniz kişisel veriler (ad, soyad, telefon, e-posta, adres vb.) yalnızca hizmet sunumu, teklif hazırlama ve müşteri ilişkileri yönetimi amacıyla işlenmektedir.</p>
<p style="color:var(--text-secondary);line-height:1.8;margin-top:16px;">Kişisel verileriniz, açık rızanız olmaksızın üçüncü taraflarla paylaşılmaz. Verilerinizin silinmesi, düzeltilmesi veya işlenmesinin durdurulması talepleriniz için <a href="mailto:<?= SITE_EMAIL ?>" style="color:var(--secondary);font-weight:600;"><?= SITE_EMAIL ?></a> adresinden bize ulaşabilirsiniz.</p>
</div></section>
<?php require_once 'inc/footer.php'; ?>
