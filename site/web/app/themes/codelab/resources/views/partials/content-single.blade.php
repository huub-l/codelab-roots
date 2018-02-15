<article @php(post_class())>
   <header>
      <h1 class="">{{ get_the_title() }}</h1>
      <div>
         {{ the_post_thumbnail('full', ['class' => 'img-fluid']) }}
      </div>
      @include('partials/entry-meta')
   </header>
   <div>
      @php(the_content())
   </div>
   <footer>
      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
   </footer>
   @php(comments_template('/partials/comments.blade.php'))
</article>
