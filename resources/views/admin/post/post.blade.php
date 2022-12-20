@extends('admin.layouts.app')

@section('main-content')
    <div class="">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Post</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
{{--            --formStart----}}
         <form class="form-group">
             <section class="content">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Titles</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->

                     <div class="card-body">
                         <div class="form-group">
                             <label for="title">Post Title</label>
                             <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                         </div>
                         <div class="form-group">
                             <label for="subtitle">Post SubTitle</label>
                             <input type="text" name="subtitle" class="form-control" id="title" placeholder="SubTitle">
                         </div>
                         <div class="form-group">
                             <label for="slug">Post Slug</label>
                             <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                         </div>
                         <div class="custom-file mb-4" style="max-width: 180px">
                             <label class="custom-file-label" for="image">Choose file</label>
                             <input type="file" name="image" class="custom-file-input" id="image">
                         </div>
                         <div class="form-check ml-3">
                             <label class="form-check-label" for="status">
                                 <input type="checkbox" name="status" value="1">
                                 Publish
                             </label>

                         </div>
                     </div>
                     <!-- /.card-body -->
                 </div>
                 <!-- Default box -->
                 <div class="card">
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Write post body here</h3>
                         </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                         <!-- Main content -->
                         <section class="content">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="card card-outline card-info">
                                         <div class="card-header">
                                             <h3 class="card-title">
                                                 Summernote
                                             </h3>
                                         </div>
                                         <!-- /.card-header -->
                                         <div class="card-body">
                              <textarea id="summernote" name="body" class="textarea" style="width: 100%; height: 200px">
                                Place some text here
                              </textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- /.col-->
                             </div>
                         </section>
                     </div>
                 </div>
             </section>
             <div class="card-footer">
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>
         </form>
{{--              --formEnd----}}
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
