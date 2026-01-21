<!-- Cart Content -->
<div class="container my-5">
    <h2 class="mb-4">🛒 Keranjang Belanja</h2>

    <div class="table-responsive">
        <table class="table table-bordered align-middle bg-white">
            <thead class="table-dark text-center">
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item 1 -->
                <tr>
                    <td>
                        <strong>Oppox9pro</strong><br>
                        <small class="text-muted">8GB / 256GB</small>
                    </td>
                    <td class="text-center">Rp 12.999.000</td>
                    <td class="text-center" style="width:120px;">
                        <input type="number" class="form-control text-center" value="1" min="1">
                    </td>
                    <td class="text-center">Rp 12.999.000</td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>

                <!-- Item 2 -->
                <tr>
                    <td>
                        <strong>iPhone 17 Pro</strong><br>
                        <small class="text-muted">256GB</small>
                    </td>
                    <td class="text-center">Rp 18.999.000</td>
                    <td class="text-center">
                        <input type="number" class="form-control text-center" value="1" min="1">
                    </td>
                    <td class="text-center">Rp 18.999.000</td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Summary -->
    <div class="row justify-content-end mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Ringkasan Belanja</h5>
                    <hr>
                    <p class="d-flex justify-content-between">
                        <span>Total</span>
                        <strong>Rp 31.998.000</strong>
                    </p>
                    <button class="btn btn-success w-100 mt-2">
                        Checkout Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
