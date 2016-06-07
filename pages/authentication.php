<!-- ========================================= MAIN ========================================= -->
<main id="authentication" class="inner-bottom-md">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6">
				<section class="section sign-in inner-right-xs">
					<h2 class="bordered">Sign In</h2>
					<p>Hello, Welcome to your account</p>

					<div class="social-auth-buttons">
						<div class="row">
							<div class="col-md-6">
								<button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
							</div>
							<div class="col-md-6">
								<button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
							</div>
						</div>
					</div>

					<form role="form" id="login" class="login-form cf-style-1">
						<div class="field-row">
                            <label>UserName</label>
                            <input id="username" type="text" class="le-input">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>Password</label>
                            <input id="password" type="password" class="le-input">
                        </div><!-- /.field-row -->

                        <div class="field-row clearfix">
                        	<span class="pull-left">
                        		<label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Remember me</span></label>
                        	</span>
                        	<span class="pull-right">
                        		<a href="#" class="content-color bold">Forgotten Password ?</a>
                        	</span>
                        </div>
                        <div id="resualts"></div>
                        <div class="buttons-holder">
                            <label class="le-button huge" onclick="login()">Sign In</label>
                        </div><!-- /.buttons-holder -->
					</form><!-- /.cf-style-1 -->

				</section><!-- /.sign-in -->
			</div><!-- /.col -->

			<div class="col-md-6">
				<section class="section register inner-left-xs">
					<h2 class="bordered">Create New Account</h2>
					<p>Create your own Media Center account</p>
					<form role="form" class="register-form cf-style-1" id="register">
						<div class="field-row">
                            <label>Email</label>
                            <input id="email" type="text" class="le-input" name="email">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>username</label>
                            <input id="username" type="text" class="le-input" name="username">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>password</label>
                            <input id="password" type="password" class="le-input" name="password">
                        </div><!-- /.field-row -->

                        <div id="resualts"></div>
                        <div class="buttons-holder">
                            <label type="submit" class="le-button huge" onclick="register()">Sign Up</label>
                        </div><!-- /.buttons-holder -->
					</form>

					<h2 class="semi-bold">Sign up today and you'll be able to :</h2>

					<ul class="list-unstyled list-benefits">
						<li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
						<li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
						<li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
					</ul>

				</section><!-- /.register -->

			</div><!-- /.col -->

		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- /.authentication -->
<!-- ========================================= MAIN : END ========================================= -->