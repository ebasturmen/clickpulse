#!/bin/bash

# Docker initialization script for ClickPulse Laravel project

set -e

echo "🚀 ClickPulse Docker Kurulum Başlatılıyor..."

# Check if .env file exists
if [ ! -f .env ]; then
    echo "📝 .env dosyası oluşturuluyor..."
    cp .env.example .env
    echo "✅ .env dosyası oluşturuldu. Lütfen .env dosyasını düzenleyin."
fi

# Start containers
echo "🐳 Docker container'ları başlatılıyor..."
docker-compose up -d --build

# Wait for database to be ready
echo "⏳ Veritabanı hazır olana kadar bekleniyor..."
sleep 10

# Install PHP dependencies
echo "📦 Composer bağımlılıkları yükleniyor..."
docker-compose exec -T app composer install --no-interaction

# Generate app key if not set
echo "🔑 Uygulama anahtarı kontrol ediliyor..."
if ! docker-compose exec -T app php artisan key:generate --show 2>/dev/null | grep -q "base64"; then
    echo "🔑 Yeni uygulama anahtarı oluşturuluyor..."
    docker-compose exec -T app php artisan key:generate --force
fi

# Set permissions
echo "🔐 Dosya izinleri ayarlanıyor..."
docker-compose exec -T app chmod -R 775 storage bootstrap/cache || true
docker-compose exec -T app chown -R www-data:www-data storage bootstrap/cache || true

# Run migrations
echo "🗄️  Veritabanı migration'ları çalıştırılıyor..."
docker-compose exec -T app php artisan migrate --force || echo "⚠️  Migration'lar çalıştırılamadı. Veritabanı bağlantısını kontrol edin."

# Create storage link
echo "🔗 Storage linki oluşturuluyor..."
docker-compose exec -T app php artisan storage:link || echo "⚠️  Storage linki oluşturulamadı."

# Install Node dependencies (optional, for dev)
if [ "$1" == "--dev" ]; then
    echo "📦 Node.js bağımlılıkları yükleniyor..."
    docker-compose --profile dev up -d node || true
    docker-compose exec -T node npm install
    echo "✅ Development modu aktif."
fi

echo ""
echo "✅ Kurulum tamamlandı!"
echo ""
echo "📋 Kullanışlı komutlar:"
echo "   • Uygulamaya erişim: http://localhost:8000"
echo "   • Container logları: docker-compose logs -f"
echo "   • Container'ları durdur: docker-compose down"
echo "   • Artisan komutları: docker-compose exec app php artisan [komut]"
echo ""
echo "🎉 Proje hazır! İyi çalışmalar!"

