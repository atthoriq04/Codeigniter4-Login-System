<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--FontAwesome-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <title>Login </title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center homepage mt-5">
            <div class="col col-md-6 pb-5 bt-3 text-center mt-5 " id="home">
                <h2>Login</h2>
                <div class="row   justify-content-center ">
                    <div class="col-md-8 mt-3">
                        <div class="p-2">
                            <?php
                            $errorsuser = session()->getFlashdata('user');
                            $errorpassword = session()->getFlashdata('password');
                            if (!empty($errorsuser)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    No User Found! Try Again!
                                </div>
                            <?php }
                            if (!empty($errorpassword)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Wrong password! Try Again!
                                </div>
                            <?php }
                            ?>
                            <form action="<?= base_url('Login/Process') ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control <?= ($validation->hasError('user')) ? 'is-invalid' : ''; ?> form-control-user" id="user" name="user" placeholder="User ID" value="">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        <?= $validation->getError('user'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control  <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> form-control-user" id="password" name="password" placeholder="Password">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>