<!--JS Imports-->
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<?php
if($current_dir == "site"){
    echo '<script src="../assets/js/arctext.js"></script>';
    echo '<script src="../assets/js/home.js"></script>';

}
else if($current_dir == "user"){
    #echo '<script src="../assets/js/particles.js"></script>';
    echo '<script src="../assets/js/user.js"></script>';
	echo '<script src="../assets/js/signin.js"></script>';
	echo '<script src="../assets/js/profile.js"></script>';
    
    
}
else if($current_dir == "admin"){
	echo '<script src="../assets/js/admin-page.js"></script>';
}
?>

<!--Footer-->

<footer class="footer-distributed">
        <div class="row">
            <div class="col-md-4 hidden-sm"> </div>
			<div class="col-md-4 text-center footer-left">

                <h3>Connect with US!</h3>
                
				<div class="footer-icons">

					<a href="www.facebook.com"><i class="fa fa-facebook fa-2x "></i></a>
					<a href="www.twitter.com"><i class="fa fa-twitter fa-2x "></i></a>
					<a href="wwww.linkedin.com"><i class="fa fa-linkedin fa-2x "></i></a>
					<a href="https://github.com/amieczko/itis3105_final"><i class="fa fa-github fa-2x "></i></a>

                </div>
                
                <p class="footer-company-name">Camp Niners &copy; 2017</p>

			</div>

		
        </div>
		</footer>




</body>




</html>