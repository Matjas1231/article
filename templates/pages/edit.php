<?php
  $article = $params['article'];
  $categories = $params['categories'];
?>

<form action="/?action=edit&id=<?php echo (int) $article['id'] ?>" method="post">
  <div class="form-group">
      <input type="hidden" name="articleId" value="<?php echo $article['id'] ?>">
    <label for="articleTitle">Tytuł </label>
    <input type="text" class="form-control" name="articleTitle" value="<?php echo $article['title'] ?>">
  </div>
  <div class="form-group">
    <label for="articleDescription">Opis</label>
    <input type="textarea" class="form-control" name="articleDescription" value="<?php echo $article['description'] ?>">
  </div>
  <div class="form-check">
        <input type="checkbox" class="form-check-input" name="articleStatus" <?php if ((int)$article['status'] === 1) echo "checked='checked'"?>>
    <label class="form-check-label" for="articleStatus">Czy aktywny?</label>
  </div>

  <div class="form-check">
    <label class="form-check-label" for="catName">Kategoria</label>
      <select name="catName">
        <option selected value="<?php echo $article['catName'] ?>"><?php echo $article['catName'] ?></option>

          <?php foreach($categories as $category): ?>
            <?php if ($category['name'] === $article['catName']): ?>
              <?php continue; ?>
            <?php else: ?>
              <option value="<?php echo $category['name']?>"> <?php echo $category['name']?> </option>
            <?php endif; ?>
          <?php endforeach; ?>

      </select>
  </div>

  <button type="submit" class="btn btn-primary">Zapisz</button>
  <a href="/" class="btn btn-secondary">Powrót</a>
</form>