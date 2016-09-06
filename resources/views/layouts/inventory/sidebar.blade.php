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
        <li class="{{ Request::is('inventory') ? 'active' : '' }}">
            <a href="/inventory">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Inicio </span>
            </a>
        </li>
        
        <li class="{{ Request::is('inventory/product') ? 'active' : '' }}">
            <a href="/inventory/product">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Productos </span>
            </a>
        </li>
        <li class="{{ Request::is('inventory/transaction/*') ? 'active open' : '' }}">
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
            
                <li class="{{ Request::is('inventory/transaction/entry') ? 'active' : '' }}">
                    <a href="/inventory/transaction/entry">
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
           
                <li class="{{ Request::is('inventory/transaction/tranfer') ? 'active' : '' }}">
                    <a href="/inventory/transaction/tranfer">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Traspaso de productos
                    </a>
                </li>
                <li>
                    <a href="/input/pu">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Control de inventario
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('inventory/setting/*') ? 'active open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon glyphicon glyphicon-log-out"></i>
                <span class="menu-text"> Configuración </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{ Request::is('inventory/setting/unit') ? 'active' : '' }}">
                    <a href="/inventory/setting/unit">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Unidad
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ Request::is('inventory/setting/category') ? 'active' : '' }}">
                    <a href="/inventory/setting/category">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Categoria
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ Request::is('inventory/setting/subcategory') ? 'active' : '' }}">
                    <a href="/inventory/setting/subcategory">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Subcategoria
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ Request::is('inventory/setting/provider') ? 'active' : '' }}">
                    <a href="/inventory/setting/provider">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Proveedores
                    </a>
                </li>
                <li class="{{ Request::is('inventory/setting/client') ? 'active' : '' }}">
                    <a href="/inventory/setting/client">
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