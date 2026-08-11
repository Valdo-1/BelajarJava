<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peserta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --ios-bg: #F2F2F7;
            --ios-card-bg: #FFFFFF;
            --ios-text: #1C1C1E;
            --ios-text-muted: #8E8E93;
            --ios-blue: #007AFF;
            --ios-blue-hover: #0056b3;
            --ios-red: #FF3B30;
            --ios-red-hover: #c92a21;
            --ios-border: #E5E5EA;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--ios-bg);
            color: var(--ios-text);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Container & Card Styling */
        .app-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .ios-card {
            background-color: var(--ios-card-bg);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
            animation: slideUpFade 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        /* Animations */
        @keyframes slideUpFade {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }

        /* Typography */
        h2.page-title {
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 24px;
            color: var(--ios-text);
        }

        /* Buttons */
        .btn-ios {
            border-radius: 12px;
            font-weight: 600;
            padding: 10px 20px;
            border: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            cursor: pointer;
        }
        
        .btn-ios:active {
            transform: scale(0.96);
        }

        .btn-ios-primary {
            background-color: var(--ios-blue);
            color: white;
        }

        .btn-ios-primary:hover {
            background-color: var(--ios-blue-hover);
            color: white;
        }

        .btn-ios-danger {
            background-color: var(--ios-red);
            color: white;
        }

        .btn-ios-danger:hover {
            background-color: var(--ios-red-hover);
            color: white;
        }
        
        .btn-ios-secondary {
            background-color: var(--ios-bg);
            color: var(--ios-blue);
        }
        
        .btn-ios-secondary:hover {
            background-color: #E5E5EA;
            color: var(--ios-blue);
        }

        .btn-ios-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 8px;
        }

        /* Tables */
        .ios-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
        }

        .ios-table th {
            color: var(--ios-text-muted);
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px;
            border-bottom: 1px solid var(--ios-border);
            text-align: left;
        }

        .ios-table td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid var(--ios-border);
            font-size: 0.95rem;
            transition: background-color 0.2s ease;
        }

        .ios-table tbody tr:last-child td {
            border-bottom: none;
        }

        .ios-table tbody tr:hover td {
            background-color: #F9F9FB;
        }

        /* Forms */
        .ios-form-label {
            font-weight: 500;
            color: var(--ios-text);
            margin-bottom: 8px;
            font-size: 0.9rem;
            display: block;
        }

        .ios-form-control {
            background-color: var(--ios-bg);
            border: 2px solid transparent;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.2s ease;
            box-shadow: none;
            width: 100%;
            display: block;
            color: var(--ios-text);
        }

        .ios-form-control:focus {
            outline: none;
            border-color: var(--ios-blue);
            background-color: #FFFFFF;
            box-shadow: 0 0 0 4px rgba(0, 122, 255, 0.1);
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="app-container">
        @yield('konten')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>