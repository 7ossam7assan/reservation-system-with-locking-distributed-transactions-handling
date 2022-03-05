    <section>
        <?php foreach ($userArticleData as $article): ?>
            <a href="post?id=<?=$article->id?>" data-type="color-1">
                <div class="row">
                    <div class="card mb-3">
                        <img class="card-img-top" src="<?=$article->image?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?=$article->title?></h5>
                            <p class="card-text"><?=$article->description?></p>
                            <p class="card-text"><small class="text-muted"><?= 'Author: '.app()->session->get('user')[0]?></small></p>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach;?>
    </section>






