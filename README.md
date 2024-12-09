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

/repositio                                               # Carpeta principal del proyecto         
├── /bootstrap                                           # Carpeta de principal de bootstrap          
│   └── /dist                                            # Carpeta donde se encuentran el css y js compilados de bootstrap
|       ├── /css
│       |   └── bootstrap.min.css                        # css de bootstrap
│       └── /js
│           └── bootstrap.bundle.min.js                  # js de bootstrap
├── /css                                      
│       └── style.css                                    #css principal del proyecto
├── /src
│   ├── /archivos                                        #aca se encuentran todas las imagenes de las portadas de cada tesina
|   ├── /controlador                                     #Carpeta del controlador
|   |    ├── /configuracion
│   |    |    ├── /img                                   #Carpeta que almacena los logos y banners
|   |    |    ├── config.php                             #Configuracion del sistema para actualizar logos e imagenes
│   |    |    └── constantes.php       #este archivo almacenas las constantes php para acceder a ella desde cualquier lugar del proyecto
|   |    ├── /correo                                     #Carpeta de archivos para mandar correo
│   |    |    ├── /vendor
│   |    |    |   └── autoload.php                     # Dependencias de Composer 
|   |    |    ├── composer.json                        # Archivo de configuración de Composer  
│   |    |    ├── composer.lock
│   |    |    ├── correo.php                             #archivo para mandar un correo con PHPMAILER
│   |    |    └── plantilla.php                          #plantilla de correo
|   |    ├── download.php                                #archivo que se encarga de descargar tesina
|   |    ├── editardatos.php                             #archivo para actualizar datos de tesinas
|   |    ├── eliminarArchivo.php                         #archivo para eliminar tesina             
│   |    └── guardarArchivo.php                          #archivo para guardar tesinas
|   ├── /img                    # carpeta que almacena las imagenes del footer
|   ├── /modelo
|   |    ├── bdrepositorio.sql   # Modelos de la base de datos 
│   |    └── conexion.php        # Conexion a la base de datos
|   ├── /plugins
|   |    └── /pdfjs             # pdfjs para la lectura de pdf en linea
|   |        ├── /build
│   |        |   └── pdf.mjs
|   |        └── /web
│   |            ├── documet.pdf
│   |            ├── viewer.css
│   |            └── viewer.html
|   ├── /tesinas                                          # carpeta que alamcena todas las tesinas
|   └── /vista
│       ├── /admin                  # carpeta que alamcena todas las vistas del administrador
│       |    ├── config.php
│       |    ├── home.php
│       |    └── index.php
│       ├── /utils                   # carpeta que alamcena componentes que se pueden usar desde cualquier lugar del proyecto
│       |    ├── modalagregar.php
│       |    ├── modalCerrarsesion.php
│       |    ├── modalEditar.php
│       |    ├── modalEliminar.php
│       |    ├── modalCerrarsesion.php
│       |    ├── modalLeer.php
│       |    └── modalVerTesis.php
│       ├── filtros.php  # componente de la vista de los filtros
│       ├── footer.php   # footer de la EPCLE
│       ├── header.php   # header de la EPCLE
│       ├── headerEPCLE.php
│       ├── repoEPCLE.php        # pagina de aterrizaje del repositorio de la EPCLE
│       ├── resultados.php       # Archivo principal de los resultado de las tesis dependiendo de la busqueda de us
│       └── style.css                                   
└── index.php                    # Archivo principal del proyecto



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
 
