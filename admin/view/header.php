<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
        <header>
            <nav class="navbar navbar-light " id="nav">
                <div class="container-fluid">
                    <a class="nav-link mx-auto my-5 text-white " href="index.php?act=home"><b><u>WELCOM TO SACH.COM</u></b></a>
                </div>

                <div class="mx-auto">
                    <button class="btn btn-success">
                        <a class="nav-link text-white"><i class="fas fa-user-tie"> </i> Admin</a>
                    </button>

                    <button class="btn btn-danger">
                        <a class="nav-link text-white" href="index.php?act=logout"> <i class=" fa fa-sign-out"> </i> Thoát</a>
                    </button>


                </div>

            </nav>

            <div class="position-relative text-center bg-light">
                <ul class="nav nav-pills nav-justified my-auto" id="ex1" role="tablist">
                    <li class="nav-item py-3" role="presentation">
                        <button class="btn border-dark">
                            <a class="nav-link text-dark" data-mdb-toggle="pill" href="index.php?act=qltacpham" role="tab">Quản lý Tác Phẩm</a>
                        </button>
                    </li>

                    <li class="nav-item py-3" role="presentation">
                        <button class="btn border-dark">
                            <a class="nav-link text-dark" data-mdb-toggle="pill" href="index.php?act=add" role="tab">Thêm tác phẩm </a>
                        </button>
                    </li>

                    <li class="nav-item py-3" role="presentation">
                        <button class="btn border-dark ">
                            <a class="nav-link text-dark" data-mdb-toggle="pill" href="index.php?act=ds_docgia" role="tab">Quản lý Độc Giả</a>
                        </button>
                    </li>
                </ul>
            </div>
        </header>