@extends ('admin.layouts.app')

@section ('content')
  <!-- partial:partials/_navbar.html -->
  @include('admin.layouts.navbar')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">

    <div class="main-panel">  
      <div class="content-wrapper">
        @yield('container')
      </div>
      <!-- content-wrapper ends -->
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  @endsection
