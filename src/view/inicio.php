<!-- =============================== -->
    <!-- CUERPO PRINCIPAL                -->
    <!-- =============================== -->
    <section class="container-fluid">
        <div class="row" style="padding-top: 56px;"> <!-- Padding para la barra de navegación fija -->
            <!-- Barra Lateral de Navegación -->
            <div class="col-lg-2 bg-white vh-100 border-end d-none d-lg-block">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page" href="#">
                                <i class="bi bi-speedometer2 me-2"></i> Resumen
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo BASE_URL;?>restaurantes">
                                <i class="bi bi-shop me-2"></i> Restaurantes
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contenido del Dashboard -->
            <main class="col-lg-10 p-4">
                <h1 class="h2 border-bottom pb-2 mb-3">Resumen General</h1>

                <!-- Tarjetas de Métricas -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total de Platos</h5>
                                    <p class="card-text fs-4 fw-bold">125</p>
                                </div>
                                <i class="bi bi-journal-text fs-1 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-white bg-success">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Restaurantes Activos</h5>
                                    <p class="card-text fs-4 fw-bold">4</p>
                                </div>
                                <i class="bi bi-shop-window fs-1 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Pedidos del Día</h5>
                                    <p class="card-text fs-4 fw-bold">89</p>
                                </div>
                                <i class="bi bi-cart3 fs-1 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Alertas</h5>
                                    <p class="card-text fs-4 fw-bold">3</p>
                                </div>
                                <i class="bi bi-exclamation-triangle fs-1 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de Platos Populares -->
                <h2 class="h4">Platos Populares</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del Plato</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Ventas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Hamburguesa Clásica</td>
                                <td>Carnes</td>
                                <td>$15.50</td>
                                <td>250</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ensalada César con Pollo</td>
                                <td>Ensaladas</td>
                                <td>$12.00</td>
                                <td>180</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pizza Pepperoni</td>
                                <td>Pizzas</td>
                                <td>$18.00</td>
                                <td>175</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Sopa de Tomate</td>
                                <td>Sopas</td>
                                <td>$8.50</td>
                                <td>95</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tarjetas de Restaurantes -->
                <h2 class="h4 mt-4">Información de Restaurantes</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Restaurante "El Buen Sabor"</h5>
                                <p class="card-text">Av. Principal 123, Ciudad Capital</p>
                                <span class="badge bg-success">Activo</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">"La Esquina del Chef"</h5>
                                <p class="card-text">Calle Secundaria 45, Zona Norte</p>
                                <span class="badge bg-success">Activo</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">"Sabor a Mar"</h5>
                                <p class="card-text">Paseo Marítimo 789, Costa del Sol</p>
                                <span class="badge bg-secondary">Inactivo</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>

