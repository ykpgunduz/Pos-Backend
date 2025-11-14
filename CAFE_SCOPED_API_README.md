# Kafe Bazlı API Yetkilendirme Sistemi

## Genel Bakış

API artık **kafe bazlı yetkilendirme** ile çalışmaktadır. Her kafe sadece kendi verilerine erişebilir ve bunları yönetebilir.

## Nasıl Çalışır?

### 1. Authentication (Kimlik Doğrulama)

Öncelikle bir kafe hesabıyla giriş yapmanız gerekir:

```bash
POST /api/cafe/login
{
  "email": "cafe@harpysocial.com",
  "password": "asd"
}
```

**Response:**
```json
{
  "message": "Giriş başarılı",
  "cafe": { ... },
  "token": "2|aBcDeFgH123456..."
}
```

### 2. Token Kullanımı

Aldığınız token'ı tüm API isteklerinde `Authorization` header'ında kullanın:

```
Authorization: Bearer {token}
```

### 3. Otomatik Filtreleme

API artık giriş yapan kafeye göre otomatik olarak veri filtreler:

#### Önceki Durum (❌ Güvensiz)
```bash
GET /api/products/list
# Tüm kafelerin ürünlerini dönerdi
```

#### Yeni Durum (✅ Güvenli)
```bash
GET /api/products/list
Authorization: Bearer {token}
# Sadece giriş yapan kafenin ürünlerini döner
```

## Korunan Endpoint'ler

Aşağıdaki tüm endpoint'ler artık **authentication** gerektirir:

### Products (Ürünler)
- `GET /api/products/list` - Sadece kendi ürünleriniz
- `GET /api/products/{id}` - Erişim kontrolü yapılır
- `POST /api/products/create` - cafe_id otomatik eklenir
- `PUT/PATCH /api/products/{id}/update` - Sadece kendi ürününüzü güncelleyebilirsiniz
- `DELETE /api/products/{id}/delete` - Sadece kendi ürününüzü silebilirsiniz

### Categories (Kategoriler)
- `GET /api/categories/list` - Sadece kendi kategorileriniz
- `GET /api/categories/{id}` - Erişim kontrolü
- `POST /api/categories/create` - cafe_id otomatik eklenir
- `PUT/PATCH /api/categories/{id}/update` - Sadece kendi kategorinizi güncelleyebilirsiniz
- `DELETE /api/categories/{id}/delete` - Sadece kendi kategorinizi silebilirsiniz

### Tables (Masalar)
- `GET /api/tables/list` - Sadece kendi masalarınız
- `GET /api/tables/{id}` - Erişim kontrolü
- `POST /api/tables/create` - cafe_id otomatik eklenir
- `PUT/PATCH /api/tables/{id}/update` - Sadece kendi masanızı güncelleyebilirsiniz
- `DELETE /api/tables/{id}/delete` - Sadece kendi masanızı silebilirsiniz

### Carts (Sepetler)
- `GET /api/carts/list` - Sadece kendi sepetleriniz
- Tüm CRUD işlemleri cafe bazlı korunur

### Order Items (Sipariş Ürünleri)
- `GET /api/order-items/list` - Sadece kendi siparişleriniz
- Tüm CRUD işlemleri cafe bazlı korunur

### Past Orders (Geçmiş Siparişler)
- `GET /api/past-orders/list` - Sadece kendi geçmiş siparişleriniz
- Tüm CRUD işlemleri cafe bazlı korunur

### Past Items (Geçmiş Ürünler)
- `GET /api/past-items/list` - Sadece kendi geçmiş ürünleriniz
- Tüm CRUD işlemleri cafe bazlı korunur

### Notifications (Bildirimler)
- `GET /api/notifications/list` - Sadece kendi bildirimleriniz
- Tüm CRUD işlemleri cafe bazlı korunur

### Cancels (İptaller)
- `GET /api/cancels/list` - Sadece kendi iptalleriniz
- Tüm CRUD işlemleri cafe bazlı korunur

### Ratings (Değerlendirmeler)
- `GET /api/ratings/list` - Sadece kendi değerlendirmeleriniz
- Tüm CRUD işlemleri cafe bazlı korunur

## Public Endpoint'ler

Bazı endpoint'ler hala public (authentication gerektirmez):

### Cafe Discovery
- `GET /api/cafes/list` - Tüm kafeleri listele (public)
- `GET /api/cafes/{id}` - Kafe detayları (public)

### User Management
- Tüm user endpoint'leri şu an public (gerekirse güncellenebilir)

## Örnek İstekler

### 1. Login
```bash
curl -X POST http://localhost:8000/api/cafe/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "cafe@harpysocial.com",
    "password": "asd"
  }'
```

### 2. Kendi Ürünlerini Listele
```bash
curl -X GET http://localhost:8000/api/products/list \
  -H "Authorization: Bearer {token}"
```

### 3. Yeni Ürün Ekle (cafe_id otomatik eklenir)
```bash
curl -X POST http://localhost:8000/api/products/create \
  -H "Authorization: Bearer {token}" \
  -H "Content-Type: application/json" \
  -d '{
    "category_id": 1,
    "name": "Latte",
    "price": 45,
    "stock": 100
  }'
```

### 4. Ürün Güncelle (Sadece kendi ürününüz)
```bash
curl -X PATCH http://localhost:8000/api/products/1/update \
  -H "Authorization: Bearer {token}" \
  -H "Content-Type: application/json" \
  -d '{
    "price": 50
  }'
```

## Güvenlik Özellikleri

### ✅ Otomatik cafe_id Ataması
Yeni kayıt oluştururken artık `cafe_id` göndermenize gerek yok. Sistem otomatik olarak giriş yapan kafenin ID'sini kullanır.

**Öncesi:**
```json
{
  "cafe_id": 1,  // ❌ Manuel giriyordunuz
  "name": "Latte"
}
```

**Şimdi:**
```json
{
  "name": "Latte"  // ✅ cafe_id otomatik eklenir
}
```

### ✅ Erişim Kontrolü
Başka bir kafeye ait kaydı görüntülemeye, güncellemeye veya silmeye çalışırsanız:

```json
{
  "error": "Bu ürüne erişim yetkiniz yok"
}
```
**HTTP Status:** `403 Forbidden`

### ✅ Otomatik Filtreleme
Listeleme endpoint'leri sadece giriş yapan kafenin verilerini döner:

```sql
-- Otomatik eklenen WHERE koşulu
WHERE cafe_id = {authenticated_cafe_id}
```

## Migration Notları

### Önemli Değişiklikler

1. **cafe_id artık gerekli değil** (POST isteklerinde)
   - Sistem otomatik olarak giriş yapan kafenin ID'sini kullanır
   
2. **Tüm endpoint'ler artık korunur**
   - Authentication token'ı olmadan API kullanılamaz
   - Her istek giriş yapan kafenin yetkilerini kontrol eder

3. **403 Forbidden hataları**
   - Başka bir kafeye ait veriyi değiştirmeye çalışırsanız bu hatayı alırsınız

## Sorun Giderme

### "Unauthenticated" Hatası
```json
{
  "message": "Unauthenticated."
}
```
**Çözüm:** Authorization header'ını kontrol edin:
```
Authorization: Bearer {valid_token}
```

### "Bu ürüne erişim yetkiniz yok" Hatası
```json
{
  "error": "Bu ürüne erişim yetkiniz yok"
}
```
**Çözüm:** Başka bir kafeye ait kaydı değiştirmeye çalışıyorsunuz. Sadece kendi kayıtlarınıza erişebilirsiniz.

### Token Expired
Token'ınız zaman aşımına uğradıysa tekrar login olun:
```bash
POST /api/cafe/login
```

## Test Senaryosu

### 1. İki Kafe Oluşturun
```bash
# Kafe A
POST /api/cafe/register
{
  "name": "Kafe A",
  "email": "kafeA@test.com",
  "password": "12345678",
  "password_confirmation": "12345678"
}

# Kafe B
POST /api/cafe/register
{
  "name": "Kafe B",
  "email": "kafeB@test.com",
  "password": "12345678",
  "password_confirmation": "12345678"
}
```

### 2. Her Kafenin Token'ını Alın
```bash
# Kafe A Login
POST /api/cafe/login
{
  "email": "kafeA@test.com",
  "password": "12345678"
}
# Token: tokenA

# Kafe B Login
POST /api/cafe/login
{
  "email": "kafeB@test.com",
  "password": "12345678"
}
# Token: tokenB
```

### 3. Kafe A ile Ürün Ekleyin
```bash
POST /api/products/create
Authorization: Bearer {tokenA}
{
  "category_id": 1,
  "name": "Kafe A'nın Kahvesi"
}
# Response: product_id = 1
```

### 4. Kafe B ile Aynı Ürünü Görmeye/Değiştirmeye Çalışın
```bash
GET /api/products/1
Authorization: Bearer {tokenB}
# Response: 403 Forbidden - "Bu ürüne erişim yetkiniz yok"

GET /api/products/list
Authorization: Bearer {tokenB}
# Response: [] (Kafe B'nin hiç ürünü yok)
```

## Sonuç

✅ Her kafe artık sadece kendi verilerine erişebilir  
✅ cafe_id otomatik olarak eklenir  
✅ Yetki kontrolü tüm işlemlerde yapılır  
✅ Multi-tenant (çok kiracılı) yapı güvenli şekilde çalışır  

**Not:** Sanctum paketinin Docker konteynerinizde yüklü olduğundan emin olun:
```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```
