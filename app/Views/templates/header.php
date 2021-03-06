<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link <?php if($title=="Home"){echo "active";}?> "href="/pages">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link <?php if($title=="About"){echo "active";}?>" href="/pages/comic">Comic</a>
            <a class="nav-item nav-link <?php if($title=="About"){echo "active";}?>" href="/pages/about">About</a>
        </div>
    </nav>
            