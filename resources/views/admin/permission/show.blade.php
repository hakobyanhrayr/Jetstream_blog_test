@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="width: 60%;margin: auto">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Permission Show Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">Blank Page</li>--}}
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div  class="row mb-2 m-auto" style="width: 99%">
            @include('includes.messages')
        </div>
        <!-- Main content -->
        <section class="content" style="width: 60%;margin: auto">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Permission</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <a  href="{{route('permission.create')}}" type="button" class="btn btn-success">Add Permission</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>For</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($permissions as $permission)
                                     <tr>
                                         <td>{{ $permission->id }}</td>
                                         <td>{{ $permission->name }}</td>
                                         <td>{{ $permission->for }}</td>
                                         <td style="display: flex;justify-content: space-around;align-items: center">
                                             <a href="{{ route('permission.edit', $permission->id )}}">
                                                 <img src="{{asset('images/edit.svg')}}" style="width: 20px;">
                                             </a>
                                         </td>
                                         <td>
                                             <form action="{{ route('permission.destroy', $permission->id )}}" method="POST">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" style="border: none">
                                                     <img src="{{asset('images/trash.svg')}}" style="width: 20px;">
                                                 </button>
                                             </form>
                                         </td>
                                     </tr>
                                 @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>For</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
            </div>
        </section>
    </div>
    {{--    --------}}
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    --------
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
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

        (function() {
            var ws = new WebSocket('ws://' + window.location.host +
                '/jb-server-page?reloadMode=RELOAD_ON_SAVE&'+
                'referrer=' + encodeURIComponent(window.location.pathname));
            ws.onmessage = function (msg) {
                if (msg.data === 'reload') {
                    window.location.reload();
                }
                if (msg.data.startsWith('update-css ')) {
                    var messageId = msg.data.substring(11);
                    var links = document.getElementsByTagName('link');
                    for (var i = 0; i < links.length; i++) {
                        var link = links[i];
                        if (link.rel !== 'stylesheet') continue;
                        var clonedLink = link.cloneNode(true);
                        var newHref = link.href.replace(/(&|\?)jbUpdateLinksId=\d+/, "$1jbUpdateLinksId=" + messageId);
                        if (newHref !== link.href) {
                            clonedLink.href = newHref;
                        }
                        else {
                            var indexOfQuest = newHref.indexOf('?');
                            if (indexOfQuest >= 0) {
                                // to support ?foo#hash
                                clonedLink.href = newHref.substring(0, indexOfQuest + 1) + 'jbUpdateLinksId=' + messageId + '&' +
                                    newHref.substring(indexOfQuest + 1);
                            }
                            else {
                                clonedLink.href += '?' + 'jbUpdateLinksId=' + messageId;
                            }
                        }
                        link.replaceWith(clonedLink);
                    }
                }
            };
        })();
    </script>
@endsection
@section('footerSection')

@endsection
