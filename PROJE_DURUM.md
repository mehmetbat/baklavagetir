# Baklava Getir — Proje Durum Raporu

**Son güncelleme:** 2026-04-23
**Repo:** https://github.com/mehmetbat/baklavagetir (public)
**Canlı:** https://baklavagetir.com (Hostinger)
**Local:** `/Users/mbat/Desktop/projele/toptan-baklava` · `php -S localhost:8080`

---

## 1. PROJE ÖZETİ

Toptan baklava ve tatlı tedarikçisi tanıtım sitesi. PHP (built-in router, no framework). Apache + .htaccess ile pretty URL. Veritabanı yok — tüm içerik `inc/data-*.php` dosyalarında.

**İletişim:**
- Telefon: **0532 622 11 55** (`SITE_PHONE`)
- WhatsApp: `wa.me/905326221155`
- Email: `siparis@baklavagetir.com`

**Katalog:** 10 kategori · 47 ürün (xlsx'ten aktarıldı)

---

## 2. YAPILANLAR ✅

### Ürün kataloğu
- `Başlıksız e-tablo (2).xlsx` → 47 ürün `inc/data-products.php`
- 10 kategori: Klasik Baklavalar, Sarmalar, Dürümler, Kadayıflar, Özel Çeşitler, Sütlü & Soğuk, Şerbetli Tatlılar, Börekler, Tepsi Baklavalar, Hediyelik
- Her ürün için fiyat, dilim sayısı, içerik, özellikler, rating, görsel
- Featured + kampanya bayrakları, ilgili ürünler API'si

### Görseller
- 47 üründen 42'si kendi özel görseline bağlı (`img/fistikli-baklava.webp` vb.)
- Tepsi ve bazı özel çeşitler için en yakın varyant görseli kullanıldı
- Banner/kategori kart görselleri üründe kullanılmıyor

### İçerik temizliği
- Tüm VRF klima artıkları silindi (bolge.php, turkey.php, vrf-*.html, llms.txt, vrfklima-*.json/md)
- Sahte/abartılı iddialar kaldırıldı (VIP, protokol, %100 organik, sınırlı üretim, ahşap kutu, master şef, yüzyıllık zanaat)
- Hediyelik ürünlerde "logolu ahşap kutu" yerine "hediyelik ambalaj"
- Sahte müşteri yorumları (Hilton, BBVA) kaldırıldı
- Statik sayfalar (hakkimizda, hizmetler, sektorler, sss, iletisim, blog, teklif-al) baklava içeriğine çevrildi

### İletişim CTA'ları
- Hero: Hemen Ara + WhatsApp butonları
- Üst bar: Tıklanabilir telefon + WhatsApp badge
- Marquee: Telefon + WhatsApp + teslimat bilgisi
- Sticky mobil bar: WhatsApp + Ara
- Tüm sayfalarda birden fazla iletişim noktası

### SEO
- Pretty URL: `/urun/slug`, `/kategori/slug`, `/blog/slug`, `/iletisim`, `/hakkimizda` vb.
- `.htaccess`: .php gizle, trailing slash, kategori/ürün/blog rewrite, cache headers (1y img, 1m css), gzip
- Canonical tag düzeltildi (çift URL bug'ı giderildi)
- Schema.org: `FoodEstablishment`, `Product` + `Offer` + `AggregateRating`, `BreadcrumbList`, `FAQPage`
- Sitemap.xml: 73 URL (ana sayfalar + 10 kategori + 47 ürün + blog)
- robots.txt: baklavagetir.com sitemap + hassas path disallow

### Deploy
- GitHub: Public repo, `main` branch
- Hostinger: Git deploy ile bağlı, SSH key eklendi
- `.gitignore`: sitemap.xml cache, .DS_Store, .env, vendor/

---

## 3. YAPILACAKLAR / İSTEĞE BAĞLI İYİLEŞTİRMELER

### SEO & İçerik
- [ ] **Google Search Console**: domain doğrula + sitemap.xml gönder
- [ ] **Google Analytics** veya GTM ID'si (şu an `GTM-T6QN3WVH` — kontrol edilmeli, gerçek hesap bağlandı mı?)
- [ ] **Blog yazılarının içerikleri** yazılmamış — şu an sadece başlık/excerpt var, `blog-detay.php` "yakında" diyor
- [ ] **Meta description** bazı sayfalarda genel — ürün detayda daha zengin olabilir
- [ ] **Open Graph + Twitter Card** meta tag'leri yok (sosyal paylaşım için)

### Görseller
- [ ] Eksik ürün görselleri çekilmeli:
  - `ankara-sarma` (şu an `yaprak-sarma.webp`)
  - `sobiyet-kaymakli` (şu an `dilber-dudagi-kapali11.webp`)
  - `padisah` (şu an `sultaniye.webp`)
  - `beyaz-baklava` (şu an `prenses.webp`)
  - `antep-ozel` (şu an `fistikli-baklava-2.webp`)
  - `kadayif-cevizli` (şu an `kadayif.webp`)
  - `antep-ozel-cevizli` (şu an `ev-baklavasi-cevizli.webp`)
- [ ] `hero-baklava.webp` (955KB) — optimize edilebilir (<200KB hedef LCP)
- [ ] Yedek/duplicate görseller silinebilir: `*-2.webp`, `*1.webp`, `*11.webp` (~665KB)
- [ ] Kullanılmayan VRF görselleri: `baklava-vip-teslimat.webp`, `baklava-ustasi.webp` — silinebilir

### Fonksiyonel
- [ ] İletişim/Teklif formları **WhatsApp'a yönlendiriyor** — e-posta veya backend kayıt isteniyorsa `sendToWhatsApp` yerine PHP mail / DB kaydı eklenmeli
- [ ] KVKK onay checkbox'ı formlarda eksik (gönderim öncesi zorunlu)
- [ ] Google Maps iframe'i `iletisim.php`'de yok — adres haritası eklenebilir
- [ ] 404 sayfası yok — Hostinger varsayılan görünür. Özel `404.php` eklenebilir
- [ ] Arama özelliği yok (opsiyonel)
- [ ] Sepet/ödeme yok (şu an sipariş WhatsApp/telefon üzerinden — e-ticaret isteniyorsa ayrı proje)

### Altyapı
- [ ] **SSL**: Hostinger'da Let's Encrypt aktifleştirilmeli (hâlâ http ise)
- [ ] HTTP → HTTPS 301 redirect aktifleştirilmeli
- [ ] `www.` → root redirect (veya tersi) — tek canonical domain
- [ ] Email hesabı: `siparis@baklavagetir.com` Hostinger'da oluşturulmalı
- [ ] Backup stratejisi: Hostinger otomatik backup aktif mi?

---

## 4. DİZİN YAPISI

```
toptan-baklava/
├── index.php                 # Ana sayfa
├── urunler.php               # Ürün liste + kategori filtresi
├── urun-detay.php            # Ürün detay (rewrite: /urun/slug)
├── hakkimizda.php
├── hizmetler.php
├── sektorler.php             # Müşteri segmentleri
├── sss.php
├── iletisim.php
├── teklif-al.php
├── blog.php
├── blog-detay.php            # (rewrite: /blog/slug)
├── kvkk.php
├── gizlilik.php
├── sitemap.php               # /sitemap.xml üretir (cache'li)
├── robots.txt
├── .htaccess                 # URL rewrite + cache + compression
├── .gitignore
├── PROJE_DURUM.md            # (bu dosya)
│
├── inc/
│   ├── config.php            # SITE_PHONE, SITE_URL, menü, sabitler
│   ├── functions.php         # get_page_url, render_breadcrumb, render_meta, render_lead_form
│   ├── data-products.php     # 47 ürün + 10 kategori + API fonksiyonları
│   ├── data-content.php      # Hizmetler, sektörler, SSS, blog yazıları
│   ├── header.php            # <head> + üst bar + marquee + nav
│   └── footer.php            # Footer + sticky CTA + WhatsApp JS
│
├── css/styles.css
├── js/main.js
└── img/                      # 84 görsel (.webp)
```

---

## 5. KRİTİK KOD NOKTALARI

### Yapılandırma — `inc/config.php`
```php
SITE_NAME     = 'Baklava Getir'
SITE_PHONE    = '0532 622 11 55'
SITE_WHATSAPP = 'https://wa.me/905326221155'
SITE_EMAIL    = 'siparis@baklavagetir.com'
```
Telefon numarası değişirse **sadece burayı güncelle** — tüm site otomatik alır.

### URL Üretici — `inc/functions.php:24`
```php
get_page_url('urun', 'fistikli-baklava')  // => /urun/fistikli-baklava
get_page_url('blog', 'slug')              // => /blog/slug
get_page_url('sayfa', 'iletisim')         // => /iletisim
```

### Ürün API — `inc/data-products.php`
```php
get_products()                          // tüm ürünler
get_products('klasik-baklavalar')       // kategoriye göre
get_product('fistikli-baklava')         // tek ürün
get_featured_products(8)                // öne çıkanlar
get_campaign_products()                 // kampanyalılar
get_related_products($slug, 4)          // ilgili ürünler
get_product_categories()                // 10 kategori
```

---

## 6. HOSTINGER DEPLOY AKIŞI

Her değişiklikten sonra:
1. Localde test et: `php -S localhost:8080` → http://localhost:8080
2. `git add . && git commit -m "..." && git push`
3. Hostinger hPanel → **Git** → baklavagetir → **Deploy Now**
4. `https://baklavagetir.com/sitemap.php?refresh=1` aç (sitemap cache yenile)

---

## 7. SON COMMIT'LER

```
d3bf112  header: WhatsApp badge'i tıklanabilir link yap
0dbbc27  VRF klima kalıntılarını temizle, statik sayfaları baklavaya uyarla
aba140b  Initial commit
```

---

## 8. AÇIK SORULAR (kullanıcıya sorulacak)

1. **GTM-T6QN3WVH** Google Tag Manager ID'si gerçek mi, yoksa placeholder mi?
2. Adres `Levent, Beşiktaş / İstanbul` doğru mu? (`inc/config.php:21`)
3. Email `siparis@baklavagetir.com` oluşturuldu mu Hostinger'da?
4. Şirket ünvanı `Baklava Getir Gıda A.Ş.` resmi mi? (Footer + KVKK için önemli)
5. Çalışma saatleri `Pzt-Cmt: 08:00 - 19:00` doğru mu? (`iletisim.php`)
6. Blog yazıları yazılacak mı, yoksa blog sayfası kaldırılsın mı?
7. Instagram/Facebook/TikTok linkleri var mı? (Footer'da `#` placeholder)

---

## 9. HIZLI HATIRLATICILAR

- **Hallucination'dan kaçın**: Ürünler sadece xlsx'teki 47 çeşit. Yeni çeşit eklenmez.
- **Abartı yok**: VIP, protokol, lüks oteller, master şef, sadece lüks, sınırlı üretim yazmıyoruz.
- **Ahşap kutu yok**: Hediyelik ürünlerde "ahşap kutu, logo kazıma" yok.
- **CTA önceliği**: Telefon ve WhatsApp her sayfada görünür olmalı — form ikincil.
- **SEO pretty URL**: Yeni link yazarken `get_page_url('sayfa', 'iletisim')` kullan, `.php` ekleme.
