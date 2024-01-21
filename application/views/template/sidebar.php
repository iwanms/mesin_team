<?php (get_photo_user($this->session->userdata("id")) == "") ? $image ="default.png": $image = get_photo_user($this->session->userdata("id"))?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/upload/profile/<?= $image ?>" class="img-circle" alt="User Image" style="height:40px;">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata("full_name")?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?=base_url()?>dashboard" title="Dashboard" class="menuclick" tree-view="no"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

        <li><a href="<?=base_url()?>account" title="Account" class="menuclick" tree-view="no"><i class="fa fa-user"></i> <span>Account</span></a></li>

        <li class="treeview" title="Mesin">
          <a href="#">
            <i class="fa fa-th"></i> <span>Master Mesin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?=base_url()?>mesin" title="Mesin" class="menuclick" tree-view="yes"><i class="fa fa-users"></i> <span>Master Mesin</span></a></li>
          </ul>
        </li>

        <?php if($this->session->userdata("role") == "Admin"): ?>
            <li><a href="<?=base_url()?>user" title="User" class="menuclick" tree-view="no"><i class="fa fa-users"></i> <span>Master User</span></a></li>
          <?php endif;?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>