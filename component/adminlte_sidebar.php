<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nome']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Gerenciar</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/users.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            <li><a href="/CountUsers.php"><i class="fa fa-circle-o"></i> Quantidade de usuarios</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-users"></i> <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="/Clients.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
            <li ><a href="/ClientRegister.php"><i class="fa fa-circle-o"></i> Cadastro de clientes</a></li>
            <li><a href="/index.php"><i class="fa fa-circle-o"></i> Quantidade de clientes</a></li>
          </ul>
        </li>

        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>