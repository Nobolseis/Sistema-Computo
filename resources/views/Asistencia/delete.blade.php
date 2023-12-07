
        <!-- Modal -->
  <div class="modal fade" id="Delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">¿Está seguro de eliminarlo?</h1>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <div class="modal-body">
            <form action="{{ route('asistencia.eliminar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input id="id" name="id" type="text" class="form-control" value="0" hidden>

                <div class="botones">
                    <button type="submit" class="btn btn-danger" tabindex="7">Confirmar</button>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-secondary" tabindex="6">Regresar</button>
                </div>

            </form>
        </div>
      </div>
    </div>
  </div>



