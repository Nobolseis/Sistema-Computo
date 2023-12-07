  <!-- Modal -->
  <div class="modal fade" id="Mante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo equipo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form <form action="{{url('Mantenimiento')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (count($errors)>0)

                    <div class="alert alert-danger" role="alert">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                    </div>
                    @endif
                    <div>
                        <label for="NumeroInventario" class="form-label">Numero de inventario</label>
                        <input id="NumeroInventario" name="NumeroInventario" type="tex" class="form-control" tabindex="1">
                    </div>
                    <div>
                        <label for="Marca" class="form-label">Marca</label>
                        <input id="Marca" name="Marca" type="tex" class="form-control" tabindex="2">
                    </div>
                    <div>
                        <label for="Modelo" class="form-label">Modelo</label>
                        <input id="Modelo" name="Modelo" type="tex" class="form-control" tabindex="2">
                    </div>

                        <div>
                            <label for="NumSerie" class="form-label">Num. Serie</label>
                            <input id="NumSerie" name="NumSerie" type="tex" class="form-control" tabindex="2">
                        </div>
                        <div class="form-group">
                            <label for="Caracteristicas">Caractersiticas</label>
                            <textarea class="form-control" name="Caracteristicas" id="Caracteristicas" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Problema">Descrpción del problema</label>
                            <textarea class="form-control" name="Problema" id="Problema" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Diagnostico">Diagnostico</label>
                            <input class="form-control" name="Diagnostico" id="Diagnostico" rows="3"></input>
                        </div>
                        <div>
                            <label for="Ubicacion" class="form-label">Ubicación</label>
                            <input id="Ubicacion" name="Ubicacion" type="tex" class="form-control" tabindex="3">
                        </div>

                        <div class="form-group">
                            <label for="Foto">Foto</label>
                              <input type="file" class="form-control" name="Foto" id="Foto" placeholder="imagen">
                          </div>
                        <br>
                        <div class="botones">
                            <a href="{{ route('mantenimiento') }}" class="btn btn-secondary" tabindex="6">Regresar</a>
                            <button type="submit" class="btn btn-primary" tabindex="7">Guardar Equipo</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>
