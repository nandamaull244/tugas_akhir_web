<?php
if (!isset($content)) {
    die('Content not set');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="/tugas_akhir/assets/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <title><?= $title ?? 'Gridova - phone' ?></title>
</head>

<body>

    <?php include 'partials/navbar.php'; ?>

    <?php include $content; ?>

    <?php include 'partials/footer.php'; ?>
    

</body>

</html>