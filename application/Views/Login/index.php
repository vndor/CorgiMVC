<!-- Begin page content -->
<main role="main" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:20px;">
        <p style="text-align:center;color:red;"><?php echo $corgi['message'] ?></p>
            <div class="card" style="margin-top:20px;">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="/index.php/login/auth" method="post">
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input type="text" id="username" class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>