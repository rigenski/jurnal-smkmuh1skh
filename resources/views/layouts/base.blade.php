<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jurnal Guru - SMK Muhammadiyah 1 Sukoharjo</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-datepicker.min.css')}}">
    <style>
        #form__title {
            font-size: 1.4rem;
        }

        #form__desc {
            font-size: 1rem;
        }


        @media screen and (min-width: 768px) {
            #form__title {
                font-size: 1.8rem;
            }

            #form__desc {
                font-size: 1.2rem;
            }

        }

        @media screen and (min-width: 992px) {
            #form__title {
                font-size: 2rem;
            }

            #form__desc {
                font-size: 1.4rem;
            }

        }

        @media screen and (min-width: 1200px) {
            #form__title {
                font-size: 2.6rem;
            }

            #form__desc {
                font-size: 1.8rem;
            }

        }

        /* Multi Select */

        .multiselect-container {
            padding: 0.75rem;
            height: 20rem;
            width: 16rem;
            overflow: scroll;
        }

        .multiselect-container li {
            margin-bottom: 0.5rem;
        }

        .multiselect-container li label {
            margin-bottom: 0;
        }

        .multiselect-container .multiselect-item.filter .input-group-btn {
            display: none;
        }

        /* activities */

        .activities .activity:before {
            display: none;
        }
    </style>
</head>

<body class="">
    <div id="app" class="">
        @yield('main')
    </div>

    @yield('modal')

    <script src="{{ asset('/js/lottie-player.js') }}"></script>
    <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/js/popper.min.js') }}">
    </script>
    <script src="{{ asset('/js/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('/js/moment.min.js') }}"></script>
    <script src="{{ asset('/js/stisla.js') }}"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('/js/bootstrap-multiselect.js')}}"></script>
    <script src="{{ asset('/js/chart.js')}}"></script>

    <script>
        $(document).ready(function(){
        $('.data').DataTable();

        $(".datepicker").datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                orientation: "bottom auto"
        });

        $('.multi-select').multiselect({
            enableClickableOptGroups: true,
            enableCollapsibleOptGroups: true,
            enableFiltering: true,
            includeSelectAllOption: true
        });


      });
    </script>
    @yield('script')

</body>

</html>