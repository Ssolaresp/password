🔐 Descripción del Proyecto: Gestor de Contraseñas en PHP MVC
💡 Resumen General

Este proyecto es una aplicación web de administración de contraseñas construida con tecnologías PHP (patrón MVC), MySQL y HTML, orientada a usuarios individuales o equipos que desean almacenar, organizar y consultar credenciales de forma centralizada y segura. La plataforma permite el manejo de múltiples cuentas, usuarios y sitios, todo desde un panel intuitivo y estructurado.
🏗️ Tecnologías Utilizadas

    PHP: Lógica del lado del servidor usando el patrón Modelo-Vista-Controlador (MVC) para una estructura limpia y escalable.

    MySQL: Base de datos relacional para almacenar de forma estructurada los registros de contraseñas, usuarios, sitios, categorías y notas.

    HTML/CSS: Interfaz sencilla pero funcional para interacción amigable con el usuario.

    PDO: Manejo de consultas seguras a la base de datos mediante sentencias preparadas.

    Sessiones PHP: Control de autenticación y protección de sesiones de usuario.

🔍 Características Principales

    ✅ Login Seguro con validación de credenciales y manejo de sesiones.

    ✅ CRUD Completo para:

        Sitios Web (donde se usan las contraseñas)

        Usuarios del sistema

        Cuentas y contraseñas asociadas

        Categorías para clasificar accesos

    ✅ Campos personalizados como:

        Usuario

        Contraseña (visible solo desde el panel administrativo)

        Notas adicionales

    ✅ Auditoría automática:

        Fechas de creación y actualización registradas automáticamente.

    ✅ Enlace entre tablas:

        Relaciones entre info_general, sitios, nombre_sitio y usuarios para una gestión jerárquica de accesos.

🔐 Seguridad Implementada

    🔒 Uso de hashing de contraseñas para el módulo de autenticación.

    🔒 Validación de formularios en el servidor.

    🔒 Protección contra inyecciones SQL mediante PDO y consultas preparadas.

    🔒 Sistema de logout y control de acceso a rutas protegidas.

🧩 Estructura del Proyecto

/password
│
├── /app
│   ├── /controlador
│   ├── /modelo
│   ├── /vista
│   │   ├── /info
│   │   ├── /sitios
│   │   ├── /usuarios
│   │   └── /nsitio
│   └── /conexion
│
├── /public
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── dashboard.php
│   └── validar.php

🧠 Ventajas del Uso de MVC

    Separación clara de responsabilidades (modelo, vista y lógica).

    Reutilización de código y mantenibilidad a largo plazo.

    Escalabilidad para futuras funciones como exportación, cifrado, 2FA o generación de contraseñas.

🎯 Objetivo Final

Brindar una herramienta web interna y privada para almacenar contraseñas de múltiples servicios con control total, sencilla de usar, segura y basada en buenas prácticas de programación.
