<!--JS Imports-->
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<?php
if($current_dir == "site"){
    echo '<script src="../assets/js/arctext.js"></script>';
    echo '<script src="../assets/js/home.js"></script>';
}
else if($current_dir == "user"){
    echo '<script src="../assets/js/particles.js"></script>';
    echo '<script src="../assets/js/user.js"></script>';
    echo '<script src="../assets/js/event-viewer.js"></script>';
    
    
}
?>

<!--Footer-->

<footer class="footer-distributed">
        <div class="row">
            <div class="col-md-2 hidden-sm"> </div>
			<div class="col-md-3 text-center footer-left">

                <h3>Connect with US!</h3>
                
				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook fa-2x "></i></a>
					<a href="#"><i class="fa fa-twitter fa-2x "></i></a>
					<a href="#"><i class="fa fa-linkedin fa-2x "></i></a>
					<a href="#"><i class="fa fa-github fa-2x "></i></a>

                </div>
                
                <p class="footer-company-name">Camp Niners &copy; 2017</p>

			</div>

			<div class="col-md-6 footer-right">

				<p style="font-size: 26px; margin-top:0px;">Contact Us</p>

				<form action="#" method="post">

					<input type="email" name="email" placeholder="Email" />
					<textarea name="message" placeholder="Message"></textarea>
					<button>Send</button>

				</form>

			</div>
        </div>
		</footer>




</body>




</html>