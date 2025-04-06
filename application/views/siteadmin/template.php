<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .wrapper {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 250px;
            background: #212529;
            color: white;
            padding: 20px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar h4 {
            padding-bottom: 15px;
            border-bottom: 1px solid #495057;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 250px;
            flex: 1;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
        }
        .footer {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        Welcome, Administrator
    </header>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h4>Navigation</h4>
            <a href="<?= base_url('siteadmin') ?>">🏠 Dashboard</a>
            <a href="<?= base_url('siteadmin/categories') ?>">📂 Categories</a>
            <a href="<?= base_url('siteadmin/logout') ?>">🚪 Logout</a>
        </nav>

        <!-- Main Content -->
        <main class="content">
            <?php if (isset($main_content)) $this->load->view($main_content); ?>
        </main>
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; <?= date('Y') ?> Admin Panel. All Rights Reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#blogsTable').DataTable();
            $('#categoryTable').DataTable();
            $('.summernote').summernote({
                height: 200
            });
        });
    </script>

</body>
</html>
