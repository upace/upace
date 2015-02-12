<script>
    Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    var currentUser = Parse.User.current();
    if (currentUser) {
        //window.location = 'equipment' ;
    }
    else
    {
        window.location = 'login';
    }
</script>
