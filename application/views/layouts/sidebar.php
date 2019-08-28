<!-- Sidebar Holder -->
<nav id="sidebar">
    <div id="dismiss">
        <i class="glyphicon glyphicon-arrow-left"></i>
    </div>

    <div class="sidebar-header">
        <h3>WMS</h3>
    </div>

    <ul class="list-unstyled components">
        <p>David S&aacute;ez Andreus</p>
        <li class="active">
            <a href="#clientes" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-users"></i> Clientes
            </a>
            <ul class="collapse list-unstyled" id="clientes">
                <li>
                    <a href="<?=base_url()?>Clientes">
                        <i class="fas fa-address-book"></i> Cartera de Clientes
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#productos" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-cogs"></i> Productos
            </a>
            <ul class="collapse list-unstyled" id="productos">
                <li>
                    <a href="<?=base_url()?>Productos">
                        <i class="fas fa-align-justify"></i> Productos en Stock
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>Productos/Agotados">
                        <i class="fas fa-ban"></i> Productos Agotados
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#listados" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-align-justify"></i> Listados
            </a>
            <ul class="collapse list-unstyled" id="listados">
                <li>
                    <a href="<?=base_url()?>Productos/listado">
                        <i class="fab fa-facebook-square"></i> Listado Redes Sociales
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
        <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
    </ul>
</nav>



