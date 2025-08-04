CRM
Descripción general
CRM es un sistema de Customer Relationship Management (gestión de relaciones con clientes) desarrollado en PHP con base de datos MySQL, diseñado para ejecutarse en un entorno local (por ejemplo usando XAMPP). Este software permite a las empresas gestionar sus clientes y tareas internas. Según la definición estándar, un sistema CRM “gestiona todas las interacciones de la empresa con clientes actuales y potenciales”
salesforce.com
, optimizando procesos y mejorando las relaciones con los clientes. Este proyecto implementa la lógica completa de un CRM básico: los usuarios pueden registrarse e iniciar sesión, gestionar información de clientes, programar eventos (como tareas, reuniones y notas) en un calendario personalizado, y visualizar estadísticas financieras con gráficos interactivos. Todo ello corre sobre un servidor local Apache con MySQL provisto por XAMPP. XAMPP es un paquete gratuito que incluye Apache, MariaDB/MySQL, PHP y Perl
axarnet.es
, facilitando la creación de entornos de desarrollo locales sin necesidad de un servidor externo.
Funcionalidades principales del sistema
Registro e inicio de sesión de usuarios: Permite crear nuevas cuentas de usuario y autenticar a usuarios existentes. La autenticación se gestiona mediante sesiones PHP, que mantienen el estado del usuario entre páginas
certidevs.com
. Al iniciar sesión correctamente, el sistema inicia una sesión segura (session_start()) y redirige al usuario al área protegida.
Gestión de clientes (CRUD): El sistema permite Crear, Leer, Actualizar y Eliminar clientes en la base de datos. Estas operaciones CRUD (Create, Read, Update, Delete) son fundamentales para cualquier aplicación que maneje datos, pues permiten añadir, listar, editar o borrar registros de clientes
lab.wallarm.com
. Cada cliente tiene campos como nombre, empresa, correo electrónico, teléfono y notas.
Visualización de detalles del cliente: Desde la lista de clientes, el usuario puede acceder a una página de detalles de cada cliente que muestra toda su información almacenada. Además, desde allí se pueden navegar a las secciones de calendario y estadísticas asociadas a ese cliente.
Calendario personalizado con tareas, reuniones y notas: El sistema incluye un calendario integrado para cada cliente, donde se pueden programar y visualizar eventos de distintos tipos (tareas, reuniones, notas). Cada evento se guarda en la base de datos y se muestra en un calendario interactivo. Esto ayuda a organizar actividades futuras y pasadas relacionadas con cada cliente.
Módulo de estadísticas con análisis gráfico e histórico de ingresos: Se proporciona un módulo de estadísticas financieras por cliente. El usuario puede ingresar montos de ingresos periódicamente, y el sistema muestra un historial de ingresos en tablas y gráficos interactivos. Para generar estos gráficos se utiliza Chart.js, una biblioteca JavaScript de código abierto que facilita la creación de gráficos HTML5 responsivos
w3schools.com
. Gracias a Chart.js es posible ver de un vistazo tendencias de ingresos históricos a través de líneas, barras u otros tipos de gráficas.
Tecnologías utilizadas
PHP: Lenguaje de programación del lado del servidor utilizado para toda la lógica del sistema. PHP es un lenguaje interpretado especializado en desarrollo web
es.wikipedia.org
, ampliamente usado en sistemas de gestión como este CRM.
MySQL/MariaDB: Base de datos relacional donde se almacena toda la información (usuarios, clientes, eventos, estadísticas, etc.). MySQL (ahora MariaDB en XAMPP) es “un sistema de gestión de bases de datos relacional” bajo licencia GPL, y es la base de datos de código abierto más popular del mundo
es.wikipedia.org
. El proyecto se conecta a MySQL usando PDO para consultas seguras.
Bootstrap: Framework CSS de código abierto para diseño responsivo y componentes de interfaz. Bootstrap simplifica el desarrollo de interfaces atractivas y adaptables a distintos dispositivos
hostinger.com
. Se emplean sus clases (e.g. botones, formularios, grids) para la apariencia del sistema y para íconos se usan Bootstrap Icons (glyphicons).
JavaScript/Chart.js: El calendario y las interacciones dinámicas usan JavaScript moderno (Fetch API) y Chart.js. Chart.js es una biblioteca de JavaScript gratuita para crear gráficos basados en HTML5 Canvas
w3schools.com
. Permite añadir fácilmente gráficos de líneas, barras, pasteles, etc., utilizados en el módulo de estadísticas.
HTML5/CSS3: Maquetación de páginas web. Se emplean plantillas (layouts) con HTML semántico y estilos CSS (Bootstrap + personalizado) para el diseño de las páginas.
XAMPP: Entorno local de desarrollo que incluye Apache (servidor web), MySQL (base de datos) y PHP. XAMPP “es un paquete de software gratuito que incluye Apache, MariaDB, PHP y Perl”
axarnet.es
, ideal para probar la aplicación en localhost sin configuración compleja.
Instrucciones de instalación
Para ejecutar el CRM en local (usando XAMPP), siga estos pasos:
Descargar e instalar XAMPP:
Vaya al sitio oficial de XAMPP y descargue el instalador para su sistema operativo.
Ejecute el instalador y siga las instrucciones (se puede aceptar la configuración por defecto)
axarnet.es
axarnet.es
.
Iniciar los servicios necesarios:
Abra el Panel de Control de XAMPP y ejecute Apache y MySQL (en XAMPP suele mostrarse un botón “Start” junto a cada módulo)
axarnet.es
axarnet.es
.
Verifique accediendo a http://localhost/ en el navegador; debería ver la pantalla de inicio de XAMPP.
Configurar la base de datos:
Abra phpMyAdmin (desde el panel de XAMPP haga clic en “Admin” junto a MySQL).
En phpMyAdmin, cree una nueva base de datos (por ejemplo llamada crm). Puede importar un script SQL si se proporciona, o crear manualmente las tablas según el esquema del proyecto.
Desplegar el proyecto:
Copie o clone el código fuente del proyecto dentro de la carpeta htdocs de XAMPP (por ejemplo en C:\xampp\htdocs\crm).
Verifique el archivo de conexión /includes/conexion.php y ajuste los parámetros de conexión (host, usuario, contraseña) si es necesario (por defecto en XAMPP el usuario suele ser root con contraseña vacía).
Ejecutar la aplicación:
Abra el navegador e ingrese a http://localhost/crm/public/ (o la ruta donde colocó el proyecto).
Debería poder ver la página de inicio de sesión o registro del CRM. Cree una cuenta de usuario y comience a usar el sistema.
Consejo: asegúrese de que la carpeta /public contiene el archivo index.php principal. En muchos proyectos PHP la carpeta public/ es la raíz web pública, mientras que includes/ y protected/ quedan fuera de public por seguridad.
Estructura general del proyecto
La organización de carpetas del proyecto es la siguiente (breve descripción de las más relevantes):
public/: Carpeta pública accesible vía navegador. Aquí se ubican las páginas web principales (por ejemplo, home.php, login.php, registro.php) así como subcarpetas de recursos como css/, js/ y img/. Es común tener un archivo index.php en esta carpeta como punto de entrada. En este proyecto también pueden existir subdirectorios como clientes/ o estadisticas/ dentro de public/ para separar las secciones correspondientes.
protected/: Carpeta con lógica interna o archivos no directamente accesibles por URL. Puede contener clases, controladores u otros módulos de backend que solo son incluidos por código. La finalidad es mantener estos archivos fuera del alcance público. (En este proyecto la carpeta protected/ se usa para almacenar lógica de negocio o utilidades compartidas).
includes/: Archivos compartidos incluidos en varias páginas. Aquí residen, por ejemplo, el archivo de conexión a la base de datos (conexion.php), funciones comunes (funciones.php), y plantillas parciales (template-start.php, template-end.php para los encabezados y pies de página). Estas guías (include) ayudan a evitar código duplicado y facilitan el mantenimiento.
Otras carpetas: Pueden existir directorios adicionales como css/, js/ e img/ para hojas de estilo, scripts y recursos gráficos, respectivamente. Estos suelen estar dentro de public/. En proyectos complejos a veces también hay carpetas como modelos/, vistas/ o controladores/ siguiendo patrones MVC, pero en este proyecto sencillo se usan principalmente las carpetas mencionadas.
Esta estructura asegura separación clara entre lo público (accesible por el navegador) y lo privado (lógica de servidor), lo que facilita el desarrollo y la seguridad del sistema
axarnet.es
dev.to
.
Créditos / Agradecimientos
Este proyecto fue desarrollado usando herramientas y bibliotecas de código abierto. Se agradece la documentación oficial de PHP y MySQL, así como los recursos de Chart.js y Bootstrap por facilitar la implementación de gráficos y diseño responsive. Las ideas de gestión de usuarios con sesiones se basan en prácticas comunes (por ejemplo, implementar session_start() para login/logout
certidevs.com
). También se reconocen las guías y tutoriales de XAMPP para configurar un entorno local fácilmente
axarnet.es
Video de demostración: https://youtu.be/eneLbsGBK9Q
