<style>
    .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-card {
        position: relative;
        color: white;
    }

    .blog-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .blog-content {
        position: absolute;
        bottom: 10px;
        left: 10px;
        right: 10px;
        z-index: 1;
    }

    .category-badge {
        background: #007bff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
    }
</style>
<?php
$page = 1;
$blogs = $datas; // Get the first 4 blogs
?>

<div class="container py-4">
    <div class="row m-auto">
        <div class="col-md-4 ">
            <?php $featured = $blogs[0]; ?>
            <div class="blog-card">
                <img src="<?= base_url('uploads/') .$featured->image ?>" alt="Featured Image" class="blog-img">
                <div class="blog-content">
                    <span class="category-badge"><?= $featured->category ?></span>
                    <h4><?= $featured->pay ?> | <?= $featured->title ?></h4>
                </div>
            </div>
        </div>

        <!-- Other Blogs -->
        <div class="col-md-6">
            <div class="row">
                <?php foreach (array_slice($blogs, 1) as $blog): ?>
                    <div class="col-6 mb-3">
                        <div class="blog-card">
                            <img src="<?= base_url('uploads/') . $blog->image ?>" alt="Blog Image" class="blog-img">
                            <div class="blog-content">
                                <span class="category-badge"><?= $blog->category ?></span>
                                <h6><?= $blog->pay ?> | <?= $blog->title ?></h6>
                                <small><?= $blog->created_at ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="pagination-container">
    <?= $pagination_links; ?>
</div>