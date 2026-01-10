<?php
if (!isset($content)) {
    die('Content not set');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin Panel' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #005CB8;
            transition: transform .3s ease;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar .active {
            background: #005CB8;
            color: #fff;
        }

        /* Sidebar mobile */
        @media (max-width: 991px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1050;
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
        }

        .content-wrapper {
            min-height: 100vh;
        }

        .admin-photo {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
        }

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.4);
            z-index: 1040;
        }

        .overlay.show {
            display: block;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="flex-grow-1 content-wrapper d-flex flex-column">

        <?php include __DIR__ . '/../partials/navbar.php'; ?>

        <!-- MAIN CONTENT -->
        <main class="p-4">
            <?php include $content; ?>
        </main>

        <?php include __DIR__ . '/../partials/footer.php'; ?>
    </div>
</div>

<div class="overlay" id="overlay"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    function toggleSidebar() {
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    }

    overlay.addEventListener('click', toggleSidebar);
</script>

</body>
</html>
