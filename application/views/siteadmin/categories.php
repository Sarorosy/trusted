<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<div class="container mt-4">
    <h2>Category List</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#categoryModal">Add Category</button>
    
    <table id="categoryTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Featured</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category->id ?></td>
                    <td><?= $category->name ?></td>
                    <td><?= $category->isfeatured ? 'Yes' : 'No' ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-category" 
                                data-id="<?= $category->id ?>" 
                                data-name="<?= $category->name ?>"
                                data-featured="<?= $category->isfeatured ?>" 
                                data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                            Edit
                        </button>
                        <a href="<?= base_url('siteadmin/delete_category/'.$category->id) ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Are you sure?')">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('siteadmin/add_category') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="isfeatured" class="form-label">Featured</label>
                        <input type="checkbox" id="isfeatured" name="isfeatured" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('siteadmin/edit_category/') ?>" method="POST" id="editCategoryForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_category_id" name="id">
                    <div class="mb-3">
                        <label for="edit_category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="edit_category_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_isfeatured" class="form-label">Featured</label>
                        <input type="checkbox" id="edit_isfeatured" name="isfeatured" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#categoryTable').DataTable();

    $('.edit-category').click(function() {
        $('#edit_category_id').val($(this).data('id'));
        $('#edit_category_name').val($(this).data('name'));
        $('#edit_isfeatured').prop('checked', $(this).data('featured') == 1);
        $('#editCategoryForm').attr('action', "<?= base_url('siteadmin/edit_category/') ?>" + $(this).data('id'));
    });
});
</script>
