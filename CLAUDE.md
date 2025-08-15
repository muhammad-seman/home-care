# Home Care Marketplace - Project Documentation

## 📋 Project Overview

Home Care Marketplace adalah platform digital yang menghubungkan pasien dengan bidan terdekat untuk layanan kesehatan ibu dan anak. Platform ini mengatasi masalah akses layanan kesehatan dengan menyediakan transparansi harga, lokasi, dan kualitas layanan.

### 🎯 Problem Statement
- Kesulitan menemukan bidan terdekat yang tersedia
- Tidak ada transparansi harga layanan  
- Proses booking yang rumit
- Kurangnya informasi kredibilitas bidan

### 🏗️ Solution Architecture
Commission-based marketplace dengan fitur:
- Pencarian bidan berdasarkan lokasi & GPS
- Katalog layanan dengan pricing transparan
- Sistem booking & order tracking
- Chat/messaging antar user-bidan
- Review & rating system
- Multi-role RBAC (User, Bidan, Admin)

## 🛠️ Tech Stack

### Backend
- **Framework:** Laravel 12.x
- **Database:** MySQL
- **Authentication:** Laravel Sanctum
- **API:** RESTful with JSON responses

### Frontend  
- **Framework:** React 18+ with TypeScript
- **Routing:** React Router DOM
- **State Management:** Context API + Custom Hooks
- **UI Library:** TailwindCSS
- **Build Tool:** Vite

### External Services
- **Location API:** https://muhammad-seman.github.io/api-wilayah-indonesia/
- **Maps:** HTML5 Geolocation + Custom mapping
- **Real-time:** Laravel Broadcasting (future)

## 📊 Database Schema

### Core Entities
```sql
-- Authentication & Users
users (id, name, email, phone, role, status, email_verified_at, phone_verified_at)
roles (id, name, permissions)

-- Healthcare Providers
bidans (id, user_id, license_number, specializations, bio, experience_years, rating, is_verified)
bidan_services (id, bidan_id, service_id, custom_price, is_available)
bidan_requests (id, name, email, phone, license_number, documents, status)

-- Services & Marketplace
services (id, name, description, category, base_price, unit, icon)
service_categories (id, name, description, icon)

-- Location Management
provinces (id, name, code)
regencies (id, province_id, name, code) 
districts (id, regency_id, name, code)
user_locations (id, user_id, latitude, longitude, address, province_id, regency_id, district_id)

-- Orders & Transactions
orders (id, user_id, bidan_id, total_amount, commission_amount, status, payment_status, scheduled_at)
order_items (id, order_id, service_id, quantity, price, subtotal)
payments (id, order_id, amount, method, transaction_id, status)

-- Social Features
favorites (id, user_id, bidan_id)
messages (id, from_user_id, to_user_id, order_id, message, is_read)
reviews (id, order_id, user_id, bidan_id, rating, comment)
```

## 🔐 RBAC System

### Roles & Permissions
```php
'user' => [
    'view_bidans', 'book_services', 'view_own_orders', 
    'chat_with_bidans', 'add_favorites', 'submit_reviews'
],
'bidan' => [
    'manage_own_profile', 'manage_own_services', 'view_assigned_orders',
    'update_order_status', 'chat_with_users', 'view_own_analytics'
],
'admin' => [
    'manage_users', 'manage_bidans', 'verify_bidans', 'manage_services',
    'view_all_orders', 'view_system_analytics', 'manage_platform_settings'
]
```

## 🌍 Location Integration

### API Endpoints (Indonesian Regions)
```
GET https://muhammad-seman.github.io/api-wilayah-indonesia/api/provinces.json
GET https://muhammad-seman.github.io/api-wilayah-indonesia/api/regencies/{provinceId}.json
GET https://muhammad-seman.github.io/api-wilayah-indonesia/api/districts/{regencyId}.json
GET https://muhammad-seman.github.io/api-wilayah-indonesia/api/villages/{districtId}.json
```

### GPS Integration
- HTML5 Geolocation API untuk auto-detect lokasi user
- Haversine formula untuk kalkulasi jarak
- Nearby search dalam radius tertentu

## 🚀 Development Commands

### Laravel Commands
```bash
# Start development server
php artisan serve

# Run migrations
php artisan migrate

# Create new migration
php artisan make:migration create_table_name

# Create model with migration
php artisan make:model ModelName -m

# Create controller
php artisan make:controller ControllerName

# Generate API key
php artisan key:generate

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

### Frontend Commands
```bash
# Install dependencies
npm install

# Start dev server
npm run dev

# Build for production
npm run build

# Type checking
npm run type-check

# Linting
npm run lint
```

## 🗂️ Project Structure

```
/
├── app/
│   ├── Http/Controllers/     # API Controllers
│   ├── Models/              # Eloquent Models
│   ├── Services/            # Business Logic
│   └── Providers/           # Service Providers
├── config/                  # Configuration files
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Data seeders
├── resources/
│   ├── js/                  # React + TypeScript source
│   │   ├── components/      # Reusable components
│   │   ├── pages/          # Page components
│   │   ├── hooks/          # Custom hooks
│   │   ├── services/       # API services
│   │   ├── types/          # TypeScript types
│   │   └── utils/          # Utility functions
│   └── views/              # Blade templates
├── routes/
│   ├── api.php             # API routes
│   └── web.php             # Web routes
└── public/                 # Public assets
```

## 📈 Development Phases

### Phase 1: Core Setup ✅
- [x] Laravel + React + TypeScript setup
- [x] Database configuration
- [x] Authentication system (Sanctum)
- [x] Basic RBAC implementation

### Phase 2: Marketplace Features
- [ ] Service catalog & management
- [ ] Bidan profiles & registration
- [ ] Location integration (Indonesian regions)
- [ ] Search & filtering system

### Phase 3: Booking System  
- [ ] Order management workflow
- [ ] Payment integration
- [ ] Status tracking & notifications

### Phase 4: Social Features
- [ ] Real-time messaging
- [ ] Review & rating system
- [ ] Favorites management
- [ ] Admin dashboard & analytics

## 🔧 Configuration Notes

### Environment Variables
```bash
APP_NAME="Home Care Marketplace"
APP_URL=http://localhost:8000
APP_TIMEZONE=Asia/Jakarta

DB_DATABASE=home_care
LOCATION_API_BASE_URL=https://muhammad-seman.github.io/api-wilayah-indonesia
```

### Key Features to Implement
1. **Commission Calculation:** Automated pada setiap completed order
2. **Location Privacy:** User permission handling untuk GPS access
3. **Scalability:** Database indexing untuk geolocation queries
4. **Security:** Input validation, rate limiting, CORS policy
5. **Mobile-First:** Responsive design untuk accessibility

## 🚀 Next Steps
1. Setup database migrations untuk core entities
2. Implement authentication dengan Sanctum + RBAC
3. Create location integration service
4. Build React components architecture
5. Setup CI/CD pipeline

---

**Last Updated:** 2025-08-15
**Version:** 0.1.0
**Maintainer:** Muhammad Seman