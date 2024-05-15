<?php
    include('core/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASEURL;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL;?>assets/css/style.css">
    <title>Chris Supss</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
                <a class="navbar-brand" href="/module-4-1-crud-wdv-chris071607/">Home</a>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspyHeading1">First</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspyHeading2">Second</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
                            <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
   