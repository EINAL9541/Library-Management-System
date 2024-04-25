@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @if(session('message'))
  <div class="alert alert-default-info">
    {{ session('message') }}
  </div>
  @endif

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-3">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
              <div class="float-right">
                <a href="{{route('create-member')}}" class="btn btn-primary">Create</a>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($members as $member)

                  <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }} </td>
                    <td>{{ $member->age }}</td>
                    <td>{{ $member->address }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->expiry_date}}</td>
                    <td>
                      @php
                      $expiry_date = strtotime($member->expiry_date);
                      $today_date = strtotime(date("Y-m-d"));
                      @endphp
                      @if($member->status == 1)
                      <span class="badge badge-danger">Banned</span>
                      @elseif($expiry_date < $today_date) <span class="badge badge-warning">Expired</span>

                        @else
                        <span class="badge badge-success">Active</span>

                        @endif
                    </td>
                    <td>
                      <div class="d-flex align-items-center justify-content-center">

                        <a href=" {{ url("/admin/edit-member/$member->id") }}" class="btn btn-primary" style="height: 34px; margin:0 10px;">Edit</a>

                        @if($member->status == 1)

                        
                        <form method="POST" action="{{ url("/admin/unban-member/$member->id") }}" class="m-0">
                          @csrf
                          @method('PATCH')
                          <button class="btn btn-primary" style="height: 34px; margin:0 10px;">Unban</button>
                        </form>

                        @else

                        
                        <form method="POST" action="{{ url("/admin/ban-member/$member->id") }}" class="m-0">
                          @csrf
                          @method('PATCH')
                          <button class="btn btn-danger" style="height: 34px; margin:0 10px;">Ban</button>
                        </form>

                        @endif




                        <form method="POST" action="{{ url("/admin/delete-member/$member->id") }}" class="m-0">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-warning" style="height: 34px; margin:0 10px;">Delete</button>
                        </form>

                      </div>

                    </td>
                  </tr>
                  @endforeach

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->

<!-- /.control-sidebar -->
@endsection
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>