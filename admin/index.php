<?php
session_start();
ob_start();

include '../connect.php';
include './view/header.php';

if (isset($_GET['act']) ){
   $act = $_GET['act'];

    switch ($act) {
        case 'edit':            
            include './view/edit.php';
            break;

        case 'delete':            
            include './view/delete.php';
            break;

        case 'home':            
            include './view/home.php';   
            break;
        
        case 'ds_docgia':
            $query = "SELECT * from docgia";               
                
            include './view/ds_docgia.php';
            break;

        case 'qldocgia1':
            $query = "SELECT * from docgia, muon 
            where muon.nd = docgia.ND and ngaytra is null";
            
            include './view/ql_docgia1.php';
            break;

        case 'qldocgia2':
            $query = "SELECT * from docgia, muon 
            where muon.nd = docgia.ND and ngaytra > hantra";
                
            include './view/ql_docgia2.php';
            break;

        case 'docgia':            
            include './view/docgia.php';
            break;

        case 'qltacpham':
            $query = "SELECT *from  tacpham";
            
            include './view/ql_tacpham.php';
            break;

        case 'tacpham':            
            include './view/tacpham.php';
            break;

        case 'add':            
            include './view/add.php';
            break;   

        case 'delete':            
            include './view/delete.php';
            break;            
        
        case 'logout':
            include './view/logout.php';
            break;
        }
        
}else {      
    
   include './view/home.php';          
}
?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

 </div>
</body>
</html>