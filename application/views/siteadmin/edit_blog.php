<div class="container mt-4">
    <h2>Edit Blog</h2>
    <form action="<?= base_url('siteadmin/update_blog/' . $blog->id) ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= $blog->title ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control summernote" required><?= $blog->description ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            <img src="<?= base_url('uploads/' . $blog->image) ?>" width="100" alt="Blog Image">
        </div>
        <input type="hidden" name="current_image" value="<?= $blog->image ?>">
        <div class="mb-3">
            <label class="form-label">Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id; ?>" <?= ($blog->category == $category->id) ? 'selected' : '' ?>>
                        <?= $category->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Pay</label>
            <input type="text" name="pay" class="form-control" value="<?= $blog->pay ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Advertisements</label>
            <div id="adsContainer">
                <?php
               $ads = !empty($blog->keywords) ? json_decode($blog->keywords, true) : [];               // Decode JSON from DB
                if (!empty($ads)) :
                    foreach ($ads as $index => $ad) :
                ?>
                        <div class="d-flex mb-2">
                            <input type="text" name="ad_title[]" class="form-control me-2" placeholder="Ad Title <?= $index + 1 ?>" value="<?= htmlspecialchars($ad['title']) ?>" required>
                            <input type="text" name="ad_link[]" class="form-control" placeholder="Ad Link <?= $index + 1 ?>" value="<?= htmlspecialchars($ad['link']) ?>" required>
                        </div>
                    <?php
                    endforeach;
                else :
                    // Default inputs if no ads exist
                    for ($i = 1; $i <= 4; $i++) :
                    ?>
                        <div class="d-flex mb-2">
                            <input type="text" name="ad_title[]" class="form-control me-2" placeholder="Ad Title <?= $i ?>" required>
                            <input type="text" name="ad_link[]" class="form-control" placeholder="Ad Link <?= $i ?>" required>
                        </div>
                <?php endfor;
                endif; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= base_url('siteadmin') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>