    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h2>Baklava Getir</h2>
                    <p>Kafe-restoran, otel, market ve kurumsal müşteriler için toptan baklava ve tatlı tedarikçisi. 10 kategori, 47 çeşit.</p>
                    <div class="footer-social">
                        <a href="#" class="icon-link" aria-label="Web sitesi"><span class="material-symbols-outlined">language</span></a>
                        <a href="#" class="icon-link" aria-label="E-posta"><span class="material-symbols-outlined">mail</span></a>
                        <a href="#" class="icon-link" aria-label="Instagram"><span class="material-symbols-outlined">photo_camera</span></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h5>Kurumsal</h5>
                    <ul>
                        <li><a href="<?= get_page_url('sayfa', 'hakkimizda') ?>">Hakkımızda</a></li>
                        <li><a href="<?= get_page_url('sayfa', 'hizmetler') ?>">Hizmetler</a></li>
                        <li><a href="<?= get_page_url('sayfa', 'sektorler') ?>">Müşteri Segmentleri</a></li>
                        <li><a href="<?= get_page_url('sayfa', 'iletisim') ?>">İletişim</a></li>
                        <li><a href="<?= get_page_url('sayfa', 'teklif-al') ?>">Teklif Al</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h5>Baklava Kategorileri</h5>
                    <ul>
                        <li><a href="<?= get_page_url('sayfa', 'urunler') ?>">Tüm Koleksiyon</a></li>
                        <li><a href="<?= get_page_url('sayfa', 'urunler') ?>?kategori=klasik-baklavalar">Klasik Baklavalar</a></li>
                        <li><a href="<?= get_page_url('sayfa', 'urunler') ?>?kategori=ozel-cesitler">Özel Çeşitler</a></li>
                        <li><a href="<?= get_page_url('sayfa', 'urunler') ?>?kategori=hediyelik">Hediyelik</a></li>
                        <li><a href="<?= get_page_url('sayfa', 'blog') ?>">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h5>İletişim</h5>
                    <ul>
                        <li><a href="<?= SITE_PHONE_LINK ?>"><?= SITE_PHONE ?></a></li>
                        <li><a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></li>
                        <li><a href="<?= SITE_WHATSAPP_LINK ?>">WhatsApp</a></li>
                        <li><?= SITE_ADDRESS ?></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© <?= SITE_YEAR ?> <?= SITE_COMPANY ?> Tüm Hakları Saklıdır.</p>
                <div class="footer-bottom-links">
                    <a href="<?= get_page_url('sayfa', 'kvkk.php') ?>">KVKK</a>
                    <a href="<?= get_page_url('sayfa', 'gizlilik.php') ?>">Gizlilik Politikası</a>
                </div>
            </div>

            <!-- Hizmet Bölgeleri SEO Linkleri -->
            <div class="footer-silo-links">
                <h6>Baklava Kategorileri</h6>
                <ul class="city-list">
                    <?php
                    $cats = get_product_categories();
                    foreach ($cats as $cs => $c): ?>
                    <li><a href="<?= get_page_url('sayfa', 'urunler') ?>?kategori=<?= $cs ?>"><?= $c['name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Sticky Mobile CTA -->
    <div class="sticky-cta">
        <a href="<?= SITE_WHATSAPP_LINK ?>" class="whatsapp-btn"><span class="material-symbols-outlined">chat</span>WhatsApp</a>
        <a href="<?= SITE_PHONE_LINK ?>" class="teklif-btn"><span class="material-symbols-outlined">call</span>Hemen Ara</a>
    </div>

<script>
function sendToWhatsApp(e, form) {
    e.preventDefault();
    const fd = new FormData(form);
    let is_iletisim = fd.has('mesaj'); // if it's contact form
    
    let msg = is_iletisim 
        ? "Merhaba, İletişim Formu aracılığıyla ulaşıyorum:\n\n" 
        : "Merhaba, sayfanızdan sipariş/teklif talebi iletiyorum:\n\n";
        
    for (let [key, value] of fd.entries()) {
        if (!value) continue;
        let label = key.replace(/_/g, ' ').toUpperCase();
        if (key === 'ad') label = 'AD SOYAD';
        if (key === 'email') label = 'E-POSTA';
        msg += `👤 *${label}*: ${value}\n`;
    }
    
    const phone = "905326221155";
    const waUrl = `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;
    window.open(waUrl, '_blank');
}
</script>
</body>
</html>
