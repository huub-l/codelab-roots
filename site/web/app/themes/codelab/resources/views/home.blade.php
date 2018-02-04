{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
   @include('home.home-banner')
   @include('home.home-testimonial')
   @include('home.home-services')
   @include('home.home-portfolios')
   @include('home.home-blogs')
   @include('home.home-about')
   @include('home.home-cta')
@endsection


{{--@section('content')--}}
{{--@while(have_posts()) @php(the_post())--}}
{{--@include('partials.page-header')--}}
{{--@include('partials.content-page')--}}
{{--@endwhile--}}
{{--@endsection--}}
