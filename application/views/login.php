<?php if ($this->session->flashdata('error')) echo "<p style='color:red'>" . $this->session->flashdata('error') . "</p>"; ?>
<form method="post" action="<?= site_url('login/auth') ?>">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>
