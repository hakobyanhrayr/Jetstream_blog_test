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
                            <h1>Add Admin</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
{{--                                <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                                <li class="breadcrumb-item active">Blank Page</li>--}}
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
                <form class="form-group" action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Admin</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" name="name" class="form-control" id="username" placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label for="email">User Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="User Email">
                            </div>
                            <div class="form-group">
                                <label for="password">User Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="User Password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm_Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                       id="password_confirmation" placeholder="Confirm_Password">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="form-group">
                        <div class="checkbox ml-4 mb-2" class="col-lg-3">
                            <lable for="password_confirmation">Confirm Password</lable>
                            <lable>
                                <input type="checkbox" name="status"value="1">
                                  Status
                            </lable>
                        </div>
                    </div>
                    <!-- Default box -->
                    <div class="form-group" style="display: flex">
                        @foreach($roles as $role)
                            <div class="checkbox ml-4" class="col-lg-3">
                                <lable>
                                    <input type="checkbox" name="role[]" value="{{ $role->id }}">
                                      {{ $role->name }}
                                </lable>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{route('user.index')}}" type="button" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
{{--    <script src="../../plugins/jquery/jquery.min.js"></script>--}}
{{--    <!-- Bootstrap 4 -->--}}
{{--    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--    <!-- AdminLTE App -->--}}
{{--    <script src="../../dist/js/adminlte.min.js"></script>--}}
{{--    <!-- Summernote -->--}}
{{--    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>--}}
{{--    <!-- CodeMirror -->--}}
{{--    <script src="../../plugins/codemirror/codemirror.js"></script>--}}
{{--    <script src="../../plugins/codemirror/mode/css/css.js"></script>--}}
{{--    <script src="../../plugins/codemirror/mode/xml/xml.js"></script>--}}
{{--    <script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>--}}
{{--    <!-- AdminLTE for demo purposes -->--}}
{{--    <script src="../../dist/js/demo.js"></script>--}}
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
