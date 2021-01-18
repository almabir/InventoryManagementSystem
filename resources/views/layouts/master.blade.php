<!DOCTYPE html>
<html>

@include('layouts.head')



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
@include('layouts.topbar')

@include('layouts.leftsidebar')

@yield('content')

@inclide('layouts.rightsidebar')

        </div>
        <!-- END wrapper -->

@include('layouts.scriptfoot')

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

        <script type='text/javascript'>
            function preview_image(event) 
            {
             var reader = new FileReader();
             reader.onload = function()
             {
              var output = document.getElementById('output_image');
              output.src = reader.result;
             }
             reader.readAsDataURL(event.target.files[0]);
            }
        </script>
        <!-- Toastr Custom -->
        <script type="text/javascript">
          @if(Session::has('message'))
          var type = "{{ Session::get('alert-type', 'info') }}"
          switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
          }
          @endif
        </script>

    </body>
</html>