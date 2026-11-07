Colección de aplicaciones web desarrolladas en PHP durante el ciclo de Desarrollo de Aplicaciones Web. Cada ejercicio trabaja el manejo de formularios, la validación de datos y la organización del código en varios archivos.

Registro e inscripción Formulario de inscripción a un taller con nombre, correo y edad. Valida los datos, muestra los errores en rojo y redirige a una página de confirmación. Usa el patrón PRG para que el formulario no se reenvíe al refrescar la página.

Moderación de comentarios Formulario de comentarios que censura una lista de palabras prohibidas con asteriscos y cuenta las palabras y los caracteres. Conserva los saltos de línea y mantiene el texto escrito si la validación falla.

Calculadora de presupuestos Calcula el total de una compra a partir de un catálogo de productos. Muestra el desglose con subtotal, IVA, gastos de envío y total, con envío gratuito a partir de 50 €. Usa constantes de configuración y funciones con tipado estricto.

Encuesta de satisfacción Encuesta con valoraciones del 1 al 5 y servicios de selección múltiple. Separa la vista, el procesamiento y el resultado en archivos distintos, usa plantillas compartidas de cabecera y pie, y bloquea el acceso directo al archivo de procesamiento.

Clasificador de tarifas Formulario que se envía a sí mismo para calcular un descuento según el tipo de usuario y la edad, usando la estructura match. Mantiene los datos introducidos en el formulario tras cada cálculo.

Conceptos trabajados
- Formularios con GET y POST
- Validación de datos con filter_var
- Protección frente a XSS con htmlspecialchars
- Redirecciones con header() y patrón PRG
- Código modular con require_once
- Constantes, arrays asociativos y tipado de funciones
- Estructura match

Tecnologías
- PHP 8
- HTML

Ejecución
1. Copia la carpeta del proyecto en el directorio de tu servidor local (por ejemplo, htdocs en XAMPP).
2. Inicia Apache.
3. Abre en el navegador http://localhost//.


El punto de entrada de cada ejercicio es index.php, salvo en el ejercicio 1 (formulario.php) y en el ejercicio 4 (encuesta.php).
