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
            <li><a href="lista.php?accion=paciente" title="Pacientes">Pacientes</a></li>
            <li><a href="lista.php?accion=medico" title="Medicos">Medicos</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#"><i class="fas fa-plus-circle"></i>Regisro</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li><a href="registrarorden.php" title="Ordenes">Orden</a></li>
            <li><a href="#" title="Ordenes">Resultados</a></li>
            <li><a href="#" title="Usuarios">Cobros</a></li>
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
<!-- END MENU SIDEBAR-->
