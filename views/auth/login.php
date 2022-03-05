<?php if(app()->session->hasFlash('success')):?>
    <p class="has-text-success">
        <?= app()->session->getFlash('success'); ?>
    </p>
<?php endif; ?>
<form action="/login" method="post">
    <div class="row">
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
    <br>
    <button type="submit" class="btn btn-primary">Login</button>
</form>