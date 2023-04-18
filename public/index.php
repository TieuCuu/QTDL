<?php
session_start();
ob_start();

include '../connect.php';
include '../view/header.php';


if(isset($_POST['timkiem']) && $_POST['timkiem']!=""){
    $key = $_POST['timkiem'];
}  else $key ="";


if (isset($_GET['act'])){
   $act = $_GET['act'];

    switch ($act) {
        case 'tacgia':
            $query = "SELECT  tacgia, COUNT(tua) as sl from  tacpham where tacgia like '%$key%'  GROUP BY tacgia";

            include '../view/tacgia.php';
            break;
        
        case 'home':                     
            
            include '../view/home.php';   
            break;

        case 'user':
            include '../view/docgia.php';
            break;

        case 'tacpham':
            include '../view/tacpham.php';
            break;

        case 'login':
            include '../view/login.php';
            break;

        case 'logout':
            include '../view/logout.php';
            break;

        case 'register':
            include '../view/register.php';
            break;
        
        }
}else {          
        include '../view/login.php';          
    }
?>
 
 </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>