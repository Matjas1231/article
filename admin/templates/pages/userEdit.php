<?php $user = $params['userParams'];?>
<form method="POST">
    <input name="username" type="text" value="<?php echo $user['username'] ?>" />
    <input name="isAdmin" type="checkbox" value="1" <?php echo (int) $user['is_admin'] === 1 ? 'checked' : '' ?> />
    <input name="userId" type="hidden" value="<?php echo $user['id'] ?>" />
    <button type="submit" class="btn btn-primary">Edytuj</button>
</form>