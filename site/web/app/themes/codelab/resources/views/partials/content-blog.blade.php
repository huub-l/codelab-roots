<article class="Card Card-blog card {{ $style == 'full' ? 'Card-blog--full' : '' }}">

   <a href="{{ $blog->url }}">
      <img class="Card-blogThumbnail card-img-top img-fluid" src="{{ get_the_post_thumbnail_url($blog->ID) }}">
   </a>

   <div class="card-body text-center">
      <a href="{{ $blog->url }}">
         <h6 class="Card-blogTitle card-title"> {{ $blog->post_title }} </h6>
      </a>

      @if($style =='full')
         <p> {{ $blog->excerpt }} </p>
      @endif

      <small>
         <span class="Card-blogCategory card-link">
               {{--href="{{ $blog->categoryUrl }}#">--}}
            {{ $blog->categoryName }} </span>
         <span class="mx-1"> | </span>
         <span class="Card-blogPublishedDate card-text"> {{ $blog->publishedDate }} </span>
      </small>
   </div>
</article>
