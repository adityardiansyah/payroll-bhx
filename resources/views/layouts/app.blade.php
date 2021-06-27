<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title') - PT. Mekar Jaya</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('../assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('../assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../assets/vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../assets/vendor/select2/dist/css/select2.css') }}" rel="stylesheet">

  @stack('css')
  <style>
    .select2{
      width: 100%!important;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        @include('layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layouts.topbar')
        <!-- End of Topbar -->

        @yield('content')

        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{ date('Y') }} by Aditya Ardiansyah</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('../assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('../assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('../assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('../assets/js/sb-admin-2.min.js') }}"></script>
  
  <!-- Page level plugins -->
  <script src="{{ asset('../assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('../assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('../assets/vendor/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('../assets/vendor/select2/dist/js/select2.full.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('../assets/js/demo/datatables-demo.js') }}"></script>
  @stack('js')

  @if(Session::has('message'))
    @php
        $message = Session::get('message');
    @endphp
    <script>
      Swal.fire({
        position: 'center',
        type: "{{ $message['type'] }}",
        title: "{{ $message['content'] }}",
        showConfirmButton: false,
        timer: 2000
      })
    </script>
  @endif
  <script>
    $('.select2').select2()
    function deleteData(id, target='delete_form'){
        Swal.fire({
            title: 'Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $('#delete_id').val(id)
                $('#'+target).submit();
            }
        });
    }
  </script>
</body>

</html>