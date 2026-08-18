<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Point of Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
        }

        /* Generic modern card */
        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        /* Stat Cards */
        .stat-card {
            transition: all 0.3s ease;
            background: #ffffff;
            border: 1px solid #f1f5f9;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }
        .icon-box {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background-color: #eff6ff;
            color: #3b82f6;
            margin-right: 16px;
        }

        /* Cart Box */
        .cart-box {
            position: sticky;
            top: 24px;
            height: calc(100vh - 48px);
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
        }
        .payment-btn:hover {
            background: #000000ff;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -3px rgba(0, 0, 0, 0.4);
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

        /* Layout adjustment */
        .main-wrapper {
            background: #ffffff;
            border-radius: 30px;
            box-shadow: 0 10px 40px -10px rgba(0,0,0,0.08);
            margin: 20px;
            padding: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="main-wrapper">
            <main>
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="fw-bold mb-1 text-dark">Point of Sales</h2>
                        <p class="text-muted mb-0">Central Jakarta PPKD Coffee Shop</p>
                    </div>
                    <button class="btn btn-outline-danger fw-bold" style="border-radius: 12px; padding: 10px 20px;">
                        <i class="bi bi-trash3 me-2"></i>Empty Cart
                    </button>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card stat-card p-2">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-box">
                                    <i class="bi bi-wallet2"></i>
                                </div>
                                <div>
                                    <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 11px;">Today Transaction</small>
                                    <h4 class="fw-bold mb-0 text-dark mt-1">Rp 10.000.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stat-card p-2">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-box" style="background-color: #f0fdf4; color: #16a34a;">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                                <div>
                                    <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 11px;">Product Sold</small>
                                    <h4 class="fw-bold mb-0 text-dark mt-1">154 Items</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stat-card p-2">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon-box" style="background-color: #fef2f2; color: #dc2626;">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <div>
                                    <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 11px;">Total Revenue</small>
                                    <h4 class="fw-bold mb-0 text-dark mt-1">Rp 45.000.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0" style="border-radius: 24px;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold mb-0 text-dark">Select Produk</h5>
                                    <div class="w-50">
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0" style="border-radius: 12px 0 0 12px;"><i class="bi bi-search text-muted"></i></span>
                                            <input type="text" id="search" class="form-control bg-light border-0 py-2" placeholder="Cari Produk..." style="border-radius: 0 12px 12px 0; box-shadow: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button class="btn btn-dark btn-sm me-2 category-btn shadow-sm">Semua</button>
                                   @foreach ($categories as $category)
                                    <button class="btn btn-outline-secondary border-0 bg-light text-dark btn-sm me-2 category-btn">{{ $category->name }}</button>
                                   @endforeach
                                </div>
                                <div class="row g-4" id="productList">
                                    @foreach ($products as $product)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card product-card h-100 border-0">
                                            <div class="product-image">
                                                @if ($product->photo)
                                                    <img src="{{ asset('uploads/products/' . $product->photo) }}" alt="Photo">
                                                @else
                                                    <img src="https://placehold.net/400x400.png" alt="Placeholder">
                                                @endif
                                            </div>
                                            <div class="card-body p-4">
                                                <span class="badge bg-light text-secondary mb-2 px-2 py-1" style="font-weight: 600;">{{ $product->category ? $product->category->name : 'Uncategorized' }}</span>
                                                <h5 class="fw-bold mb-1 text-dark">{{ $product->name }}</h5>
                                                <div class="price mt-2">Rp {{ number_format($product->price, 0,',','.') }}</div>
                                                <div class="price mt-2">
                                                    <button class="btn btn-primary add-to-cart w-100" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
                                    <div class="empty-cart-state text-center py-5">
                                        <i class="bi bi-cart-x"></i>
                                        <p class="fw-bold text-muted mb-0">Keranjang Kosong</p>
                                        <small class="text-muted">Pilih produk untuk ditambahkan</small>
                                    </div>
                                </div>
                                
                                <div class="mt-auto border-top pt-4">
                                    <div class="d-flex justify-content-between mb-3 text-secondary fw-semibold">
                                        <span>SubTotal</span>
                                        <span id="subtotal">Rp 0</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3 text-secondary fw-semibold">
                                        <span>Pajak (11%)</span>
                                        <span id="tax">Rp 0</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4 align-items-center">
                                        <span class="fw-bold text-dark fs-5">Total</span>
                                        <strong id="total" class="total-price">Rp 0</strong>
                                    </div>
                                    <button class="btn btn-success w-100 py-3 payment-btn">
                                        Proses Pembayaran <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>