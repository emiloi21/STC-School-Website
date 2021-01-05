<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Contact</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
      
        <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1937.4102352291375!2d121.0067622!3d13.7896937!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd0f5dad3a3751%3A0x65875daa232d530c!2sSta.%20Teresa%20College!5e0!3m2!1sen!2sph!4v1589248451451!5m2!1sen!2sph" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        
        <div id="contact" class="container">
          <div class="row">
            <div class="col-lg-8">
              <section class="bar">
                <div class="heading">
                  <h2>We are here to help you</h2>
                </div>
                <p class="lead">Are you curious about something? Do you have some kind of problem with our products? As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.</p>
                <p class="text-sm">Please feel free to contact us, our customer service center is working for you 24/7.</p>
                <div class="heading">
                  <h3>Contact form</h3>
                </div>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input id="firstname" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input id="lastname" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="subject">Subject</label>
                        <input id="subject" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> Send message</button>
                    </div>
                  </div>
                </form>
              </section>
            </div>
            <div class="col-lg-4">
              <section class="bar mb-0">
                <h3 class="text-uppercase">Address</h3>
                <p class="text-sm">13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p>
                <h3 class="text-uppercase">Call center</h3>
                <p class="text-muted text-sm">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                <p><strong>+33 555 444 333</strong></p>
                <h3 class="text-uppercase">Electronic support</h3>
                <p class="text-muted text-sm">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                <ul class="text-sm">
                  <li><strong><a href="mailto:">info@fakeemail.com</a></strong></li>
                  <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                </ul>
              </section>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
  </body>
</html>