# WP Rentals Theme Modified

Versión modificada del tema premium **[WP Rentals](https://wprentals.org/)** de WpEstate para WordPress. Este repositorio contiene el tema padre WP Rentals con personalizaciones y modificaciones aplicadas directamente sobre el core del tema, adaptándolo a las necesidades específicas de proyectos de alquiler vacacional como [Llafranc Villas](https://www.llvillas.com/).


---

## Tabla de Contenidos

- [Sobre el Proyecto](#sobre-el-proyecto)
- [Sobre WP Rentals (Tema Base)](#sobre-wp-rentals-tema-base)
- [Funcionalidades Principales](#funcionalidades-principales)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Arquitectura del Tema](#arquitectura-del-tema)
- [Custom Post Types y Taxonomías](#custom-post-types-y-taxonomías)
- [Sistema de Reservas](#sistema-de-reservas)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Personalización y Modificaciones](#personalización-y-modificaciones)
- [Tecnologías](#tecnologías)
- [Recursos](#recursos)
- [Autor](#autor)

---

## Sobre el Proyecto

Este repositorio contiene el tema **WP Rentals** con modificaciones aplicadas directamente sobre el código fuente del tema padre. A diferencia de un child-theme (que hereda y sobreescribe selectivamente), aquí se trabaja sobre el tema completo, lo que permite mayor control sobre todos los aspectos del tema: templates, lógica de negocio, sistema de reservas, búsqueda avanzada, mapas y estilos.

Las modificaciones están orientadas a proyectos de alquiler vacacional en la Costa Brava, pero el tema es adaptable a cualquier plataforma de alquiler de propiedades o servicios.

### Repositorio Relacionado

- [llafranc-villas](https://github.com/david-berruezo/llafranc-villas) — Child-theme de WP Rentals para el proyecto [llvillas.com](https://www.llvillas.com/)

---

## Sobre WP Rentals (Tema Base)

[WP Rentals](https://wprentals.org/) es uno de los temas de WordPress más completos para la gestión de alquiler de propiedades y reservas. Desarrollado por **WpEstate**, cuenta con más de 15.000 ventas en ThemeForest y está diseñado para crear plataformas tipo Airbnb, booking de alojamientos o alquiler de objetos.

**Características destacadas del tema original:**

- Sistema de reservas completo con calendario de disponibilidad (reservas diarias u horarias)
- Más de 200 opciones de configuración del tema
- Más de 20 configuraciones de precios (precios estacionales, fin de semana, estancias largas, tarifas por huésped extra, depósitos)
- 24 demos pre-construidas con importación en un clic
- Sincronización de calendario con Airbnb/HomeAway mediante iCal
- Soporte para pagos con Stripe (compatible SCA Europa) y WooCommerce (+150 pasarelas de pago)
- WP Rentals API para integración con aplicaciones externas y móviles
- Notificaciones SMS vía Twilio
- WPRentals Elementor Studio para construir templates con Elementor Free
- Tours virtuales 360° en fichas de propiedad
- Compatible con WPML y Polylang (multiidioma)
- Diseño fully responsive y Retina ready

---

## Funcionalidades Principales

### Gestión de Propiedades

- **Custom Post Type `estate_property`** con campos personalizados extensivos
- Fichas de propiedad con galería de imágenes, mapa, amenities, calendario y precio
- 5 templates predefinidos para fichas de propiedad (layouts intercambiables sin código)
- Campos personalizados configurables para adaptar a cualquier tipo de alquiler
- Soporte para alquiler de objetos (por horas o por días)

### Búsqueda Avanzada

- Filtros por ubicación, precio, tipo de propiedad, amenities, fechas y número de huéspedes
- Búsqueda AJAX sin recarga de página
- Layout **Half Map** (listado + mapa interactivo en paralelo)
- Layout **Standard** con sidebar opcional
- Google Places Autocomplete para búsqueda por ubicación
- Búsqueda por radio (km o millas) en vista de mapa

### Sistema de Reservas

- Calendario de disponibilidad con bloqueo de fechas
- Reserva instantánea o bajo aprobación del propietario
- Cálculo automático de tarifas (noches, huéspedes, extras, impuestos)
- Depósito configurable (porcentaje o valor fijo)
- Estancia mínima y máxima configurable
- Sincronización iCal (importar/exportar) con Airbnb, HomeAway, Booking.com

### Dashboard de Usuarios

- Panel de propietario: gestionar propiedades, reservas, mensajes y pagos
- Panel de inquilino: gestionar reservas, favoritos y perfil
- Envío de propiedades desde el front-end (sin acceso al admin de WordPress)
- Sistema de mensajería interna entre propietario e inquilino
- Sistema de reviews / valoraciones

### Mapas

- Integración con **Google Maps** y **OpenStreetMap**
- Pins personalizables por categoría con soporte Retina
- Pins con precio visible en el mapa
- Carga de pins on-demand al mover el mapa

### Pagos

- Stripe (compatible con SCA - Strong Customer Authentication para Europa)
- WooCommerce (acceso a +150 pasarelas de pago mundiales)
- PayPal
- Reserva instantánea con pago a través de WooCommerce sin necesidad de login

---

## Estructura del Proyecto

```
wp-rentals-theme-modified/
├── wp-content/
│   └── themes/
│       └── wprentals/                  # Tema WP Rentals modificado
│           ├── style.css               # Estilos principales + metadatos del tema
│           ├── functions.php           # Funciones principales del tema
│           ├── header.php              # Header global
│           ├── footer.php              # Footer global
│           ├── index.php               # Template principal
│           ├── single.php              # Template de entrada individual
│           ├── page.php                # Template de página
│           ├── search.php              # Template de resultados de búsqueda
│           ├── archive.php             # Template de archivo
│           ├── 404.php                 # Página de error 404
│           │
│           ├── css/                    # Estilos CSS compilados
│           ├── js/                     # Scripts JavaScript
│           │   ├── admin/              # JS para el backoffice
│           │   └── ...                 # JS para el frontoffice
│           ├── less/                   # Fuentes Less (preprocesador CSS)
│           │
│           ├── templates/              # Templates de páginas específicas
│           ├── libs/                   # Librerías PHP del tema
│           ├── includes/               # Includes y helpers
│           ├── widgets/                # Widgets personalizados
│           ├── shortcodes/             # Shortcodes del tema
│           │
│           ├── property_templates/     # Templates de fichas de propiedad
│           ├── starter/                # Templates de demo / starter content
│           │
│           ├── languages/              # Archivos de traducción (.po / .mo)
│           └── img/                    # Imágenes del tema
│
├── .gitignore
├── LICENSE                             # Apache-2.0
└── README.md
```

---

## Arquitectura del Tema

```
┌──────────────────────────────────────────────────────────────┐
│                        WordPress Core                         │
├──────────────────────────────────────────────────────────────┤
│  WP Rentals Theme (modificado)                                │
│  ├── Custom Post Types (estate_property)                     │
│  ├── Taxonomías (property_category, property_area, ...)      │
│  ├── Sistema de reservas (calendario, precios, pagos)        │
│  ├── Búsqueda avanzada (AJAX, half-map, filtros)            │
│  ├── Dashboard propietario / inquilino                       │
│  ├── API REST (WP Rentals API)                               │
│  └── Widgets y Shortcodes                                    │
├──────────────────────────────────────────────────────────────┤
│  Page Builders                                                │
│  ├── Elementor (WPRentals Elementor Studio)                  │
│  └── WPBakery Page Builder                                   │
├──────────────────────────────────────────────────────────────┤
│  Integraciones                                                │
│  ├── Google Maps / OpenStreetMap                             │
│  ├── Stripe / PayPal / WooCommerce                           │
│  ├── iCal (Airbnb, HomeAway, Booking.com)                   │
│  ├── Twilio (SMS)                                            │
│  ├── WPML / Polylang (multiidioma)                           │
│  └── Facebook / Google OAuth (login social)                  │
└──────────────────────────────────────────────────────────────┘
```

---

## Custom Post Types y Taxonomías

WP Rentals registra los siguientes Custom Post Types y taxonomías:

### Custom Post Types

| CPT | Descripción |
|---|---|
| `estate_property` | Propiedad de alquiler (villa, apartamento, objeto) |
| `wpestate_booking` | Reserva asociada a una propiedad |
| `wpestate_message` | Mensaje interno entre propietario e inquilino |
| `wpestate_invoice` | Factura generada por una reserva |

### Taxonomías

| Taxonomía | Descripción | Ejemplo |
|---|---|---|
| `property_category` | Tipo de propiedad | Villa, Apartamento, Villa de Lujo |
| `property_area` | Área / Destino geográfico | Llafranc, Lloret de Mar, Pals |
| `property_city` | Ciudad | Palafrugell, Blanes |
| `property_action_category` | Acción | Alquiler, Venta |
| `property_features` | Amenities / Características | Piscina, WiFi, Parking, A/C |

---

## Sistema de Reservas

El sistema de reservas de WP Rentals gestiona todo el flujo de alquiler:

```
Búsqueda de propiedad
        │
        ▼
Selección de fechas (calendario de disponibilidad)
        │
        ▼
Cálculo automático de precio
├── Tarifa base por noche/hora
├── Precio estacional / fin de semana
├── Descuento por estancia larga
├── Tarifa por huésped extra
├── Tasas e impuestos
└── Depósito / fianza
        │
        ▼
Solicitud de reserva
├── Reserva instantánea → Pago directo
└── Bajo aprobación → Propietario aprueba → Pago
        │
        ▼
Confirmación + Notificaciones
├── Email al inquilino
├── Email al propietario
├── SMS vía Twilio (opcional)
└── Sincronización iCal
```

---

## Requisitos

- **WordPress** 5.x / 6.x
- **PHP** >= 7.4
- **MySQL** >= 5.7 o MariaDB >= 10.3
- **Licencia WP Rentals** (para recibir actualizaciones oficiales) — [wprentals.org](https://wprentals.org/)
- **Google Maps API Key** (para integración de mapas)
- **Plugins recomendados:**
  - Elementor (page builder, compatible con WPRentals Elementor Studio)
  - WooCommerce (para pagos avanzados)
  - WPML o Polylang (multiidioma)
  - Revolution Slider (sliders premium)
  - Contact Form 7

---

## Instalación

### Paso 1: Preparar WordPress

```bash
# Descargar e instalar WordPress
wp core download --locale=es_ES
wp config create --dbname=wprentals --dbuser=root --dbpass=password
wp core install --url=rentals.local --title="WP Rentals" \
  --admin_user=admin --admin_password=password --admin_email=admin@example.com
```

### Paso 2: Instalar el Tema Modificado

```bash
# Clonar el repositorio
git clone https://github.com/david-berruezo/wp-rentals-theme-modified.git

# Copiar el tema al directorio de WordPress
cp -r wp-rentals-theme-modified/wp-content/themes/wprentals \
  /var/www/html/wordpress/wp-content/themes/

# Establecer permisos
chmod -R 755 /var/www/html/wordpress/wp-content/themes/wprentals
chown -R www-data:www-data /var/www/html/wordpress/wp-content/themes/wprentals
```

### Paso 3: Activar el Tema

1. Ir a **Apariencia > Temas** en el panel de administración
2. Activar **WP Rentals**
3. Instalar los plugins recomendados cuando el tema lo solicite

### Paso 4: Importar Demo (Opcional)

1. Ir a **WP Rentals > Demo Import** en el panel de administración
2. Seleccionar una de las 24 demos disponibles
3. Clic en **Import** y esperar a que se complete

---

## Configuración

### Opciones del Tema

WP Rentals ofrece más de 200 opciones de configuración accesibles desde **Apariencia > Personalizar** o desde el panel **WP Rentals Options**:

| Sección | Configuraciones |
|---|---|
| **General** | Logo, favicon, colores, tipografías |
| **Header** | Tipo de header (transparente, fijo, etc.), menú, idioma |
| **Propiedades** | Layout de listado, campos visibles, ordenación por defecto |
| **Búsqueda** | Campos del formulario de búsqueda, filtros, half-map |
| **Reservas** | Tipo de reserva (instantánea/aprobación), depósito, estancia mínima |
| **Precios** | Moneda, formato, precios estacionales, fin de semana, extras |
| **Mapas** | Google Maps / OpenStreetMap, API key, tipo de pin, zoom |
| **Pagos** | Stripe, PayPal, WooCommerce, configuración de pasarela |
| **Emails** | Templates de notificaciones, textos personalizados |
| **SMS** | Twilio API, número de teléfono, textos de SMS |
| **Usuarios** | Roles, permisos, registro, login social |
| **SEO** | Meta tags, schema markup, breadcrumbs |

### Google Maps API Key

```
Apariencia > Personalizar > WP Rentals > Map Configuration > Google API Key
```

### Configurar iCal (Airbnb Sync)

Cada propiedad tiene su propia URL de feed iCal para exportar e importar disponibilidad. Configurar desde la ficha de propiedad en el campo **iCal Import URL**.

---

## Personalización y Modificaciones

### Modificaciones Aplicadas

Este repositorio contiene modificaciones directas sobre el tema padre, que pueden incluir:

- Ajustes en templates de propiedades y listados
- Personalización del formulario de búsqueda avanzada
- Modificaciones en la lógica de cálculo de precios
- Cambios en estilos CSS y Less
- Ajustes en la integración con mapas
- Customización de emails de notificación
- Adaptaciones para el mercado español (formatos de fecha, moneda, impuestos)

### Compilar Estilos Less

El tema utiliza **Less** como preprocesador CSS. Para compilar los estilos tras modificar archivos `.less`:

```bash
# Instalar lessc globalmente
npm install -g less

# Compilar
lessc wp-content/themes/wprentals/less/style.less wp-content/themes/wprentals/css/style.css
```

### Gestión de Actualizaciones

> **Importante:** Al trabajar directamente sobre el tema padre (no child-theme), las actualizaciones oficiales de WP Rentals sobreescribirían las modificaciones. Se recomienda:
> 1. Mantener este repositorio Git como fuente de verdad
> 2. Antes de actualizar, hacer un diff entre la versión actual y la nueva versión oficial
> 3. Aplicar los cambios de la actualización selectivamente (merge manual)
> 4. Alternativamente, usar el repositorio [llafranc-villas](https://github.com/david-berruezo/llafranc-villas) como child-theme para futuras personalizaciones

---

## Tecnologías

| Tecnología | Uso | Porcentaje |
|---|---|---|
| **PHP** | Lógica del tema, templates, API, sistema de reservas | 60.4% |
| **JavaScript** | Interactividad front-end, mapas, calendario, AJAX, filtros | 27.1% |
| **CSS** | Estilos compilados | 9.5% |
| **Hack** | Utilidades y helpers | 1.2% |
| **Less** | Preprocesador de estilos | 1.2% |
| **HTML** | Estructura base | 0.3% |

---

## Recursos

### WP Rentals

- [WP Rentals — Sitio oficial](https://wprentals.org/)
- [WP Rentals — Documentación / Help Center](https://help.wprentals.org/)
- [WP Rentals — ThemeForest](https://themeforest.net/item/wp-rentals-booking-accommodation-wordpress-theme/12921802)
- [WP Rentals — Demo principal](https://main.wprentals.org/)

### WordPress Development

- [WordPress Developer Resources](https://developer.wordpress.org/)
- [Theme Handbook](https://developer.wordpress.org/themes/)
- [Custom Post Types](https://developer.wordpress.org/plugins/post-types/)
- [REST API Handbook](https://developer.wordpress.org/rest-api/)

### Integraciones

- [Google Maps Platform](https://developers.google.com/maps)
- [Stripe Developers](https://stripe.com/docs)
- [Twilio API](https://www.twilio.com/docs)
- [iCalendar Specification (RFC 5545)](https://tools.ietf.org/html/rfc5545)
- [Elementor Developers](https://developers.elementor.com/)
- [WooCommerce Developers](https://developer.woocommerce.com/)

---

## Autor

**David Berruezo** — Software Engineer | Fullstack Developer

- GitHub: [@david-berruezo](https://github.com/david-berruezo)
- Website: [davidberruezo.com](https://www.davidberruezo.com)

---

## Licencia

Este proyecto está licenciado bajo **Apache-2.0**. Consulta el archivo [LICENSE](LICENSE) para más detalles.

> **Nota:** WP Rentals es un tema premium de WpEstate. Se requiere una licencia válida adquirida en [ThemeForest](https://themeforest.net/item/wp-rentals-booking-accommodation-wordpress-theme/12921802) para recibir actualizaciones oficiales y soporte del autor.
