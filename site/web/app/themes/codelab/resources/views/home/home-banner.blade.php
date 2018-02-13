<section class="Section Section--inverse Section-banner">
   <div class="container">
      <div class="jumbotron">
         <div class="row">
            <div class="Section-bannerText col-sm-7 col-lg-6 d-flex align-items-center">
               <div class="justify-content-center">
                  <h1 class="mb-4"> Atlanta Web Design & Development </h1>
                  <p class="mb-5 lead"> We're an Atlanta web design agency serving enterprise businesses, entrepreneurs,
                     and startups. Developing innovative web apps is our passion :) </p>
                  <p class="">
                     <a class="Btn-outline Section-bannerBtn btn btn-outline-light btn-lg"
                        href="/lastform/1"
                        role="button"> Free
                        Consultation </a>
                  </p>
               </div>
            </div>
            <div class="col-sm-5 col-lg-4 offset-lg-2">
               <div class="row">
                  @if(isset($services))
                     @foreach($services as $service)
                        <div class="col-6">
                           @include('partials.component-card-service', ['cardClass' => 'Card-service--small'])
                        </div>
                     @endforeach
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
