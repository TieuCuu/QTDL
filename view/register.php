<?php

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (!empty($_POST['Ten'])) {

        $query = 'INSERT INTO docgia (ho, ten, dchi, tel,pass) VALUES (?, ?, ?, ?,?)';

        try {
            $sth = $pdo->prepare($query);
            $sth->execute([
                $_POST['Ten'],
                $_POST['Ho'],
                $_POST['dchi'],
                $_POST['tel'],
                $_POST['pass']
            ]);
        } catch (PDOException $e) {
            $pdo_error = $e->getMessage();
        }
        if ($sth && $sth->rowCount() == 1) {
            echo '<script>alert("Đăng ký tài khoản thành công!");</script>';
            echo '<script>window.location.href="index.php?act=login";</script>';

            //header('Location: index.php?act=login');
        } else {
            $error_message = 'Không thể lưu trữ trích dẫn';
            $reason = $pdo_error ?? 'Không rõ nguyên nhân';
            //include '../partials/show_error.php';
        }
    } else {
        $error_message = 'Hãy gõ vào cả Trích dẫn và Nguồn của nó! ';
        //include '../partials/show_error.php';
    }
}
?>

<div class="tab-content w-50 mt-3 mx-auto">
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item px-5" role="presentation">
            <a class="nav-link border rouded text-dark border-dark" id="tab-login" data-mdb-toggle="pill" href="index.php?act=login" role="tab" aria-controls="pills-login" aria-selected="false">Login</a>
        </li>
        <li class="nav-item px-5" role="presentation">
            <a class="nav-link bg-dark active" id="tab-register" data-mdb-toggle="pill" href="index.php?act=register" role="tab" aria-controls="pills-register" aria-selected="true">Register</a>
        </li>
    </ul>

    <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">


        <form action="index.php?act=register" method="post" class="p-5 pb-2 mt-5 shadow rounded d-flex flex-column" style="background-color: #e5eaf1;">
            <!-- Name input -->
            <!-- <div class="form-outline mb-4">
                <p><label class="form-label" for="registerName">First Name:</label>
                    <input type="text" id="registerName" class="form-control" name="Ten" />
                </p>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="registerUsername">Last Name:</label>
                <input type="text" id="registerUsername" class="form-control" name="Ho" />
            </div>


            <div class="form-outline mb-4">
                <label class="form-label" for="registerEmail">Địa Chỉ:</label>
                <input type="text" id="registerEmail" class="form-control" name="dchi" />

            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="registerUsernam">Số Điện Thoại</label>
                <input type="text" id="registerUsernam" class="form-control" name="tel" />

            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="registerUsernam">Password</label>
                <input type="password" id="registerUsernam" class="form-control" name="pass" />

            </div> -->

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="Ten" id="registerName" placeholder="name@example.com">
                <label for="registerName">First Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="Ho" id="registerUsername" placeholder="name@example.com">
                <label for="registerUsername">Last Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="dchi" id="registerEmail" placeholder="name@example.com">
                <label for="registerEmail">Địa Chỉ</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="tel" id="registerTel" placeholder="name@example.com">
                <label for="registerTel">Số Điện Thoại</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="pass" id="registerPass" placeholder="name@example.com">
                <label for="registerPass">Password</label>
            </div>



            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
                <label class="form-check-label" for="registerCheck">
                    I have read and agree to the terms
                </label>
            </div>

            <!-- Submit button -->
            <input type="submit" class="btn btn-dark btn-block mb-3" value="Sign up" />

        </form>

    </div>
</div>