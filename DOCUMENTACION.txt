# Documentación del Proyecto: Sitio Web de Pedidos de Comida

## Descripción General

Este proyecto es un sistema web simple para tomar pedidos de comida. Está diseñado para ser ejecutado en un entorno de servidor local como XAMPP. La aplicación presenta un menú de comida al usuario y procesa los pedidos utilizando un backend de PHP.

## Estructura del Proyecto

- `index.html`: La página principal de la aplicación. Muestra el menú y el formulario de pedido.
- `style.css`: Contiene los estilos CSS para dar formato a la apariencia visual del sitio web.
- `script.js`: Maneja la interactividad del lado del cliente, como la validación de formularios o efectos dinámicos.
- `db_conexion.php`: Script de PHP para establecer la conexión con la base de datos (probablemente MySQL).
- `procesar_pedido.php`: Script de PHP que recibe los datos del formulario de `index.html`, los procesa y los guarda en la base de datos.
- `fotos/`: Directorio que contiene las imágenes de los productos y del restaurante.

## Funcionamiento

1.  El usuario abre `index.html` en su navegador.
2.  El usuario selecciona los productos que desea ordenar y completa el formulario de pedido.
3.  Al enviar el formulario, los datos se envían a `procesar_pedido.php`.
4.  `procesar_pedido.php` se conecta a la base de datos a través de `db_conexion.php`.
5.  El pedido se guarda en la base de datos.

## Requisitos

- Un servidor web local (ej. XAMPP, WAMP).
- PHP.
- Un sistema de gestión de bases de datos (ej. MySQL/MariaDB).
