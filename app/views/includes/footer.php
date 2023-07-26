</body>
<?php 
    $js_level_dir = !str_contains($_SERVER['REQUEST_URI'], 'page')? "../../" : "../";
    
    $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
    $server = $http . '://' . $_SERVER['SERVER_NAME'];
    $route = explode('/',$_SERVER['REQUEST_URI']);
    unset($route[count($route)-1]);
    unset($route[count($route)-1]);
?>

<script type="text/javascript" src="<?=$js_level_dir;?>assets/js/plugins/jquery/jquery-3.7.0.min.js"></script>
<script type="text/javascript" src="<?=$js_level_dir;?>assets/js/functions.js"> </script>
<script>
    const app_url = "<?= $server.implode('/',$route).'/'?>";
    const js_level_dir = "<?= $js_level_dir; ?>";
</script>

<?php
    function includeJSFiles($files) {
        $js_level_dir = !str_contains($_SERVER['REQUEST_URI'], 'page')? "../../" : "../";
        foreach($files as $file){ ?>
            <script type="text/javascript" src="<?=$js_level_dir;?>assets/js/<?=$file?>" > </script>
        <?php }
    }
?>
</html>