
<!-- ======================================================= -->
        <!-- Contenido Principal: Gestión de Restaurantes -->
        <main class="col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                <h1 class="h2">Gestión de Restaurantes</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-funnel"></i> Filtros
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-geo-alt"></i> Ver en Mapa
                        </button>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#restauranteModal">
                        <i class="bi bi-plus-circle-fill me-1"></i>
                        Añadir Restaurante
                    </button>
                </div>
            </div>

            <!-- Listado de Restaurantes en Tarjetas -->
            <div class="row g-4" id="contenedor_restaurantes">
                <!-- Tarjeta de Restaurante 1 -->
                 
 <!--                 <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://marasrestaurante.com.pe/wp-content/uploads/2025/04/mejores-restaurantes-del-distrito-de-San-Isidro-en-Lima.jpg" class="card-img-top" alt="Fachada del restaurante">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Restaurante "El Buen Sabor"</h5>
                            <p class="card-text text-muted mb-2">
                                <i class="bi bi-geo-alt-fill me-2"></i>Av. Principal 123, Ciudad Capital
                            </p>
                            <p class="card-text text-muted">
                                <i class="bi bi-telephone-fill me-2"></i>+1 (234) 567-890
                            </p>
                            <span class="badge bg-success">Activo</span>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-end">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i> Ver</button>
                                <button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Borrar</button>
                            </div>
                        </div>
                    </div>
                </div>  -->



            </div>

            <!-- Paginación -->
            <nav class="mt-4" aria-label="Navegación de páginas de restaurantes">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </main>
    </div>
</section>

<!-- Modal registrar restaurant -->
<div class="modal fade" id="restauranteModal" tabindex="-1" aria-labelledby="restauranteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title fw-bold" id="restauranteModalLabel">
                    <span class="text-success me-2">🏢</span>Registro de Restaurante
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="frm_new_restaurante">
                    <div class="mb-3">
                        <label for="nombreRestaurante" class="form-label fw-semibold">Nombre del Restaurante</label>
                        <input type="text" class="form-control rounded-3" id="nombreRestaurante" name="nombreRestaurante" placeholder="Ej: La Esquina del Sabor" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccionRestaurante" class="form-label fw-semibold">Ubicación</label>
                        <input type="text" class="form-control rounded-3" id="direccionRestaurante" name="direccionRestaurante" placeholder="Ej: Av. Principal 123, Ciudad" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripción" class="form-label fw-semibold">Descripción</label>
                        <textarea type="text" class="form-control rounded-3" id="descripción" name="descripción" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telefonoRestaurante" class="form-label fw-semibold">Teléfono</label>
                            <input type="tel" class="form-control rounded-3" id="telefonoRestaurante" name="telefonoRestaurante" placeholder="Ej: 555-1234567" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="horario" class="form-label fw-semibold">Horario</label>
                            <input type="text" class="form-control rounded-3" id="horario" name="horario" placeholder="Ej: 8:00 am a 12:00 pm" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label fw-semibold">Correo</label>
                        <input type="text" class="form-control rounded-3" id="correo" name="correo" placeholder="Ej: elbuensabor@gmail.com" required></input>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="button" class="btn btn-success btn-lg rounded-pill" onclick="registrarRestaurante();">
                            Guardar Restaurante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ===================================================== -->
<!-- FIN DE LA SECCIÓN DEL CUERPO - GESTIÓN DE RESTAURANTES -->
<!-- ===================================================== -->
 <script src="<?php echo BASE_URL;?>src/view/js/restaurante.js"></script>