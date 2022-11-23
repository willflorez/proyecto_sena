<!doctype html>
<html lang="en">
<head>
    <title>Inventario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('Style_login/css/style.css') }}">
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Registro</h3>
                        <form method="POST" action="{{ route('register') }}" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control rounded-left" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control rounded-left" placeholder="Correo" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" id="password" name="password" class="form-control rounded-left" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control rounded-left" placeholder="Confirmar Contraseña" required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    
                                            </div>
                                            <div class="w-50 text-md-right">
                                            <a href="{{ route('login') }}">Regresar</a>
                                            </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Registrarme</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('Style_login/js/jquery.min.js')}}"></script>
    <script src="{{ asset('Style_login/js/popper.js')}}"></script>
    <script src="{{ asset('Style_login/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('Style_login/js/main.js')}}"></script>

</body>
</html>
