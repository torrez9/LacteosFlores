<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
        }

        .description {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e0e0e0;
        }
         /* Cambiar el color del menú lateral */
      .sidebar-dark-primary {
        background-color: #2e6da4; /* Fondo azul mas oscuro*/
    }
    /* Cambiar el color de los iconos en el menú lateral */
    .sidebar-dark-primary .nav-link i {
        color:  #ffffff; /* Color azul oscuro para los iconos */
    }
    /* Cambiar el color de los textos en el menú lateral */
    .sidebar-dark-primary .nav-link,
    .sidebar-dark-primary .nav-link i,
    .sidebar-dark-primary .nav-header {
        color:  #ffffff; /* Color azul oscuro para los textos */
    }

    /* Cambiar el color de la barra de navegación superior */
    .navbar-gradient {
        background-image: linear-gradient(to right, #4dabf7, #2e6da4); /* Gradiente de azul primario a azul oscuro de izquierda a derecha */
        color: #FFFFFF; /* Color blanco para los textos */
    }
    .navbar-gradient .navbar-nav .nav-link {
        color: #FFFFFF; /* Color blanco para los textos del menú */
    }
    .navbar-gradient .navbar-nav .nav-link:hover {
        color: #CCCCCC; /* Color gris claro para los textos del menú al pasar el ratón */
    }
    /* Estilo para el texto con gradiente */
    .nav-link-gradient {
        background: linear-gradient(to right, #3a8edb, #1f5b96); /* Gradiente de azul primario a azul oscuro */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    .nav-link-gradient:hover {
        background: linear-gradient(to right, #1f5b96, #3a8edb); /* Invertir gradiente al pasar el ratón */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    /* Definir text-blue-dark para que sea azul oscuro */
    .text-blue-dark {
        color: #1f5b96 !important; /* Azul oscuro */
    }
    /* Efecto de resaltado para los elementos del menú al pasar el ratón */
.sidebar-dark-primary .nav-link {
  position: relative;
  padding-left: 1rem;
  padding-right: 1rem;
}

.sidebar-dark-primary .nav-link::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #2e6da4;; /* Color de resaltado (blanco) */
  opacity: 0;
  transition: opacity 0.3s ease;
  z-index: -1; /* Asegura que el fondo esté detrás del texto */
}

.sidebar-dark-primary .nav-link:hover::before {
  opacity: 1; /* Mostrar el fondo blanco al pasar el ratón */
}
    </style>
</head>
<body>
    <div class="container">
        <img src="" alt="" class="logo">
        <h1>Reporte de Compras</h1>
        <div class="description">
            <h2>Lacteos Flores</h2>
            <p></p>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Id Compra</th>
                    <th>Producto</th>
                    <th>Fecha compra</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Importe</th>
                    <th>Total Compra</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id_compra }}</td>
                                    <td>{{ $reporte->producto }}</td>
                                    <td>{{ $reporte->fechacompra }}</td>
                                    <td>{{ $reporte->cantidad }}</td>
                                    <td>{{ $reporte->precio }}</td>
                                    <td>{{ $reporte->importe }}</td>
                                    <td>{{ $reporte->id_compra }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
