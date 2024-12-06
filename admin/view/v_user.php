<div class="table">
    <div class="title">
        <h1>Quản lý người dùng</h1>
    </div>
    <table id="userTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Vai trò</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($user)) { foreach ($user as $u) { ?>
            <tr>
                <td><?= $u['user_id'] ?></td>
                <td><?= $u['name'] ?></td>
                <td><?= $u['phone'] ?: 'Chưa có thông tin' ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['address'] ?: 'Chưa có thông tin' ?></td>
                <td><?= $u['vaitro'] == 1 ? 'Admin' : 'User' ?></td>
                <td>
                    <form action="?page=deleteuser" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')">
                        <input type="hidden" name="id" value="<?= $u['user_id'] ?>">
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        <?php }} ?>
    </tbody>
</table>
</div>
<?php if (isset($_GET['success'])) { ?>
    <div class="alert alert-success">Xóa người dùng thành công!</div>
<?php } elseif (isset($_GET['error'])) { ?>
    <div class="alert alert-danger">Xóa người dùng thất bại!</div>
<?php } ?>
<script>
    document.querySelectorAll('form[onsubmit]').forEach(form => {
    form.onsubmit = () => confirm('Bạn có chắc chắn muốn xóa người dùng này không?');
});

</script>