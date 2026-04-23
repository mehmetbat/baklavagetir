<?php
require_once 'inc/functions.php';
require_once 'inc/data-content.php';
$slug = $_GET['slug'] ?? '';
$posts = get_blog_posts(); $post = null;
foreach ($posts as $p) { if ($p['slug'] === $slug) { $post = $p; break; } }
if (!$post) { header('Location: blog.php'); exit; }

$active_page = 'blog';
$page_title = $post['title'] . ' | ' . SITE_NAME;
$page_description = $post['excerpt'];
$page_canonical = get_page_url('blog', $slug);
require_once 'inc/header.php';
render_breadcrumb([['url' => get_page_url('sayfa', 'index.php'), 'text' => 'Ana Sayfa'], ['url' => get_page_url('sayfa', 'blog.php'), 'text' => 'Blog'], ['text' => $post['title']]]);
?>
<section style="padding:80px 0;">
    <div class="container" style="max-width:800px;">
        <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
            <span class="blog-category" style="background:var(--secondary); color:white; padding:4px 12px; border-radius:30px; font-size:0.8rem; font-weight:600;"><?= $post['category'] ?? 'Genel' ?></span>
            <span class="blog-date" style="font-size:0.9rem; color:#718096;"><?= date('d.m.Y', strtotime($post['date'])) ?></span>
        </div>
        <h1 style="font-size:clamp(1.8rem, 4vw, 2.5rem); color:var(--primary); line-height:1.2;"><?= $post['title'] ?></h1>
        <p style="color:#4A5568;line-height:1.8;margin-top:24px;font-size:1.1rem;"><?= $post['excerpt'] ?></p>
        <div style="margin-top:40px;padding:32px;background:var(--bg-section);border-radius:16px;border-left:4px solid var(--secondary);">
            <p style="color:#4A5568;line-height:1.8;">Bu içerik yakında detaylı olarak yayınlanacaktır. VRF klima sistemleri hakkında detaylı bilgi almak için <a href="<?= get_page_url('sayfa', 'iletisim.php') ?>" style="color:var(--secondary);font-weight:700;">bize ulaşın</a> veya <a href="<?= get_page_url('sayfa', 'sss.php') ?>" style="color:var(--secondary);font-weight:700;">SSS sayfamızı</a> inceleyin.</p>
        </div>
        <div style="margin-top:60px;padding-top:40px;border-top:1px solid #E2E8F0;">
            <h3 style="margin-bottom:20px;font-size:1.5rem;color:var(--primary);">Bunu da Okuyun</h3>
            <div class="grid-12" style="gap:20px;">
                <?php 
                $related = array_filter($posts, fn($p) => $p['slug'] !== $slug);
                $related = array_slice($related, 0, 2);
                foreach ($related as $r): ?>
                <div style="grid-column:span 6; background:var(--bg-section); padding:24px; border-radius:12px;">
                    <div style="margin-bottom:8px;">
                        <span style="font-size:0.75rem; color:var(--secondary); font-weight:700; text-transform:uppercase;"><?= $r['category'] ?? 'Genel' ?></span>
                        <span style="font-size:0.75rem; color:#A0AEC0; margin-left:8px;"><?= date('d.m.Y', strtotime($r['date'])) ?></span>
                    </div>
                    <h4 style="margin:0 0 12px 0; font-size:1.1rem; line-height:1.4;"><a href="<?= get_page_url('blog', $r['slug']) ?>" style="color:var(--primary); text-decoration:none;"><?= $r['title'] ?></a></h4>
                    <a href="<?= get_page_url('blog', $r['slug']) ?>" class="link-arrow" style="font-size:0.9rem;">Devamını Oku →</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div style="margin-top:40px;text-align:center;">
            <a href="<?= get_page_url('sayfa', 'blog') ?>" class="btn-outline">← Tüm Blog Yazıları</a>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.php'; ?>
