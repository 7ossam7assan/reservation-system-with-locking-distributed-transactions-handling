<?php if(app()->session->hasFlash('success')):?>
    <p class="has-text-success">
        <?= app()->session->getFlash('success'); ?>
    </p>
<?php endif; ?>
<h1>Create an account</h1>
<form action="/signup" method="post">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Full Name</label>
                <div class="control">
                    <input type="text" class="form-control" name="name"
                     value="<?= old('name'); ?>" >
                </div>
                    <?php if(app()->session->hasFlash('errors')):?>
                    <p class="has-text-danger">
                        <?= app()->session->getFlash('errors')['name'][0]?>
                    </p>
                    <?php endif;?>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Username</label>
                <div class="control">
                    <input type="text" class="form-control" name="username"
                      value="<?= old('username'); ?>"  >
                </div>
                <?php if(app()->session->hasFlash('errors')):?>
                    <p class="has-text-danger">
                        <?= app()->session->getFlash('errors')['username'][0]?>
                    </p>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <div class="control">
            <input type="text" class="form-control" name="email"
              value="<?= old('email'); ?>"   >
        </div>
        <?php if(app()->session->hasFlash('errors')):?>
            <p class="has-text-danger">
                <?= app()->session->getFlash('errors')['email'][0]?>
            </p>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label>Password</label>
        <div class="control">
            <input type="password" class="form-control" name="password">
        </div>
        <?php if(app()->session->hasFlash('errors')):?>
            <p class="has-text-danger">
                <?= app()->session->getFlash('errors')['password'][0]?>
            </p>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <div class="control">
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <?php if(app()->session->hasFlash('errors')):?>
            <p class="has-text-danger">
                <?= app()->session->getFlash('errors')['password_confirmation'][0]?>
            </p>
        <?php endif;?>
    </div> <br>
    <button type="submit" class="btn btn-primary">Register</button>
</form>