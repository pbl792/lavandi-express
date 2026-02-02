<?php include 'includes/header.php'; ?>

<main class="container my-5">
    <h1 class="text-center mb-5 text-primary fw-bold">Nuestros Servicios y Tarifas</h1>

    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h3 class="h5 fw-bold text-primary"><i class="bi bi-water"></i> Lavado Premium</h3>
                    <p class="text-muted">Utilizamos detergentes biodegradables que cuidan las fibras y el medio ambiente.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h3 class="h5 fw-bold text-primary"><i class="bi bi-lightning-charge"></i> Entrega Express</h3>
                    <p class="text-muted">¿Tienes prisa? Tu colada lista y doblada en menos de 24 horas.</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h4 mb-4 text-secondary">Lista de Precios Detallada</h2>
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col" class="py-3">Categoría</th>
                    <th scope="col" class="py-3">Descripción</th>
                    <th scope="col" class="py-3 text-center">Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="fw-bold">Colada Estándar</td>
                    <td>Lavado + Secado hasta 8kg.</td>
                    <td class="text-center">9,00 €</td>
                </tr>
                <tr>
                    <td class="fw-bold">Edredones</td>
                    <td>Lavado especial para piezas voluminosas.</td>
                    <td class="text-center">15,50 €</td>
                </tr>
                <tr>
                    <td class="fw-bold">Trajes</td>
                    <td>Limpieza en seco y planchado a vapor.</td>
                    <td class="text-center">12,00 €</td>
                </tr>
                <tr>
                    <td class="fw-bold">Pack Planchado</td>
                    <td>10 camisas o pantalones (solo plancha).</td>
                    <td class="text-center">14,00 €</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php include 'includes/footer.php'; ?>