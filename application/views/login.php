
       <main class="main-wrapper">


           <section class="content-wrapper">
               <div class="container">
                   <div class="row">
                       <div class="col-md-12 pdl">
                           <div class="tab-wrapper row">

         <!--container start-->
                    <?php
                        if (!empty($error)) {
                            showErrorMessage($error);
                        } else {
                            if ($this->session->flashdata('success')) {
                                showSuccessMessage();
                            }
                        }
                        ?>
    <div class="login-bg">
        <div class="container col-md-4 col-md-offset-4">
             
            <div class="form-wrapper">
                <form class="form-signin wow fadeInUp" method="post" action="<?php echo base_url('home/login'); ?>" role="form"> 

            <div class="login-wrap">
                 <fieldset>
                     <div class="form-group mb-10">
                    <a href="#" class="btn btn-small btn-block btn-fb"><i class="pull-cnter fa fa-facebook"></i>&nbsp &nbsp Facebook Login</a>
                         </br> </br>
                         <div class="hr-text">
                             <hr>
                             <span>or</span>
                         </div>
                     </div>

                     <div class="form-group mb-10">
                     <label for="login">Email Id</label>
                         <input type="text" class="form-control" name="email" type="email" placeholder="Email" autofocus>

                     </div>

                     <div class="form-group mb-10">
                         <label for="login">Password</label>
                         <input type="password" class="form-control"   name="password" placeholder="Password" type="password" value="">

                     </div>



                     <div class="form-group mb-10 pull-right">

                       <input type="checkbox" value="remember-me"> Remember me
                     </div>
                     <div class=" form-group mb-10 pull-left">
                        <a data-toggle="modal" href="<?php echo base_url('home/forgotpassword'); ?>"> Forgot Password?</a>

                    </div>


                 <input type="submit" class="btn btn-mid btn-primary btn-block" name="submit" value="Login" >

                 </fieldset>

                <br>





                <div class="registration form-group mb-10 ">
                    Don't have an account yet?
                    <a class="" href="<?php echo base_url('home/registration'); ?>">
                        Create an account
                    </a>
                </div>

            </div>
            </form>
              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <form method="post" action="#" role="form">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-success" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
                  </form>
              </div>
              <!-- modal -->
          
          </div>
        </div>
    </div>



    <!--container end-->



                           </div>
                       </div>

                   </div>
               </div><!--container-->
           </section>

       </main>
