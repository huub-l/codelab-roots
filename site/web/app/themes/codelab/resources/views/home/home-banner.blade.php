<section class="Section Section--inverse Section-banner">
   <div class="container">
      <div class="jumbotron">
         <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
               <div class="justify-content-center">
                  <h1 class=""> Atlanta Web Design & Development </h1>
                  <p class="lead"> We're an Atlanta web design agency serving enterprise businesses, entrepreneurs, and
                     startups.
                     Developing innovative web apps is our passion :) </p>
                  <p class="lead">
                     <a class="btn btn-primary btn-lg" href="#" role="button"> Free Consultation </a>
                  </p>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="row">
                  @foreach($services as $service)
                     <div class="col-6">
                        @include('partials.component-card-service', ['cardClass' => 'Card-service--small'])
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
