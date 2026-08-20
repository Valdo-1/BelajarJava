<!-- Halaman utama untuk Kasir (Point of Sales) -->
<!-- Mengambil desain dasar dari file layout 'app.blade.php' -->
@extends('app')
@section('konten')

<style>
    /* Cart Box */
    .cart-box {
        position: sticky;
        top: 24px;
        height: calc(100vh - 120px);
        display: flex;
        flex-direction: column;
        border-radius: 24px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        background: #ffffff;
        border: 1px solid #f1f5f9;
    }

    #cartItems {
        overflow-y: auto;
        flex-grow: 1;
    }

    #cartItems::-webkit-scrollbar {
        width: 4px;
    }

    #cartItems::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    #cartItems::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .cart-item {
        border-bottom: 1px dashed #e2e8f0;
        padding: 16px 0;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    /* Product Cards */
    .product-card {
        cursor: pointer;
        border-radius: 20px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        border: 1px solid #f1f5f9;
        background: #ffffff;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        border-color: #e2e8f0;
    }

    .product-image {
        height: 160px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
    }

    .product-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .price {
        color: #2563eb;
        font-weight: 800;
        font-size: 1.1rem;
    }

    /* Typography & Utilities */
    .total-price {
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
    }

    .quantity-btn {
        width: 32px;
        height: 32px;
        padding: 0;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background: white;
        color: #475569;
        transition: all 0.2s;
    }

    .quantity-btn:hover {
        background: #f1f5f9;
    }

    .payment-btn {
        border-radius: 16px;
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        border: none;
        background-color: #20770aff;
        transition: all 0.3s ease;
        color: white;
    }

    .payment-btn:hover {
        background: #000000ff;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -3px rgba(0, 0, 0, 0.4);
        color: white;
    }

    .category-btn {
        border-radius: 20px;
        padding: 8px 20px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .empty-cart-state i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 1rem;
        display: block;
    }
</style>

<!-- Bagian Header (Judul dan Tombol Kosongkan Keranjang) -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1 text-dark">Point of Sales</h2>
    </div>
    <button class="btn btn-outline-danger fw-bold" style="border-radius: 12px; padding: 10px 20px;" onclick="emptyCart()">
        <i class="bi bi-trash3 me-2"></i>Empty Cart
    </button>
</div>

<!-- Bagian Kartu Statistik: Menampilkan rangkuman penjualan (Pendapatan Hari Ini, Barang Terjual, dll) -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 p-2" style="background: #ffffff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 16px;">
            <div class="card-body d-flex align-items-center">
                <div style="width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; background-color: #eff6ff; color: #3b82f6; margin-right: 16px; font-size: 20px;">
                    <i class="bi bi-wallet2"></i>
                </div>
                <div>
                    <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 11px;">Today Transaction</small>
                    <h5 class="fw-bold mb-0 text-dark mt-1">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 p-2" style="background: #ffffff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 16px;">
            <div class="card-body d-flex align-items-center">
                <div style="width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; background-color: #f0fdf4; color: #16a34a; margin-right: 16px; font-size: 20px;">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div>
                    <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 11px;">Product Sold</small>
                    <h5 class="fw-bold mb-0 text-dark mt-1">{{ number_format($productSold, 0, ',', '.') }} Items</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 p-2" style="background: #ffffff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border-radius: 16px;">
            <div class="card-body d-flex align-items-center">
                <div style="width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; background-color: #fef2f2; color: #dc2626; margin-right: 16px; font-size: 20px;">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div>
                    <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 11px;">Total Revenue</small>
                    <h5 class="fw-bold mb-0 text-dark mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menampilkan pesan error (jika ada kesalahan saat memproses form pembayaran) -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Form Utama Point of Sales -->
<!-- Semua data keranjang dan pembayaran akan dikirim ke route 'order.store' saat tombol bayar ditekan -->
<form action="{{ route('order.store') }}" method="POST" id="posForm">
    @csrf <!-- Token keamanan wajib dari Laravel untuk form method POST agar aman dari serangan CSRF -->
    <div class="row g-4">

        <!-- Bagian Kiri: Area Daftar Produk -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="border-radius: 24px;">
                <div class="card-body p-4">
                    <!-- Fitur Pencarian Produk -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0 text-dark">Pilih Produk</h5>
                        <div class="w-50">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0" style="border-radius: 12px 0 0 12px;"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" id="search" class="form-control bg-light border-0 py-2" placeholder="Cari Produk..." style="border-radius: 0 12px 12px 0; box-shadow: none;" onkeyup="filterProducts()">
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Filter Kategori Produk -->
                    <div class="mb-4">
                        <button type="button" class="btn btn-dark btn-sm me-2 category-btn shadow-sm" onclick="filterCategory('all')">Semua</button>
                        @foreach ($categories as $category)
                        <button type="button" class="btn btn-outline-secondary border-0 bg-light text-dark btn-sm me-2 category-btn" onclick="filterCategory('{{ $category->id }}')">{{ $category->name }}</button>
                        @endforeach
                    </div>

                    <!-- Daftar Produk yang Ditampilkan Berdasarkan Database -->
                    <div class="row g-4" id="productList">
                        <!-- Perulangan (looping) untuk menampilkan setiap produk yang ada -->
                        @foreach ($products as $product)
                        <div class="col-md-4 col-sm-6 product-item" data-category="{{ $product->category_id }}" data-name="{{ strtolower($product->name) }}">
                            <div class="card product-card h-100 border-0" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" onclick="addToCart(parseInt(this.dataset.id), this.dataset.name, parseFloat(this.dataset.price))">
                                <div class="product-image">
                                    @if ($product->photo)
                                    <img src="{{ asset('storage/products/' . $product->photo) }}" alt="{{ $product->name }}">
                                    @else
                                    <img src="https://placehold.net/400x400.png" alt="Placeholder">
                                    @endif
                                </div>
                                <div class="card-body p-4">
                                    <span class="badge bg-light text-secondary mb-2 px-2 py-1" style="font-weight: 600;">{{ $product->category ? $product->category->name : 'Uncategorized' }}</span>
                                    <h5 class="fw-bold mb-1 text-dark">{{ $product->name }}</h5>
                                    <div class="price mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                                    <div class="price mt-2">
                                        <button type="button" class="btn btn-primary w-100">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan: Area Keranjang (Cart) dan Form Pembayaran -->
        <div class="col-lg-4">
            <div class="card cart-box">
                <div class="card-body d-flex flex-column p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0 text-dark">
                            <i class="bi bi-cart3 me-2 text-primary"></i>Keranjang
                        </h5>
                        <span class="badge bg-primary text-white rounded-pill px-3 py-2" id="cartCount">0</span>
                    </div>

                    <div class="mb-4" id="cartItems">
                        <div class="empty-cart-state text-center py-5" id="emptyCartMessage">
                            <i class="bi bi-cart-x"></i>
                            <p class="fw-bold text-muted mb-0">Keranjang Kosong</p>
                            <small class="text-muted">Pilih produk untuk ditambahkan</small>
                        </div>
                        <!-- Items akan dirender di sini via JS -->
                        <div id="cartList"></div>
                    </div>

                    <!-- Bagian Perhitungan Total dan Pembayaran -->
                    <div class="mt-auto border-top pt-4">
                        <!-- Input tersembunyi (hidden) untuk menampung data barang apa saja yang dibeli.
                             Data ini yang nantinya ditangkap oleh Controller di backend saat form dikirim (disubmit) -->
                        <div id="hiddenInputs"></div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Order Code</label>
                            <input type="text" class="form-control" name="order_code" value="ORD-{{ time() }}" readonly style="background-color: #f1f5f9;">
                        </div>

                        <div class="d-flex justify-content-between mb-2 text-secondary fw-semibold">
                            <span>SubTotal</span>
                            <span id="subtotalLabel">Rp 0</span>
                            <input type="hidden" name="subtotal" id="input_subtotal" value="0">
                        </div>

                        <div class="d-flex justify-content-between mb-2 text-secondary fw-semibold">
                            <span>Tax (10%)</span>
                            <span id="taxLabel">Rp 0</span>
                            <input type="hidden" name="tax" id="input_tax" value="0">
                        </div>

                        <div class="d-flex justify-content-between mb-3 align-items-center border-bottom pb-3">
                            <span class="fw-bold text-dark fs-5">Total</span>
                            <strong id="totalLabel" class="total-price">Rp 0</strong>
                            <input type="hidden" name="order_amount" id="order_amount" value="0">
                        </div>

                        <div class="mb-3 mt-3">
                            <label class="form-label fw-bold text-dark">Payment (Bayar)</label>
                            <div class="input-group">
                                <span class="input-group-text fw-bold">Rp</span>
                                <input type="number" class="form-control form-control-lg fw-bold" id="paymentInput" name="payment" placeholder="0" min="0" oninput="calculateChange()">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-4 align-items-center">
                            <span class="fw-bold text-dark">Kembalian</span>
                            <strong id="changeLabel" class="text-success fs-5">Rp 0</strong>
                            <input type="hidden" name="order_change" id="order_change" value="0">
                        </div>

                        <input type="hidden" name="status" value="1">

                        <button type="submit" class="btn w-100 py-3 payment-btn" id="btnSubmit" disabled>
                            Proses Pembayaran <i class="bi bi-check-circle ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // ==========================================
    // LOGIKA JAVASCRIPT UNTUK APLIKASI KASIR
    // ==========================================

    // Variabel array untuk menyimpan daftar belanjaan sementara
    let cart = [];

    // Fungsi untuk mengubah angka biasa menjadi format uang Rupiah (contoh: 15000 menjadi 15.000)
    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }

    // Fungsi untuk memfilter (menyembunyikan/menampilkan) produk berdasarkan tombol kategori yang diklik
    function filterCategory(categoryId) {
        const products = document.querySelectorAll('.product-item');
        products.forEach(product => {
            if (categoryId === 'all' || product.dataset.category == categoryId) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }

    // Fungsi untuk mencari produk secara langsung berdasarkan teks yang diketik di kolom pencarian
    function filterProducts() {
        const keyword = document.getElementById('search').value.toLowerCase();
        const products = document.querySelectorAll('.product-item');
        products.forEach(product => {
            if (product.dataset.name.includes(keyword)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }

    // Fungsi untuk memasukkan produk ke dalam keranjang saat gambar/kartu produk diklik
    function addToCart(id, name, price) {
        const existingItem = cart.find(item => item.id === id);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                id,
                name,
                price,
                quantity: 1
            });
        }
        renderCart();
    }

    // Fungsi untuk menambah (+1) atau mengurangi (-1) jumlah barang di dalam keranjang
    function updateQuantity(id, change) {
        const item = cart.find(item => item.id === id);
        if (item) {
            item.quantity += change;
            if (item.quantity <= 0) {
                cart = cart.filter(i => i.id !== id);
            }
            renderCart();
        }
    }

    // Fungsi untuk membuang/mengosongkan seluruh isi keranjang
    function emptyCart() {
        if (confirm('Hapus semua isi keranjang?')) {
            cart = [];
            renderCart();
        }
    }

    // Fungsi UTAMA untuk menggambar ulang tampilan daftar keranjang HTML.
    // Dipanggil setiap kali ada perubahan pada keranjang (tambah/kurang/hapus barang).
    function renderCart() {
        const cartList = document.getElementById('cartList');
        const emptyMsg = document.getElementById('emptyCartMessage');
        const hiddenInputs = document.getElementById('hiddenInputs');

        cartList.innerHTML = '';
        hiddenInputs.innerHTML = '';

        let total = 0;
        let totalItems = 0;

        if (cart.length === 0) {
            emptyMsg.style.display = 'block';
        } else {
            emptyMsg.style.display = 'none';

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                totalItems += item.quantity;

                // Create visual cart item
                cartList.innerHTML += `
                    <div class="cart-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0 fw-bold text-dark">${item.name}</h6>
                            <small class="text-primary fw-bold">Rp ${formatRupiah(item.price)}</small>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn -btn-outline-secondary quantity-btn" onclick="updateQuantity(${item.id}, -1)">
                                <i class="bi bi-dash"></i>
                            </button>
                            <span class="fw-bold" style="width: 20px; text-align: center;">${item.quantity}</span>
                            <button type="button" class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>
                `;

                // Create hidden inputs for form submission
                hiddenInputs.innerHTML += `
                    <input type="hidden" name="cart[${index}][product_id]" value="${item.id}">
                    <input type="hidden" name="cart[${index}][quantity]" value="${item.quantity}">
                    <input type="hidden" name="cart[${index}][price]" value="${item.price}">
                `;
            });
        }

        document.getElementById('cartCount').innerText = totalItems;

        let subtotal = total;
        let tax = subtotal * 0.10;
        let grandTotal = subtotal + tax;

        document.getElementById('subtotalLabel').innerText = 'Rp ' + formatRupiah(subtotal);
        document.getElementById('input_subtotal').value = subtotal;

        document.getElementById('taxLabel').innerText = 'Rp ' + formatRupiah(tax);
        document.getElementById('input_tax').value = tax;

        document.getElementById('totalLabel').innerText = 'Rp ' + formatRupiah(grandTotal);
        document.getElementById('order_amount').value = grandTotal;

        calculateChange();
    }

    // Fungsi untuk menghitung otomatis jumlah uang kembalian saat kasir mengetik nominal pembayaran
    function calculateChange() {
        const total = parseFloat(document.getElementById('order_amount').value) || 0;
        const payment = parseFloat(document.getElementById('paymentInput').value) || 0;

        const change = payment - total;

        if (payment >= total && total > 0) {
            document.getElementById('changeLabel').innerText = 'Rp ' + formatRupiah(change);
            document.getElementById('changeLabel').className = 'text-success fs-5 fw-bold';
            document.getElementById('order_change').value = change;
            document.getElementById('btnSubmit').disabled = false;
        } else {
            document.getElementById('changeLabel').innerText = (total === 0) ? 'Rp 0' : 'Uang Kurang!';
            document.getElementById('changeLabel').className = 'text-danger fs-5 fw-bold';
            document.getElementById('order_change').value = 0;
            document.getElementById('btnSubmit').disabled = true;
        }

        async function processPayment() {
            if (cart.length === 0) {
                alert('Keranjang masih kosong');
                return;
            }

            const response = await fetch("{{ route('order.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    items: carts.map(function(item) {
                        return {
                            id: item.id,
                            quantity: item.quantity,
                            price: item.price
                        }
                    }),
                    payment_method: "cash",
                })
            })
            const result = await response.json();
            cart = [];
            displayCart();
            location.reload();
        }

        if (payment < grandTotal) {
            alert('Uang kurang');
            return;
        }

        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('cart', JSON.stringify(cart));
        formData.append('total', grandTotal);
        formData.append('payment', payment);
        formData.append('change', change);

        fetch("{{ route('order.store') }}", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Pesanan berhasil diproses');
                    cart = [];
                    renderCart();
                } else {
                    alert('Gagal memproses pesanan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    
</script>

@endsection