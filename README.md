<div align="center">

<h1>🌐 مو لتطوير الويب | MO Web Development</h1>

<p>موقع إلكتروني احترافي لعرض أعمال وخدمات وكالة تطوير الويب، مبني بإطار عمل Laravel مع لوحة تحكم إدارية متكاملة.</p>

<p>
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="TailwindCSS" />
  <img src="https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite" />
</p>

</div>

---

## 📋 نظرة عامة

**مو لتطوير الويب** هو موقع إلكتروني متكامل يُقدّم خدمات وكالة تطوير ويب متخصصة. يوفر الموقع واجهة جذابة للزوار لاستعراض المشاريع المنجزة والتواصل مع الفريق، إلى جانب لوحة تحكم إدارية شاملة لإدارة كل محتوى الموقع.

## ✨ المميزات الرئيسية

### 🖥️ الواجهة الأمامية (Frontend)
- **الصفحة الرئيسية** – عرض ديناميكي للمشاريع المميزة وأعضاء الفريق
- **معرض المشاريع** – استعراض جميع المشاريع المنجزة مع التفاصيل الكاملة
- **صفحة من نحن** – التعريف بالفريق والرؤية والقيم
- **صفحة التواصل** – نموذج اتصال مدمج لاستقبال طلبات العملاء
- **تصميم RTL** – دعم كامل للغة العربية واتجاه النص من اليمين لليسار
- **تصميم متجاوب** – متوافق مع جميع أحجام الشاشات

### 🔧 لوحة التحكم الإدارية (Admin Panel)
- **إدارة المشاريع** – إضافة وتعديل وحذف المشاريع مع صور متعددة وتصنيفات
- **إدارة التصنيفات** – تنظيم المشاريع ضمن فئات وتصنيفات
- **إدارة الفريق** – عرض وإدارة أعضاء الفريق مع صورهم وأدوارهم
- **إدارة الرسائل** – استعراض رسائل التواصل الواردة من العملاء
- **لوحة إحصائيات** – نظرة عامة على أداء الموقع

### 🔐 المصادقة والأمان
- نظام تسجيل دخول متكامل (Laravel Breeze)
- تسجيل الدخول عبر حساب Google (OAuth 2.0)
- حماية مسارات لوحة التحكم

## 🛠️ التقنيات المستخدمة

| الطبقة | التقنية |
|--------|---------|
| **Backend** | Laravel 12.x |
| **PHP** | 8.2+ |
| **Frontend** | Blade Templates + TailwindCSS 3 |
| **Build Tool** | Vite 6 |
| **المصادقة** | Laravel Breeze + Laravel Socialite (Google) |
| **قاعدة البيانات** | MySQL / SQLite |
| **التخزين** | Laravel Storage (Local/Cloud) |

## 🚀 طريقة التثبيت

### المتطلبات الأساسية
- PHP >= 8.2
- Composer
- Node.js >= 18
- قاعدة بيانات MySQL أو SQLite

### خطوات الإعداد

**1. استنساخ المستودع**
```bash
git clone https://github.com/mokmel136-gif/mo-group-website.git
cd mo-web-site
```

**2. تثبيت الاعتماديات**
```bash
composer install
npm install
```

**3. إعداد ملف البيئة**
```bash
cp .env.example .env
php artisan key:generate
```

**4. إعداد قاعدة البيانات**

افتح ملف `.env` وعدّل إعدادات قاعدة البيانات:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mo_web_site
DB_USERNAME=root
DB_PASSWORD=
```

**5. تشغيل الـ Migrations**
```bash
php artisan migrate --seed
```

**6. إعداد التخزين**
```bash
php artisan storage:link
```

**7. إعداد Google OAuth** *(اختياري)*

أضف بيانات Google إلى ملف `.env`:
```env
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

**8. تشغيل المشروع**
```bash
# تشغيل كل الخدمات معاً
composer run dev
```

أو بشكل منفصل:
```bash
php artisan serve
npm run dev
```

ثم افتح المتصفح على: `http://localhost:8000`

## 📁 هيكل المشروع

```
mo-web-site/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Admin/              # متحكمات لوحة التحكم
│   │       │   ├── ProjectController.php
│   │       │   ├── CategoryController.php
│   │       │   ├── TeamController.php
│   │       │   ├── MessageController.php
│   │       │   └── DashboardController.php
│   │       ├── Authorize/          # مصادقة Google
│   │       │   └── GoogleAuthController.php
│   │       ├── ProjectController.php
│   │       ├── PublicController.php
│   │       └── ProfileController.php
│   └── Models/
│       ├── Project.php
│       ├── Category.php
│       ├── TeamMember.php
│       ├── ContactMessage.php
│       ├── ProjectImage.php
│       └── User.php
├── resources/
│   └── views/
│       ├── layouts/               # قوالب التخطيط
│       ├── admin/                 # صفحات لوحة التحكم
│       ├── projects/              # صفحات المشاريع
│       ├── welcome.blade.php      # الصفحة الرئيسية
│       ├── about.blade.php        # من نحن
│       └── contact.blade.php      # تواصل معنا
├── routes/
│   └── web.php                    # تعريف المسارات
└── database/
    ├── migrations/
    └── seeders/
```

## 🗺️ مسارات الموقع

### الواجهة العامة
| المسار | الوصف |
|--------|-------|
| `GET /` | الصفحة الرئيسية |
| `GET /projects` | معرض المشاريع |
| `GET /projects/{id}` | تفاصيل مشروع |
| `GET /about` | من نحن |
| `GET /contact` | تواصل معنا |
| `POST /contact` | إرسال رسالة |
| `GET /auth/google` | تسجيل الدخول بـ Google |

### لوحة التحكم (تتطلب تسجيل الدخول)
| المسار | الوصف |
|--------|-------|
| `GET /admin/dashboard` | لوحة الإحصائيات |
| `CRUD /admin/projects` | إدارة المشاريع |
| `CRUD /admin/categories` | إدارة التصنيفات |
| `CRUD /admin/team` | إدارة الفريق |
| `CRUD /admin/messages` | إدارة الرسائل |

## 🤝 المساهمة

نرحب بمساهماتكم! يرجى اتباع الخطوات التالية:

1. انسخ المستودع `Fork`
2. أنشئ فرعاً جديداً `git checkout -b feature/amazing-feature`
3. اعمل التغييرات وأضفها `git commit -m 'Add amazing feature'`
4. ادفع التغييرات `git push origin feature/amazing-feature`
5. افتح `Pull Request`

## 📄 الرخصة

هذا المشروع مرخص تحت رخصة MIT — انظر ملف [LICENSE](LICENSE) للتفاصيل.

---

<div align="center">
  <p>صُنع بـ ❤️ بواسطة فريق <strong>مو لتطوير الويب</strong></p>
</div>
