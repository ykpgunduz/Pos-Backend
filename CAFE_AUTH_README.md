# Kafe Giriş/Çıkış Sistemi Kullanım Kılavuzu

## Kurulum

### 1. Migration Çalıştırma
Migration ve seeder'ları çalıştırarak veritabanını güncelleyin:

```bash
php artisan migrate --seed
```

Bu komut:
- `cafes` tablosuna `email`, `password` ve `remember_token` alanlarını ekler
- Sanctum token tablosunu oluşturur
- Default bir kafe oluşturur (email: cafe@example.com, password: password)
- 12 adet masa oluşturur (table_number: 1-12)

### 2. Config Cache Temizleme
Değişikliklerin aktif olması için:

```bash
php artisan config:clear
php artisan cache:clear
```

## API Endpoint'leri

### 1. Kafe Kaydı (Register)
**Endpoint:** `POST /api/cafe/register`

**Request Body:**
```json
{
    "name": "Yeni Kafe",
    "email": "yeni@kafe.com",
    "password": "12345678",
    "password_confirmation": "12345678",
    "phone": "05551234567",
    "address": "İstanbul",
    "description": "Harika bir kafe"
}
```

**Response:**
```json
{
    "message": "Kafe başarıyla oluşturuldu",
    "cafe": {
        "id": 1,
        "name": "Yeni Kafe",
        "email": "yeni@kafe.com",
        "phone": "05551234567",
        "address": "İstanbul",
        "description": "Harika bir kafe",
        "created_at": "2025-11-14T19:32:44.000000Z",
        "updated_at": "2025-11-14T19:32:44.000000Z"
    },
    "token": "1|aBcDeFgHiJkLmNoPqRsTuVwXyZ..."
}
```

### 2. Kafe Girişi (Login)
**Endpoint:** `POST /api/cafe/login`

**Request Body:**
```json
{
    "email": "cafe@example.com",
    "password": "password"
}
```

**Response:**
```json
{
    "message": "Giriş başarılı",
    "cafe": {
        "id": 1,
        "name": "Default Cafe",
        "email": "cafe@example.com",
        ...
    },
    "token": "2|xYzWvUtSrQpOnMlKjIhGfEdCbA..."
}
```

### 3. Kafe Bilgilerini Getir (Me)
**Endpoint:** `GET /api/cafe/me`

**Headers:**
```
Authorization: Bearer {token}
```

**Response:**
```json
{
    "cafe": {
        "id": 1,
        "name": "Default Cafe",
        "email": "cafe@example.com",
        ...
    }
}
```

### 4. Kafe Çıkışı (Logout)
**Endpoint:** `POST /api/cafe/logout`

**Headers:**
```
Authorization: Bearer {token}
```

**Response:**
```json
{
    "message": "Çıkış başarılı"
}
```

## Test Kullanıcısı

Sistem başlatıldığında otomatik olarak aşağıdaki test kafeyi oluşturur:

- **Email:** cafe@example.com
- **Şifre:** password

## Postman/Insomnia ile Test

### 1. Login İsteği
```bash
curl -X POST http://localhost:8000/api/cafe/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "cafe@example.com",
    "password": "password"
  }'
```

### 2. Token ile Korunan Endpoint'e Erişim
```bash
curl -X GET http://localhost:8000/api/cafe/me \
  -H "Authorization: Bearer {aldığınız_token}"
```

### 3. Logout
```bash
curl -X POST http://localhost:8000/api/cafe/logout \
  -H "Authorization: Bearer {aldığınız_token}"
```

## Güvenlik Notları

- Şifreler otomatik olarak hash'lenir (bcrypt)
- Token'lar Laravel Sanctum ile yönetilir
- Email adresleri unique olmalıdır
- Minimum şifre uzunluğu 8 karakterdir
- Korunan route'lar için Bearer token gereklidir

## Sorun Giderme

### "Access denied" Hatası
`.env` dosyanızdaki veritabanı ayarlarını kontrol edin:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pos_backend
DB_USERNAME=root
DB_PASSWORD=
```

### "Unauthenticated" Hatası
- Token'ın doğru gönderildiğinden emin olun
- Authorization header'ının `Bearer {token}` formatında olduğunu kontrol edin
- Token'ın expire olmadığını kontrol edin

### Migration Hatası
```bash
php artisan migrate:fresh --seed
```
⚠️ Dikkat: Bu komut tüm verileri siler ve yeniden oluşturur!

## Yapılan Değişiklikler

1. **Migration:** `2025_11_14_193244_add_authentication_fields_to_cafes_table.php`
   - `email` (unique)
   - `password`
   - `remember_token`

2. **Model:** `app/Models/Cafe.php`
   - `Authenticatable` extend edildi
   - `HasApiTokens`, `Notifiable` trait'leri eklendi
   - Password hash'leme eklendi

3. **Controller:** `app/Http/Controllers/CafeAuthController.php`
   - register, login, logout, me metodları

4. **Routes:** `routes/api.php`
   - Cafe authentication route'ları
   - Protected route'lar için middleware

5. **Config:** `config/auth.php` ve `config/sanctum.php`
   - Cafe guard ve provider eklendi

6. **Seeder:** `database/seeders/CafeSeeder.php`
   - Email ve password alanları eklendi
