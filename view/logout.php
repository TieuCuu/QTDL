<?php
unset($_SESSION['username']);

// echo '<p>Bạn đã đăng xuất.</p>';
header('Location: index.php?act=login');