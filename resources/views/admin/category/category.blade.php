@extends('admin.layouts.app')


@section('main-content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 col-lg-offset-3 col-lg-6 m-auto">
                        <div class="col-sm-6">
                            <h1>Categories</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content col-lg-offset-3 col-lg-6 m-auto">
                <form class="form-group">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titles</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Category">Category Title</label>
                                <input type="text" name="category" class="form-control" id="Category" placeholder="Category">
                            </div>
                            <div class="form-group">
                                <label for="categorySlug">Category Slug</label>
                                <input type="text" name="categorySlug" class="form-control" id="categorySlug" placeholder="CategorySlug">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- Default box -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- CodeMirror -->
    <script src="{{asset('admin/plugins/codemirror/codemirror.js')}}"></script>
    <script src="{{asset('admin/plugins/codemirror/mode/css/css.js')}}"></script>
    <script src="{{asset('admin/plugins/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{asset('admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
    <!-- Page specific script -->
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
{{--    <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>--}}
{{--    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>--}}
{{--    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>--}}
{{--    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>--}}
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
