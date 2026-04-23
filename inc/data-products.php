<?php
// ============================================
// Baklava Getir — Ürün Kataloğu
// 47 ürün / 10 kategori
// ============================================

$product_categories = [
    'klasik-baklavalar' => [
        'name'  => 'Klasik Baklavalar',
        'slug'  => 'klasik-baklavalar',
        'icon'  => 'diamond',
        'short' => 'Gaziantep zanaatinin vazgeçilmezleri — fıstıklı, cevizli, çikolatalı.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'sarmalar' => [
        'name'  => 'Sarmalar',
        'slug'  => 'sarmalar',
        'icon'  => 'rotate_right',
        'short' => 'İnce yufkadan rulo sarılmış, yoğun fıstık dolgulu koleksiyon.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'durumler' => [
        'name'  => 'Dürümler',
        'slug'  => 'durumler',
        'icon'  => 'waves',
        'short' => 'Fıstık, fındık ve çikolatalı dürüm baklava çeşitleri.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'kadayiflar' => [
        'name'  => 'Kadayıflar',
        'slug'  => 'kadayiflar',
        'icon'  => 'texture',
        'short' => 'Tel kadayıf — burma, düz ve cevizli seçenekler.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'ozel-cesitler' => [
        'name'  => 'Özel Çeşitler',
        'slug'  => 'ozel-cesitler',
        'icon'  => 'workspace_premium',
        'short' => 'Şöbiyet, Bülbül Yuvası, Padişah ve ustalık gerektiren özel formlar.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'sutlu-soguk' => [
        'name'  => 'Sütlü & Soğuk',
        'slug'  => 'sutlu-soguk',
        'icon'  => 'ac_unit',
        'short' => 'Soğuk baklava ve sütlü nuriye — hafif, serinletici tatlar.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'serbetli-tatlilar' => [
        'name'  => 'Şerbetli Tatlılar',
        'slug'  => 'serbetli-tatlilar',
        'icon'  => 'local_cafe',
        'short' => 'Şekerpare ve şerbet yüklü geleneksel tatlılar.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'borekler' => [
        'name'  => 'Börekler',
        'slug'  => 'borekler',
        'icon'  => 'bakery_dining',
        'short' => 'Su böreği — peynirli ve kıymalı, ikramlık yapılar.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'tepsi-baklavalar' => [
        'name'  => 'Tepsi Baklavalar',
        'slug'  => 'tepsi-baklavalar',
        'icon'  => 'restaurant',
        'short' => 'Bütün tepsi baklava — etkinlik, gala ve toplu ikramlar için.',
        'image' => 'img/baklava-urunler-tepsi.webp',
    ],
    'hediyelik' => [
        'name'  => 'Hediyelik',
        'slug'  => 'hediyelik',
        'icon'  => 'redeem',
        'short' => 'Hediyelik ambalajlı fıstıklı ve karışık baklava kutuları.',
        'image' => 'img/cat-hediyelik.webp',
    ],
];

$products = [

    // ============ KLASİK BAKLAVALAR ============
    'fistikli-baklava' => [
        'name' => 'Fıstıklı Baklava', 'slug' => 'fistikli-baklava',
        'category' => 'klasik-baklavalar', 'image' => 'img/fistikli-baklava.webp',
        'price' => '2.050 ₺', 'unit' => 'Kg', 'slice' => '70-88 dilim',
        'short' => 'Gaziantep boz iç fıstığıyla, %100 sade yağda pişirilmiş klasik fıstıklı baklava.',
        'description' => '40 kat oklava açması yufka, sadece Gaziantep boz iç fıstığı ve saf sade yağla hazırlanır. Tatlı-tuzlu dengesi ustalıkla kurulmuş, çıtır yapısını saatlerce koruyan imza lezzetimiz.',
        'ingredients' => ['Boz İç Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker', 'Su'],
        'features' => ['%100 sade yağ', '40 kat ince yufka', 'Sipariş günü üretim', 'Katkı maddesi yok'],
        'featured' => true, 'rating' => 4.9, 'review_count' => 312,
    ],
    'cevizli-baklava' => [
        'name' => 'Cevizli Baklava', 'slug' => 'cevizli-baklava',
        'category' => 'klasik-baklavalar', 'image' => 'img/cevizli-baklava.webp',
        'price' => '1.200 ₺', 'unit' => 'Kg', 'slice' => '84 dilim',
        'short' => 'Yurt içi seçme ceviz içiyle, sade yağda pişirilmiş geleneksel klasik.',
        'description' => 'Fıstık sevmeyenler için zarif bir alternatif. Öğütülmüş ceviz dolgusunun yoğun aroması, sade yağın lezzetiyle birleşerek farklı bir profil oluşturur.',
        'ingredients' => ['Ceviz İçi', 'Sade Yağ', 'Buğday Unu', 'Şeker', 'Su'],
        'features' => ['Yurt içi A kalite ceviz', 'Sade yağ', 'Ekonomik seçim', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 198,
    ],
    'ev-baklavasi' => [
        'name' => 'Ev Baklavası', 'slug' => 'ev-baklavasi',
        'category' => 'klasik-baklavalar', 'image' => 'img/ev-baklavasi.webp',
        'price' => '1.800 ₺', 'unit' => 'Kg', 'slice' => '72 dilim',
        'short' => 'Ev ortamının sıcak, samimi lezzetini anımsatan klasik baklava.',
        'description' => 'Biraz daha hafif şerbet, biraz daha kabarık yufka. Ev tadını arayan damaklar için, klasik fıstıklı baklavanın daha yumuşak yorumu.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Hafif şerbetli', 'Yumuşak yufka', 'Ev lezzeti', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 164,
    ],
    'kuru-baklava' => [
        'name' => 'Kuru Baklava', 'slug' => 'kuru-baklava',
        'category' => 'klasik-baklavalar', 'image' => 'img/kurubaklava.webp',
        'price' => '2.115 ₺', 'unit' => 'Kg', 'slice' => '63 dilim',
        'short' => 'Düşük şerbetli, uzun ömürlü kuru baklava — yolculuk ve hediyelik için ideal.',
        'description' => 'Kuru baklava, şerbeti ölçülü kullanarak hazırlanır; çıtırlığını günlerce korur. Uzak mesafe gönderimlerinde, yurt dışı hediyelikte ve bayram ikramında tercih edilir.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Uzun raf ömrü', 'Çıtır yapı', 'Yolculuğa uygun', 'Hediyelik sunum'],
        'rating' => 4.8, 'review_count' => 142,
    ],
    'dilber-dudagi' => [
        'name' => 'Dilber Dudağı', 'slug' => 'dilber-dudagi',
        'category' => 'klasik-baklavalar', 'image' => 'img/dilber-dudagi-kapali.webp',
        'price' => '2.200 ₺', 'unit' => 'Kg', 'slice' => '77 dilim',
        'short' => 'Yarım ay formunda kıvrılmış, fıstık dolgulu zarif baklava çeşidi.',
        'description' => 'Adını kıvrımlı formundan alan dilber dudağı, içine bolca fıstık dolgusuyla ikramlarda özel bir zarafet katar.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Zarif form', 'Bol fıstık dolgu', 'Etkinlik sunumu', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 119,
    ],
    'cikolatali-baklava' => [
        'name' => 'Çikolatalı Baklava', 'slug' => 'cikolatali-baklava',
        'category' => 'klasik-baklavalar', 'image' => 'img/cikolatali-baklava.webp',
        'price' => '2.300 ₺', 'unit' => 'Kg', 'slice' => '70 dilim',
        'short' => 'Üzeri bitter çikolata kaplı, fıstık dolgulu yeni nesil baklava.',
        'description' => 'Geleneksel baklava hamurunun üzerine özenle uygulanmış bitter çikolata kaplaması. Çocuklarda ve genç kesimde en çok tercih edilen yorumumuz.',
        'ingredients' => ['Antep Fıstığı', 'Bitter Çikolata', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Bitter çikolata kaplama', 'Çocuklar için favori', 'Modern sunum', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 187,
    ],
    'kare-baklava' => [
        'name' => 'Kare Baklava', 'slug' => 'kare-baklava',
        'category' => 'klasik-baklavalar', 'image' => 'img/kare-baklava.webp',
        'price' => '2.550 ₺', 'unit' => 'Kg', 'slice' => '35-104 dilim',
        'short' => 'Kare formda kesilmiş, fıstık dolgulu klasik porsiyonluk baklava.',
        'description' => 'Klasik kare kesim, bütün masalara uyan ikramlık porsiyon. Tepsi servisi ve bireysel ikramda zarif bir çözüm.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Kare porsiyon', 'Bol fıstık', 'Etkinlik tepsisine uygun', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 203,
    ],

    // ============ SARMALAR ============
    'ankara-sarma' => [
        'name' => 'Ankara Sarma', 'slug' => 'ankara-sarma',
        'category' => 'sarmalar', 'image' => 'img/yaprak-sarma.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '78 dilim',
        'short' => 'İnce yufkaya sarılmış, fıstık dolgulu Ankara usulü sarma baklava.',
        'description' => 'Ankara ekolünün sarma formu — daha küçük dilim, daha yoğun fıstık oranı. Kabuğu çıtır, içi bol dolgulu.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['İnce çıtır kabuk', 'Bol fıstık dolgu', 'Küçük porsiyon', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 134,
    ],
    'parmak-sarma' => [
        'name' => 'Parmak Sarma', 'slug' => 'parmak-sarma',
        'category' => 'sarmalar', 'image' => 'img/parmak-sarma.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '64 dilim',
        'short' => 'Parmak boyunda, tek lokmalık fıstık dolgulu rulo sarma.',
        'description' => 'Parmak formunda, elle tutup yenecek zarif bir sarma. Lüks kokteyl servisi ve ayaküstü ikramlar için ideal.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Tek lokmalık', 'Kokteyl servisi', 'Fıstık yoğun', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 112,
    ],
    'saray-sarma' => [
        'name' => 'Saray Sarma', 'slug' => 'saray-sarma',
        'category' => 'sarmalar', 'image' => 'img/saray-sarma.webp',
        'price' => '2.500 ₺', 'unit' => 'Kg', 'slice' => '168 dilim',
        'short' => 'Saray mutfağı geleneğinden gelen, mini porsiyonlu lüks sarma.',
        'description' => 'Tek tepside 168 minik dilim — saray protokol ikramlarının ruhunu yansıtan zarif sarma.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Mini porsiyon', 'Bol dilim', 'Protokol ikramı', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 97,
    ],
    'sari-burma' => [
        'name' => 'Sarı Burma', 'slug' => 'sari-burma',
        'category' => 'sarmalar', 'image' => 'img/sari-burma.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '80 dilim',
        'short' => 'Burma tekniğiyle hazırlanmış, altın sarısı renkli fıstıklı sarma.',
        'description' => 'Burma tekniğinde yufka üzerine serpilen fıstık, rulolar halinde sarıldıktan sonra özel kesimle şekillenir. Altın sarı görünümünden adını alır.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Burma tekniği', 'Altın sarı renk', 'Çıtır kabuk', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 128,
    ],
    'tokat-sarma' => [
        'name' => 'Tokat Sarma', 'slug' => 'tokat-sarma',
        'category' => 'sarmalar', 'image' => 'img/tokat-sarma.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '84 dilim',
        'short' => 'Tokat yöresine özgü, geniş rulolu cevizli-fıstıklı sarma.',
        'description' => 'Tokat sarması, geniş rulolu formuyla dolgu oranını artırır. Ortadan kesilerek servis edilir.',
        'ingredients' => ['Antep Fıstığı', 'Ceviz', 'Sade Yağ', 'Buğday Unu'],
        'features' => ['Geniş rulo', 'Bol dolgu', 'Tokat usulü', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 89,
    ],
    'sultan-sarma' => [
        'name' => 'Sultan Sarma', 'slug' => 'sultan-sarma',
        'category' => 'sarmalar', 'image' => 'img/sultan-sarma.webp',
        'price' => '2.500 ₺', 'unit' => 'Kg', 'slice' => '84 dilim',
        'short' => 'Üzeri bol fıstıkla süslenmiş, lüks sunumlu sarma çeşidi.',
        'description' => 'Sultan sarma, üzerine serilen toz fıstıkla zengin bir görsel sunum sağlar. Özel davetlerde dikkat çeken bir seçim.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Lüks sunum', 'Üst fıstık serpmesi', 'Özel davet', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 103,
    ],
    'yaprak-sarma' => [
        'name' => 'Yaprak Sarma', 'slug' => 'yaprak-sarma',
        'category' => 'sarmalar', 'image' => 'img/yaprak-sarma.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '70 dilim',
        'short' => 'Yaprak formunda sarılmış, fıstık dolgulu yassı sarma.',
        'description' => 'Yaprak benzeri yassı formuyla servis tepsisinde estetik bir düzen oluşturur.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Yassı form', 'Estetik sunum', 'Fıstık dolgu', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 94,
    ],
    'fatih-sarma' => [
        'name' => 'Fatih Sarma', 'slug' => 'fatih-sarma',
        'category' => 'sarmalar', 'image' => 'img/fatih-sarma.webp',
        'price' => '2.500 ₺', 'unit' => 'Kg', 'slice' => '72 dilim',
        'short' => 'Fatih Sultan Mehmet dönemi mutfağından esinli, lüks fıstık sarma.',
        'description' => 'Fatih sarma, Osmanlı saray geleneğinden günümüze ulaşan imza bir sarma çeşidi. Yoğun fıstık oranıyla öne çıkar.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Osmanlı geleneği', 'Yoğun fıstık', 'Lüks sunum', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 116,
    ],

    // ============ DÜRÜMLER ============
    'fistikli-durum' => [
        'name' => 'Fıstıklı Dürüm', 'slug' => 'fistikli-durum',
        'category' => 'durumler', 'image' => 'img/fistikli-durum.webp',
        'price' => '2.550 ₺', 'unit' => 'Kg', 'slice' => '96 dilim',
        'short' => 'Bolca Antep fıstığı dolgulu, ince yufkadan sarılmış dürüm baklava.',
        'description' => 'Dürüm baklavanın klasiği — ince yufkaya serilen fıstığın büyük bir rulo halinde sarılıp küçük dilimlere kesilmiş hali. Lezzet yoğunluğu en yüksek formdur.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Yoğun fıstık oranı', 'Mini dilim', 'İkram için ideal', 'Taze üretim'],
        'featured' => true, 'rating' => 4.9, 'review_count' => 245,
    ],
    'findikli-durum' => [
        'name' => 'Fındıklı Dürüm', 'slug' => 'findikli-durum',
        'category' => 'durumler', 'image' => 'img/findikli-durum.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '96 dilim',
        'short' => 'Karadeniz fındığıyla hazırlanmış, özgün dürüm baklava çeşidi.',
        'description' => 'Karadeniz\'in kavurma fındığı kullanılarak hazırlanan dürüm baklava — kahve ikramlarıyla mükemmel uyum.',
        'ingredients' => ['Kavrulmuş Fındık', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Karadeniz fındığı', 'Kavurma aroma', 'Kahve ikramı', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 118,
    ],
    'cikolatali-durum' => [
        'name' => 'Çikolatalı Dürüm', 'slug' => 'cikolatali-durum',
        'category' => 'durumler', 'image' => 'img/cikolatali-durum.webp',
        'price' => '2.550 ₺', 'unit' => 'Kg', 'slice' => '96 dilim',
        'short' => 'Bitter çikolata kaplı fıstık dolgulu lüks dürüm baklava.',
        'description' => 'Dürüm baklavanın üzerine uygulanan bitter çikolata kaplaması — modern sunumda en çok beğenilen çeşit.',
        'ingredients' => ['Antep Fıstığı', 'Bitter Çikolata', 'Sade Yağ', 'Buğday Unu'],
        'features' => ['Bitter çikolata kaplama', 'Fıstık dolgu', 'Modern sunum', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 176,
    ],

    // ============ KADAYIFLAR ============
    'burma-kadayif' => [
        'name' => 'Burma Kadayıf', 'slug' => 'burma-kadayif',
        'category' => 'kadayiflar', 'image' => 'img/burma-kadayif.webp',
        'price' => '2.200 ₺', 'unit' => 'Kg', 'slice' => '90 dilim',
        'short' => 'Tel kadayıfın burma tekniğiyle hazırlanmış fıstıklı versiyonu.',
        'description' => 'Tel kadayıfın ince tellerinin üzerine fıstık serpilip burularak hazırlanan klasik. Çıtır dış, yumuşak fıstık dolgulu iç.',
        'ingredients' => ['Tel Kadayıf', 'Antep Fıstığı', 'Sade Yağ', 'Şeker'],
        'features' => ['İnce tel yapı', 'Fıstık dolgu', 'Çıtır kabuk', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 156,
    ],
    'kadayif' => [
        'name' => 'Kadayıf', 'slug' => 'kadayif',
        'category' => 'kadayiflar', 'image' => 'img/kadayif.webp',
        'price' => '2.000 ₺', 'unit' => 'Kg', 'slice' => 'porsiyonluk',
        'short' => 'Klasik tel kadayıf — fıstık dolgulu, sade yağlı, şerbetli tatlı.',
        'description' => 'Geleneksel tel kadayıf — iki kat tel arasına yerleştirilen fıstık dolgusu ve nemli şerbet.',
        'ingredients' => ['Tel Kadayıf', 'Antep Fıstığı', 'Sade Yağ', 'Şeker'],
        'features' => ['Geleneksel form', 'Nemli şerbet', 'Fıstık dolgu', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 121,
    ],
    'kadayif-cevizli' => [
        'name' => 'Cevizli Kadayıf', 'slug' => 'kadayif-cevizli',
        'category' => 'kadayiflar', 'image' => 'img/kadayif.webp',
        'price' => '1.800 ₺', 'unit' => 'Kg', 'slice' => 'porsiyonluk',
        'short' => 'Cevizle hazırlanmış, ekonomik tel kadayıf çeşidi.',
        'description' => 'Fıstığın yerini iri kıyım cevizin aldığı kadayıf — damakta yoğun bir ceviz aroması bırakır.',
        'ingredients' => ['Tel Kadayıf', 'Ceviz', 'Sade Yağ', 'Şeker'],
        'features' => ['Ceviz dolgu', 'Ekonomik', 'Yoğun aroma', 'Taze üretim'],
        'rating' => 4.6, 'review_count' => 89,
    ],

    // ============ ÖZEL ÇEŞİTLER ============
    'antep-ozel' => [
        'name' => 'Antep Özel', 'slug' => 'antep-ozel',
        'category' => 'ozel-cesitler', 'image' => 'img/fistikli-baklava-2.webp',
        'price' => '2.800 ₺', 'unit' => 'Kg', 'slice' => '144 dilim',
        'short' => 'Gaziantep\'in imza lezzeti — en yoğun fıstık oranlı özel seri.',
        'description' => 'Seçkin Gaziantep ustalarının imzasını taşıyan özel seri. Fıstık oranı en yüksek seviyede tutulur, 40 kattan fazla yufkayla çalışılır.',
        'ingredients' => ['Boz Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Yoğun fıstık oranı', 'Mini dilim', 'Lüks sunum', 'Taze üretim'],
        'featured' => true, 'rating' => 5.0, 'review_count' => 289,
    ],
    'sobiyet-kaymakli' => [
        'name' => 'Şöbiyet Kaymaklı', 'slug' => 'sobiyet-kaymakli',
        'category' => 'ozel-cesitler', 'image' => 'img/dilber-dudagi-kapali11.webp',
        'price' => '2.600 ₺', 'unit' => 'Kg', 'slice' => '70 dilim',
        'short' => 'Üçgen formda, kaymak-fıstık dolgulu özel baklava çeşidi.',
        'description' => 'Şöbiyet, üçgen formuyla tanınan özel baklava çeşidi. Geleneksel tarifimizde kaymak ve fıstık birlikte kullanılır.',
        'ingredients' => ['Antep Fıstığı', 'Manda Kaymağı', 'Sade Yağ', 'Buğday Unu'],
        'features' => ['Üçgen form', 'Kaymak dolgu', 'Lüks sunum', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 223,
    ],
    'acik-sobiyet' => [
        'name' => 'Açık Şöbiyet', 'slug' => 'acik-sobiyet',
        'category' => 'ozel-cesitler', 'image' => 'img/acik-sobiyet.webp',
        'price' => '2.600 ₺', 'unit' => 'Kg', 'slice' => '44 dilim',
        'short' => 'Üstü açık, fıstık serpmeli şöbiyet çeşidi — görsel bir ziyafet.',
        'description' => 'Açık şöbiyet, üstü kapatılmadan açık bırakılan ve üzerine bolca toz fıstık serpilen zarif bir seri.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Açık üst form', 'Bol fıstık serpme', 'Estetik', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 147,
    ],
    'havuc-dilimi' => [
        'name' => 'Havuç Dilimi', 'slug' => 'havuc-dilimi',
        'category' => 'ozel-cesitler', 'image' => 'img/havuc-dilim.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '33 dilim',
        'short' => 'Havuç dilimi formunda, geniş kesimli fıstıklı özel baklava.',
        'description' => 'Havuç dilimi baklava, yelpaze formunda iri dilimlerle zengin bir sunum sunar. Tek dilimde yoğun fıstık deneyimi.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['İri yelpaze kesim', 'Yoğun fıstık', 'Zengin sunum', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 156,
    ],
    'beyaz-baklava' => [
        'name' => 'Beyaz Baklava', 'slug' => 'beyaz-baklava',
        'category' => 'ozel-cesitler', 'image' => 'img/prenses.webp',
        'price' => '2.300 ₺', 'unit' => 'Kg', 'slice' => '70 dilim',
        'short' => 'Süt ve kaymakla hazırlanmış, üstü pudra şekerli beyaz baklava.',
        'description' => 'Şerbetsiz, sütlü kremayla hazırlanan farklı bir baklava yorumu. Üstüne pudra şekeri serpilerek beyaz görünüm kazandırılır.',
        'ingredients' => ['Antep Fıstığı', 'Süt', 'Kaymak', 'Pudra Şekeri'],
        'features' => ['Şerbetsiz', 'Sütlü krema', 'Pudra şekeri', 'Hafif tatlı'],
        'rating' => 4.7, 'review_count' => 98,
    ],
    'prenses' => [
        'name' => 'Prenses', 'slug' => 'prenses',
        'category' => 'ozel-cesitler', 'image' => 'img/prenses.webp',
        'price' => '2.500 ₺', 'unit' => 'Kg', 'slice' => '48 dilim',
        'short' => 'Lüks kesim, bol fıstıklı özel imza serisi — zarif bir sunum.',
        'description' => 'Prenses baklava, özel kesim formuyla servis tabağında taç gibi duran zarif bir seri.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Özel kesim', 'Lüks sunum', 'Bol fıstık', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 112,
    ],
    'bulbul-yuvasi' => [
        'name' => 'Bülbül Yuvası', 'slug' => 'bulbul-yuvasi',
        'category' => 'ozel-cesitler', 'image' => 'img/bulbul-yuvasi.webp',
        'price' => '2.650 ₺', 'unit' => 'Kg', 'slice' => 'porsiyonluk',
        'short' => 'Yuva formunda, ortası fıstık dolgulu klasik özel çeşit.',
        'description' => 'Bülbül yuvası, yuvarlak yuva formunda hazırlanır ve ortasına bolca fıstık yerleştirilir. İkram tabaklarında mücevher gibi durur.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Yuva formu', 'Orta fıstık dolgusu', 'Mücevher sunum', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 187,
    ],
    'padisah' => [
        'name' => 'Padişah', 'slug' => 'padisah',
        'category' => 'ozel-cesitler', 'image' => 'img/sultaniye.webp',
        'price' => '2.700 ₺', 'unit' => 'Kg', 'slice' => '70 dilim',
        'short' => 'Çok katlı yapı, yoğun fıstık ve kaymak dolgulu premium seri.',
        'description' => 'Padişah baklava, çok katmanlı yufka, fıstık ve kaymak ile hazırlanan en lüks serimiz. Protokol davetlerinde imza sunum.',
        'ingredients' => ['Antep Fıstığı', 'Manda Kaymağı', 'Sade Yağ', 'Buğday Unu'],
        'features' => ['Çok katmanlı', 'Kaymak + Fıstık', 'Protokol ikramı', 'Taze üretim'],
        'rating' => 5.0, 'review_count' => 145,
    ],
    'sultaniye' => [
        'name' => 'Sultaniye', 'slug' => 'sultaniye',
        'category' => 'ozel-cesitler', 'image' => 'img/sultaniye.webp',
        'price' => '2.600 ₺', 'unit' => 'Kg', 'slice' => 'porsiyonluk',
        'short' => 'Saray geleneğinden, üstü fıstık süslü özel baklava çeşidi.',
        'description' => 'Sultaniye, Osmanlı saray mutfağından günümüze uzanan özel bir serinin modern yorumudur.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Saray geleneği', 'Üst fıstık süsleme', 'Özel kesim', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 104,
    ],
    'gelin-bohcasi' => [
        'name' => 'Gelin Bohçası', 'slug' => 'gelin-bohcasi',
        'category' => 'ozel-cesitler', 'image' => 'img/gelin-bohcasi.webp',
        'price' => '2.650 ₺', 'unit' => 'Kg', 'slice' => 'porsiyonluk',
        'short' => 'Düğün ve nişan ikramı için bohça formunda zarif baklava.',
        'description' => 'Gelin bohçası, düğün ve nişan sunumları için tasarlanmış bohça formundaki zarif baklava çeşidi.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Düğün ikramı', 'Bohça formu', 'Zarif sunum', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 133,
    ],
    'dilber-dudagi-agzi-acik' => [
        'name' => 'Dilber Dudağı (Ağzı Açık)', 'slug' => 'dilber-dudagi-agzi-acik',
        'category' => 'ozel-cesitler', 'image' => 'img/dilber-dudagi-acik.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '70 dilim',
        'short' => 'Dilber dudağının üstü açık, fıstık serpmeli zarif versiyonu.',
        'description' => 'Klasik dilber dudağı formunun üstü kapatılmadan açık bırakılan ve fıstık serpilen özel yorumu.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Açık form', 'Bol fıstık serpme', 'Estetik sunum', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 86,
    ],
    'benan' => [
        'name' => 'Benan', 'slug' => 'benan',
        'category' => 'ozel-cesitler', 'image' => 'img/banan.webp',
        'price' => '2.500 ₺', 'unit' => 'Kg', 'slice' => '70 dilim',
        'short' => 'Ustamızın imza özel çeşidi — fıstık yoğun, özel kesim.',
        'description' => 'Benan, ustalarımızın imzasını taşıyan özgün bir kesim tekniğiyle hazırlanan fıstık yoğun özel çeşittir.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['İmza ürün', 'Özgün kesim', 'Fıstık yoğun', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 94,
    ],
    'kusgozu' => [
        'name' => 'Kuşgözü', 'slug' => 'kusgozu',
        'category' => 'ozel-cesitler', 'image' => 'img/kusgozu.webp',
        'price' => '2.650 ₺', 'unit' => 'Kg', 'slice' => '154 dilim',
        'short' => 'Minik kuş gözü formunda, tek lokmalık özel baklava çeşidi.',
        'description' => 'Kuşgözü, ismini formundan alan mini boyutlu, fıstıklı, zarif bir çeşittir. Ayaküstü ikramlarda idealdir.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Mini form', 'Tek lokmalık', 'Ayaküstü ikram', 'Taze üretim'],
        'rating' => 4.9, 'review_count' => 121,
    ],
    'midye-dolma' => [
        'name' => 'Midye Dolma', 'slug' => 'midye-dolma',
        'category' => 'ozel-cesitler', 'image' => 'img/midye-dolma.webp',
        'price' => '2.650 ₺', 'unit' => 'Kg', 'slice' => '80 dilim',
        'short' => 'Midye formunda, fıstık dolgulu özel yapım baklava çeşidi.',
        'description' => 'Midye dolmaya benzer görünümüyle dikkat çeken, içi fıstık dolgulu, özel kesim baklava.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Özel form', 'Bol fıstık dolgu', 'Dikkat çekici', 'Taze üretim'],
        'rating' => 4.8, 'review_count' => 107,
    ],
    'antep-ozel-cevizli' => [
        'name' => 'Antep Özel Cevizli', 'slug' => 'antep-ozel-cevizli',
        'category' => 'ozel-cesitler', 'image' => 'img/ev-baklavasi-cevizli.webp',
        'price' => '2.500 ₺', 'unit' => 'Kg', 'slice' => 'porsiyonluk',
        'short' => 'Antep Özel serisinin ceviz dolgulu premium yorumu.',
        'description' => 'Fıstık yerine seçme ceviz içi kullanılan, Antep Özel serisinin ceviz sever kesim için hazırlanan premium yorumu.',
        'ingredients' => ['Seçme Ceviz', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Ceviz premium', 'Yoğun ceviz', 'Alternatif lezzet', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 82,
    ],

    // ============ SÜTLÜ & SOĞUK ============
    'sutlu-nuriye' => [
        'name' => 'Sütlü Nuriye', 'slug' => 'sutlu-nuriye',
        'category' => 'sutlu-soguk', 'image' => 'img/sutlu-nuriye.webp',
        'price' => '1.800 ₺', 'unit' => 'Kg', 'slice' => '70 dilim',
        'short' => 'Sütlü şerbetli, hafif ve yumuşak tatlı — gündelik ikram için ideal.',
        'description' => 'Sütlü nuriye, klasik baklava yufkasının süt şerbetiyle yumuşatılmış halidir. Daha hafif, daha sütlü, daha yumuşak.',
        'ingredients' => ['Antep Fıstığı', 'Süt', 'Sade Yağ', 'Buğday Unu'],
        'features' => ['Sütlü şerbet', 'Hafif tatlı', 'Yumuşak yapı', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 145,
    ],
    'soguk-baklava' => [
        'name' => 'Soğuk Baklava', 'slug' => 'soguk-baklava',
        'category' => 'sutlu-soguk', 'image' => 'img/soguk-baklava.webp',
        'price' => '2.200 ₺', 'unit' => 'Kg', 'slice' => '48-88 dilim',
        'short' => 'Sütlü soğuk şerbetli, buzdolabında servis edilen modern baklava.',
        'description' => 'Soğuk baklava, sütlü şerbetiyle buzdolabında servise hazırlanan modern bir yorum. Yaz aylarının favorisi.',
        'ingredients' => ['Antep Fıstığı', 'Süt', 'Sade Yağ', 'Buğday Unu'],
        'features' => ['Buzdolabı servisi', 'Sütlü şerbet', 'Yaz favorisi', 'Taze üretim'],
        'featured' => true, 'rating' => 4.9, 'review_count' => 278,
    ],
    'soguk-baklava-bitter' => [
        'name' => 'Soğuk Baklava Bitter', 'slug' => 'soguk-baklava-bitter',
        'category' => 'sutlu-soguk', 'image' => 'img/soguk-baklava-bitter.webp',
        'price' => '2.400 ₺', 'unit' => 'Kg', 'slice' => '20-30 dilim',
        'short' => 'Bitter çikolata kaplı, sütlü şerbetli soğuk baklava lüks yorumu.',
        'description' => 'Soğuk baklavanın üzeri bitter çikolata ile kaplanmış lüks versiyonu. Modern kafeterya ve otel sunumlarının gözdesi.',
        'ingredients' => ['Antep Fıstığı', 'Süt', 'Bitter Çikolata', 'Buğday Unu'],
        'features' => ['Bitter kaplama', 'Sütlü şerbet', 'Buzdolabı servisi', 'Lüks sunum'],
        'rating' => 4.9, 'review_count' => 194,
    ],

    // ============ ŞERBETLİ TATLILAR ============
    'sekerpare' => [
        'name' => 'Şekerpare', 'slug' => 'sekerpare',
        'category' => 'serbetli-tatlilar', 'image' => 'img/sekerpare.webp',
        'price' => '1.200 ₺', 'unit' => 'Kg', 'slice' => 'porsiyonluk',
        'short' => 'Geleneksel, bol şerbetli, yumuşak irmikli kurabiye tatlısı.',
        'description' => 'Şekerpare, yumuşak irmikli hamurun fırınlanıp bol şerbete bandırılmasıyla hazırlanan klasik tatlı.',
        'ingredients' => ['İrmik', 'Yumurta', 'Tereyağı', 'Şeker', 'Su'],
        'features' => ['Geleneksel', 'Bol şerbet', 'Yumuşak yapı', 'Taze üretim'],
        'rating' => 4.6, 'review_count' => 172,
    ],

    // ============ BÖREKLER ============
    'su-boregi-peynirli' => [
        'name' => 'Su Böreği (Peynirli)', 'slug' => 'su-boregi-peynirli',
        'category' => 'borekler', 'image' => 'img/su-boregi-yuvarlak.webp',
        'price' => '800 ₺', 'unit' => 'Kg', 'slice' => '20-30 dilim',
        'short' => 'El açması yufkayla peynir dolgulu geleneksel su böreği.',
        'description' => 'Su böreği, haşlanıp soğutulan yufkaların peynir dolgusuyla tepsiye serilip fırınlandığı klasik bir hamur işidir. Peynirli versiyonu kahvaltı ve ikram masalarının vazgeçilmezi.',
        'ingredients' => ['Yufka', 'Beyaz Peynir', 'Tereyağı', 'Süt', 'Yumurta'],
        'features' => ['El açması yufka', 'Peynir dolgusu', 'Fırın taze', 'Kahvaltı ikramı'],
        'rating' => 4.7, 'review_count' => 98,
    ],
    'su-boregi-kiymali' => [
        'name' => 'Su Böreği (Kıymalı)', 'slug' => 'su-boregi-kiymali',
        'category' => 'borekler', 'image' => 'img/su-boregi11.webp',
        'price' => '900 ₺', 'unit' => 'Kg', 'slice' => '20-30 dilim',
        'short' => 'El açması yufkayla özel soğan-kıyma dolgulu su böreği.',
        'description' => 'Soğan ve baharatlarla harlanmış özel kıyma dolgusu, haşlanmış yufkalar arasında fırınlanır. Öğle yemeği ve toplantı ikramlarının klasiği.',
        'ingredients' => ['Yufka', 'Dana Kıyma', 'Soğan', 'Tereyağı', 'Baharat'],
        'features' => ['El açması yufka', 'Özel kıyma dolgu', 'Fırın taze', 'Doyurucu'],
        'rating' => 4.8, 'review_count' => 113,
    ],

    // ============ TEPSİ BAKLAVALAR ============
    'fistikli-tepsi' => [
        'name' => 'Fıstıklı Tepsi Baklava', 'slug' => 'fistikli-tepsi',
        'category' => 'tepsi-baklavalar', 'image' => 'img/havuc-dilim-kare-tepsi.webp',
        'price' => '5.200 ₺', 'unit' => 'Tepsi', 'slice' => '70-88 dilim',
        'short' => 'Bütün tepsi fıstıklı baklava — etkinlik ve toplu ikram için ideal.',
        'description' => 'Tüm tepsi, kesintisiz tek parça fıstıklı baklava. Etkinlik, gala, düğün ve kurumsal toplu ikram için en prestijli sunum.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Bütün tepsi', '70-88 dilim', 'Etkinlik sunumu', 'Kampanyalı fiyat'],
        'featured' => true, 'campaign' => true, 'rating' => 4.9, 'review_count' => 334,
    ],
    'cevizli-tepsi' => [
        'name' => 'Cevizli Tepsi Baklava', 'slug' => 'cevizli-tepsi',
        'category' => 'tepsi-baklavalar', 'image' => 'img/havuc-dilim-yuvarlak-tepsi.webp',
        'price' => '3.600 ₺', 'unit' => 'Tepsi', 'slice' => '84 dilim',
        'short' => 'Ekonomik tepsi baklava seçeneği — seçme cevizle, sade yağda.',
        'description' => 'Fıstığa alternatif ekonomik tepsi baklava. Seçme cevizle hazırlanır, toplu ikramda maliyet optimizasyonu sağlar.',
        'ingredients' => ['Seçme Ceviz', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Ekonomik tepsi', 'Seçme ceviz', 'Toplu ikram', 'Taze üretim'],
        'rating' => 4.7, 'review_count' => 189,
    ],
    'karisik-tepsi' => [
        'name' => 'Karışık Tepsi Baklava', 'slug' => 'karisik-tepsi',
        'category' => 'tepsi-baklavalar', 'image' => 'img/fistikli-baklava-2.webp',
        'price' => '4.400 ₺', 'unit' => 'Tepsi', 'slice' => 'karışık',
        'short' => 'Tek tepside fıstıklı, cevizli ve çikolatalı karışık baklava sunumu.',
        'description' => 'Misafirlerinizin damak farklılıklarını tek tepside karşılayan karışık sunum. Fıstıklı, cevizli ve çikolatalı çeşitler bir arada.',
        'ingredients' => ['Antep Fıstığı', 'Ceviz', 'Bitter Çikolata', 'Sade Yağ'],
        'features' => ['3 çeşit bir arada', 'Karışık damak', 'Etkinlik için ideal', 'Kampanyalı fiyat'],
        'campaign' => true, 'rating' => 4.9, 'review_count' => 246,
    ],

    // ============ HEDİYELİK ============
    'hediyelik-fistikli' => [
        'name' => 'Hediyelik Fıstıklı Baklava Kutu', 'slug' => 'hediyelik-fistikli',
        'category' => 'hediyelik', 'image' => 'img/cat-hediyelik.webp',
        'price' => '2.550 ₺', 'unit' => 'Kutu', 'slice' => '1 kg / kutu',
        'short' => 'Hediyelik ambalajda fıstıklı baklava kutusu — 1 kg.',
        'description' => 'Özel hediyelik ambalajında fıstıklı baklava. Bireysel ve kurumsal hediye için uygun sunum.',
        'ingredients' => ['Antep Fıstığı', 'Sade Yağ', 'Buğday Unu', 'Şeker'],
        'features' => ['Hediye ambalaj', '1 kg kutu', 'Bireysel ve kurumsal hediye', 'Taze üretim'],
        'featured' => true, 'campaign' => true, 'rating' => 5.0, 'review_count' => 198,
    ],
    'hediyelik-karisik' => [
        'name' => 'Hediyelik Karışık Set', 'slug' => 'hediyelik-karisik',
        'category' => 'hediyelik', 'image' => 'img/baklava-urunler-tepsi.webp',
        'price' => '3.100 ₺', 'unit' => 'Kutu', 'slice' => '1 kg / kutu',
        'short' => 'Fıstıklı, cevizli ve özel çeşitleri bir arada sunan hediyelik kutu.',
        'description' => 'Fıstıklı, cevizli ve özel çeşitlerden oluşan karışık hediyelik kutu. Bayram, yıldönümü ve özel günler için uygun sunum.',
        'ingredients' => ['Antep Fıstığı', 'Ceviz', 'Sade Yağ', 'Buğday Unu'],
        'features' => ['Karışık çeşit', '1 kg kutu', 'Hediyelik ambalaj', 'Taze üretim'],
        'featured' => true, 'campaign' => true, 'rating' => 5.0, 'review_count' => 156,
    ],
];

// Her ürüne computed specs alanı ekle (listelemelerde kolay erişim)
foreach ($products as $slug => &$p) {
    $p['min_order'] = $p['min_order'] ?? (($p['unit'] === 'Tepsi') ? '2 Tepsi' : (($p['unit'] === 'Kutu') ? '10 Kutu' : '5 Kg'));
    $p['specs'] = [
        'Ağırlık'   => '1 ' . $p['unit'],
        'Dilim'     => $p['slice'],
        'Fiyat'     => $p['price'] . ' / ' . $p['unit'],
        'Raf Ömrü'  => (($p['category'] === 'sutlu-soguk') ? '2 gün (+4°C)' : '3 gün (oda sıc.)'),
    ];
    if (!isset($p['featured']))  $p['featured']  = false;
    if (!isset($p['campaign']))  $p['campaign']  = false;
}
unset($p);

// Müşteri Sipariş Tipleri
$indoor_unit_types = [
    'kilo-siparis' => [
        'name' => 'Kilo ile Sipariş', 'slug' => 'kilo-siparis', 'icon' => 'scale',
        'short' => 'Çoğu baklava çeşidimiz kilo ile satılır. Minimum 5 kg.',
        'description' => 'Klasik, sarma, dürüm, kadayıf ve özel çeşitler kilo ile satılır.',
        'ideal_for' => 'Kafe, Restoran, Market, Bireysel',
    ],
    'tepsi-siparis' => [
        'name' => 'Tepsi Siparişi', 'slug' => 'tepsi-siparis', 'icon' => 'restaurant',
        'short' => 'Fıstıklı, cevizli ve karışık tepsi baklava seçenekleri.',
        'description' => 'Toplu ikram ve etkinlik için bütün tepsi baklava.',
        'ideal_for' => 'Düğün, Toplantı, Kurumsal İkram',
    ],
    'hediyelik-kutu' => [
        'name' => 'Hediyelik Kutu', 'slug' => 'hediyelik-kutu', 'icon' => 'redeem',
        'short' => 'Fıstıklı ve karışık hediyelik kutu seçenekleri.',
        'description' => 'Bireysel ve kurumsal hediye için hazır paketlenmiş kutular.',
        'ideal_for' => 'Bireysel Hediye, Kurumsal Hediye',
    ],
    'kargo-gonderim' => [
        'name' => 'Şehir Dışı Kargo', 'slug' => 'kargo-gonderim', 'icon' => 'local_shipping',
        'short' => 'Anlaşmalı kargo ile Türkiye geneline güvenli gönderim.',
        'description' => 'Kuru baklavalar kargoya uygun, sütlü-soğuk ürünler özel paketlemeyle.',
        'ideal_for' => 'Türkiye Geneli, E-ticaret',
    ],
];

// ============ API ============
function get_products($category = null) {
    global $products;
    if (!$category) return $products;
    return array_filter($products, fn($p) => $p['category'] === $category);
}
function get_product($slug) {
    global $products;
    return $products[$slug] ?? null;
}
function get_product_categories() {
    global $product_categories;
    return $product_categories;
}
function get_product_category($slug) {
    global $product_categories;
    return $product_categories[$slug] ?? null;
}
function get_featured_products($limit = 8) {
    global $products;
    $featured = array_filter($products, fn($p) => !empty($p['featured']));
    return array_slice($featured, 0, $limit, true);
}
function get_campaign_products() {
    global $products;
    return array_filter($products, fn($p) => !empty($p['campaign']));
}
function get_indoor_types() { global $indoor_unit_types; return $indoor_unit_types; }
function get_related_products($slug, $limit = 4) {
    global $products;
    $p = $products[$slug] ?? null;
    if (!$p) return [];
    $same_cat = array_filter($products, fn($x) => $x['category'] === $p['category'] && $x['slug'] !== $slug);
    return array_slice($same_cat, 0, $limit, true);
}
