<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';

$active_page = '';
$page_title = 'Teklif Al — Ücretsiz Keşif ve Projelendirme | ' . SITE_NAME;
$page_description = 'VRF klima projeniz için ücretsiz keşif randevusu alın. 24 saat içinde kapasite ön raporu.';
$page_canonical = 'teklif-al.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => get_page_url('sayfa', 'index.php'), 'text' => 'Ana Sayfa'], ['text' => 'Teklif Al']]);
$konum = $_GET['konum'] ?? ''; $urun = $_GET['urun'] ?? '';
?>
<section style="padding:80px 0;">
    <div class="container">
        <div class="grid-12" style="gap:40px;">
            <div style="grid-column:span 7;">
                <h1 style="font-size:clamp(1.8rem, 4vw, 2.5rem);color:var(--primary);margin-bottom:16px;">Ücretsiz Keşif ve Proje Teklifi</h1>
                <p style="color:#4A5568;line-height:1.8;margin-bottom:32px;">Mimari DWG/PDF projenizi iletin veya formu doldurun. Uzman mühendislerimiz WhatsApp üzerinden hızlıca kapasite ön raporunuzu sunacaktır.</p>
                <div class="contact-form-card">
                    <form class="lead-form" onsubmit="sendToWhatsApp(event, this)">
                        <div class="grid-12" style="gap:16px;">
                            <div class="input-group" style="grid-column:span 6;"><label>AD SOYAD *</label><input type="text" class="input-control" name="ad" required></div>
                            <div class="input-group" style="grid-column:span 6;"><label>TELEFON *</label><input type="tel" class="input-control" name="telefon" required></div>
                            <div class="input-group" style="grid-column:span 6;"><label>E-POSTA</label><input type="email" class="input-control" name="email"></div>
                            <div class="input-group" style="grid-column:span 6;"><label>KONUM</label><input type="text" class="input-control" name="konum" value="<?= htmlspecialchars($konum) ?>" placeholder="İl / İlçe"></div>
                            <div class="input-group" style="grid-column:span 6;"><label>PROJE TİPİ</label><select class="input-control" name="proje_tipi"><option>Fabrika / Üretim Tesisi</option><option>Otel / Turizm</option><option>Plaza / Ofis</option><option>AVM / Mağaza</option><option>Villa / Rezidans</option><option>Hastane / Sağlık</option><option>Eğitim Kurumu</option><option>Veri Merkezi</option><option>Diğer</option></select></div>
                            <div class="input-group" style="grid-column:span 6;"><label>TAHMİNİ ALAN (M²)</label><input type="number" class="input-control" name="alan" placeholder="Örn: 2500"></div>
                            <?php if ($urun): ?>
                            <div class="input-group" style="grid-column:span 12;"><label>İLGİLENDİĞİNİZ ÜRÜN</label><input type="text" class="input-control" name="urun" value="<?= htmlspecialchars($urun) ?>" readonly></div>
                            <?php endif; ?>
                            <div class="input-group" style="grid-column:span 12;"><label>NOTLAR</label><textarea class="input-control" name="notlar" rows="4" placeholder="Projenizle ilgili ek detaylar..."></textarea></div>
                        </div>
                        <button type="submit" class="btn-primary btn-full" style="margin-top:16px;">KEŞİF BİLGİLERİMİ WHATSAPP'A GÖNDER</button>
                    </form>
                </div>
            </div>
            <div style="grid-column:span 5;">
                <div class="sidebar-box" style="margin-bottom:24px;">
                    <h4>Süreç Nasıl İşler?</h4>
                    <ol style="padding-left:20px;color:#4A5568;line-height:2;">
                        <li><strong>Formu doldurun</strong> ve WhatsApp'a aktarın</li>
                        <li><strong>Mühendisimizle görüşün</strong> (Hızlı dönüş)</li>
                        <li><strong>Aynı gün keşif</strong> randevusu planlanır</li>
                        <li><strong>Kapasite raporu</strong> ve şeffaf teklif sunulur</li>
                    </ol>
                </div>
                <div class="sidebar-box">
                    <h4>Hızlı İletişim</h4>
                    <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary btn-full" style="margin-top:12px;display:flex;align-items:center;justify-content:center;gap:8px;"><span class="material-symbols-outlined">phone_in_talk</span><?= SITE_PHONE ?></a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp btn-full" style="margin-top:12px;"><span class="material-symbols-outlined">chat</span>WhatsApp Danışma</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
