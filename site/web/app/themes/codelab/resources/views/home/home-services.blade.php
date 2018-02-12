<section class="Section Section-services bg-light-blue">

   <div class="container">

      <h1 class="Section-heading"> Web Design & Development </h1>

      @if(isset($services))
         @foreach($services as $service)
            <div class="Service">
               <div class="row">
                  <div class="col-sm-8 col-lg-9 @if($loop->index % 2 == 1) order-last @endif">
                     <h2 class="Heading Heading-underlined"> {{ $service->post_title }} </h2>
                     <p> {{ $service->_codelab_description }}</p>
                     <a href="/services" class="btn btn-primary"> LEARN MORE</a>
                  </div>
                  <div class="col-sm-4 col-lg-3 @if($loop->index % 2 == 1) order-first @endif">
                     @include('partials.component-card-service')
                  </div>
               </div>
            </div>
         @endforeach
      @endif

   </div>
</section>
