# SISTEM INFORMASI BUKU INDUK MARKAS UNIT KSR PMI UNIT UNTAN

## Tentang SIBIMU

SIBIMU atau Sistem Informasi Buku Induk Markas Unit merupakan sistem yang dapat menunjang administrasi keanggotaan KSR PMI Unit UNTAN. SIBIMU dibangun menggunakan beberapa tools yaitu :

-   Framework Laravel versi 8.50.0
-   DOMPDF sebagai PDF Converter
-   Intervention\Image sebagai image cropper

## Menggunakan SIBIMU

Untuk menggunakan SIBIMU, ada beberapa hal yang harus diperhatikan. Yaitu :

-   Download terlebih dahulu repository SIBIMU
-   Ketikkan perintah <i>php artisan migrate<i> tunggu hingga loading, selanjutnya akan mendapati error. Walau mendapatkan error, langkah ini tetap harus dilakukan
-   Lalu ketikkan perintah <i>php artisan db:seed<i> untuk menginput akun admin default yang bisa anda ubah di database/seeder/adminSeeder.php
-   Ketikkan perintah <i>php artisan migrate<i> kembali

Selanjutnya anda sudah bisa menggunakan SIBIMU dengan user admin dan password admin123
