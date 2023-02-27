<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta
      name="description"
      content="SIM Sekolah - SMK Muhammadiyah 1 Sukoharjo"
      key="desc"
    />
    <meta
      property="og:title"
      content="SIM Sekolah - SMK Muhammadiyah 1 Sukoharjo"
    />
    <meta
      property="og:description"
      content="SIM Sekolah - SMK Muhammadiyah 1 Sukoharjo"
    />
    <title>Jurnal - SMK Muhammadiyah 1 Sukoharjo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      * {
        font-family: "Inter";
      }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-between">
      <div>
        @yield('main')
      </div>
      <footer class="w-full py-4 md:py-8">
        <div class="flex justify-center">
            <div class="container max-w-6xl px-4">
              <div class="flex justify-center">
                <p class="text-sm font-normal text-gray-600 text-center lg:text-base">&copy; Copyright - SMK Muhammadiyah 1 Sukoharjo</p>
              </div>
            </div>
          </div>
        </footer>
    </div>
  
  @yield('modal')
  @yield('script')
</body>
</html>