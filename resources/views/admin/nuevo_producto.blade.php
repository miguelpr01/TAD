<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <script>
        function productTypeChange(event) {
            var selectedValue = event.target.value;
            var prot = document.getElementById('proteina');
            // var creat = document.getElementById('creatina');
            // var ropa = document.getElementById('ropa');
            switch(selectedValue) {
                case 'proteina':
                    prot.style.display = 'block';
                    creat.style.display = 'none';
                    ropa.style.display = 'none';
                    break;
                case 'creatina':
                    prot.style.display = 'none';
                    creat.style.display = 'none';
                    ropa.style.display = 'none';
                    break;
                case 'ropa':
                    prot.style.display = 'none';
                    creat.style.display = 'none';
                    ropa.style.display = 'none';
                    break;
                default:
                    prot.style.display = 'none';
                    creat.style.display = 'none';
                    ropa.style.display = 'none';
                    console.log('AAAAAAAAAAAAA');
            }
        }
    </script>
    <label for="prodType">Tipo de producto:</label>
    <select id="prodType" onchange="productTypeChange(event)">
        <option value="">Elija tipo</option>
        <option value="proteina">Proteina</option>
        <option value="creatina">Creatina</option>
        <option value="ropa">Ropa</option>
    </select>

    <form action="{{route('proteina.create')}}" method="POST" id="proteina" style="display:none;">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
            <br>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio">
            <br>
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen">
            <br>
            <label for="sabor">Sabor:</label>
            <input type="text" name="sabor" id="sabor">
            <br>
            <label for="cantidad">Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad">
            <br>
            <input type="submit" value="Crear proteina">
        </form>
</div>

</body>
</html>