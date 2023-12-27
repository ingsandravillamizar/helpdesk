<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="/helpdesk/index.php">
                <svg class="nav-icon">
                    <use xlink:href="<?= RESOURCES ?>/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg> Tablero</a></li>

        <?php if($_SESSION['userrol'] == "Administrador"): ?>
            <li class="nav-title">ADMINISTRADOR</li>
            <li class="nav-item"><a class="nav-link" href="/helpdesk/users/users.php"><i class="icon icon-2xl mt-5 mb-2 cil-user"></i>Usuarios</a></li>
        <?php endif; ?>

        <li class="nav-title">AYUDA</li>
        <li class="nav-item"><a class="nav-link" href="/helpdesk/tickets/tickets.php">Mis Tickets</a></li>
        <li class="nav-item"><a class="nav-link" href="/helpdesk/tickets/createticket.php">Nuevo Ticket</a></li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>