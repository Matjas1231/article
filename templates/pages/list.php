<?php
    $page = $params['page'] ?? [];
    $size = $page['size'] ?? 15;
    $currentPage = $page['number'] ?? 1;
    $pages = $page['pages'] ?? 1;

    $sort = $params['sort'];
    $by = $sort['by'] ?? 'id';
    $order = $sort['order'] ?? 'asc';

    $phrase = $params['phrase'] ?? null; 
?>

<div style="margin-bottom: 10px;">
    <form action="/" method="GET">
        <div class="font-weight-bold">Ilość rekordów na stronę</div>
        <label>15 <input name="recordSize" type="radio" value="15" <?php echo $size === 15 ? 'checked' : '' ?>> </label>
        <label>50 <input name="recordSize" type="radio" value="50" <?php echo $size === 50 ? 'checked' : '' ?>> </label>
        <label>80 <input name="recordSize" type="radio" value="80" <?php echo $size === 80 ? 'checked' : '' ?>> </label>
        <label>100 <input name="recordSize" type="radio" value="100" <?php echo $size === 100 ? 'checked' : '' ?>> </label>

        <div class="font-weight-bold">Wyszukaj notatkę</div>
        <input type="text" name="phrase" value="<?php echo $phrase ?>"/>

        <div class="font-weight-bold">Sortowanie</div>
        <label>Po tytule <input type="radio" name="sortby" value='title' <?php echo $by === 'title' ? 'checked' : '' ?> /></label>
        <label>Po id <input type="radio" name="sortby" value="id" <?php echo $by === 'id' ? 'checked' : '' ?> /></label>
        <label>Po dacie utworzenia <input type="radio" name="sortby" value="created" <?php echo $by === 'created' ? 'checked' : '' ?> /></label>

        <div class="font-weight-bold">Kierunek sortowania</div>
        <label>Rosnąco<input type="radio" name="sortorder" value='asc' <?php echo $order === 'asc' ? 'checked' : '' ?> /></label>
        <label>Malejąco<input type="radio" name="sortorder" value='desc' <?php echo $order === 'desc' ? 'checked' : '' ?> /></label>


        </br><input type="submit" class="btn btn-secondary btn-sm" value="Wyślij" />
    </form>    
</div>
<?php if(!isset($_SESSION['username']) || empty($_SESSION['username'])): ?>
    <div style="text-align: center;" class="font-weight-bold">Treść tylko dla zalogowanych użytkowników <br>
    <a href="/?action=login" class="btn btn-secondary">Zaloguj</a></div>
    <?php else: ?>
<div>
    <table class="table table-striped " style="margin:auto;">
            <thead>
            <tr>
                <th class="text-center">Lp</th>
                <th class="text-center">Id artykułu</th>
                <th class="text-center">Tytuł artykułu</th>
                <th class="text-center">Czy aktywowany?</th>
                <th class="text-center">Data utworzenia</th>
                <th class="text-center">Nazwa kategorii</th>
                <th class="text-center">Akcja</th>
            </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                <?php foreach ($params['articles'] as $article): ?>
                    <tr>
                        <td class="text-center"> <b><?php echo (int) $i; ?></b> </td>
                        <td class="text-center"> <?php echo (int) $article['id']; ?> </td>
                        <td class="text-center"> <?php echo $article['title']; ?> </td>
                        <td class="text-center"> <?php echo (int) $article['status'] === 1 ? 'Tak': 'Nie'; ?> </td>
                        <td class="text-center"> <?php echo $article['created'] ?> </td>
                        <td class="text-center"> <?php echo $article['catName'] ?> </td>
                        <td class="text-center"> 
                            <a class="btn btn-primary" href="/?action=show&id=<?php echo (int) $article['id'] ?>">Pokaż</a>
                            <a class="btn btn-secondary" href="/?action=edit&id=<?php echo (int) $article['id'] ?>">Edytuj</a>
                            <a class="btn btn-danger" href="/?action=delete&id=<?php echo (int) $article['id'] ?>">Usuń</a>
                        </td>
                    </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
            </tbody>
    </table>
</div>

<div>
    <?php 
        $paginationUrl = "&recordSize=$size&phrase=$phrase&sortby=$by&sortorder=$order";
    ?>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if($currentPage !== 1): ?>
            <li class="page-item">
                <a class="page-link" href="/?page=<?php echo $currentPage - 1 . $paginationUrl ?>">
                <button class="btn btn-secondary" ><<</button>
                </a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $pages; $i++) : ?>
            <li class="page-item">
                <a class="page-link" href="/?page=<?php echo $i . $paginationUrl?>">
                <button><?php echo $i ?></button>
                </a>
            </li>
        <?php endfor; ?>
            <?php if($currentPage < $pages): ?>
                <li class="page-item">
                    <a class="page-link" href="/?page=<?php echo $currentPage + 1 . $paginationUrl?>">
                    <button class="btn btn-secondary btn-sm">>></button>
                    </a>
                </li>
            <?php endif; ?>
    </ul>
</nav>
</div>
<?php endif; ?>