<section class="platos-section">
  <h2>🍴 Gestión de Platos</h2>

  <!-- Formulario de registro -->
  <div class="form-container">
    <h3>Registrar Nuevo Plato</h3>
    <form id="frm_platos">
      <input type="text" id="nombre" name="nombre" placeholder="Nombre del Plato" required>
      <input type="number" id="precio" name="precio" placeholder="Precio (S/.)" required>
      <textarea id="descripcion" name="descripcion" placeholder="Descripción" required></textarea>
      <button type="submit">Registrar Plato</button>
    </form>
  </div>

  <!-- Lista de platos -->
  <div class="tabla-container">
    <h3>Lista de Platos</h3>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="tabla_platos">
        <tr>
          <td>Lomo Saltado</td>
          <td>S/ 25.00</td>
          <td>Carne salteada con papas fritas y arroz</td>
          <td>
            <button class="edit">✏️</button>
            <button class="delete">🗑️</button>
          </td>
        </tr>
        <tr>
          <td>Ceviche</td>
          <td>S/ 20.00</td>
          <td>Pescado fresco marinado en limón</td>
          <td>
            <button class="edit">✏️</button>
            <button class="delete">🗑️</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<style>
  .platos-section {
    padding: 30px;
    background: #000;
    color: #fff;
  }

  .platos-section h2 {
    color: #ff6600;
    font-size: 28px;
    margin-bottom: 20px;
    text-align: center;
  }

  .form-container {
    background: #111;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #ff6600;
    margin-bottom: 30px;
  }

  .form-container h3 {
    margin-bottom: 15px;
    color: #ff6600;
  }

  .form-container form input,
  .form-container form textarea {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #444;
    border-radius: 8px;
    background: #000;
    color: #fff;
    font-size: 1rem;
    outline: none;
    transition: border 0.3s ease;
  }

  .form-container form input:focus,
  .form-container form textarea:focus {
    border-color: #ff6600;
  }

  .form-container button {
    background: #ff6600;
    color: #000;
    padding: 12px;
    width: 100%;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    margin-top: 10px;
    transition: background 0.3s, transform 0.2s;
  }

  .form-container button:hover {
    background: #ff8533;
    transform: scale(1.05);
  }

  .tabla-container {
    background: #111;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #ff6600;
  }

  .tabla-container h3 {
    margin-bottom: 15px;
    color: #ff6600;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    color: #fff;
  }

  table th, table td {
    border-bottom: 1px solid #444;
    padding: 12px;
    text-align: left;
  }

  table th {
    background: #222;
    color: #ff6600;
  }

  table tr:hover {
    background: #1a1a1a;
  }

  .edit, .delete {
    border: none;
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    margin: 2px;
  }

  .edit {
    background: #ff6600;
    color: #000;
  }

  .edit:hover {
    background: #ff8533;
  }

  .delete {
    background: #b71c1c;
    color: #fff;
  }

  .delete:hover {
    background: #e53935;
  }
</style>

<script>
  // Ejemplo simple de interacción
  document.getElementById("frm_platos").addEventListener("submit", function(e){
    e.preventDefault();
    alert("✅ Plato registrado con éxito (ejemplo)");
  });
</script>
