<!--JS Imports-->
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<?php
if($current_dir == "site"){
    echo '<script src="../assets/js/arctext.js"></script>';
    echo '<script src="../assets/js/home.js"></script>';
}
else if($current_dir == "user"){
    echo '<script src="../assets/js/user.js"></script>';
    echo '<script src="../assets/js/particle.min.js"></script>';
    echo '<script src="../assets/js/particles.config.json"></script>';
}
?>

</body>




</html>