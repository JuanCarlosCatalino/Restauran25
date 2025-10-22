<!-- ======================================================= -->
<!-- INICIO DE LA SECCIÓN DEL CUERPO - GESTIÓN DE TOKENS -->
<!-- ======================================================= -->

        <!-- Contenido principal -->
        <main class="col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                <div class="d-flex align-items-center">
                    <!-- BOTÓN VOLVER AL INICIO -->
                    <a href="<?php echo BASE_URL;?>" class="btn btn-outline-secondary btn-sm me-3">
                        <i class="bi bi-arrow-left me-1"></i>Volver al Inicio
                    </a>
                    <h1 class="h2 mb-0">Gestión de Tokens API</h1>
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="PostgenerarToken();">
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    Generar Token
                </button>
            </div>

            <!-- Listado de tokens en tabla -->
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tabla_tokens">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Token</th>
                            <th>Fecha Registro</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyTokens">
                        <!-- Los datos se cargan via JavaScript -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</section>
<!-- ======================================================= -->
<!-- FIN DE LA SECCIÓN DEL CUERPO - GESTIÓN DE TOKENS -->
<!-- ======================================================= -->
<script> let data = '<?php echo $_GET['data'];?>'</script>
<script src="<?php echo BASE_URL;?>src/view/js/token.js"></script>