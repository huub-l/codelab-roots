{{--<header class="banner">--}}
{{--<div class="container">--}}
{{--<a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>--}}
{{--<nav class="nav-primary">--}}
{{--@if (has_nav_menu('primary_navigation'))--}}
{{--{!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}--}}
{{--@endif--}}
{{--</nav>--}}
{{--</div>--}}
{{--</header>--}}
<nav class="Navigation Navigation-header navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
   <div class="container">

      {{--<a class="navbar-brand" href="{{ home_url() }}#">--}}
      {{ the_custom_logo() }}
      {{--</a>--}}

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-primary"
              aria-controls="nav-primary" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="nav-primary">
         <ul class="navbar-nav mr-auto">
            {{--<li class="nav-item active">--}}
            {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">Link</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
            {{--</li>--}}
         </ul>
         <ul class="navbar-nav mr-0 text-right">
            @php
               global $post;
            @endphp
            @foreach($primary_navigation as $menu)
               <li class="nav-item px-2 text-center">
                  <a class="nav-link {{ $post->ID == $menu->object_id ? 'active' : '' }}"
                     href="{{ $menu->url }}"> {{ $menu->title }} </a>
               </li>
            @endforeach
            {{--@debug('controller')--}}
            <li class="nav-item text-center px-2">
               <a class="btn btn-primary btn-sm" href="/lastform/1">Free Consultation</a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-center px-2">
               <a class="nav-link" href="tel:+18442605003"> <i class="fa fa-phone text-lg font-size-2"
                                                               aria-hidden="true"></i>
               </a>
            </li>
         </ul>
      </div>
   </div> <!-- /.container -->
</nav>