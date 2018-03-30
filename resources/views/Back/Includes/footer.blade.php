@section('footer')

    <footer class="main-footer">
        <strong>Copyright &copy; 2018 <a href=""> Blug<strong>Master</strong></a>.</strong> All rights
        reserved.
    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <!-- Bootstrap 3.3.7 -->
    <script src="{{URL::to('js/admin/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{URL::to('js/admin/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{URL::to('js/admin/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::to('js/admin/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::to('js/admin/demo.js')}}"></script>
    <!-- CK Editor -->
    <script src="{{URL::to('js/admin/ckeditor/ckeditor.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
{{--    <script src="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>--}}
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    </body>
    </html>
@endsection