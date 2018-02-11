{{--
  Template Name: Blog
--}}

@extends('layouts.app')

@section('content')
   <div class="container">
      {{--      @include('partials.page-header')--}}
      {{--      @include('partials.content-page')--}}

      <div class="Navigation Navigation-category mb-4">
         <div class="card">
            <div class="d-flex">
               <ul class="list-inline d-flex">
                  @foreach($categories as $category)
                     <li class="list-inline-item d-flex justify-content-start">
                        <a class="d-flex align-items-center"
                           href="{{ get_term_link($category->slug,  $category->taxonomy) }}"> {{ $category->name }} </a>
                     </li>
                  @endforeach
               </ul>
               <ul class="Navigation-search list-inline d-flex justify-content-end">
                  <li class="list-inline-item">
                     {{ get_search_form() }}
                  </li>
               </ul>
            </div>
         </div>
      </div>

      <div class="row">
         @foreach($blogs as $blog)
            <div class="col-6 mb-4">
               @include('partials.content-blog', ['style' => 'full'])
            </div>
         @endforeach
      </div>
   </div>
@endsection
