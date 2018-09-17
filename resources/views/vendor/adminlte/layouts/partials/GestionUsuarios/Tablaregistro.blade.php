  <div class="row register-box-body">
          <div class="row">
            <div class="col-md-10">
              <p> <h3>Lista de Usuarios</h3></p>              
            </div>
          </div>
          <hr>
            <div class="row">
            <div class="col-md-6">
                  <input type="text" class="form-control form-control-sm" placeholder="Buscar Usuarios" onkeyup="buscar_usuarios()" id="buscar_usuarios">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <br>
                    </span>
                  </div>                                                 
            </div> 
          </div>

          <div class="table-responsive pre-scrollable">
          
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">Cédula</th>
                <th scope="col">Usuario</th>
                <th scope="col">Celular</th>
                <th scope="col">Sexo</th>
                <th scope="col">Estado</th>
                <th scope="col">Tipo Usuario</th>
                <th scope="col">Especialización</th>
                <th scope="col">Área</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody id="tablausuarios">
            </tbody>
          </table>
          </div>
</div>