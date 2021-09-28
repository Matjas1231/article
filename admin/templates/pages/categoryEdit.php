<?php $category = $params['category']; ?>
<form method="POST">
    <input name="categoryName" type="text" value="<?php echo $category['name'] ?>" />
    <input name="categoryId" type="hidden" value="<?php echo $category['id'] ?>" />
    <button type="submit" class="btn btn-primary">Edytuj</button>
</form>