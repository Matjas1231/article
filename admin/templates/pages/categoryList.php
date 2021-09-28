<?php $categories = $params['categories']; ?>

<h1 class="mt-4">Kategorie artykułów</h1>
<div class="card mb-4">
    <div class="card-body">
        <form action = "/admin/?action=categoryList" method="POST">
            <input type="text" name="categoryName" />
            <button type="submit" class="btn btn-primary btn-sm">Dodaj nową kategorię</button>
        </form>
    </div>
</div>
<div class="card mb-12">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Lista kategorii
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Lp</th>
                    <th>Id</th>
                    <th>Nazwa kategorii</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Lp</th>
                    <th>Id</th>
                    <th>Nazwa kategorii</th>
                    <th>Akcja</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i=1 ;foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><a class="btn btn-primary" href="/admin/?action=categoryEdit&id=<?php echo (int) $category['id'] ?>">Edytuj</a></td>
                    </tr>
                <?php $i++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
