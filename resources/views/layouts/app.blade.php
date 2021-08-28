<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jurnal Guru Mutuharjo</title>

    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap-datepicker.min.css')}}">
    <style>
        #form__title {
            font-size: 1.4rem;
        }

        #form__desc {
            font-size: 0.8rem;
        }


        @media screen and (min-width: 768px) {
            #form__title {
                font-size: 1.8rem;
            }

            #form__desc {
                font-size: 1rem;
            }

        }

        @media screen and (min-width: 992px) {
            #form__title {
                font-size: 2rem;
            }

            #form__desc {
                font-size: 1.2rem;
            }

        }

        @media screen and (min-width: 1200px) {
            #form__title {
                font-size: 2.6rem;
            }

            #form__desc {
                font-size: 1.4rem;
            }

        }
    </style>
</head>

<body class="">
    <div id="app" class="">
        @yield('main')
    </div>

    @yield('modal')
    
    <script src="{{ asset('/assets/js/lottie-player.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}">
    </script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('/assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/js/stisla.js') }}"></script>
    <script src="{{ asset('/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/assets/demo/datatables-demo.js')}}"></script>
    <script src="{{ asset('/assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(function() {
                $(".datepicker").datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                orientation: "bottom auto"
        });
        });

        $(document).ready(function(){
		    $('.data').DataTable();
	    });
    </script>

</body>

</html>