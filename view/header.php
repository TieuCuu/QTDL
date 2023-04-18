<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        #nav {
            background-image: url("https://assets.contenthub.wolterskluwer.com/api/public/content/cf0275b8b30c4d19834b8a94129e5295");
            background-image: url("../header.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>

<body class="sb-nav-fixed" style="background-color: #f8f9fa;">

    <div class="container-fluid p-0">
        <nav class="navbar navbar-light " id="nav">

            <?php
            if (isset($_SESSION['username']) && $_SESSION['username'] != "") { ?>
                <div class="container-fluid">
                    <a class="nav-link mx-auto my-5 text-white " href="index.php?act=home"><b><u>WELCOM TO SACH.COM</u></b></a>

                </div>

                <div class="mx-auto">
                    <button class="btn btn-success">
                        <a class="nav-link text-white" href="index.php?act=user&ND=<?= $_SESSION['nd'] ?>"><i class="fas fa-user-tie"> </i> <?= $_SESSION['username'] ?>
                        </a>
                    </button>

                    <button class="btn btn-danger">
                        <a class="nav-link text-white" href="index.php?act=logout"> <i class=" fa fa-sign-out"> </i> Thoát</a>
                    </button>

                <?php   } else {  ?>

                    <div class="container-fluid">
                        <a class="nav-link mx-auto my-5 text-white " href="#"><b><u>WELCOM TO SACH.COM</u></b></a>

                    </div>
                <?php } ?>


                </div>

        </nav>