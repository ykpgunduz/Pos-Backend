# 🎯 Veritabanı Seeder Dokümantasyonu

## 📋 Genel Bakış

Bu proje için kapsamlı ve gerçekçi seeder'lar oluşturulmuştur. 3 farklı kafe, her biri kendi kullanıcıları, masaları, kategorileri ve ürünleriyle birlikte veritabanına eklenir.

## 🏪 Oluşturulan Kafeler

### 1. Kahve Durağı
- **Email:** info@kahveduragi.com
- **Şifre:** password123
- **Telefon:** 0212 555 0101
- **Adres:** Bağdat Caddesi No:123, Kadıköy, İstanbul
- **Açılış-Kapanış:** 08:00 - 22:00
- **Instagram:** @kahveduragi
- **Açıklama:** Özel çekirdek kahveleri ve ev yapımı pastalarıyla hizmet veren modern bir kafe

**Kategoriler:**
- ☕ Sıcak İçecekler (7 ürün)
- 🧊 Soğuk İçecekler (5 ürün)
- 🍰 Tatlılar (4 ürün)
- 🥐 Kahvaltı (4 ürün)

**Toplam:** 20 ürün

### 2. Mola Kafe
- **Email:** contact@molakafe.com
- **Şifre:** password123
- **Telefon:** 0216 444 0202
- **Adres:** Nişantaşı Mahallesi, Vali Konağı Caddesi No:45, Şişli, İstanbul
- **Açılış-Kapanış:** 07:00 - 23:00
- **Instagram:** @molakafe
- **Açıklama:** Huzurlu atmosferi ve özel kahve çeşitleriyle gününüze mola verin

**Kategoriler:**
- ☕ Kahve Çeşitleri (5 ürün)
- 🍵 Çaylar (4 ürün)
- 🥤 Smoothie & Milkshake (4 ürün)
- 🥨 Atıştırmalıklar (3 ürün)
- ⭐ Özel Tarifler (3 ürün)

**Toplam:** 19 ürün

### 3. Espresso Lab
- **Email:** hello@espressolab.com
- **Şifre:** password123
- **Telefon:** 0212 333 0303
- **Adres:** İstiklal Caddesi No:87, Beyoğlu, İstanbul
- **Açılış-Kapanış:** 09:00 - 24:00
- **Instagram:** @espressolab
- **Açıklama:** Kahve tutkunları için özel blend'ler ve barista eğitimleri

**Kategoriler:**
- ☕ Signature Espresso (5 ürün)
- 🫖 Filter Coffee (4 ürün)
- ❄️ Soğuk Demlemeler (3 ürün)
- 🎂 Ev Yapımı Pastalar (4 ürün)
- 🥪 Sandviçler (4 ürün)

**Toplam:** 20 ürün

## 👥 Kullanıcılar (Çalışanlar)

### Kahve Durağı Ekibi
- **Ahmet Yılmaz** - ahmet@kahveduragi.com (Manager)
- **Ayşe Demir** - ayse@kahveduragi.com (Barista)
- **Mehmet Kaya** - mehmet@kahveduragi.com (Waiter)

### Mola Kafe Ekibi
- **Zeynep Şahin** - zeynep@molakafe.com (Manager)
- **Can Arslan** - can@molakafe.com (Barista)
- **Elif Çelik** - elif@molakafe.com (Waiter)
- **Burak Öztürk** - burak@molakafe.com (Chef)

### Espresso Lab Ekibi
- **Deniz Aydın** - deniz@espressolab.com (Manager)
- **Cem Yıldız** - cem@espressolab.com (Head Barista)
- **Selin Koç** - selin@espressolab.com (Barista)
- **Mert Acar** - mert@espressolab.com (Waiter)

### Test Müşterileri
- **Test Müşteri** - customer@test.com (Customer)
- **Ali Veli** - ali@test.com (Customer)

**Tüm kullanıcıların şifresi:** password123

## 🪑 Masalar

Her kafe için **12 masa** oluşturulur (Masa No: 1-12)
- **Toplam:** 36 masa
- **Başlangıç Durumu:** Tümü "available" (Müsait)

## 📊 Seeder Sırası

Seeder'lar şu sırayla çalıştırılır:

1. **CafeSeeder** - 3 kafe oluşturur
2. **UserSeeder** - Her kafe için çalışanlar + test müşterileri
3. **CafeTableSeeder** - Her kafe için 12 masa
4. **CategorySeeder** - Her kafeye özel kategoriler
5. **ProductSeeder** - Her kategori için ürünler

## 🚀 Kullanım

### Tüm Seeder'ları Çalıştırma

```bash
# Veritabanını sıfırlayıp tüm seeder'ları çalıştır
php artisan migrate:fresh --seed

# Sadece seeder'ları çalıştır (migration yapmadan)
php artisan db:seed
```

### Tek Bir Seeder Çalıştırma

```bash
# Sadece kafeleri oluştur
php artisan db:seed --class=CafeSeeder

# Sadece ürünleri oluştur
php artisan db:seed --class=ProductSeeder
```

## 📈 İstatistikler

Seed işlemi tamamlandıktan sonra:

| Model | Adet |
|-------|------|
| Kafeler | 3 |
| Kullanıcılar | 13 |
| Masalar | 36 |
| Kategoriler | 13 |
| Ürünler | 59 |

## 🔐 Test Login Bilgileri

### Kafe Girişi (API)

```bash
# Kahve Durağı
POST /api/cafe/login
{
  "email": "info@kahveduragi.com",
  "password": "password123"
}

# Mola Kafe
POST /api/cafe/login
{
  "email": "contact@molakafe.com",
  "password": "password123"
}

# Espresso Lab
POST /api/cafe/login
{
  "email": "hello@espressolab.com",
  "password": "password123"
}
```

### Kullanıcı Girişi

Herhangi bir çalışan hesabıyla giriş yapabilirsiniz:

```bash
POST /api/user/login  # (Eğer user auth varsa)
{
  "email": "ahmet@kahveduragi.com",
  "password": "password123"
}
```

## 🎨 Özellikler

### ✅ Gerçekçi Veriler
- Gerçek İstanbul adresleri
- Türkçe ürün isimleri ve açıklamaları
- Gerçekçi fiyatlandırma
- Stok miktarları
- Yıldız derecelendirmeleri

### ✅ İlişkisel Bütünlük
- Her ürün bir kafeye ve kategoriye ait
- Her kategori bir kafeye ait
- Her masa bir kafeye ait
- Her kullanıcı bir role sahip

### ✅ Idempotent (Tekrarlanabilir)
- `firstOrCreate` kullanımı
- Aynı seeder'ı birden fazla kez çalıştırabilirsiniz
- Mevcut kayıtlar korunur, sadece yenileri eklenir

### ✅ Bilgilendirici Çıktılar
- Her adımda console mesajları
- Renkli ve emoji'li çıktılar
- Özet tablo gösterimi
- Test bilgileri

## 📝 Seeder Dosyaları

```
database/seeders/
├── DatabaseSeeder.php      # Ana seeder (tümünü çağırır)
├── CafeSeeder.php         # 3 kafe oluşturur
├── UserSeeder.php         # 13 kullanıcı oluşturur
├── CafeTableSeeder.php    # 36 masa oluşturur
├── CategorySeeder.php     # 13 kategori oluşturur
└── ProductSeeder.php      # 59 ürün oluşturur
```

## 🔄 Veritabanını Sıfırlama

Tüm verileri silip yeniden oluşturmak için:

```bash
php artisan migrate:fresh --seed
```

⚠️ **DİKKAT:** Bu komut tüm verileri siler!

## 💡 İpuçları

1. **Geliştirme Ortamında**
   ```bash
   php artisan migrate:fresh --seed
   ```

2. **Production'da (Dikkatli!)**
   ```bash
   # Önce backup alın!
   php artisan db:seed
   ```

3. **Tek Bir Kafe Test Etmek İçin**
   - Sadece ilgili kafe ile login olun
   - O kafenin ürünlerini göreceksiniz

4. **Yeni Ürün Eklemek**
   - ProductSeeder.php içindeki ilgili cafe metodunu düzenleyin
   - `php artisan db:seed --class=ProductSeeder`

## 🐛 Sorun Giderme

### "Class not found" Hatası
```bash
composer dump-autoload
php artisan db:seed
```

### "Duplicate entry" Hatası
```bash
# Veritabanını temizle ve yeniden başlat
php artisan migrate:fresh --seed
```

### "Foreign key constraint" Hatası
```bash
# Doğru sırayla seed et
php artisan db:seed
```

## 📞 İletişim

Sorularınız için:
- Seeder'lar hakkında: `database/seeders/` klasörüne bakın
- API kullanımı için: `CAFE_SCOPED_API_README.md`
- Auth sistemi için: `CAFE_AUTH_README.md`

---

**Son Güncelleme:** 14 Kasım 2025
