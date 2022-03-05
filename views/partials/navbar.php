<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if(app()->session->has('user')):?>
                    <li class="nav-item">
                        <a class="nav-link" href="/post/create">Add Entry</a>
                    </li>
                <?php endif;?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <?php if(!app()->session->has('user')):?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/login">Login</a>
                </li>
                <?php endif;?>
                <?php if(app()->session->has('user')):?>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">logout</a>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>
