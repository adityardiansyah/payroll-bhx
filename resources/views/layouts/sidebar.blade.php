<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
<div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
</div>
<div class="sidebar-brand-text mx-3">Si Kaya</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
<a class="nav-link" href="{{ route('home') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>
@if(Auth::user()->role_id === 1)
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
Master
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-user"></i>
    <span>Users</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <a class="collapse-item" href="{{ route('user.index') }}">User</a>
    <a class="collapse-item" href="{{ route('role.index') }}">Role</a>
    </div>
</div>
</li>


<li class="nav-item">
<a class="nav-link" href="{{ route('employee.index')}}">
    <i class="fas fa-fw fa-users"></i>
    <span>Pegawai</span></a>
</li>
    
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbsensi" aria-expanded="true" aria-controls="collapseAbsensi">
    <i class="fas fa-fw fa-check"></i>
    <span>Absensi / Lembur</span>
</a>
<div id="collapseAbsensi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <a class="collapse-item" href="{{ route('attendance.index')}}">Absensi Pegawai</a>
    <a class="collapse-item" href="{{ route('overtime.index')}}">Pengajuan Lembur</a>
    </div>
</div>
</li>
@endif
<!-- Divider -->
@if(Auth::user()->role_id === 2 || Auth::user()->role_id === 1)
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Information
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
<a class="nav-link" href="{{ route('payroll.index') }}">
    <i class="fas fa-fw fa-money-check-alt"></i>
    <span>Payroll</span></a>
</li>
@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>