<?php
include_once '../../Classes/admin/web.php';
$web = new web();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="../../public/admin/css/grid.css">
    <link rel="stylesheet" href="../../public/admin/css/base.css">
    <link rel="stylesheet" href="../../public/admin/css/style.css">
    <link rel="stylesheet" href="../../public/admin/css/responsive.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/> -->
    <!--link font-family-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ckeditor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js" integrity="sha512-bGYUkjDyyOMGm3ASzq3zRaWZ4CONNH1wAYMFch/Z0ASZrsg722SeRsX0FPPRZjTuJrqIMbB9fvY0LEMzyHeyeQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Jquery + dataTable -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <?php
    $get_info = $web->get_web();
    if ($get_info) {
        foreach ($get_info as $data) {
    ?>
            <title><?php echo $data['webname'] ?></title>
            <link rel="shortcut icon" type="image/png" href="../../public/admin/Image/web/<?php echo $data['favicon'] ?>" />
    <?php
        }
    }
    ?>
</head>