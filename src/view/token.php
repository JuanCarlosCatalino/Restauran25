<!-- ======================================================= -->
<!-- INICIO DE LA SECCIÓN DEL CUERPO - GESTIÓN DE TOKENS -->
<!-- ======================================================= -->
<section class="container-fluid">
    <div class="row" style="padding-top: 56px;">

        <!-- Sidebar -->
        <div class="col-lg-2 bg-white vh-100 border-end d-none d-lg-block">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo BASE_URL;?>restaurantes">
                            <i class="bi bi-shop me-2"></i> Restaurantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo BASE_URL;?>clientes">
                            <i class="bi bi-people me-2"></i> Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark" href="<?php echo BASE_URL;?>tokens">
                            <i class="bi bi-key me-2"></i> Tokens
                        </a>
                    </li>
                </ul>
            </div>
        </div>

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
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tokenModal">
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    Generar Token
                </button>
            </div>

            <!-- Listado de tokens en tabla -->
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tabla_tokens">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Token</th>
                            <th>Fecha Registro</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Los datos se cargan via JavaScript -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</section>

<!-- Modal generar token -->
<div class="modal fade" id="tokenModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title fw-bold">Generar Token API</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form id="frm_new_token">
                    <div class="mb-3">
                        <label class="form-label">Seleccionar Cliente</label>
                        <select class="form-select" name="id_client_api" id="id_client_api" required>
                            <option value="">-- Selecciona un cliente --</option>
                            <!-- Los clientes se cargan via JavaScript -->
                        </select>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="button" class="btn btn-success btn-lg rounded-pill" onclick="generarToken();">
                            <i class="bi bi-key me-2"></i>Generar Token
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ======================================================= -->
<!-- FIN DE LA SECCIÓN DEL CUERPO - GESTIÓN DE TOKENS -->
<!-- ======================================================= -->

<script src="<?php echo BASE_URL;?>src/view/js/token.js"></script>