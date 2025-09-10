<!-- =================================================== -->
<!-- INICIO DE LA SECCIÓN DEL CUERPO - GESTIÓN DE PLATOS -->
<!-- =================================================== -->
<section class="container-fluid">
    <div class="row" style="padding-top: 56px;"> <!-- Padding para la barra de navegación fija -->

        <!-- Barra Lateral de Navegación (simulada para contexto) -->
        <div class="col-lg-2 bg-white vh-100 border-end d-none d-lg-block">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="bi bi-speedometer2 me-2"></i> Resumen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="#">
                            <i class="bi bi-card-checklist me-2"></i> Platos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="bi bi-shop me-2"></i> Restaurantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="bi bi-bar-chart-line me-2"></i> Reportes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="bi bi-gear me-2"></i> Configuración
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Contenido Principal: Gestión de Platos -->
        <main class="col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                <h1 class="h2">Gestión de Platos</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-funnel"></i> Filtros
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-upload"></i> Exportar
                        </button>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle-fill me-1"></i>
                        Añadir Nuevo Plato
                    </button>
                </div>
            </div>

            <!-- Tabla de Platos -->
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre del Plato</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Restaurante</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Estado</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://via.placeholder.com/80x60" class="img-thumbnail" alt="Plato"></td>
                            <td class="fw-bold">Hamburguesa Gourmet</td>
                            <td>Carnes</td>
                            <td>El Buen Sabor</td>
                            <td>$18.50</td>
                            <td><span class="badge bg-success">Disponible</span></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/80x60" class="img-thumbnail" alt="Plato"></td>
                            <td class="fw-bold">Pizza Cuatro Quesos</td>
                            <td>Pizzas</td>
                            <td>La Esquina del Chef</td>
                            <td>$22.00</td>
                            <td><span class="badge bg-success">Disponible</span></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/80x60" class="img-thumbnail" alt="Plato"></td>
                            <td class="fw-bold">Sushi Variado (12 pz)</td>
                            <td>Asiática</td>
                            <td>Sabor a Mar</td>
                            <td>$25.00</td>
                            <td><span class="badge bg-warning text-dark">Pocas unidades</span></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/80x60" class="img-thumbnail" alt="Plato"></td>
                            <td class="fw-bold">Tiramisú</td>
                            <td>Postres</td>
                            <td>El Buen Sabor</td>
                            <td>$9.50</td>
                            <td><span class="badge bg-danger">Agotado</span></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/80x60" class="img-thumbnail" alt="Plato"></td>
                            <td class="fw-bold">Ensalada de Quinoa</td>
                            <td>Ensaladas</td>
                            <td>La Esquina del Chef</td>
                            <td>$14.00</td>
                            <td><span class="badge bg-success">Disponible</span></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <nav aria-label="Navegación de páginas de platos">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </main>
    </div>
</section>
<!-- ================================================= -->
<!-- FIN DE LA SECCIÓN DEL CUERPO - GESTIÓN DE PLATOS -->
<!-- ================================================= -->