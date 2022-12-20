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
                            <h1>Permission</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            </ol>
                        </div>
                    </div>
                     <div  class="row mb-2 col-lg-offset-3 col-lg-6 m-auto">
                         @include('includes.messages')
                     </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content col-lg-offset-3 col-lg-6 m-auto">
                <form class="form-group" action="{{route('permission.store')}}" method="POST" role="form">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Permission</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Permission</label>
                                <input type="text" name="name" class="form-control" id="permission" placeholder="permission">
                            </div>
                            <div class="form-group">
                                <label for="title">Permission For</label>
                                <select class="form-select m-auto"
                                        style="width: 100%;" data-select2-id="7" tabindex="-1" name="for">
                                        <option data-select2-id="36">Select Permission For</option>
                                        <option data-select2-id="36" value="user">User</option>
                                        <option data-select2-id="36" value="post">Post</option>
                                        <option data-select2-id="36" value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- Default box -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('permission.index')}}" type="button" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Summernote -->
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- CodeMirror -->
    <script src="../../plugins/codemirror/codemirror.js"></script>
    <script src="../../plugins/codemirror/mode/css/css.js"></script>
    <script src="../../plugins/codemirror/mode/xml/xml.js"></script>
    <script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endsection
