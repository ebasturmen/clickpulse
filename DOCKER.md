# Docker Kurulum Kılavuzu

Bu proje Docker ortamında çalışacak şekilde yapılandırılmıştır.

## Gereksinimler

- Docker Desktop (veya Docker Engine + Docker Compose)
- En az 4GB RAM önerilir

## Hızlı Başlangıç

### 1. Environment Dosyasını Oluşturun

```bash
cp .env.example .env
```

`.env` dosyasını düzenleyerek gerekli ayarları yapın. Docker için önemli ayarlar:

```env
DB_HOST=db
DB_DATABASE=clickpulse
DB_USERNAME=clickpulse
DB_PASSWORD=root
APP_URL=http://localhost:8000
```

### 2. Docker Container'larını Başlatın

```bash
docker-compose up -d --build
```

### 3. Composer Bağımlılıklarını Yükleyin

```bash
docker-compose exec app composer install
```

### 4. Uygulama Anahtarını Oluşturun

```bash
docker-compose exec app php artisan key:generate
```

### 5. Veritabanı Migration'larını Çalıştırın

```bash
docker-compose exec app php artisan migrate
```

### 6. Storage Linkini Oluşturun (Gerekirse)

```bash
docker-compose exec app php artisan storage:link
```

### 7. Frontend Asset'lerini Build Edin

Frontend asset'leri build etmek için (production):

```bash
docker-compose exec node npm run build
```

Development modunda otomatik olarak çalışır.

## Kullanışlı Komutlar

### Artisan Komutlarını Çalıştırma

```bash
docker-compose exec app php artisan [komut]
```

Örnekler:
```bash
docker-compose exec app php artisan tinker
docker-compose exec app php artisan route:list
docker-compose exec app php artisan migrate:fresh --seed
```

### Composer Komutları

```bash
docker-compose exec app composer [komut]
```

Örnekler:
```bash
docker-compose exec app composer require [paket]
docker-compose exec app composer update
```

### NPM Komutları

```bash
docker-compose exec node npm [komut]
```

Örnekler:
```bash
docker-compose exec node npm install
docker-compose exec node npm run dev
docker-compose exec node npm run build
```

### Container Loglarını Görüntüleme

```bash
# Tüm container'ların logları
docker-compose logs -f

# Belirli bir container'ın logları
docker-compose logs -f app
docker-compose logs -f nginx
docker-compose logs -f db
docker-compose logs -f node
```

### Container'ları Durdurma

```bash
docker-compose down
```

Veritabanı verilerini de silmek için:
```bash
docker-compose down -v
```

### Container'lara Giriş Yapma

```bash
# PHP container'ına giriş
docker-compose exec app bash

# Node container'ına giriş
docker-compose exec node sh

# Database container'ına giriş
docker-compose exec db mysql -u clickpulse -proot clickpulse
```

## Servisler

- **Nginx**: Port 8000'de çalışır (http://localhost:8000)
- **PHP-FPM**: Laravel uygulamasını çalıştırır
- **MySQL**: Port 3306'da çalışır
- **Node**: Frontend asset'lerini build eder

## Veritabanı Bağlantısı

Docker dışından veritabanına bağlanmak için:

- **Host**: localhost
- **Port**: 3306
- **Database**: clickpulse
- **Username**: clickpulse
- **Password**: root (veya .env dosyasındaki DB_PASSWORD değeri)

## Sorun Giderme

### Port Çakışması

Eğer 8000 veya 3306 portları kullanılıyorsa, `docker-compose.yml` dosyasındaki port numaralarını değiştirebilirsiniz.

### Permission Hataları

Storage ve bootstrap/cache klasörlerinin yazma izinleri olması gerekir:

```bash
docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### Container'lar Yeniden Başlatma

```bash
docker-compose restart
```

veya belirli bir servis için:

```bash
docker-compose restart app
```

## Production Kullanımı

Production ortamı için:

1. `.env` dosyasında `APP_DEBUG=false` yapın
2. `APP_ENV=production` olarak ayarlayın
3. Frontend asset'lerini build edin: `docker-compose exec node npm run build`
4. Cache'leri optimize edin: `docker-compose exec app php artisan optimize`

