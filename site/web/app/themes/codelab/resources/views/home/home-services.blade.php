<section id="services" class="Section Section-services bg-light-blue">

   <div class="container">

      <h1 class="Section-heading"> Web Design & Development </h1>

      @if(isset($services))
         @foreach($services as $service)
            <div class="Service">
               <div class="row">
                  <div
                     class="order-12 order-sm-12 col-md-8 col-lg-9 @if($loop->index % 2 == 0) order-md-1 order-first @endif">
                     <h2 class="Heading Heading-underlined"> {{ $service->post_title }} </h2>
                     <p> {{ $service->_codelab_description }}</p>
                     <a href="/services" class="btn btn-primary"> LEARN MORE</a>
                  </div>
                  <div
                     class="order-1 order-sm-1 d-flex col-md-4 col-lg-3
                     justify-content-center justify-content-md-start  @if($loop->index % 2 == 0) order-md-12 order-last justify-content-md-end @endif">
                     @include('partials.component-card-service')
                  </div>
               </div>
            </div>
         @endforeach
      @endif

   </div>
</section>
