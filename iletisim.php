<?php
require_once 'inc/functions.php';
$active_page = 'iletisim';
$page_title = 'İletişim — ' . SITE_NAME;
$page_description = 'Toptan baklava siparişi için iletişim. ' . SITE_ADDRESS . ' · Telefon: ' . SITE_PHONE . ' · WhatsApp ile hızlı sipariş.';
$page_canonical = 'iletisim';
require_once 'inc/header.php';
render_breadcrumb([['url' => get_page_url('sayfa', 'index.php'), 'text' => 'Ana Sayfa'], ['text' => 'İletişim']]);
?>
<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('Bize Ulaşın'); ?>
        <div class="grid-12" style="gap:40px;">
            <div style="grid-column:span 7;">
                <div class="contact-form-card">
                    <h3>Mesaj Gönderin</h3>
                    <form class="lead-form" onsubmit="sendToWhatsApp(event, this)">
                        <div class="grid-12" style="gap:16px;">
                            <div class="input-group" style="grid-column:span 6;"><label>AD SOYAD</label><input type="text" class="input-control" name="ad" required></div>
                            <div class="input-group" style="grid-column:span 6;"><label>TELEFON</label><input type="tel" class="input-control" name="telefon" required></div>
                            <div class="input-group" style="grid-column:span 6;"><label>E-POSTA</label><input type="email" class="input-control" name="email"></div>
                            <div class="input-group" style="grid-column:span 6;"><label>KONU</label><select class="input-control" name="konu"><option>Toptan Sipariş</option><option>Fiyat Listesi</option><option>Hediyelik Kutu</option><option>Kurumsal Fatura</option><option>Genel Bilgi</option></select></div>
                            <div class="input-group" style="grid-column:span 12;"><label>MESAJINIZ</label><textarea class="input-control" name="mesaj" rows="4" placeholder="Ürün, miktar ve teslimat detaylarını yazın..."></textarea></div>
                        </div>
                        <button type="submit" class="btn-primary btn-full" style="margin-top:16px;">WHATSAPP İLE GÖNDER</button>
                    </form>
                </div>
            </div>
            <div style="grid-column:span 5;">
                <div class="contact-info-card">
                    <h4>İletişim Bilgileri</h4>
                    <div class="contact-item"><span class="material-symbols-outlined">phone_in_talk</span><div><strong>Telefon</strong><p><a href="<?= SITE_PHONE_LINK ?>"><?= SITE_PHONE ?></a></p></div></div>
                    <div class="contact-item"><span class="material-symbols-outlined">mail</span><div><strong>E-Posta</strong><p><a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></p></div></div>
                    <div class="contact-item"><span class="material-symbols-outlined">chat</span><div><strong>WhatsApp</strong><p><a href="<?= SITE_WHATSAPP_LINK ?>">WhatsApp ile iletişime geçin</a></p></div></div>
                    <div class="contact-item"><span class="material-symbols-outlined">location_on</span><div><strong>Adres</strong><p><?= SITE_ADDRESS ?></p></div></div>
                    <div class="contact-item"><span class="material-symbols-outlined">schedule</span><div><strong>Çalışma Saatleri</strong><p>Pzt-Cmt: 08:00 - 19:00</p></div></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
