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
                <a href="{{route('create-book')}}" class="btn btn-primary">Create</a>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($books as $book)

                  <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }} </td>
                    <td><img src="{{ '/storage/'.$book->image }}" width="80px" height="80px" alt="tt"></td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->category->name }}</td>

                    <td>

                      @if($book->status == 1)
                      <span class="badge badge-success">Avaliable</span>

                      @else
                      <span class="badge badge-warning">Issue</span>

                      @endif
                    </td>

                    <td>
                      <div class="d-flex align-items-center justify-content-center">

                        @if($book->status == 1)

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="height: 34px; margin:0 10px;">Issue</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a member Id</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <form id="myform" method="POST" action="{{route('create-issue')}}">
                                  @csrf
                                  @method('POST')
                                  <div class="form-group">

                                    <input type="hidden" name="book_id" value="{{$book->id}}">

                                    <label for="autocomplete" class="col-form-label">Choose a Member Id or Name from this List:</label>
                                    <input list="browsers" id="autocomplete" class="form-control" name="member_id">
                                    <datalist id="browsers">
                                      @foreach ($members as $member)
                                      <option value="{{$member->id}}">{{$member->name}}</option>
                                      @endforeach 
                                    </datalist>


                                    @if ($errors->has("member_id"))
                                    <div class="text-danger">
                                      <li>
                                        {{ $errors->first('member_id') }}
                                      </li>
                                    </div>
                                    @endif

                                  </div>

                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" form="myform" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        @else
                        <button disabled class="btn btn-primary" style="height: 34px; margin:0 10px;">Issue</button>
                        @endif

                        <a href=" {{ url("/admin/edit-book/$book->id") }}" class="btn btn-primary" style="height: 34px; margin:0 10px;">Edit</a>

                        <form method="POST" action="{{ url("/admin/delete-book/$book->id") }}" class="m-0">
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