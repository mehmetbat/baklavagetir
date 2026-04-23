# Proje Blueprint: VRF Klima Sistemleri Şablonu

Bu doküman, şu anki projenin (vrfklima.tr) temel omurgasını detaylandırır. Farklı bir sektöre (örn: Tekne Kiralama, Toptan Satış) uyarlanacağı zaman klonlanması gereken mimari, dönüşüm algoritmaları ve tasarım kurallarını içerir.

> [!TIP]
> **Modüler Klonlama Notu:** Başka bir sektöre geçildiğinde "VRF ve Mühendislik" kelimeleri yerine "Hizmet ve Uzmanlık" kavramlarını aynı CSS mimarisi ve component düzeni üzerinden geçirin.

---

## 1. Temel Amaç ve Dönüşüm (Conversion) Hunisi

Sitenin ana amacı sadece bilgi vermek değil, ziyaretçiyle anında "etkileşim (Lead)" kurmaktır.
- **Ziyaretçiyi Karşılama:** Göz ucuyla okunan sayfa üstü kayan yazı ("Aynı gün ücretsiz keşif") ve güven hissi.
- **Birincil Aksiyon (Primary CTA):** Kullanıcıyı potansiyel müşteri havuzuna eklemek için "Form Doldurma (Teklif Al)" sayfasına yönlendiren vurgulu butonlar.
- **İkincil Aksiyon (Secondary CTA):** Hemen etkileşime geçmek isteyen acil müşteriler için mobil odaklı **Sticky (Yapışkan) WhatsApp** veya Canlı Destek butonları. Sayfanın neresinde olunursa olunsun iletişim ihtimali %100 her zaman görünürdür.
- **Sürtünmeyi Azaltmak:** Formların içeriği, "Bizi Ara" demek yerine "Ücretsiz rapor al" gibi bir fayda karşılığında sunulur.

---

## 2. Ana Sayfa (Homepage) Akışı

Yukarıdan aşağıya inşa edilen modüler yapı kullanıcıyı belirli bir psikolojik ikna sırasıyla aşağı çeker:

1. **Top Bar & Marquee (Aciliyet & Değer):** Kampanyalar, açık olunan saatler, stok veya bedava/hızlı hizmet bilgisinin hareketli hali.
2. **Hero Bölümü (Ana Kanca):**
   - Çarpıcı başlık ve kısa avantaj açıklaması (Mühendislik + Aynı Gün Teslim).
   - "İncele" (eğitimsel süreç) ve "Teklif Al" (eylem süreci) butonları yan yana.
   - 3 adet mini Iconlu Güven Vaadi (Garanti, Orijinal Ürün vs.).
3. **Sayılı İstatistikler ve Markalar (Otorite İnşası):** "1200+ İş Teslimi", "ISO Belgeli" ve desteklenen global markaların logolarından oluşan Authority bar.
4. **Çekirdek Ürün / Hizmet Vitrini (Core Offerings):** Grid tabanlı, resimli, bol beyaz boşluklu ana hizmet kalemleri.
5. **Hizmet Bölgeleri/Ağı:** Arama motorları için lokasyon (Local SEO) besleyen özel harita veya konum kartları (İstanbul, Kocaeli vs.).
6. **Sektörel Çözümleme (Ağrı Noktaları):** Kullanıcı "Bana özel mi?" dedirtmek için B2B / B2C sektörel örnekler (Oteller İçin, Evler için, Plazalar için). 
7. **Referans ve Projeler (Sosyal Kanıt):** Gerçek lokasyonlu, uygulanmış işlerin fotoğraflı kanıtları.
8. **Neden Biz? (USPs):** Madde madde farklılaştıran özellikler.
9. **Müşteri Yorumları (Testimonials):** Doğrulanabilir ve mevkii/iş ünvanı olan müşteri yorumları.
10. **SEO Bloğu ve SSS Akordeonları:** Uzun teknik arama kelimelerini sayfaya hapsetmek ve indeks almak için tasarlanmış geniş bloklar.
11. **Bottom CTA Banner (Kapanış Vuruşu):** Çıkış yapan kullanıcıyı tutmak için dev puntolarla son hamle ("Hemen Ücretsiz Etüt İste").

---

## 3. Alt Sayfa Yapısı ve Hiyerarşi

- **Hub and Spoke (Silo) Mimarisi:**
  - Sayfalar birbirine rastgele değil Breadcrumb (Ana Sayfa > Bölge > İlçe) üzerinden hiyerarşik bağlanır.
- **1. İşlevsel Sayfalar:** Hizmet Detay, Ürün Detay (Grid ve listelerle donatılmış, SEO optimizasyonlu Schema tagleri içeren sunumlar).
- **2. Lokal SEO (Bölgesel) Sayfalar:** "Pendik VRF Sistemleri" gibi her mahalleye/lokasyona indeks atılmasını sağlayan standartlaştırılmış açılış şablonları.
- **3. Inbound (Blog) Sayfaları:** Saf teknik bilgi vererek veya kıyaslamalar yaparak Google arayanlarını yakalayan "kılavuz" tarzı alt sayfalar.

---

## 4. Tasarım ve UI Özellikleri

- **Grid Modeli:** `grid-12` üzerine kurulmuş, 12 sütunlu kusursuz matematiksel oran (*Örn: Kartlar sırasıyla 3'lü, 4'lü, 6'lı sütun kaplamaları (span) kullanır*).
- **Modern Renk ve Tipografi:** Çoğunlukla okunabilirliği yüksek `Plus Jakarta Sans` benzeri Sans-Serif fontlar. Bir adet Ana Renk (Primary - Güven), ve bir adet Eylem Rengi (Secondary - Enerjik/WhatsApp tarzı) ile sınırlandırılmış profesyonel palet.
- **Mikro Etkileşimler (Micro-Interactions):** Butonların ve kartların fare ile üzerine gelindiğinde `transform: translateY` veya hafif bir **gölge büyümesi** ile tepki vermesi. Sitesinin ölü değil, yaşayan bir obje olduğu hissini yaratır.
- **İkonografi:** Metin ağır (Text-heavy) paragraflar yerine parçalanmış listeler (H4 + kısa paragraf + modern Material Icon).

---

## 5. İçerik ve İletişim Tonu

> [!IMPORTANT]  
> Tonlama ve Dil Hiyerarşisi herhangi bir sektör klonlanmasında kilit roldedir. Dil pazarlama değil "Otoriter Teknik Uzman" dilidir.

- **Kopya (Copywriting) Yaklaşımı:** "En iyisi biziz" yerine "Verimli, Teknik, ISO Standartlı" tarzında ölçülebilir garantiler kullanan, B2B alıcısını rahatlatan bir dil.
- **Hiyerarşi Algoritması:** 
  - `H1`: Tek bir tane ve mutlaka ana kilit kelimeyi barındırır.
  - `H2`: Satış itirazlarını karşılayan veya bölüm bölen sorular.
  - `H3 / H4`: Hızlı taranabilirlik sağlayan kart başlıkları.
- **Listeleme Kullanımı:** Kullanıcıların internette uzun metin okumaktan kaçınma prensibine dayanarak tüm avantajlar "Checklist" simgeleri ile ayrılmıştır.
