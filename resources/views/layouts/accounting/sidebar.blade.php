<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <a href="/" class="btn btn-success">
                <i class="ace-icon glyphicon glyphicon-th"></i>
            </a>

            <a href="/profile" class="btn btn-info">
                <i class="ace-icon fa fa-user"></i>
            </a>

            <a href="/setting" class="btn btn-warning">
                <i class="ace-icon fa fa-cogs"></i>
            </a>

            <a href="/logout" class="btn btn-danger">
                <i class="ace-icon fa fa-power-off"></i>
            </a>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="/inventory">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Inicio </span>
            </a>
        </li>
        

        <li class="{{ Request::is('warehouse/*') ? 'active open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-folder-open"></i>
                <span class="menu-text"> Productos </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{ Request::is('warehouse/product') ? 'active' : '' }}">
                    <a href="/warehouse/product">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Producto
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{{ Request::is('warehouse/category') ? 'active' : '' }}">
                    <a href="/warehouse/category">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Categoria
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ Request::is('warehouse/subcategory') ? 'active' : '' }}">
                    <a href="/warehouse/subcategory">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Subcategoria
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ Request::is('warehouse/unit') ? 'active' : '' }}">
                    <a href="/warehouse/unit">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Unidad
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('transaction/*') ? 'active open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-log-in"></i>
                <span class="menu-text"> Transacciones </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li>
                    <a href="/input/pu">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Solicitud de productos
                    </a>
                </li>
            
                <li>
                    <a href="/input/pu">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Ingreso de productos
                    </a>
                </li>
            
                <li>
                    <a href="/input/pu">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Egreso de productos
                    </a>
                </li>
           
                <li class="{{ Request::is('transaction/tranfer') ? 'active' : '' }}">
                    <a href="/transaction/tranfer">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Traspaso de productos
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li>
                    <a href="/input/pu">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Control de inventario
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('setting/*') ? 'active open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-log-out"></i>
                <span class="menu-text"> Configuración </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{ Request::is('setting/bussiness') ? 'active' : '' }}">
                    <a href="/setting/bussiness">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Empresa
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ Request::is('setting/branch-office') ? 'active' : '' }}">
                    <a href="/setting/branch-office">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sucursal
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="/warehouse/inventory">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Almacen
                    </a>
                </li>
                <li>
                    <a href="alerts.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Proveedores
                    </a>
                </li>
                <li>
                    <a href="alerts.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Clientes
                    </a>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>