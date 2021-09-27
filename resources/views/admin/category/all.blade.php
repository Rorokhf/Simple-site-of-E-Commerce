@extends('admin.app.app')


{{-- @section('card-color', 'success') --}}
@section('links')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('cont1')
    <div class="card card-danger">
        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card-header">
                <h3 class="card-title">Add new item</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        category
                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                            id="inputEmail4d" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="col-2">
                        status
                        <select name="status" id="inputStates" class="form-control @error('status') is-invalid @enderror">
                            <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Active</option>
                            <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Not Active</option>
                        </select>

                        @error('status')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        image

                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            >

                        @error('image')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col-4 p-4">
                        <button type="submit" id="add" class="btn btn-outline-success" name="add" value='add'>Add
                            category</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('content')

    <div class="col">
        <table id="example1" class="table table-bordered table-striped">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>category </th>
                    <th>image</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
                </form>
            </thead>
            <tbody>
                @foreach ($category as $key => $cat)
                    <tr class="">
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td> <div class="form-group col-md-3" >
                    <img class="img-thumbnail" src="{{asset('images/categories/'.$cat->image)}}" alt="{{$cat->name}}">
                </div></td>
                <td>{{ $cat->status }}</td>

                <td>
                    <form method="post" action="{{route('category.destroy',$cat->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="oldPhoto" id="" value="{{$cat->image}}">
                        <a class="btn btn-outline-success" href="{{ route('subCategory.show', $cat->id) }}">Add
                            subcategory</a>
                        <a class="btn btn-outline-warning" href="">Edit</a>

                        <button type="submit" class="btn btn-outline-danger"> Delete </button>
                        </form>
                        </td>

                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>
@endsection

@section('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
