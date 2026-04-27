# Laravel Lisans Satış API

Dijital yazılım lisanslarının satışını ve yönetimini sağlayan Laravel tabanlı REST API projesi.

---

## Gereksinimler

- PHP 8.3+
- Composer
- Node.js (v20+)
- XAMPP (Apache + MySQL)
- PHPMyAdmin

---

## Kurulum

### 1. Repoyu klonla
git clone <repo-url>
cd task

### 2. Bağımlılıkları yükle
composer install
npm install

### 3. .env dosyasını oluştur
cp .env.example .env
php artisan key:generate

### 4. .env içinde veritabanı ayarlarını güncelle
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task
DB_USERNAME=root
DB_PASSWORD=

### 5. Queue bağlantısını ayarla
QUEUE_CONNECTION=database

### 6. Veritabanını oluştur ve seeder'ları çalıştır
php artisan migrate:fresh --seed

### 7. Queue tablosunu oluştur
php artisan queue:table
php artisan migrate

### 8. Projeyi başlat
php artisan serve

### 9. Queue worker'ı başlat (ayrı terminal)
php artisan queue:work

---

## API Endpoint'leri

| Method | URL | Açıklama |
|--------|-----|----------|
| GET | /api/users | Tüm kullanıcıları listele |
| GET | /api/products | Tüm ürünleri stok bilgisiyle listele |
| GET | /api/users/{user}/licenses | Kullanıcının lisanslarını listele |
| POST | /api/orders | Lisans satın al |

### POST /api/orders örnek istek body:
{
    "user_id": 1,
    "product_id": 2
}

---

## Artisan Komutları

# Stoku 5'in altına düşen ürünleri listele
php artisan report:stock

---

## Tamamlanan Özellikler

- Migration (products, licenses)
- Models (User, Product, License)
- Seeders (User, Product, License)
- Resources (User, Product, License)
- PurchaseService (DB::transaction + lockForUpdate)
- Controllers (User, Product, Order)
- StoreOrderRequest (Form Request Validation)
- SendLicenseEmailJob (Queue ile asenkron)
- Routes (api.php)
- StockReportCommand (report:stock)
- README.md


---- 

