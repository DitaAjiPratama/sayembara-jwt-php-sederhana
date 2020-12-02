# Sayembara JWT + PHP sederhana

Sayembara untuk membuat JWT sederhana dengan menggunakan bahasa pemrograman PHP.

Tujuan sayembara : membuat login sederhana dengan token

Bahasa Pemrograman : PHP

Nilai sayembara : Rp 200.000,-

JSON Web Token atau lebih dikenal dengan JWT, merupakan sebuah token berbentuk JSON yang padat (ukurannya), informasi mandiri untuk ditransmisikan antar pihak yang terkait. Token tersebut ini dapat diverifikasi dan dipercaya karena sudah di-sign secara digital.

## Contoh kasus

1. Table pada database memiliki 5 atribut:
  * Username
  * Password
  * Nama
  * Email
  * Telp
2. PHP Native. Tidak menggunakan Codeigniter, Laravel, ataupun Yii.
3. Memiliki 3 halaman utama:
  * **Login**, Yang merupakan front-end yang berisi formulir login (Username, dan Password)
  * **Auth**, Yang merupakan back-end yang memproses sebuah request dan response
  * **Home**, Halaman ketika berhasil login
4. Menggunakan ```composer require web-token/jwt-framework```
5. Jika authentication berhasil, session menyimpan nilai:
  * Nama
  * Email
  * Telp

## Rules & Policy

Berikut merupakan peraturan-peraturan serta kebijakan dalam mengikutin sayembara ini.

### Memiliki pengetahuan dasar Git dan memiliki akun Github

Pastikan anda sudah memiliki akun Github dan login dengan akun anda. Anda juga dapat menginstall git atau Aplikasi client git (GitAhead, GitKraken, SourceTree, atau lainnya). Miliki pengetahuan dasar terminal seperti command cd dan command git. Jika anda menggunaka Aplikasi client git, anda juga butuh pengetahuan dasar untuk penggunaan aplikasi tersebut. Gunakan Search Engine (Google, Duckduckgo, Bing) untuk mempelajari hal berikut.

### Lakukan fork pada repository

Fork adalah salinan repositori. Forking repository memungkinkan Anda untuk bereksperimen dengan perubahan tanpa mempengaruhi proyek asli. Paling umum, fork digunakan untuk mengusulkan perubahan pada proyek orang lain atau menggunakan proyek orang lain sebagai titik awal untuk ide Anda sendiri.

Anda cukup mengeklik tombol fork untuk melakukan fork. Repository yang sudah di fork dapat di lihat di halaman "Your repository". Clone reposity yang sudah anda fork (Bukan repository yang aslinya).

### Buat branch untuk menandakan bahwa itu kode versi anda

Wajib buat branch baru dan checkout kedalamnya, hal ini berguna agar saya dapat melihat hasil anda.

### Wajib memberikan pesan pada setiap commit

Sangat diwajibkan untuk memberikan pesan tahap-tahap yang rinci pada setiap commit-nya. Pesan juga dapat di masukkan di dalam source code sebagai comment.

### Pull request kode anda

Pull Request berfungsi untuk permintaan untuk menggabungkan kode. Jika kode anda sudah selesai, anda sudah membuat perubahan di forked repository, lalu ingin menggabungkan ke Repository asli.
Maka anda harus membuat Pull Request. Klik tombol New Pull Request pada forked repository.

Silahkan isi judul Pull Request dan pesan yang ingin disampaikan. Setelah itu admin atau owner akan melakukan review kontribusimu. Biasanya akan terjadi diskusi untuk membahas pull request yang telah anda buat apakah akan ditolak atau diterima?

Kalau diterima, maka status bertuliskan “Marged” berwarna ungu.

### Pemenang dan bayaran

Partisipan yang diterima merger request-nya pertama kali adalah pemenangnya dan akan di bayar dengan uang sebesar Rp 200.000,- . Pembayaran dapat menerima bank transfer, Cashtag jenius, GoPay, OVO, atau DANA.

### Issue mengenai standard peraturan dan kebijakan?

Peraturan ada yang membingungkan? Peraturan ada yang janggal? Jangan ragu untuk memberi saran ataupun bertanya pada [halaman issue](https://github.com/DitaAjiPratama/sayembara-jwt-php-sederhana/issues).
