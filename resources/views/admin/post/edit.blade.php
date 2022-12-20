@extends('admin.layouts.app')

{{--@section('headSection')--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">--}}
{{--    <!-- daterange picker -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/daterangepicker/daterangepicker.css')}}">--}}
{{--    <!-- iCheck for checkboxes and radio inputs -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">--}}
{{--    <!-- Bootstrap Color Picker -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">--}}
{{--    <!-- Tempusdominus Bootstrap 4 -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">--}}
{{--    <!-- Select2 -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/select2/css/select2.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">--}}
{{--    <!-- Bootstrap4 Duallistbox -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">--}}
{{--    <!-- BS Stepper -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/bs-stepper/css/bs-stepper.min.css')}}">--}}
{{--    <!-- dropzonejs -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//plugins/dropzone/min/dropzone.min.css')}}">--}}
{{--    <!-- Theme style -->--}}
{{--    <link rel="stylesheet" href="{{asset('admin//dist/css/adminlte.min.css')}}">--}}
{{--@endsection--}}

@section('main-content')
    <div class="wrapper">
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
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            {{--            --formStart----}}

            <form class="form-group"  method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <section class="content">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titles</h3>
                        </div>
                        @include('includes.messages')
                        <div class="box-wrap col-lg-12" style="display: flex">
                            <div class="box-items col-lg-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text"
                                               value="{{ $post->title }}"
                                               name="title" class="form-control" id="title" placeholder="Title">
                                        {{-- <span>@error('title'){{$message}}</span>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Post SubTitle</label>
                                        <input type="text"
                                               value="{{ $post->subtitle }}"
                                               name="subtitle" class="form-control" id="title" placeholder="SubTitle">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Post Slug</label>
                                        <input type="text"
                                               value="{{ $post->slug }}"
                                               name="slug" class="form-control" id="slug" placeholder="Slug">
                                    </div>
                                </div>
                            </div>
                            <div class="box-items col-lg-6">
                                <div class="custom-file mb-3 mt-5" style="max-width: 180px">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    <input type="file"
                                           value="{{ $post->image }}"
                                           name="image" class="custom-file-input" id="image">
                                </div>
                                <div class="form-check">
                                    {{-- <input type="checkbox" name="publish" class="form-check-input" id="publish">--}}
                                    <label class="form-check-label" for="status">
                                        <input type="checkbox" name="status" value="1" @if($post->status == 1)
                                            {{'checked'}}
                                                @endif>
                                        Publish
                                    </label>
                                </div>
                                <div class="form-group p-2" data-select2-id="29">
                                    <label class="pl-3">Tag</label>
                                    <select class="form-select m-auto"
                                            style="width: 100%;" data-select1-id="7" tabindex="-1" name="tags">
                                        @foreach($tags as $tag)
                                            <option data-select2-id="36"
                                                    value="{{$tag->id}}"
                                             @foreach($post->tags as $postTag)
                                                 @if($postTag->id == $tag->id)
                                                     selected
                                                     @endif
                                             @endforeach
                                            >
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group p-2" data-select2-id="29">
                                    <label class="pl-3">Category</label>
                                    <select class="form-select m-auto"
                                            style="width: 100%;" data-select2-id="7" tabindex="-1" name="categories">
                                        @foreach($categories as $category)
                                            <option data-select2-id="36"
                                                    value="{{ $category->id }}"
                                                    @foreach($post->categories as $categoryTag)
                                                        @if($categoryTag->id == $category->id)
                                                            selected
                                                    @endif
                                                    @endforeach
                                            >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- /.card-body -->
                    </div>
                    <!-- Default box -->
                    <div class="card">
{{--                        --------------}}
{{--                        --------------}}
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
                                              <textarea id="summernote" name="body" class="textarea"  rows="15" placeholder="Place some text here" style="resize: none;outline: none;width: 98%">
                                                         {{$post->body}}
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
                    <a href="{{route('post.index')}}" type="button" class="btn btn-warning">Back</a>
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


    {{--    // -------------}}
    {{--    <!-- jQuery -->--}}
    {{--    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>--}}
    {{--    <!-- Bootstrap 4 -->--}}
    {{--    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
    {{--    <!-- Select2 -->--}}
    {{--    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>--}}
    {{--    <!-- Bootstrap4 Duallistbox -->--}}
    {{--    <script src="{{asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>--}}
    {{--    <!-- InputMask -->--}}
    {{--    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/plugins/inputmask/jquery.inputmask.min.js')}}"></script>--}}
    {{--    <!-- date-range-picker -->--}}
    {{--    <script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>--}}
    {{--    <!-- bootstrap color picker -->--}}
    {{--    <script src="{{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>--}}
    {{--    <!-- Tempusdominus Bootstrap 4 -->--}}
    {{--    <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>--}}
    {{--    <!-- Bootstrap Switch -->--}}
    {{--    <script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>--}}
    {{--    <!-- BS-Stepper -->--}}
    {{--    <script src="{{asset('admin/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>--}}
    {{--    <!-- dropzonejs -->--}}
    {{--    <script src="{{asset('admin/plugins/dropzone/min/dropzone.min.js')}}"></script>--}}
    {{--    <!-- AdminLTE App -->--}}
    {{--    <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>--}}
    {{--    <!-- AdminLTE for demo purposes -->--}}
    {{--    <script src="{{asset('admin/dist/js/demo.js')}}"></script>--}}
    {{--    <!-- Page specific script -->--}}

    {{--<script>--}}
    {{--    $(function () {--}}
    {{--        //Initialize Select2 Elements--}}
    {{--        $('.select2').select2()--}}

    {{--        //Initialize Select2 Elements--}}
    {{--        $('.select2bs4').select2({--}}
    {{--            theme: 'bootstrap4'--}}
    {{--        })--}}

    {{--        //Datemask dd/mm/yyyy--}}
    {{--        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })--}}
    {{--        //Datemask2 mm/dd/yyyy--}}
    {{--        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })--}}
    {{--        //Money Euro--}}
    {{--        $('[data-mask]').inputmask()--}}

    {{--        //Date picker--}}
    {{--        $('#reservationdate').datetimepicker({--}}
    {{--            format: 'L'--}}
    {{--        });--}}

    {{--        //Date and time picker--}}
    {{--        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });--}}

    {{--        //Date range picker--}}
    {{--        $('#reservation').daterangepicker()--}}
    {{--        //Date range picker with time picker--}}
    {{--        $('#reservationtime').daterangepicker({--}}
    {{--            timePicker: true,--}}
    {{--            timePickerIncrement: 30,--}}
    {{--            locale: {--}}
    {{--                format: 'MM/DD/YYYY hh:mm A'--}}
    {{--            }--}}
    {{--        })--}}
    {{--        //Date range as a button--}}
    {{--        $('#daterange-btn').daterangepicker(--}}
    {{--            {--}}
    {{--                ranges   : {--}}
    {{--                    'Today'       : [moment(), moment()],--}}
    {{--                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],--}}
    {{--                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],--}}
    {{--                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],--}}
    {{--                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],--}}
    {{--                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]--}}
    {{--                },--}}
    {{--                startDate: moment().subtract(29, 'days'),--}}
    {{--                endDate  : moment()--}}
    {{--            },--}}
    {{--            function (start, end) {--}}
    {{--                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))--}}
    {{--            }--}}
    {{--        )--}}

    {{--        //Timepicker--}}
    {{--        $('#timepicker').datetimepicker({--}}
    {{--            format: 'LT'--}}
    {{--        })--}}

    {{--        //Bootstrap Duallistbox--}}
    {{--        $('.duallistbox').bootstrapDualListbox()--}}

    {{--        //Colorpicker--}}
    {{--        $('.my-colorpicker1').colorpicker()--}}
    {{--        //color picker with addon--}}
    {{--        $('.my-colorpicker2').colorpicker()--}}

    {{--        $('.my-colorpicker2').on('colorpickerChange', function(event) {--}}
    {{--            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());--}}
    {{--        })--}}

    {{--        $("input[data-bootstrap-switch]").each(function(){--}}
    {{--            $(this).bootstrapSwitch('state', $(this).prop('checked'));--}}
    {{--        })--}}

    {{--    })--}}
    {{--    // BS-Stepper Init--}}
    {{--    document.addEventListener('DOMContentLoaded', function () {--}}
    {{--        window.stepper = new Stepper(document.querySelector('.bs-stepper'))--}}
    {{--    })--}}

    {{--    // DropzoneJS Demo Code Start--}}
    {{--    Dropzone.autoDiscover = false--}}

    {{--    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument--}}
    {{--    var previewNode = document.querySelector("#template")--}}
    {{--    previewNode.id = ""--}}
    {{--    var previewTemplate = previewNode.parentNode.innerHTML--}}
    {{--    previewNode.parentNode.removeChild(previewNode)--}}

    {{--    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone--}}
    {{--        url: "/target-url", // Set the url--}}
    {{--        thumbnailWidth: 80,--}}
    {{--        thumbnailHeight: 80,--}}
    {{--        parallelUploads: 20,--}}
    {{--        previewTemplate: previewTemplate,--}}
    {{--        autoQueue: false, // Make sure the files aren't queued until manually added--}}
    {{--        previewsContainer: "#previews", // Define the container to display the previews--}}
    {{--        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.--}}
    {{--    })--}}

    {{--    myDropzone.on("addedfile", function(file) {--}}
    {{--        // Hookup the start button--}}
    {{--        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }--}}
    {{--    })--}}

    {{--    // Update the total progress bar--}}
    {{--    myDropzone.on("totaluploadprogress", function(progress) {--}}
    {{--        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"--}}
    {{--    })--}}

    {{--    myDropzone.on("sending", function(file) {--}}
    {{--        // Show the total progress bar when upload starts--}}
    {{--        document.querySelector("#total-progress").style.opacity = "1"--}}
    {{--        // And disable the start button--}}
    {{--        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")--}}
    {{--    })--}}

    {{--    // Hide the total progress bar when nothing's uploading anymore--}}
    {{--    myDropzone.on("queuecomplete", function(progress) {--}}
    {{--        document.querySelector("#total-progress").style.opacity = "0"--}}
    {{--    })--}}

    {{--    // Setup the buttons for all transfers--}}
    {{--    // The "add files" button doesn't need to be setup because the config--}}
    {{--    // `clickable` has already been specified.--}}
    {{--    document.querySelector("#actions .start").onclick = function() {--}}
    {{--        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))--}}
    {{--    }--}}
    {{--    document.querySelector("#actions .cancel").onclick = function() {--}}
    {{--        myDropzone.removeAllFiles(true)--}}
    {{--    }--}}
    {{--    // DropzoneJS Demo Code End--}}
    {{--</script>--}}
        // -----------
    </script>
@endsection
