Hola, {{$cliente}}:<br/>
<br/>
Este es un correo electrónico automatizado para informarte de que se ha registrado tu pedido de:<br/>

    @foreach($carritos as $carrito)
        {{$carrito->cantProducto}} unidad/es de {{$carrito->producto->nombre}}.<br/>
    @endforeach

Muchas gracias por utilizar Naturfit.<br/>
<br/>
Sinceramente,<br/>
El equipo de Naturfit