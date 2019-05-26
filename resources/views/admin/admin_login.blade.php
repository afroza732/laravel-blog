<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title>login</title>
        <link href="{{asset('public/admin_assets/css/style.css')}}" rel="stylesheet">
        <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            // Shared ID
            gtag('config', 'UA-118965717-3');
            // Bootstrap ID
            gtag('config', 'UA-118965717-5');
        </script>
    </head>
    <body class="app flex-row align-items-center">
        <div class="container">
            {!! Form::open(array('url' =>'/admin_login','method'=>'post')) !!}
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group">
                        <div class="card p-4">
                            <div class="card-body">
                                <h1>Login</h1>
                                <h3 align ="center" style="color: red; font-size: 13px">
                                    <?php
                                    $message = Session::get('exception');
                                    if (isset($message)) {
                                        echo $message;
                                        Session::put('exception', '');
                                    }
                                    ?> 
                                </h3>
                                <h3 align ="center" style="color: green; font-size: 13px">
                                    <?php
                                    $message = Session::get('message');
                                    if (isset($message)) {
                                        echo $message;
                                        Session::put('exception', '');
                                    }
                                    ?> 
                                </h3>

                                <p class="text-muted">Sign In to your account</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="email" placeholder="" name="admin_email">
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="Password" name="admin_password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="submit" class="btn btn-primary px-4" value="Log in" />
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}<!-- form -->
        </div>
    </body>
</html>
