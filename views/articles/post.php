<?php if(app()->session->hasFlash('success')):?>
    <p class="has-text-success">
        <?= app()->session->getFlash('success'); ?>
    </p>
<?php endif; ?>
<h1>Publish Article</h1>
<form action="/post" method="post">
    <?php if (app()->session->has('user')) : ?>
    <input type="hidden" name="user_id" value='<?=app()->session->get('user')[1]?>' class="form-control" id="exampleFormControlInput1">
    <?php endif;?>
    <div class="form-group">
        <label for="exampleFormControlInput1">Article Title</label>
        <div class="control">
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                   value="<?= old('title'); ?>" >
        </div>
        <?php if(app()->session->hasFlash('errors')):?>
            <p class="has-text-danger">
                <?= app()->session->getFlash('errors')['title'][0]?>
            </p>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Article Image</label>
        <div class="control">
            <input type="text" name="image" class="form-control" id="exampleFormControlInput1"
                   value="<?= old('image'); ?>" >
        </div>
        <?php if(app()->session->hasFlash('errors')):?>
            <p class="has-text-danger">
                <?= app()->session->getFlash('errors')['image'][0]?>
            </p>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Post Description</label>
        <div class="control">
            <textarea class="form-control" name="description"  rows="3" cols="50" ><?= old('description'); ?></textarea>
            <?php if(app()->session->hasFlash('errors')):?>
                <p class="has-text-danger">
                    <?= app()->session->getFlash('errors')['description'][0]?>
                </p>
            <?php endif;?>
        </div>

    </div><br>
    <button type="submit" class="btn btn-primary">Post</button>
</form>