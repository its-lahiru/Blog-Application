<h1><?= $title ?></h1>

<?php foreach ($posts as $post) : ?>
    <h3 class="post-title"><?php echo $post['title']; ?></h3>

    <div class="row">
        <div class="col-md-3 pull-left">
            <img src="<?php echo site_url('assets/images/posts/' . $post['post_image']); ?>" width="200px" height="200px">
        </div>

        <div class="col-md-9">
            <p class="post-date"><?php echo $post['created_at']; ?> in <?php echo $post['name']; ?></p>
            <p class="post-body"><?php echo word_limiter($post['body'], 50); ?></p>
            <p><a class="btn btn-info" href="<?php echo site_url('/posts/' . $post['slug']); ?>">Read More</a></p>
        </div>
    </div>
<?php endforeach; ?>