<?php 
    include __DIR__.'/includes/header.php';
    
    session_start();
    if(!empty($_SESSION['user_logged_in'])){
        header("Location: contacts");
    }
?>
    
    <form id="login-form">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button type="submit">submit</button>
    </form>

<?php 
    include __DIR__.'/includes/footer.php';
    includeJSFiles(['login.js']);
?>