<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemberStar - Sistema de Membresías</title>
    <!-- Font Awesome (Iconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: #2575fc;
        }

        a:hover {
            color: #1a5bbf;
        }

        /* Barra Superior (Navbar) */
        .navbar {
            background-color: #343a40;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar .nav-links {
            display: flex;
            gap: 20px;
        }

        .navbar .nav-links a {
            color: #fff;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .navbar .nav-links a:hover {
            color: #2575fc;
        }

        /* Sección Hero */
        .hero {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            padding: 120px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto 30px;
        }

        .hero .btn {
            background-color: #fff;
            color: #2575fc;
            padding: 12px 35px;
            font-size: 1.1rem;
            border-radius: 25px;
            transition: background-color 0.3s, color 0.3s;
        }

        .hero .btn:hover {
            background-color: #2575fc;
            color: #fff;
            border: 2px solid #fff;
        }

        /* Sección de Explicación */
        .about {
            padding: 80px 20px;
            text-align: center;
            background-color: #f8f9fa;
        }

        .about h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Sección de Características */
        .features {
            display: flex;
            justify-content: space-around;
            padding: 80px 20px;
            background-color: #fff;
        }

        .feature {
            text-align: center;
            max-width: 300px;
        }

        .feature i {
            font-size: 3rem;
            color: #2575fc;
            margin-bottom: 20px;
        }

        .feature h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .feature p {
            font-size: 1rem;
            color: #666;
        }

        /* Footer */
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 60px 20px;
            text-align: center;
        }

        .footer .social-icons {
            margin-bottom: 20px;
        }

        .footer .social-icons a {
            color: #fff;
            font-size: 1.5rem;
            margin: 0 15px;
            transition: color 0.3s, transform 0.3s;
        }

        .footer .social-icons a:hover {
            color: #2575fc;
            transform: translateY(-5px);
        }

        .footer .creator {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #aaa;
        }

        .footer .creator a {
            color: #2575fc;
            font-weight: bold;
        }

        .footer p {
            margin: 10px 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Barra Superior (Navbar) -->
    <nav class="navbar">
        <div class="logo">
            <img src="logo.png" alt="MemberStar Logo"> <!-- Reemplaza con la ruta de tu logo -->
            MemberStar
        </div>
        <div class="nav-links">
            <a href="#features">Características</a>
            <a href="#about">Conócenos</a>
            <a href="#contact">Contáctanos</a>
            <a href="views/login.php">Iniciar Sesión</a>
            <a href="views/register.php">Registrarse</a>
        </div>
    </nav>

    <!-- Sección Hero -->
    <section class="hero">
        <h1>MemberStar</h1>
        <p>Gestiona tus membresías de manera fácil, rápida y eficiente. Únete a nuestra plataforma y lleva el control de tus miembros al siguiente nivel.</p>
        <a href="#about" class="btn">Conoce Más</a>
    </section>

    <!-- Sección de Explicación (Conócenos) -->
    <section id="about" class="about">
        <h2>Conócenos</h2>
        <p>
            MemberStar es una plataforma diseñada para simplificar la gestión de membresías. Ya sea que administres un gimnasio, un club o cualquier organización con miembros, MemberStar te ofrece las herramientas necesarias para mantener todo bajo control. Desde la inscripción de nuevos miembros hasta la generación de reportes, todo en un solo lugar.
        </p>
    </section>

    <!-- Sección de Características -->
    <section id="features" class="features">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 40px;">Características</h2>
        <div class="feature">
            <i class="fas fa-users"></i>
            <h3>Gestión de Miembros</h3>
            <p>Administra a tus miembros de manera eficiente con herramientas intuitivas.</p>
        </div>
        <div class="feature">
            <i class="fas fa-file-alt"></i>
            <h3>Sube tu CV</h3>
            <p>Guarda y gestiona tu hoja de vida de manera segura y accesible.</p>
        </div>
        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Reportes y Estadísticas</h3>
            <p>Obtén insights detallados sobre el crecimiento de tu organización.</p>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section id="contact" class="about">
        <h2>Contáctanos</h2>
        <p>
            ¿Tienes alguna pregunta o necesitas soporte? No dudes en contactarnos. Estamos aquí para ayudarte.
        </p>
        <p>
            <strong>Email:</strong> soporte@memberstar.com<br>
            <strong>Teléfono:</strong> +123 456 7890
        </p>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="social-icons">
            <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="creator">
            Creado por <a href="#" target="_blank">Tu Nombre</a>
        </div>
        <p>&copy; 2023 MemberStar. Todos los derechos reservados.</p>
        <p>Desarrollado con ❤️ en [Tu Ciudad].</p>
    </footer>
</body>
</html>