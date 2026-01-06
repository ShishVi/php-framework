<div class="container">
   <!-- --><?php
/*    dump(session()->get("form_errors"));
    dump(session()->get("form_data"));
    */?>
    <h1><?=$title ?? 'Register page'?></h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="<?=base_url('/register')?>" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control <?=get_validation_class('name')?>" id="name" placeholder="Your Name" value="<?=old('name')?>">
                    <?=get_errors('name');?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control <?=get_validation_class('email')?>" id="email" placeholder="name@example.com" value="<?=old('email')?>">
                    <?=get_errors('email');?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control <?=get_validation_class('password')?>" id="password">
                    <?=get_errors('password');?>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm password</label>
                    <input name="confirmPassword" type="password" class="form-control <?=get_validation_class('confirmPassword')?>" id="confirmPassword">
                    <?=get_errors('confirmPassword');?>
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>

        </div>
    </div>
    <?php
    session()->remove("form_errors");
    session()->remove("form_data");
    ?>
</div>
