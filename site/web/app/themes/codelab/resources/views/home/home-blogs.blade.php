<section class="Section Section-blog bg-light-blue">
   <div class="container">

      <h2 class="Heading Heading-underlined"> Blog </h2>
      <div class="row">
         @foreach($blogs as $blog)
            <div class="col-12 col-md-4">
               @include('partials.content-blog', ['style' => 'card'])
            </div>
         @endforeach
      </div>

   </div>
</section>
