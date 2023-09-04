<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Nuevo Proyecto</title>

  <link rel="stylesheet" href="{{asset('/css/navadmin.css')}}">
  <link rel="stylesheet" href="{{asset('/css/createpedido.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  @include('proyectos/navproyectos')


  <section class="home">
    <div class="text">Crear Pedido: <br> {{ $proyecto->Nombre }}</div>

    <div class="crear">
      <form action="{{ route('pedidos.store', ['id' => $proyecto->IdProyecto]) }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="contenido">
            <div class="formulario">
              <div class="mb-3">
                <label for="descripcion"  class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="nombre form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <select class="form-select" name="proveedor" id="proveedor" aria-label="Default select example">
                <option value="">Seleccionar proveedor</option>
              @forelse ($proveedores as $proveedor)
                  <option value="{{ $proveedor->IdProveedor}}">{{$proveedor->Nombre}} </option>
              @empty
                  
              @endforelse
              </select>
            </div>
            
            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha:</label>
              <input type="date" name="fecha" id="fecha" class="form-control">
            </div>
            </div>
            <div class="formu">
              <div class="mb-3">
                <select class="form-select" name="concepto" id="concepto" aria-label="Default select example">
                  <option value="">Seleccionar concepto</option>
                @forelse ($conceptos as $concepto)
                    <option value="{{ $concepto->IdConcepto}}">{{$concepto->Nombre}} </option>
                @empty
                    
                @endforelse
                </select>
              </div><br>  
              <div class="mb-3">
                <select class="form-select" name="admin" id="admin" aria-label="Default select example">
                  <option value="">Seleccionar administrador</option>
                @forelse ($administradores as $administrador)
                    <option value="{{ $administrador->IdAdministrador}}">{{$administrador->Nombre . " " . $administrador->Apellido}} </option>
                @empty
                    
                @endforelse
                </select>
              </div> <br>
              <div class="mb-3">
                <label for="poster" class="form-label">Factura Pedido:</label>
                <input type="file" name="poster" id="poster" class="form-control" accept="application/pdf">
              </div>
            </div>  
          </div><br><br>
          <h3>Detalle Pedido</h3><br>
          <!-- Campos de entrada para los detalles de pedido -->
          <div class="detalle d-flex">
            <div class="input-group d-block">
              <label for="nombre">Materia Prima:</label><br>
              <select class="form-select w-75" name="materiaPrima[]" id="materiaPrima[]" aria-label="Default select example">
                <option value="">Seleccionar Material</option>
              @forelse ($materiaprimas as $materia)
                  <option value="{{ $materia->IdMateriaPrima}}">{{$materia->Nombre}} </option>
              @empty
                  
              @endforelse
              </select>
            </div>  
            <div class="input-group mb-3 d-block">
                <label for="nombre">Cantidad:</label><br>
                <input type="number" name="cantidad[]" id="cantidad[]" class="form-control w-75" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3 d-block">
                <label for="nombre">Valor Unitario:</label><br>
                <input type="number" name="valorUnitario[]" id="valorUnitario[]" class="form-control w-75" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <button type="button" class="btn" style="height: 40px; color: #fff; background: #5b95d7; margin-top: 20px; color: #fff" onclick="agregarDetalle()">Guardar</button>
          </div>

          <!-- Tabla para mostrar los detalles de pedido -->
          <table id="tabla-detalles" class="table">
            <thead>
                <tr>
                    <th>Materia Prima</th>
                    <th>Cantidad</th>
                    <th>Valor Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán las filas de detalles del pedido automáticamente -->
            </tbody>
          </table>

        <div class="botones">
          <button type="submit" class="cancelar"><a href="{{ route('proyectos.gestionproyecto')}}" style="text-decoration: none">Cancelar</a></button>
          <button type="submit" class="crearbtn">Crear Proyecto</button>
        </div>
      </form>
    </div>
  </section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<script src="{{asset('/js/ciudades.js')}}"></script>  
<script src="{{asset('/js/navadmin.js')}}"></script>
<script src="{{asset('/js/cargarimagen.js')}}"></script>
<script>
  let detalleTable = document.getElementById("tabla-detalles").getElementsByTagName('tbody')[0];

function agregarDetalle() {
  // Obtener los valores ingresados
  let materiaPrima = document.querySelectorAll("select[name='materiaPrima[]']");
  let cantidad = document.querySelectorAll("input[name='cantidad[]']");
  let valorUnitario = document.querySelectorAll("input[name='valorUnitario[]']");
  
  // Crear una nueva fila de tabla por cada conjunto de valores
  for (let i = 0; i < materiaPrima.length; i++) {
    let materiaPrimaValue = materiaPrima[i].value;
    let cantidadValue = parseFloat(cantidad[i].value);
    let valorUnitarioValue = parseFloat(valorUnitario[i].value);

    // Calcular el total
    let total = cantidadValue * valorUnitarioValue;

    // Crear una nueva fila de tabla
    let newRow = detalleTable.insertRow();
    
    // Agregar celdas con los valores
    let cell1 = newRow.insertCell(0);
    let cell2 = newRow.insertCell(1);
    let cell3 = newRow.insertCell(2);
    let cell4 = newRow.insertCell(3);
    let cell5 = newRow.insertCell(4); // Agregar una nueva celda para el botón de eliminar
    
    cell1.innerHTML = materiaPrimaValue;
    cell2.innerHTML = cantidadValue;
    cell3.innerHTML = valorUnitarioValue;
    cell4.innerHTML = total.toFixed(2); // Redondear el total a dos decimales
    cell5.innerHTML = '<button type="button" class="btn btn-danger" onclick="eliminarDetalle(this)">Eliminar</button>';
    
    // Limpiar los campos de entrada
    materiaPrima[i].value = "";
    cantidad[i].value = "";
    valorUnitario[i].value = "";
  }
}

function eliminarDetalle(button) {
  // Obtener la fila que contiene el botón
  let row = button.closest("tr");
  row.parentNode.removeChild(row);
}
</script>

</body>
</html>
