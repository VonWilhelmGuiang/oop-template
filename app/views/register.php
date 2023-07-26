<?php
    include __DIR__.'/includes/header.php';
?>

    <form id="registration-form">
        <input type="text" name="first_name" id="first_name" placeholder="first_name">
        <input type="text" name="last_name" id="last_name" placeholder="last_name">
        <input type="text" name="middle_name" id="middle_name" placeholder="middle_name">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="password_confirm" placeholder="confirm password">
        <button type="submit">Register</button>
    </form>

<?php 
    include __DIR__.'/includes/footer.php';
    includeJSFiles(['register.js']);
?>