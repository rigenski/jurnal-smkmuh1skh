<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="/css/styles.css" rel="stylesheet" />
    <style>
        body {
            background-color: #0069D9;
        }
    </style>
    <script
      src="/js/all.min.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main><div class="wrapper" style="height: 100vh">
            <div class="container" style="height: 100vh">
              <div class="row justify-content-center my-auto align-content-center" style="height: 100vh">
                <div class="col-md-6 col-12">
                  <div class="card shadow-lg border-0 rounded-lg" class="text-center">
                  
                  <div class="card-header">
                    <h3 class="text-center my-4"><b>Login</b></h3>
                  </div>
                  <div class="card-body">
                    <form method="post" action="/admin/postLogin">
                      @csrf()
                      <div class="form-group">
                        <label class="small mb-1" for="email"
                          >Email</label
                        >
                        <input
                          class="form-control py-4 mt-2"
                          id="email"
                          type="email"
                          name="email"
                          placeholder="Enter email address"
                        />
                      </div>
                      <div class="form-group">
                        <label class="small mb-1" for="password"
                          >Password</label
                        >
                        <input
                          class="form-control py-4 mt-2"
                          id="password"
                          type="password"
                          name="password"
                          placeholder="Enter password"
                        />
                      </div>
                      <div
                        class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"
                      >
                        <button class="btn btn-primary col-6 py-2">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script
      src="/js/jquery-3.5.1.slim.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="/js/scripts.js"></script>
  </body>
</html>
