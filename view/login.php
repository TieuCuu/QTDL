<?php

$loggedin = false;
$error_message = false;

$query = 'SELECT * FROM docgia';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['pass'] == '111222' && $_POST['sdt'] == 'admin') {
        header('Location: ../admin/index.php');
    } else {
        $sth = $pdo->query($query);

        if (!empty($_POST['sdt'])) {
            while ($row = $sth->fetch()) {
                $htmlspecialchars = 'htmlspecialchars';
                $ten = $htmlspecialchars($row['ten']);
                $sdt = $htmlspecialchars($row['tel']);
                $nd = $htmlspecialchars($row['ND']);
                $pass = $htmlspecialchars($row['pass']);

                if ($_POST['sdt'] == $sdt && $_POST['pass'] == $pass) {
                    $_SESSION['username'] = $ten;
                    $_SESSION['nd'] = $nd;
                    $loggedin = true;
                    break;
                }
            }
            $error_message = 'Sai tài khoản hoặc mật khẩu!';
        } else {
            $error_message = 'Hãy đảm bảo rằng bạn cung cấp đầy đủ sdt';
        }
    }
}

if ($loggedin) {

    header('Location: index.php?act=home');
}

if ($error_message) {
    echo '<script>alert("' . $error_message . '");</script>';
}



?>
<div class="tab-content justify-content-center w-50 mt-3 mx-auto  my-auto">
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item px-5" role="presentation">
            <a class="nav-link bg-dark active " id="tab-login" data-mdb-toggle="pill" href="index.php?act=login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item px-5" role="presentation">
            <a class="nav-link border rouded text-dark border-dark border-primary" id="tab-register" data-mdb-toggle="pill" href="index.php?act=register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>


    <div class="tab-pane fade show active rounded" id="pills-login" role="tabpanel" aria-labelledby="tab-login" style="background-color: #e5eaf1;">
        <form action="index.php?act=login" method="post" class="p-5 mt-5 shadow rounded">

            <!-- <div class="form-outline mb-4">
                <div class="form-floating mb-3">
                    <label for="loginName" class="input-group-text">Email or SĐT:</label>
                    <input type="text" name="sdt" id="loginName" class="form-control" />
                </div>
            </div>
            <div class="form-outline mb-4">
                <label for="loginPass" class="form-label">Password:</label>
                <input type="password" name="pass" id="loginPass" class="form-control" />
            </div> -->

            <div class="form-floating mb-3">
                <input type="text" name="sdt" class="form-control" id="loginName" placeholder="name@example.com">
                <label for="loginName">Email address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="pass" class="form-control" id="loginPass" placeholder="Password">
                <label for="loginPass">Password</label>
            </div>




            <div class="text-center">
                <!-- Submit button -->
                <input type="submit" class="btn btn-dark btn-block my-3" value="Sign in" name="login">

                <p>Not a member? <a href="index.php?act=register">Register</a></p>
            </div>


        </form>
    </div>
</div>