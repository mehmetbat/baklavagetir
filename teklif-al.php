<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';

$active_page = 'teklif-al';
$page_title = 'Teklif Al — Toptan Baklava Fiyat Listesi | ' . SITE_NAME;
$page_description = 'Toptan baklava ve tatlı siparişi için fiyat teklifi isteyin. Dakikalar içinde dönüş, kurumsal faturalı satış.';
$page_canonical = 'teklif-al';
require_once 'inc/header.php';
render_breadcrumb([['url' => get_page_url('sayfa', 'index.php'), 'text' => 'Ana Sayfa'], ['text' => 'Teklif Al']]);
$konum = $_GET['konum'] ?? ''; $urun = $_GET['urun'] ?? '';
?>
<section style="padding:80px 0;">
    <div class="container">
        <div class="grid-12" style="gap:40px;">
            <div style="grid-column:span 7;">
                <h1 style="font-size:clamp(1.8rem, 4vw, 2.5rem);color:var(--primary);margin-bottom:16px;">Toptan Baklava Teklif Formu</h1>
                <p style="color:#4A5568;line-height:1.8;margin-bottom:32px;">Formu doldurun, fiyat listesi ve sipariş onayı için dakikalar içinde WhatsApp'tan dönüş yapalım. Acil sipariş için doğrudan arayın.</p>
                <div class="contact-form-card">
                    <form class="lead-form" onsubmit="sendToWhatsApp(event, this)">
                        <div class="grid-12" style="gap:16px;">
                            <div class="input-group" style="grid-column:span 6;"><label>AD SOYAD *</label><input type="text" class="input-control" name="ad" required></div>
                            <div class="input-group" style="grid-column:span 6;"><label>TELEFON *</label><input type="tel" class="input-control" name="telefon" required></div>
                            <div class="input-group" style="grid-column:span 6;"><label>E-POSTA</label><input type="email" class="input-control" name="email"></div>
                            <div class="input-group" style="grid-column:span 6;"><label>FİRMA (opsiyonel)</label><input type="text" class="input-control" name="firma" placeholder="Kafe / Otel / Şirket adı"></div>
                            <div class="input-group" style="grid-column:span 6;"><label>MÜŞTERİ TİPİ</label><select class="input-control" name="musteri_tipi"><option>Kafe / Restoran</option><option>Otel / Pansiyon</option><option>Market / Pastane</option><option>Kurumsal Firma</option><option>Düğün / Organizasyon</option><option>Catering Firması</option><option>Bireysel</option><option>Diğer</option></select></div>
                            <div class="input-group" style="grid-column:span 6;"><label>TESLİMAT ŞEHRİ</label><input type="text" class="input-control" name="sehir" value="<?= htmlspecialchars($konum) ?>" placeholder="İstanbul / Kocaeli / ..."></div>
                            <div class="input-group" style="grid-column:span 6;"><label>ÜRÜN / ÇEŞİT</label><input type="text" class="input-control" name="urun" value="<?= htmlspecialchars($urun) ?>" placeholder="Örn: Fıstıklı Baklava"></div>
                            <div class="input-group" style="grid-column:span 6;"><label>TAHMİNİ MİKTAR</label><input type="text" class="input-control" name="miktar" placeholder="Örn: 10 kg / 5 tepsi"></div>
                            <div class="input-group" style="grid-column:span 12;"><label>NOTLAR</label><textarea class="input-control" name="notlar" rows="4" placeholder="Teslimat tarihi, özel istekler, fatura bilgisi..."></textarea></div>
                        </div>
                        <button type="submit" class="btn-primary btn-full" style="margin-top:16px;">TALEBİMİ WHATSAPP'A GÖNDER</button>
                    </form>
                </div>
            </div>
            <div style="grid-column:span 5;">
                <div class="sidebar-box" style="margin-bottom:24px;">
                    <h4>Sipariş Süreci</h4>
                    <ol style="padding-left:20px;color:#4A5568;line-height:2;">
                        <li><strong>Formu doldurun</strong> ve WhatsApp'a gönderin</li>
                        <li><strong>Fiyat teklifi</strong> dakikalar içinde dönülür</li>
                        <li><strong>Sipariş onayı</strong> ve ödeme koordinasyonu</li>
                        <li><strong>Taze üretim + teslimat</strong> (İstanbul aynı gün / diğer iller kargo)</li>
                    </ol>
                </div>
                <div class="sidebar-box">
                    <h4>Hızlı İletişim</h4>
                    <a href="<?= SITE_PHONE_LINK ?>" class="btn-primary btn-full" style="margin-top:12px;display:flex;align-items:center;justify-content:center;gap:8px;"><span class="material-symbols-outlined">phone_in_talk</span><?= SITE_PHONE ?></a>
                    <a href="<?= SITE_WHATSAPP_LINK ?>" class="btn-whatsapp btn-full" style="margin-top:12px;"><span class="material-symbols-outlined">chat</span>WhatsApp'tan Yaz</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
