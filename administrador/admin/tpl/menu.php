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
            <li><a href="lista.php?accion=analisis" title="Analisis">Analisis</a></li>
            <li><a href="lista.php?accion=categoria" title="Analisis">Categorias</a></li>
            <li><a href="lista.php?accion=proveedor" title="Proveedores">Proveedores</a></li>
            <li><a href="lista.php?accion=usuarios" title="Usuarios">Usuarios</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#"><i class="fas fa-plus-circle"></i>Regisro</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li><a href="analisis.php">Analisis</a></li>
            <li><a href="usuario.php">Usuario</a></li>
            <li><a href="proveedor.php">Proveedor</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#"><i class="fas fa-cogs"></i>Administrar</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li><a href="admin.php?accion=analisis">Analisis</a></li>
            <li><a href="admin.php?accion=usuarios">Usuario</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a class="js-arrow" href="#"><i class="fas fa-file-alt"></i>Reportes</a>
          <ul class="list-unstyled navbar__sub-list js-sub-list">
            <li><a href="reportes/rptAnalisis.php" target="_blank">Analisis Disponibles</a></li>
            <li><a href="highchars/reportes/totalanalisis/index.php" target="_blank">Analisis Realizados</a></li>
            <li><a href="highchars/reportes/genero/index.php" target="_blank">Genero Paciente</a></li>
          </ul>
        </li>
        <li><a href="../logout.php">Desconectarse</a></li>
      </ul>
    </nav>
  </div>
</aside>
<!-- END MENU SIDEBAR-->