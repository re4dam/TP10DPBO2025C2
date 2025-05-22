# TP10DPBO2025C2
Saya Zaki Adam dengan NIM 2304934 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
## 🧩 Desain Program

### 📁 Model
Komponen yang menangani logika data dan interaksi langsung dengan basis data.
- `Database.php`  
    Menyediakan koneksi ke database serta fungsi-fungsi eksekusi query MySQL.
- `Degenerate.php`, `Haluan.php`, `Jodoh.php`  
    Representasi entitas domain yang mencerminkan masing-masing tabel di database.
    
### 📁 ViewModel
Berfungsi sebagai penghubung antara View dan Model, mengenkapsulasi logika presentasi dan memproses data dari Model sebelum ditampilkan di View.
- `DegenerateViewModel.php`  
    Mengelola data dan operasi yang berkaitan dengan entitas _Degenerate_.
- `HaluanViewModel.php`  
    Mengelola transformasi data dan tindakan dari View untuk entitas _Haluan_.
- `JodohViewModel.php`  
    Menyediakan binding data dan command logic untuk entitas _Jodoh_.

### 📁 View
Komponen antarmuka pengguna yang bertanggung jawab dalam rendering tampilan dan menerima input pengguna.
- Template HTML digunakan sebagai basis tampilan (misalnya `list.html`, `form.html`).
- Berkomunikasi dengan ViewModel untuk mendapatkan dan memperbarui data.

### 📄 `index.php`
Merupakan _entry point_ aplikasi. Bertugas merouting permintaan pengguna dan memuat View serta ViewModel yang sesuai berdasarkan aksi (`create`, `update`, `delete`, `read`).

## 🔄 Alur Program
### 1. **list.html** – _Landing Page_
- Menampilkan daftar data dari salah satu entitas (misalnya: mahasiswa).
- ViewModel mengambil data dari Model dan menyajikannya ke View.
- Pengguna dapat memilih aksi: `Tambah`, `Edit`, atau `Delete`.

### 2. **form.html** – _Form Input/Edit_
- Menampilkan form untuk menambahkan atau mengubah data.
- Field di-_bind_ ke ViewModel sehingga perubahan langsung diproses atau disiapkan untuk diproses.
- Tombol `Submit` atau `Update` akan memicu aksi di ViewModel untuk memanggil Model dan memperbarui database.
