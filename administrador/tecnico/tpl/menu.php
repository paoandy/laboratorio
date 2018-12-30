<!-- BEGIN MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
  <div class="logo">
    <a href="index.php">
      <img src="../../img/logo.png" alt="Laboratorio" />
    </a>
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
      <ul class="list-unstyled navbar__list">
        <li class="has-sub">
          <a class="js-arrow" href="#"><i class="fas fa-list-ol"></i>Lista</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li><a href="lista.php?accion=orden" title="Pacientes">Ordenes</a></li>
            <li><a href="lista.php?accion=paciente" title="Analisis">Pacientes</a></li>
            <li><a href="lista.php?accion=medico" title="Ordenes">Medicos</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#"><i class="fas fa-plus-circle"></i>Registro</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li><a href="resultados.php">Resultados</a></li>
            <li><a href="insumos.php">Insumos</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#"><i class="fas fa-file-alt"></i>Reportes</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li><a href="reportes/rptAnalisis.php" target="_blank">Analisis Disponibles</a></li>
          </ul>
        </li>
        <li><a href="../logout.php">Desconectarse</a></li>
      </ul>
    </nav>
  </div>
</aside>
