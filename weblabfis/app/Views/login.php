<!DOCTYPE html>
<html>
<head>
    <title>Login - Inventaris Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-warning text-center fw-bold">LOGIN SISTEM</div>
                    <div class="card-body">
                        <?php if(session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger small"><?= session()->getFlashdata('error'); ?></div>
                        <?php endif; ?>

                        <form action="/login/proses" method="post">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Masuk</button>
                            <a href="/" class="row justify-content-center">Kembali ke Beranda</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>