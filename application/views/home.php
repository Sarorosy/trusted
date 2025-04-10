<style>
    .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-card {
        position: relative;
        color: white;
        cursor: pointer;
        height: 100%;
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
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
    }

    #load-more {
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<?php

$blogs = $datas;
?>

<div class="container py-4 ">
    <div class="row mx-auto justify-content-center">
        <div class="col-md-4 m-mb-2">
            <?php $featured = $featuredposts[0]; ?>
            <div class="blog-card" onclick="window.location.href='<?= base_url($featured->slug) ?>'">
                <img src="<?= base_url('uploads/') . $featured->image ?>" alt="Featured Image" class="blog-img">

                <div class="blog-content">
                    <span class="category-badge"><?= $featured->category_name ?></span>
                    <h4 class="blog-title-h">
                        <?php
                        if (!empty($featured->pay)) {
                            echo htmlspecialchars($featured->pay) . ' | ' . htmlspecialchars($featured->title);
                        } else {
                            echo htmlspecialchars($featured->title);
                        }
                        ?></h4>
                </div>
            </div>
        </div>

        <!-- Other Blogs -->
        <div class="col-md-6">
            <div class="row">
                <?php foreach (array_slice($featuredposts, 1) as $blog): ?>
                    <div class="col-6 mb-3">
                        <div class="blog-card" onclick="window.location.href='<?= base_url($blog->slug) ?>'">

                            <img src="<?= base_url('uploads/') . $blog->image ?>" alt="Blog Image" class="blog-img">

                            <div class="blog-content">
                                <span class="category-badge"><?= $blog->category_name ?></span>
                                <h6 class="blog-title-h">
                                    <?php
                                    if (!empty($blog->pay)) {
                                        echo htmlspecialchars($blog->pay) . ' | ' . htmlspecialchars($blog->title);
                                    } else {
                                        echo htmlspecialchars($blog->title);
                                    }
                                    ?></h6>
                                <small><?= $blog->created_at ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="container py-4 mx-auto">
    <div class="row mx-auto justify-content-center">
        <div class="col-lg-6">
            <div class="row" id="blog-container">
                <?php foreach ($blogs as $index => $blog): ?>
                    <div class="col-md-6 mb-4">
                        <div class="blog-card" onclick="window.location.href='<?= base_url($blog->slug) ?>'">
                            <img src="<?= base_url('uploads/') . $blog->image ?>" alt="Blog Image" class="blog-img">
                            <div class="blog-content">
                                <span class="category-badge"><?= $blog->category_name ?></span>
                                <h6 class="blog-title-h">
                                    <?php
                                    if (!empty($blog->pay)) {
                                        echo htmlspecialchars($blog->pay) . ' | ' . htmlspecialchars($blog->title);
                                    } else {
                                        echo htmlspecialchars($blog->title);
                                    }
                                    ?></h6>
                                <small><?= date('d M Y', strtotime($blog->created_at)) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
            <div class="text-center my-3">
                <button id="load-more" class="w-100 d-bg text-light">More Items</button>
            </div>
        </div>
        <!-- Sidebar (Popular Content) -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 0;">
                <h4 class="mb-3 left-border"> <span class="mx-2"></span> Recent Featured Articles</h4>
                <ul class="list-unstyled featured-posts">
                    <?php foreach ($featuredposts as $index => $f): ?>
                        <li class="featured-item">
                            <a href="<?php echo base_url($f->slug) ?>" class="featured-link">
                                <img src="<?php echo base_url('uploads/') . $f->image ?>" alt="<?php echo $f->title ?>" class="featured-img">
                                <span class="featured-title"><?php echo $f->title ?></span>

                            </a>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="featured-category"><?php echo $f->category_name ?></span>
                                <span class="featured-timestamp"><?= date("M d, Y", strtotime($f->created_at)) ?></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var page = 2;

    $(document).on('click', '#load-more', function() {
        $.ajax({
            url: "<?= base_url('home/index/') ?>" + page,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.blogs.length > 0) {
                    response.blogs.forEach(function(blog) {
                        var blogHTML = `<div class="col-md-6 mb-4">
                            <div class="blog-card" onclick="window.location.href='${blog.slug}'">
                                <img src="<?= base_url('uploads/') ?>${blog.image}" alt="Blog Image" class="blog-img">
                                <div class="blog-content">
                                    <span class="category-badge">${blog.category_name}</span>
                                    <h6>${blog.pay} | ${blog.title}</h6>
                                    <small>${blog.created_at}</small>
                                </div>
                            </div>
                        </div>`;
                        $("#blog-container").append(blogHTML);
                    });

                    page++; // Increment page number after successful fetch
                } else {
                    $("#load-more").text("No More Items").prop("disabled", true);
                }
            }
        });
    });
</script>