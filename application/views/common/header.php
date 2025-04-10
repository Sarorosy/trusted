
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trusted 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <style>
        .navbar {
            padding: 3px 20px;
        }
        .navbar-nav .nav-link {
            color: white;
        }
        .navbar-nav .nav-link:hover {
            color: #00aaff;
        }
        .search-box {
            border-radius: 20px;
            padding: 5px 15px;
            width: 200px;
        }
        @media (max-width: 768px) {
            .search-box {
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg d-bg">
        <div class=" container ">
            <a class="navbar-brand " href="<?php echo base_url() ?>">
                <img src="<?php echo base_url('assets/images/logo.png') ?>" alt="Trusted10" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Automobile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Healthy Eating</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beauty & Personal Care</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control search-box" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>
