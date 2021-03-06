<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun Sebagai Admin</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/register') ?> ">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_pengguna" name="nama_pengguna" placeholder="Full Name" value="<?php echo set_value('nama_pengguna') ?>">
                                <?php echo form_error('nama_pengguna', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?php echo set_value('email') ?>">
                                <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="pass1" name="pass1" placeholder="Password">
                                    <?php echo form_error('pass1', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="pass2" name="pass2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo set_value('alamat') ?>">
                                <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Nomor Telepon" value="<?php echo set_value('NoTelp') ?>">
                                <?php echo form_error('no_telp', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>

                        </form>
                        <hr>
                        <!--<div class="text-center">-->
                        <!--    <a class="small" href="<?= base_url('Auth/Forgot_Password')?>">Forgot Password?</a>-->
                        <!--</div>-->
                        <div class="text-center">
                            <a class="small" href="<?= base_url('Auth') ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>