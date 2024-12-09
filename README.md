# 🎓 **Sistema de Repositorio de Tesinas**

¡Bienvenido al **Sistema de Repositorio de Tesinas**! Este proyecto permite gestionar y consultar trabajos de investigación académica, facilitando la búsqueda y descarga de archivos de manera eficiente.

---

## 🚀 **Características**

- 📂 **Gestión de tesinas:** Subir, editar y eliminar archivos fácilmente.
- 🔍 **Búsqueda optimizada:** Encuentra rápidamente trabajos por título, autor o palabras clave.
- 🌐 **Acceso público:** Usuarios pueden consultar y descargar archivos sin registrarse.
- ⚙️ **Personalización:** Configuración fácil para adaptar el sistema a tus necesidades.

---

## 🛠️ **Tecnologías Utilizadas**

- **Lenguaje:** PHP
- **Base de datos:** MySQL
- **Frontend:** HTML5, CSS3, Bootstrap
- **Backend:** PHP con arquitectura MVC
- **Herramientas adicionales:**
  - Composer para gestión de dependencias
  - Google API para autenticación

---

## 📋 **Requisitos**

- Servidor web compatible con PHP (por ejemplo, Apache o Nginx).
- PHP 8.1 o superior.
- MySQL 5.7 o superior.
- Clave API de Google (si usas inicio de sesión con Google).

---

## ⚙️ **Instalación**

1. Clona este repositorio:
   ```bash
   git clone https://github.com/JAIR-MRX/Repositorio
   cd Repositorio
   ```

2. Instala dependencias con Composer:
   ```bash
   composer install
   ```
3. Configura el servidor para apuntar al archivo 'index.php' de la carpeta principal.

5. ¡Listo! Accede al sistema en `http://localhost/repositorio/`.

---

## 🌟 **Uso**

1. **Página principal:** Consulta los trabajos más recientes desde la página de inicio.
2. **Búsqueda:** Usa el cuadro de búsqueda para encontrar tesinas por título, autor o año.
3. **Descargas:** Descarga los archivos directamente desde el sistema.

---

## 📂 **Estructura del Proyecto**

/repositorio                         # Carpeta principal del proyecto
├── /bootstrap                       # Archivos de Bootstrap
│   └── /dist                        # Archivos compilados de CSS y JS
│       ├── /css
│       │   └── bootstrap.min.css    # CSS de Bootstrap
│       └── /js
│           └── bootstrap.bundle.min.js # JS de Bootstrap
├── /css
│   └── style.css                    # CSS principal del proyecto
├── /src
│   ├── /archivos                    # Imágenes de las portadas de cada tesina
│   ├── /controlador                 # Lógica de control del sistema
│   │   ├── /configuracion           # Configuración del sistema
│   │   │   ├── /img                 # Logos y banners
│   │   │   ├── config.php           # Archivo de configuración
│   │   │   └── constantes.php       # Constantes globales de PHP
│   │   ├── /correo                  # Funciones para envío de correos
│   │   │   ├── /vendor              # Dependencias de Composer
│   │   │   ├── composer.json        # Configuración de Composer
│   │   │   ├── correo.php           # Archivo para envío de correos
│   │   │   └── plantilla.php        # Plantilla de correo
│   │   ├── download.php             # Descargar tesinas
│   │   ├── editardatos.php          # Editar datos de las tesinas
│   │   ├── eliminarArchivo.php      # Eliminar archivos
│   │   └── guardarArchivo.php       # Guardar nuevas tesinas
│   ├── /img                         # Imágenes del footer
│   ├── /modelo                      # Modelo de la base de datos
│   │   ├── bdrepositorio.sql        # Estructura de la base de datos
│   │   └── conexion.php             # Conexión a la base de datos
│   ├── /plugins
│   │   └── /pdfjs                   # Visualizador de PDF
│   │       ├── /build
│   │       │   └── pdf.mjs
│   │       └── /web
│   │           ├── document.pdf
│   │           ├── viewer.css
│   │           └── viewer.html
│   ├── /tesinas                     # Tesinas subidas al sistema
│   └── /vista                       # Vistas del sistema
│       ├── /admin                   # Vistas del administrador
│       │   ├── config.php
│       │   ├── home.php
│       │   └── index.php
│       ├── /utils                   # Componentes reutilizables
│       │   ├── modalAgregar.php
│       │   ├── modalCerrarSesion.php
│       │   ├── modalEditar.php
│       │   ├── modalEliminar.php
│       │   └── modalVerTesis.php
│       ├── filtros.php              # Filtros para búsquedas
│       ├── footer.php               # Footer del sistema
│       ├── header.php               # Header del sistema
│       ├── headerEPCLE.php          # Header personalizado
│       ├── repoEPCLE.php            # Página principal del repositorio
│       └── resultados.php           # Resultados de búsquedas
└── index.php                        # Entrada principal del sistema




## 🤝 **Contribución**

¡Las contribuciones son bienvenidas! Sigue estos pasos:

1. Haz un fork del proyecto.
2. Crea una nueva rama:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3. Realiza tus cambios y confirma los commits:
   ```bash
   git commit -m "Agregué una nueva funcionalidad"
   ```
4. Envía un pull request.
---

## 📜 **Licencia**

Este proyecto está licenciado bajo la [MIT License](https://opensource.org/licenses/MIT). Siéntete libre de usarlo y modificarlo según tus necesidades.

---

## 📝 **Autor**

Desarrollado con ❤️ por [Jair Hernandez Trujillo](https://github.com/JAIR-MRX).

---

### 🎉 ¡Gracias por usar este sistema! 🎉

Si tienes alguna pregunta o sugerencia, no dudes en abrir un *issue* o enviarme un mensaje. 😊 jaikht1217@gmail.com 😊

---
 
