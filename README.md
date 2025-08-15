# Home Care Marketplace

Platform digital yang menghubungkan pasien dengan bidan terdekat untuk layanan kesehatan ibu dan anak.

## 🚀 Tech Stack

- **Backend:** Laravel 12
- **Frontend:** React 18 + TypeScript
- **Database:** MySQL
- **Authentication:** Laravel Sanctum
- **Styling:** TailwindCSS v4
- **Build Tool:** Vite

## 📋 Features

### Core Features
- 🔐 Multi-role Authentication (User, Bidan, Admin)
- 🗺️ Location-based bidan search
- 💰 Transparent pricing system  
- 📱 Real-time booking & messaging
- ⭐ Review & rating system
- 💳 Commission-based marketplace

### User Roles
- **User/Patient:** Search bidan, book services, manage orders
- **Bidan:** Manage profile, services, orders, analytics
- **Admin:** Platform management, user verification

## 🛠️ Installation

### Prerequisites
- PHP 8.2+
- Node.js 18+
- MySQL 8.0+
- Composer

### Setup

1. **Clone repository**
   ```bash
   git clone https://github.com/muhammad-seman/home-care.git
   cd home-care
   ```

2. **Backend setup**
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database setup**
   ```bash
   # Create database
   mysql -u root -e "CREATE DATABASE home_care"
   
   # Run migrations
   php artisan migrate --seed
   ```

4. **Frontend setup**
   ```bash
   npm install
   npm run build
   ```

## 🚀 Development

### Start servers
```bash
# Backend (Laravel)
php artisan serve
# Runs on http://localhost:8000

# Frontend (Vite)
npm run dev  
# Runs on http://localhost:3000
```

### Commands
```bash
# Laravel
php artisan migrate          # Run migrations
php artisan db:seed         # Seed database
php artisan make:controller # Create controller
php artisan make:model     # Create model

# Frontend
npm run dev        # Development server
npm run build      # Production build  
npm run type-check # TypeScript validation
```

## 📡 API Endpoints

### Authentication
- `POST /api/auth/register` - User registration
- `POST /api/auth/login` - User login
- `POST /api/auth/logout` - User logout
- `GET /api/auth/me` - Get current user

### Location Services
- Integration with Indonesian regions API
- GPS-based nearby search
- Address management

## 🗂️ Project Structure

```
/
├── app/
│   ├── Http/Controllers/    # API Controllers
│   ├── Models/             # Eloquent Models
│   └── Services/           # Business Logic
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Data seeders
├── resources/
│   ├── js/                # React + TypeScript
│   │   ├── components/    # Reusable components
│   │   ├── pages/        # Page components
│   │   ├── hooks/        # Custom hooks
│   │   ├── services/     # API services
│   │   └── types/        # TypeScript types
│   └── css/              # Styles
└── routes/
    ├── api.php            # API routes
    └── web.php            # Web routes
```

## 🌍 Location Integration

Using Indonesian Regions API:
- **Base URL:** https://muhammad-seman.github.io/api-wilayah-indonesia/
- **Endpoints:** provinces, regencies, districts, villages
- **GPS:** HTML5 Geolocation for nearby search

## 🔒 Security Features

- JWT token authentication
- Role-based access control (RBAC)
- Input validation & sanitization  
- CORS configuration
- Rate limiting

## 📈 Development Phases

- [x] **Phase 1:** Core setup (Laravel + React + Auth)
- [ ] **Phase 2:** Marketplace features (Search, Services)
- [ ] **Phase 3:** Booking system (Orders, Payments)
- [ ] **Phase 4:** Social features (Messaging, Reviews)

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is licensed under the MIT License.

## 👨‍💻 Author

**Muhammad Seman**
- GitHub: [@muhammad-seman](https://github.com/muhammad-seman)

---

🤱 **Empowering maternal & child healthcare access in Indonesia**