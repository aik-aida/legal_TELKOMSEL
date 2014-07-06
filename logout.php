<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<!--<script type="text/javascript">
if (top.location != self.location) top.location = 'login.php'
</script>-->

<script type="text/javascript">
top.location = '../index.php';
</script>
