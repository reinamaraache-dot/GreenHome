-- 1. إنشاء قاعدة البيانات (إذا لم تكن موجودة)
CREATE DATABASE IF NOT EXISTS GreenHomeDB 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- 2. اختيار قاعدة البيانات للعمل عليها
USE GreenHomeDB;

-- 3. إنشاء جدول المستخدمين (users)
-- تم تحديث هذا الجدول ليستخدم DATETIME بدلاً من TIMESTAMP وإضافة حقل updated_at
CREATE TABLE IF NOT EXISTS users (
    user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NULL
);

-- 4. إنشاء جدول الفئات (categories)
CREATE TABLE IF NOT EXISTS categories (
    category_id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- 5. إنشاء جدول النباتات (plants)
-- هذا الجدول الآن مرتبط بـ users و categories
CREATE TABLE IF NOT EXISTS plants (
    plant_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED NOT NULL, -- المفتاح الخارجي للمستخدم (مطلوب لمالكية النبات)
    category_id INT(11) UNSIGNED NULL, -- المفتاح الخارجي للفئة
    name VARCHAR(150) NOT NULL,
    species VARCHAR(100) NULL,
    description TEXT, 
    image VARCHAR(255) NULL,
    acquisition_date DATE NULL, -- تاريخ حيازة النبات
    last_watered DATE NULL,
    watering_frequency INT(3) UNSIGNED NULL, -- تكرار السقاية بالأيام
    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NULL,
    
    -- تعريف المفاتيح الخارجية
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE SET NULL
);

-- 6. إنشاء جدول جدول السقاية (watering_schedule)
CREATE TABLE IF NOT EXISTS watering_schedule (
    id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    plant_id INT(11) UNSIGNED NOT NULL,
    watering_date DATE NOT NULL,
    notes VARCHAR(500) NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    -- تعريف المفتاح الخارجي: عندما يُحذف النبات، تُحذف سجلات السقاية الخاصة به
    FOREIGN KEY (plant_id) REFERENCES plants(plant_id) ON DELETE CASCADE
);

-- 7. إدخال مستخدم إداري افتراضي (Admin)
-- كلمة المرور الافتراضية هنا هي "adminpassword" (مُهشّشة)
INSERT INTO users (username, email, password_hash, role) VALUES 
('admin_user', 'admin@greenhome.com', '$2y$10$wN9iL6B9oX.B5Ew1H8FzLOrP1V4P5.F8P9T6T7G8D9J7K8L6', 'admin');

-- 8. إدخال بعض الفئات الأساسية لغرض الاختبار
INSERT INTO categories (name) VALUES 
('Indoor Plants'),
('Succulents'),
('Flowering Plants'),
('Herbs'),
('Trees');