<?php $users = $params['users']; ?>

<h1 class="mt-4">Użytkownicy</h1>
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
        Lista użytkowników
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Lp</th>
                    <th>Id</th>
                    <th>Nazwa użytkownika</th>
                    <th>Administrator</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Lp</th>
                    <th>Id</th>
                    <th>Nazwa użytkownika</th>
                    <th>Administrator</th>
                    <th>Akcja</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i=1 ;foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['is_admin'] == 1 ? 'Tak' : 'Nie'; ?></td>
                        <td><a class="btn btn-primary" href="/admin/?action=userEdit&id=<?php echo (int) $user['id'] ?>">Edytuj</a></td>
                    </tr>
                <?php $i++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
