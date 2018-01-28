<div class="manegap">
  <i><h1>SUST SCHOOL</h1></i>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo05">
    <div class="logo">
      <img src="/storage/storeHouse/logo.png" alt="logo" style="width:100px;">
    </div>
    <div class="gap">
      <ul class="navbar-nav navbar-right mr-auto mt-2 mt-lg-0">
        <li class="nav-item ">
          <a href="frontend"><button type="button" class="btn btn-raised btn-dark btn-lg">Home</button></a>
        </li>
        <li class="nav-item">
          <a href="notice"><button type="button" class="btn btn-raised btn-dark btn-lg ">NOTICE</button></a>
        </li>
        <li class="nav-item">
          <a href="tutorial"><button type="button" class="btn btn-raised btn-dark btn-lg">TOUTORIAL</button></a>
        </li>
        <li class="nav-item ">
          <a href="photo"><button type="button" class="btn btn-raised btn-dark btn-lg">PHOTO</button></a>
        </li>
        <li class="nav-item ">
          <a onclick="document.getElementById('id02').style.display='block'" class="btn btn-raised btn-dark btn-lg"  >OpinionBox</a>
        </li>
        <li class="nav-item ">
          <a onclick="document.getElementById('id01').style.display='block'" class="btn btn-raised btn-dark btn-lg float-right" ><?php if (isset($_SESSION['log'])) {
	echo "Log In";
} else {
	echo "Admin";
}
?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Log In Menu -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">X</span>
      <!-- <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top"> -->
      <h5 style="text-align: center;">LOGIN</h5>
    </div>
    <form class="w3-container" action="{{action('LoginController@login')}}"  method="post" files="true" enctype="multipart/form-data" >
      <!-- csrf protect-->
      {{ csrf_field() }}
      <input type="hidden"  name="_token" value="{{ csrf_token() }}">
      <!-- csrf protection end-->
      <div class="w3-section">
        <label><b>Email</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Username" name="email" required>
        <label><b>Password</b></label>
        <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
        <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit"/>
        <input class="w3-check w3-margin-top" type="checkbox" checked="checked" name="remember" />
      </div>
    </form>
    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
    </div>
  </div>
</div>
<!-- end Log in -->
<!-- contact form -->
<div id="id02" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
    <div class="w3-center"><br>
      <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">X</span>
      <!-- <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top"> -->
      <h5 style="text-align: center;">Opinion Box</h5>
    </div>
    <form class="w3-container" action="{{action('HomeController@sendMail')}}"  method="post" files="true" enctype="multipart/form-data" >
      <!-- csrf protect-->
      {{ csrf_field() }}
      <input type="hidden"  name="_token" value="{{ csrf_token() }}">
      <!-- csrf protection end-->
      <div class="w3-section">
       <!-- Name -->
        <div class="form-group">
          <label><b>Name</b></label>
          <input class="form-control" type="text" placeholder="Enter Name" name="name" required>
        </div>
        <!--end -->
          <!-- Name -->
        <div class="form-group">
          <label><b>Email</b></label>
          <input class="form-control" type="email" placeholder="Enter Email" name="email" required>
        </div>
        <!--end -->
          <!-- Name -->
        <div class="form-group">
          <label><b>Message</b></label>
          <textarea class="form-control w3-border " rows="12" name="message"></textarea>
        </div>
        <!--end -->
        <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit"/>
      </div>
      <br>
    </form>
  </div>
</div>
<!-- end -->