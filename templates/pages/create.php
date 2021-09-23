<?php 
  $categories = $params['categories'];
?>
<form action="/?action=create" method="post">
  <div class="form-group">
    <label for="articleTitle">Tytuł </label>
    <input type="text" class="form-control" name="articleTitle" placeholder="Wpisz nazwę artykułu">
  </div>
  <div class="form-group">
    <label for="articleDescription">Opis</label>
    <input type="textarea" class="form-control" name="articleDescription" placeholder="Wpisz opis">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="articleStatus">
    <label class="form-check-label" for="articleStatus">Czy aktywny?</label>
  </div>

  <div class="form-check">
    <label class="form-check-label" for="catName">Kategoria</label>
      <select name="catName">
        <option selected>--- WYBIERZ KATEGORIĘ ---</option>

          <?php foreach($categories as $category): ?>
              <option value="<?php echo $category['name']?>"> <?php echo $category['name']?> </option>
          <?php endforeach; ?>

      </select>
  </div>


  <button type="submit" class="btn btn-secondary">Zapisz</button>
</form>