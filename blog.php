<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
$active_page = 'blog';
$page_title = 'VRF Klima Blog — Rehberler ve Teknik İçerikler | ' . SITE_NAME;
$page_description = 'VRF klima sistemleri hakkında teknik rehberler, karşılaştırmalar ve sektörel içerikler.';
$page_canonical = 'blog.php';
require_once 'inc/header.php';
render_breadcrumb([['url' => 'index.php', 'text' => 'Ana Sayfa'], ['text' => 'Blog']]);
?>
<section style="padding:80px 0;">
    <div class="container">
        <?php render_section_header('VRF Klima Blog', 'Teknik rehberler, sektörel içerikler ve VRF hakkında bilmeniz gerekenler.'); ?>
        <div class="grid-12" style="gap:24px;">
            <?php foreach (get_blog_posts() as $post): ?>
            <div class="blog-card" style="grid-column:span 6;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                    <span class="blog-category" style="background:var(--secondary); color:white; padding:4px 12px; border-radius:30px; font-size:0.8rem; font-weight:600;"><?= $post['category'] ?? 'Genel' ?></span>
                    <span class="blog-date" style="font-size:0.85rem; color:#718096;"><?= date('d.m.Y', strtotime($post['date'])) ?></span>
                </div>
                <h3><a href="<?= get_page_url('blog', $post['slug']) ?>"><?= $post['title'] ?></a></h3>
                <p><?= $post['excerpt'] ?></p>
                <a href="<?= get_page_url('blog', $post['slug']) ?>" class="link-arrow">Devamını Oku →</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
