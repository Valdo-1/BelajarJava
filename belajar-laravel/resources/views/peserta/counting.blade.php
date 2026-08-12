<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitungan Anak SD</title>
    <style>
        /* Gaya dasar agar tampilannya ke tengah dan rapi */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px; /* Jarak dari atas layar */
            background-color: #f9f9f9;
        }
        
        /* Kotak putih yang menampung kalkulator */
        .kalkulator {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            margin: 0 auto; /* Supaya kotak ada di tengah */
            border-radius: 10px;
            background-color: white;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }

        /* Gaya untuk kotak input teks, pilihan, dan tombol */
        input, select, button {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #aaa;
        }

        /* Khusus untuk warna tombol */
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="kalkulator">
        <h2>Hitungan Anak SD</h2>
        
        <!-- Input Angka Pertama -->
        <input type="number" id="angka1" placeholder="Masukkan Angka 1">
        
        <!-- Pilihan Operasi Matematika -->
        <select id="operator">
            <option value="+">Tambah (+)</option>
            <option value="-">Kurang (-)</option>
            <option value="*">Kali (x)</option>
            <option value="/">Bagi (/)</option>
        </select>
        
        <!-- Input Angka Kedua -->
        <input type="number" id="angka2" placeholder="Masukkan Angka 2">
        
        <!-- Tombol untuk menjalankan perhitungan -->
        <button onclick="hitung()">Hitung Hasil</button>
        
        <!-- Tempat menampilkan hasil perhitungan di bawah -->
        <h3>Hasil: <span id="hasil">0</span></h3>
    </div>

    <script>
        // Fungsi ini akan dijalankan saat tombol "Hitung Hasil" diklik
        function hitung() {
            // 1. Mengambil nilai dari kotak input (angka1 dan angka2)
            // Kita menggunakan parseFloat() untuk mengubah teks menjadi angka yang bisa dikalkulasi
            let angka1 = parseFloat(document.getElementById('angka1').value);
            let angka2 = parseFloat(document.getElementById('angka2').value);
            
            // 2. Mengambil jenis perhitungan yang dipilih pengguna
            let operator = document.getElementById('operator').value;
            
            // 3. Menyiapkan tempat / variabel sementara untuk menyimpan hasil
            let hasil = 0;

            // 4. Mengecek apakah pengguna belum mengisi angka (kosong)
            // isNaN artinya "is Not a Number" (Apakah bukan angka?)
            if (isNaN(angka1) || isNaN(angka2)) {
                document.getElementById('hasil').innerText = "Mohon isi kedua angka!";
                return; // Hentikan proses fungsi di sini
            }

            // 5. Menentukan cara berhitung berdasarkan pilihan operator
            if (operator === '+') {
                hasil = angka1 + angka2;
            } else if (operator === '-') {
                hasil = angka1 - angka2;
            } else if (operator === '*') {
                hasil = angka1 * angka2;
            } else if (operator === '/') {
                // Mencegah error jika angka dibagi nol (0)
                if (angka2 === 0) {
                    document.getElementById('hasil').innerText = "Tidak bisa dibagi 0!";
                    return;
                }
                hasil = angka1 / angka2;
            }
            
            // 6. Menampilkan hasil yang sudah dihitung ke layar
            document.getElementById('hasil').innerText = hasil;
        }
    </script>
</body>
</html>