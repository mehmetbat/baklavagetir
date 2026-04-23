<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
$active_page = '';
$page_title = 'Sıkça Sorulan Sorular — VRF Klima | ' . SITE_NAME;
$page_description = 'VRF klima sistemleri hakkında sıkça sorulan sorular ve yanıtları. VRF nedir, enerji tasarrufu, montaj süresi, marka seçimi.';
$page_canonical = 'sss.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'SSS']]);
render_faq_schema(get_faqs());
?>
<section style="padding:80px 0;">
    <div class="container" style="max-width:800px;">
        <?php render_section_header('Sıkça Sorulan Sorular', 'VRF klima sistemleri hakkında merak ettiğiniz her şey.', true); ?>
        <?php foreach (get_faqs() as $faq): ?>
        <div class="faq-item">
            <button class="faq-q"><?= $faq['q'] ?><span class="material-symbols-outlined icon">expand_more</span></button>
            <div class="faq-a"><p><?= $faq['a'] ?></p></div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
