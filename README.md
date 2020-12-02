# Sayembara JWT + PHP sederhana

Sayembara untuk membuat JWT sederhana dengan menggunakan bahasa pemrograman PHP.

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

Coming soon
