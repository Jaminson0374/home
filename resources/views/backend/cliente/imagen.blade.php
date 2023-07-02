<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Previsualizar imagen</title>
</head>

<body>
	<h1>Previsualización de imagen</h1>
	<br>
    <!-- El input para seleccionar los archivos, fíjate en su id -->
    <input type="file" id="seleccionArchivos" accept="image/*">
    <br><br>
    <!-- La imagen que vamos a usar para previsualizar lo que el usuario selecciona -->
    <div class="row">
        <div class="col-2 sm">
        <img id="imagenPrevisualizacion" class="img-fluid" alt="Eniun">
        </div>
    </div>        
    <script src="{{ asset('../resources/js/imagen.js') }}"></script>
  </body>
</html>
