<nav class="navbar bg-white shadow-sm px-3">
    <button class="btn btn-outline-secondary d-lg-none"
            onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    <div class="ms-auto d-flex align-items-center gap-3">
        <span class="fw-semibold"><?= $admin_name ?? 'Admin' ?></span>
        <img src="<?= $admin_photo ?? '../assets/admin.jpg' ?>"  class="admin-photo">
    </div>
</nav>
