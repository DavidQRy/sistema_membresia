# Sistema de Gestión de Membresías y Usuarios

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.2+-7952B3?logo=bootstrap&logoColor=white)
![jQuery](https://img.shields.io/badge/jQuery-3.6+-0769AD?logo=jquery&logoColor=white)
![Chart.js](https://img.shields.io/badge/Chart.js-3.7+-FF6384?logo=chartdotjs&logoColor=white)

## 📌 Descripción
Sistema de gestión de membresías con autenticación segura, control de roles por jerarquía, administración de documentos y dashboard interactivo. Desarrollado con arquitectura MVC en PHP.

## ✨ Características Principales

### 🔐 Autenticación y Roles
- **Login/Registro seguro** con validación y hash bcrypt
- **Sistema de roles**:
  - 👑 Administrador: Acceso completo (CRUD usuarios, reportes)
  - 👥 Miembro: Gestión de perfil y documentos
  - 🎭 Invitado: Solo autenticación básica

### 📊 Dashboard Interactivo
- Gráficos con Chart.js (usuarios activos, solicitudes)
- Búsqueda y paginación en tablas
- Filtros avanzados para reportes

### 📄 Gestión Documental
- Subida de CVs (PDF/DOCX) con validación
- Almacenamiento seguro con nombres únicos
- Previsualización de documentos

### ✉️ Comunicaciones
- PHPMailer para:
  - Confirmación de registro
  - Recuperación de contraseña
  - Notificaciones del sistema

## 🛠 Tecnologías

### Backend
- PHP 8.0+ (POO + MVC)
- MySQL 8.0+
- PHPMailer

### Frontend
- HTML5, CSS3, JavaScript
- Bootstrap 5.2+
- jQuery 3.6+
- Chart.js

### Herramientas
- Composer
- Git

## ⚙️ Requisitos

### Servidor
- PHP ≥ 8.0
- MySQL ≥ 8.0 o MariaDB ≥ 10.3
- Extensiones: PDO, OpenSSL, MBstring
- Apache/Nginx

### Cliente
- Navegador moderno

## 🚀 Instalación

```bash
git clone https://github.com/DavidQRy/sistema_membresia.git
cd sistema-membresias
composer install
