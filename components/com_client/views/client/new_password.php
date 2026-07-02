<?php $banner = $page->getPhoto() == "" ? "images/banner.jpg" : "images/pages/".$page->getPhoto(); ?>

<!-- Page Title -->
<div class="banner">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $page->getTitre(); ?>">
	</div>
	<div class="title-box">
	<h1 class="banner-title"><?php echo $page->getTitre(); ?></h1>
	</div>	
</div> 

<section>
	<div class="container">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $page->getTitre(); ?></li>
		  </ol>
		</nav>
	</div>
</section>

  <!--========================================================
                          BLOG
  =========================================================-->
  <section class="page-template page-blog">
    <div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12"><?php echo $page->getTexte(); ?></div>
			<div class="col-sm-12">
            </div>
            <div class="col-sm-6">
                <h3 align="center">Create a New Password</h3>
                <p align="center">Enter a Strong Password to Secure Your Account</p>
                <form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=setNewPasswordApi"  id="setNewPasswordApiForm" method="post" class="formTemplate">
                    <div class="msgbox"></div>
                    <input type="hidden" name="token" value="<?=$_GET['token']?>" required>
                    <div class="form-group">
                        <input type="text" readonly class="form-control" name="email" value="<?=$_GET['email']?>" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Save The New password">
                        <div class="loading"></div>
                    </div>
                </form>
                <p align="center"><a href="<?=$page_password_recovery->getLink()?>"><i class="fa fa-unlock-alt sm"></i> Forgot password ?</a></p>
            </div>
		</div>
    </div>
  </section>