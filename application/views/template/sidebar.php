<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="#">KTA System</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="#">KTA</a>
  </div>
  <ul class="sidebar-menu">
    <?php if ($this->session->role == "Administrator") 
      {
    ?>
    <li class="menu-header">Dashboard</li>
    <li class="active"><a class="nav-link" href="<?php echo base_url('Dashboard')?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">Pages</li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Kelola Data</span></a>
      <ul class="dropdown-menu">
        <li class="nav-link"><a class="nav-link" href="<?php echo base_url('User')?>">User</a></li>
      </ul>
    </li>
    <li><a class="nav-link" href="<?php echo base_url('Caleg')?>"><i class="far fa-list-alt"></i> <span>List Caleg</span></a></li>
    <li><a class="nav-link" href="<?php echo base_url('Anggota')?>"><i class="fas fa-users"></i> <span>Daftar Nama Anggota</span></a></li>
    <li><a class="nav-link" href="<?php echo base_url('Anggota/cetakkartu')?>"><i class="fas fa-print"></i> <span>Cetak Kartu</span></a></li>
    <?php
      }
      elseif ($this->session->role == "Cabang")
      {
    ?>
    <li class="menu-header">Dashboard</li>
    <li class="active"><a class="nav-link" href="<?php echo base_url('Dashboard/cabang')?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">Pages</li>
    <li><a class="nav-link" href="<?php echo base_url('Anggota')?>"><i class="far fa-list-alt"></i> <span>Daftar Nama Anggota</span></a></li>
    <li><a class="nav-link" href="<?php echo base_url('Anggota/cetakkartu')?>"><i class="fas fa-print"></i> <span>Cetak Kartu</span></a></li>
    <?php
      }
      elseif ($this->session->role == "Pusat")
      {
    ?>
    <li class="menu-header">Pages</li>
    <li><a class="nav-link" href="<?php echo base_url('Caleg')?>"><i class="far fa-list-alt"></i> <span>List Caleg</span></a></li>
    <li><a class="nav-link" href="<?php echo base_url('Anggota')?>"><i class="fas fa-users"></i> <span>Daftar Nama Anggota</span></a></li>
    <?php
      } else {
    ?>
    <li class="menu-header">Pages</li>
    <li><a class="nav-link" href="<?php echo base_url('DataDiri')?>"><i class="fas fa-clipboard-list"></i> <span>Data Diri</span></a></li>
    <?php
      }
    ?>
  </ul>
</aside>