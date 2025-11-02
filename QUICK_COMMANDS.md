# Hızlı Komutlar

## Temel Docker Komutları

### Container'ları Başlatma/Durdurma
```bash
# Tüm container'ları başlat
docker-compose up -d

# Container'ları durdur
docker-compose down

# Container'ları yeniden başlat
docker-compose restart

# Container loglarını görüntüle
docker-compose logs -f
```

### Artisan Komutları
```bash
# Migration çalıştır
docker-compose exec app php artisan migrate

# Cache temizle
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear

# Route listesi
docker-compose exec app php artisan route:list

# Tinker
docker-compose exec app php artisan tinker
```

### Composer Komutları
```bash
# Paket yükle
docker-compose exec app composer require [paket-adi]

# Composer update
docker-compose exec app composer update

# Autoload optimize et
docker-compose exec app composer dump-autoload -o
```

### Frontend (Node.js) Komutları
```bash
# Frontend asset'leri build et (production)
docker-compose --profile dev run --rm node npm run build

# Development modu (hot reload)
docker-compose --profile dev run --rm node npm run dev

# Node bağımlılıklarını yükle
docker-compose --profile dev run --rm node npm install
```

### Container'lara Giriş
```bash
# PHP container'ına giriş
docker-compose exec app bash

# Node container'ına giriş
docker-compose --profile dev run --rm node sh

# Database container'ına giriş
docker-compose exec db mysql -u clickpulse -proot clickpulse
```

### Veritabanı İşlemleri
```bash
# Veritabanına bağlan
docker-compose exec db mysql -u clickpulse -proot clickpulse

# Migration fresh (veritabanını sıfırla ve migration çalıştır)
docker-compose exec app php artisan migrate:fresh

# Migration + seed
docker-compose exec app php artisan migrate:fresh --seed

# Backup al
docker-compose exec db mysqldump -u clickpulse -proot clickpulse > backup.sql
```

### Sorun Giderme
```bash
# Container loglarını görüntüle
docker-compose logs app
docker-compose logs nginx
docker-compose logs db

# Container durumunu kontrol et
docker-compose ps

# Storage izinlerini düzelt
docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache

# Container'ı yeniden build et
docker-compose up -d --build
```

## Hızlı Erişim

- **Web Uygulaması**: http://clickpulse.test
- **Veritabanı**: localhost:3306
  - Database: `clickpulse`
  - Username: `clickpulse`
  - Password: `root`

