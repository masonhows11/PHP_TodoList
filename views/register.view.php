<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Login / Register</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container  mt-5 mb-5">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form>


                <div class="mb-3">
                    <label for="name" class="form-label">User name</label>
                    <input type="text" class="form-control" id="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>

                <button type="submit" class="btn btn-primary">register</button>
            </form>
        </div>
    </div>


</div>
<!-- partial -->
<script src='<?= BASE_URL ?>/assets/js/jquery-3.5.1.min.js'></script>
<script src='<?= BASE_URL ?>/assets/js/bootstrap.bundle.min.js'></script>
<script src="<?= BASE_URL ?>/assets/js/script.js"></script>

</body>
</html>


