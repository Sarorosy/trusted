<style>
    #addBlogOffcanvas {
        width: 50%;
    }
</style>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<div class="container mt-4">
    <h2 class="mb-4">Blog List</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="offcanvas" data-bs-target="#addBlogOffcanvas">Add Blog</button>

    <table id="blogsTable" class="table table-striped">
        <thead>
            <tr>
                <th style="display: none;">#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Feature Post</th>
                <th>Popular Post</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog): ?>
                <tr>
                    <td style="display: none;"><?= $blog->id ?></td>
                    <td>
                        <img src="<?= base_url("uploads/" . $blog->image) ?>" alt="Blog Image" width="50">
                    </td>

                    <td><?= $blog->title ?></td>
                    <td><?= date('d M Y', strtotime($blog->created_at)) ?></td>
                    <td>
                        <input type="checkbox" class="feature-post-toggle" data-id="<?= $blog->id ?>" <?= $blog->isfeaturepost ? 'checked' : '' ?>>
                    </td>
                    <td>
                        <input type="checkbox" class="popular-post-toggle" data-id="<?= $blog->id ?>" <?= $blog->ispopular ? 'checked' : '' ?>>
                    </td>

                    <td>
                        <a href="<?= base_url('siteadmin/edit_blog/' . $blog->id) ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Offcanvas Form -->
<div class="offcanvas offcanvas-end" id="addBlogOffcanvas" tabindex="-1">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Add New Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <form action="<?= base_url('siteadmin/add_blog') ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="YARD CLEAN UP JOBS | ANY EXPERIENCE IS WELCOME" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control summernote" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select" required>
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Pay</label>
                <input placeholder="$46/HR" type="text" name="pay" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Advertisements</label>
                <div id="adsContainer">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div class="d-flex mb-2">
                            <input type="text" name="ad_title[]" class="form-control me-2" placeholder="Ad Title <?= $i ?>" required>
                            <input type="text" name="ad_link[]" class="form-control" placeholder="Ad Link <?= $i ?>" required>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Toggle Feature Post
        $('.feature-post-toggle').change(function() {
            let blog_id = $(this).data('id');
            let is_feature_post = $(this).is(':checked') ? 1 : 0;

            $.post("<?= base_url('siteadmin/updateFeaturePost') ?>", {
                blog_id,
                is_feature_post
            }, function(response) {
                let data = JSON.parse(response);
                alert(data.message);
            });
        });

        // Toggle Popular Post
        $('.popular-post-toggle').change(function() {
            let blog_id = $(this).data('id');
            let is_popular = $(this).is(':checked') ? 1 : 0;

            $.post("<?= base_url('siteadmin/updatePopularPost') ?>", {
                blog_id,
                is_popular
            }, function(response) {
                let data = JSON.parse(response);
                alert(data.message);
            });
        });
    });
</script>