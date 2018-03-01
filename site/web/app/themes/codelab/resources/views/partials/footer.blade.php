<footer class="Section Section--inverse Section-footer bg-darker">
   <div class="container">
      <div class="row Footer-topSection">
         <div class="col-md-4">
            <section class="Footer-address">
               <address>
                  <strong> Atlanta Web Design Company </strong> <br>
                  <p> 400 W Peachtree St NW STE 4-1075 <br>
                     Atlanta, GA 30308 <br>
                     <strong> <a href="tel:+18442605003"> (844) 260-5003 </a> </strong>
                  </p>
               </address>
            </section>
         </div>
         <div class="col-md-4">
            <section class="Footer-contact">
               <p class="Footer-contactQuestion"> How can we help you? </p>
               {{--<button class="btn btn-outline-light"> Web Design</button>--}}
               <div class="dropdown">
                  <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button"
                          id="dropdownMenuButton"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Web Design
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="/lastform/1"> Web Design </a>
                     <a class="dropdown-item" href="/lastform/1"> Web Development </a>
                     {{--<a class="dropdown-item" href="#">Another action</a>--}}
                     {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                  </div>
               </div>
            </section>
         </div>
         <div class="col-md-4">
            <section class="Footer-links">
               <ul class="list-inline">
                  <li class="list-inline-item"><a href="/services">Web Design</a></li>
                  <li class="list-inline-item"><a href="/services">Web Development</a></li><!--
                  --><br><!--
                  -->
                  <li class="list-inline-item"><a href="/services">UI UX Design</a></li>
                  <li class="list-inline-item"><a href="/portfolio">Portfolio</a></li><!--
                  --><br><!--
                  -->
                  <li class="list-inline-item mb-0"><a href="/blog">Blog</a></li>
                  <li class="list-inline-item mb-0"><a href="/lastform/1">Contact Us</a></li>
               </ul>
            </section>
         </div>
      </div>
      <hr>
      <div class="row Footer-bottomSection">
         <div class="col-md-4 d-none d-md-block">
            <section class="Footer-terms">
               <ul class="list-inline">
                  <li class="list-inline-item"><a href="/"> Home </a></li>
                  <li class="list-inline-item"><a href="/terms-of-service"> Terms of Use </a></li>
                  <li class="list-inline-item"><a href="/privacy-policy"> Privacy Policy </a></li>
               </ul>
            </section>
         </div>
         <div class="col-md-4 d-none d-md-block">
            <section class="Footer-social">
               <ul class="list-inline">
                  <li class="list-inline-item"><a target="_blank" href="https://twitter.com/codelabstudios"> <i
                           class="fa fa-twitter"></i> </a></li>
                  <li class="list-inline-item"><a target="_blank" href="https://www.facebook.com/codelabstudios"> <i
                           class="fa fa-facebook-official"></i> </a></li>
                  {{--<li class="list-inline-item"><a target="_blank" href="https://plus.google.com/115724499206461724996">--}}
                  {{--<i class="fa fa-youtube-play"></i> </a></li>--}}
                  <li class="list-inline-item"><a target="_blank" href="https://plus.google.com/115724499206461724996">
                        <i class="fa fa-google-plus"></i> </a></li>
               </ul>
            </section>
         </div>
         <div class="col-md-4">
            <section class="Footer-copyright">
               <span> © CodelabStudios.com, Atlanta Design. </span>
            </section>
         </div>
      </div>

      <div class="container">
         @php(dynamic_sidebar('sidebar-footer'))
      </div>
   </div>
</footer>
