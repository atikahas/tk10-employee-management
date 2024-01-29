<!DOCTYPE html>
<html lang="en">
<head>
    <title>AGA Office</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{url('')}}/softui/img/logo/logo.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('')}}/softui/img/logo/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{url('')}}/softui/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="{{url('')}}/softui/assets/css/nucleo-svg.css" rel="stylesheet">
    <link href="{{url('')}}/softui/css/soft-ui-dashboard.css" rel="stylesheet">
    <link href="{{url('')}}/softui/assets/css/soft-ui-dashboard.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>

<body class="g-sidenav-show  bg-gray-100 ">
    <main class="main-content max-height-vh-100 h-100">
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-start">
                                        <h4 class="font-weight-bolder">Sign In</h4>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" name="password" required autocomplete="current-password">
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-dark h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                                    <img src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                                    <div class="position-relative">
                                        <img class="max-width-500 w-100 position-relative z-index-2" src="{{url('')}}/softui/img/logo/AGA-w.png" alt="chat-img">
                                    </div>
                                    <h4 class="mt-5 text-white font-weight-bolder">"Strategic Affairs"</h4>
                                    <p class="text-white">Seamlessly Connect to Your Employee Management Portal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </main>

    <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/core/popper.min.js"></script>
    <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/core/bootstrap.min.js"></script>
    <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/jkanban/jkanban.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://soft-ui-dashboard-pro-laravel.creative-tim.com/assets/js/soft-ui-dashboard.min.js?v=1.0.4"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"84b7b27bbc8c7554","version":"2024.1.0","token":"1b7cbb72744b40c580f8633c6b62637e"}' crossorigin="anonymous"></script>
</body>
</html>
