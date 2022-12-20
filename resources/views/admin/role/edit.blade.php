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
                            <h1>Role</h1>
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
                <form class="form-group" action="{{route('role.update', $role->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titles</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Role Title</label>
                                <input type="text"
                                       value="{{ $role->name }}"
                                       name="name" class="form-control" id="title" placeholder="Role">
                            </div>
                            <div style="display:flex;justify-content: space-around;width: 70%;">
                                <div class="form-check ml-2">
                                    <label class="form-check-label mb-2" for="name">
                                        <b>Post Permissions</b>
                                    </label>
                                    @foreach($permissions as $permission)
                                        @if($permission->for == 'post')
                                            <div class="form-check ml-2">
                                                <label class="form-check-label" for="name">
                                                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                           @foreach($role->permissions as $role_permit)
                                                               @if($role_permit->id == $permission->id)
                                                                   checked
                                                               @endif
                                                           @endforeach
                                                    >
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label mb-2" for="name">
                                        <b>User Permissions</b>
                                    </label>
                                    @foreach($permissions as $permission)
                                        @if($permission->for == 'user')
                                            <div class="form-check ml-2">
                                                <label class="form-check-label" for="name">
                                                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                           @foreach($role->permissions as $role_permit)
                                                               @if($role_permit->id == $permission->id)
                                                                   checked
                                                        @endif
                                                        @endforeach
                                                    >
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label mb-2" for="name">
                                        <b>Other Permissions</b>
                                    </label>
                                    @foreach($permissions as $permission)
                                        @if($permission->for == 'other')
                                            <div class="form-check ml-2">
                                                <label class="form-check-label" for="name">
                                                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                           @foreach($role->permissions as $role_permit)
                                                               @if($role_permit->id == $permission->id)
                                                                   checked
                                                        @endif
                                                        @endforeach
                                                    >
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- Default box -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('role.index')}}" type="button" class="btn btn-warning">Back</a>
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
