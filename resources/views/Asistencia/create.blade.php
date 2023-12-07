
        <!-- Modal -->
  <div class="modal fade" id="Asis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar: Asistencia</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('asistencia.crear') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div></div>
                <div>
                 <label for="Nombre" class="form-label">Nombre</label>
                 <input id="Nombre" name="Nombre" type="tex" class="form-control" maxlength="100" tabindex="1" required>
                </div>
                <div>
                 <label for="Matricula" class="form-label">Matricula</label>
                 <input id="Matricula" name="Matricula" type="tex" class="form-control" maxlength="100" tabindex="2" required>
                </div>

                <div>
                    <label class="form-label">Carrera</label>
                    <select id="Carrera" name="Carrera" class="form-select" tabindex="3" required>
                        <option value="Ingeniería en Agronomía">Ingeniería en Agronomía</option>
                        <option value="Ingeniería Forestal">Ingeniería Forestal</option>
                        <option value="Ingeniería en Industrias Alimentarias">Ingeniería en Industrias Alimentarias</option>
                        <option value="Licenciatura en Biología">Licenciatura en Biología</option>
                        <option value="Ingeniería Informática">Ingeniería Informática</option>
                        <option value="Ingeniería en Administración">Ingeniería en Administración</option>
                        <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                        <option value="Maestría en Ciencias en Agroecosistemas Sostenibles">Maestría en Ciencias en Agroecosistemas Sostenibles</option>
                        <option value="Maestría en Administración">Maestría en Administración</option>
                    </select>
                </div>

                <div>
                <label for="Semestre" class="form-label">Semestre</label>
                <input id="Semestre" name="Semestre" type="number" min="1" max="16" step=any class="form-control" tabindex="3" required>
                </div>

                <div>
                 <label for="Grupo" class="form-label">Grupo</label>
                 <input id="Grupo" name="Grupo" type="tex" class="form-control" maxlength="100" tabindex="4" required>
                </div>
                <br>
                <div class="botones">
                    {{-- <a href="{{ route('asistencia.index') }}" class="btn btn-secondary" tabindex="6">Regresar</a> --}}
                    <button type="submit" class="btn btn-primary" tabindex="7">Guardar Alumno</button>
                </div>

            </form>
        </div>
      </div>
    </div>
  </div>



