<h2 class="post-title"><?php echo $post['title']; ?></h2>
<div class="row">
    <div class="col-md-3 pull-left">
        <img src="<?php echo site_url('assets/images/posts/' . $post['post_image']); ?>" width="200px" height="200px">
    </div>
    <div class="col-md-9">
        <p class="post-date"><?php echo $post['created_at']; ?></p>
        <p class="post-body"><?php echo $post['body']; ?></p>
        <hr>
        <div class="row">
            <a class="btn btn-secondary pull-left" href="<?php echo base_url('posts/edit/' . $post['slug']); ?>">Edit</a>
            <?php echo form_open('posts/delete/' . $post['id']); ?>
            <input class="btn btn-danger" type="submit" value="Delete">
            </form>
        </div>
    </div>
</div>