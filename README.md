## Sale App

Just some app created with laravel

### Instruction

- Setelah clone repository, tambahkan file *.env* yang saya lampirkan melalui email ke dalam folder root aplikasi
- Buat database baru pada MySql dengan nama **gii_sale_app**, dan pastikan setting env sesuai dengan setting MySql
- Pada folder root jalankan perintah berikut:
```bash
composer install
php artisan migrate
php artisan db:seed
```
- Jalankan aplikasi dengan perintah:
```bash
php artisan serve
```
- Login dengan usernam dan password yang telah tersedia:
  - username: admin
  - password: admin

Silahkan mencoba.