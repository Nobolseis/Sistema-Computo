  <!-- Modal -->
  <div class="modal fade" id="Equip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo equipo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">

                  <form action="{{url('/equipos')}}" method="post" enctype="multipart/form-data">
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
                          <input id="Numero_de_inventario" name="Numero_de_inventario"  type="tex" class="form-control" tabindex="1">
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
                              <label for="Num_serie" class="form-label">Numero de Serie</label>
                              <input id="Num_serie" name="Num_serie" type="tex" class="form-control" tabindex="2">
                          </div>
                          <div class="form-group">
                              <label for="Caracteristicas">Caracteriticas</label>
                              <textarea class="form-control" name="Caracteristicas" id="Caracteristicas" rows="3"></textarea>
                          </div>
                          <div>
                              <label for="Ubicacion">Ubicación en sala</label>
                              <input id="Ubicacion" name="Ubicacion" type="tex" class="form-control" tabindex="2">
                          </div>
                          <br>
                          <div class="form-group">
                            <label for="Foto">Foto</label>
                              <input type="file" class="form-control" name="foto" id="foto" placeholder="imagen">
                          </div>
                          <br>
                          <div class="botones">
                              <a href="#" class="btn btn-secondary" tabindex="6">Regresar</a>
                              <button type="submit" class="btn btn-primary" tabindex="7">Guardar Equipo</button>
                          </div>

                  </form>
              </div>
          </div>
      </div>
  </div>
