<?php $article = $params['article'] ?? null ?>

<?php if ($article): ?>
    <ul>
        <li><b>Id:</b> <?php echo (int) $article['id'] ?></li>
        <li><b>Tytuł:</b> <?php echo $article['title'] ?></li>
        <li><b>Opis:</b> <?php echo $article['description'] ?></li>
        <li><b>Status - Czy aktywny?</b> <?php echo (int) $article['status'] === 1 ? 'Tak': 'Nie'; ?></li>                
        <li><b>Kategoria</b> <?php echo $article['catName'] ?></li>                
    </ul>
    <a href="/" class="btn btn-secondary">Powrót</a>
    <a href="/?action=edit&id=<?php echo $article['id'] ?>" class="btn btn-primary">Edytuj</a>
    <a href="/?action=delete&id=<?php echo $article['id'] ?>" class="btn btn-danger">Usuń</a>
<?php endif; ?>