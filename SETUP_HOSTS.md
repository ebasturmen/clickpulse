# Hosts Dosyası Kurulumu

`clickpulse.test` domain'ini kullanabilmek için `/etc/hosts` dosyasına ekleme yapmanız gerekiyor.

## Mac/Linux

Aşağıdaki komutu terminal'de çalıştırın (sudo şifresi isteyecek):

```bash
sudo sh -c 'echo "127.0.0.1 clickpulse.test www.clickpulse.test" >> /etc/hosts'
```

VEYA manuel olarak düzenleyin:

```bash
sudo nano /etc/hosts
```

Dosyanın sonuna şu satırı ekleyin:
```
127.0.0.1 clickpulse.test www.clickpulse.test
```

Kaydedip çıkın (Ctrl+X, sonra Y, sonra Enter).

## Kontrol

Hosts dosyasının güncellendiğini kontrol etmek için:

```bash
cat /etc/hosts | grep clickpulse
```

## Erişim

Hosts dosyasını güncelledikten sonra tarayıcınızda şu adresleri kullanabilirsiniz:
- http://clickpulse.test
- http://www.clickpulse.test

## DNS Cache Temizleme (Gerekirse)

Mac'te:
```bash
sudo dscacheutil -flushcache
sudo killall -HUP mDNSResponder
```

