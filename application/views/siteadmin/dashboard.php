<style>
    #addBlogOffcanvas {
        width: 50%;
    }
</style>
<div class="container mt-4">
    <h2 class="mb-4">Blog List</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="offcanvas" data-bs-target="#addBlogOffcanvas">Add Blog</button>

    <table id="blogsTable" class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog): ?>
                <tr>
                    <td><?= $blog->title ?></td>
                    <td><?= date('d M Y', strtotime($blog->created_at)) ?></td>
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
                <textarea name="description" class="form-control summernote"  required></textarea>
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
                <input placeholder="$46/HR" type="text" name="pay" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>