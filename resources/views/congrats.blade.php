<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Jurnal Mengajar Guru</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
    <style>
        body {
            background-color: #e8f1ea;
        }
    </style>
</head>
<body>
    <div class="wrapper" style="height: 100vh">
        <div class="container" style="height: 100vh">
          <div class="row justify-content-center my-auto align-content-center" style="height: 100vh">
            <div class="col-md-8 col-lg-6 col-12">
              <div class="p-2 p-sm-4" class="text-center">
            
                
                    @if(session('status'))
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_oUXj84.json"  background="transparent"  speed="0.8"  style="width: 300px; height: 300px;" class="m-auto"  autoplay></lottie-player>
                        @else 
                        <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_Yy0jZt.json"  background="transparent"  speed="0.8"  style="width: 180px; height: 180px;"  class="mx-auto my-5"  autoplay></lottie-player>
                    @endif
                
                    @if(session('status'))
                    <h3 class="text-center text-success">
                        {{ 'Formulir Anda sudah terkirim'}}
                    </h3>
                        @else 
                    <h3 class="text-center text-danger">
                        {{ 'Isi formulir terlebih dahulu'}}
                    </h3>
                    @endif
                
                <div class="row my-4">
                    <div class="col-3"></div>
                    <a href="/" class="btn btn-primary col-6">
                        Kembali
                    </a>
                    <div class="col-3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>