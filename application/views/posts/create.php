<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="postTitle">
</div>
<div class="form-group">
    <label>Content</label>
    <textarea class="form-control" name="postContent"></textarea>
</div>
<div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label>Upload Image</label>
    <input type="file" name="userfile" size="20">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>