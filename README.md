# Aplikasi-supply-chain-management-kopi

Aplikasi supply chain management kopi adalah aplikasi web yang dibuat dengan PHP native dan template bootstrap, 
aplikasi ini berfungsi untuk mengelola management kopi dari supplier dan akan disebarkan ke cafe-cafe atau warung dan berisi 
dimulai dari bahan, supplier kopi, pemesanan bahan, pemakaian bahan, persediaan gudang dll.

Menu dari aplikasi supply chain management kopi ini antara lain:
- Data Bahan
  => Menu ini berisi CRUD management data bahan yang memuat kode bahan, nama produk, satuan, harga beli.
  disini ketika kita akan menambahkan bahan baru, kode bahan akan terisi otomatis karena membaca data yang terakhir dari table mysql, 
  contoh kodenya B0001.
- Data Supplier
  => Menu ini berisi CRUD management data supplier yang memuat kode supplier, nama supplier, alamat, telephone.
  disini ketika kita akan menambahkan supplier baru, kode bahan akan terisi otomatis karena membaca data yang terakhir dari table mysql, 
  contoh kodenya S0001. Dan untuk alamat terdapat beberapa daerah dari suppliernya, tinggal kita pilih.
- Pemesanan Bahan
  => Menu ini berisi CRUD management pemesanan bahan yang memuat nama supplier, nama produk, jumlah dan tanggal pesan dll.
  dan jika kita mau menambah pesanan bahan, field nama supplier kita tinggal pilih supplier yang sudah kita inputkan 
  sebelumnya dan untuk nama produk juga sama tinggal pilih dari data bahan.
- Laporan Data Bahan
  => Menu ini berisi laporan data bahan yang kita pesan dari supplier dan juga terdapat action cetak untuk mencetak laporan tersebut
  disini saya menggunakan library fpdf.
- Waktu Pemesanan
  => Menu ini kita bisa melihat waktu pemesanan dari supplier sampai tiba dilokasi kita dan tanggal terima, total keseluruhan produk dll.
- Pemakaian Bahan
  => Menu ini berisi CRUD management data pemakaian bahan yang memuat nama produk, harga jual, jumlah yang keluar.
  jika kita melakukan action tambah pemakaian bahan (stok keluar) maka kita akan mengisi produk apa yang akan keluar dan jumlahnya 
  dan jika jumlah keluar lebih besar dari stok yang tersedia maka action akan gagal serta muncul pesan.
- Persediaan Gudang
  => Menu ini kita bisa melihat detail produk dari nama produk, tanggal pesan, stok awal, stok terpakai dan stok akhir.
  
Cara penggunaan aplikasi:

- clone project
- simpan di htdocs jika menggunakan xampp
- buat database dengan nama aplikasi_scm_kopi
- import file database yang ada di folder database/aplikasi_perpustakaan_sekolah.sql
- register/login aplikasi
