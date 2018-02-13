{{--
  Template Name: Services
--}}

@extends('layouts.app')

@section('content')
   <div class="container flex-grow" style="padding-bottom: 2rem;">
      <div class="row">
         @foreach($services as $service)
            <div class="col-md-12 col-lg-6">
               <div class="Card Card-section card mt-0">
                  <div class="card-body">
                     <h2> {{ $service['title'] }} </h2>
                     <p> {{ $service['description'] }} </p>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
      <div class="row">
         <div class="col">
            <div class="Card Card-section card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="row">
                           @for ($i = 0; $i < 9; $i++)
                              <div class="col-sm-4">
                                 <img class="img-fluid" src="http://via.placeholder.com/100x100">
                              </div>
                           @endfor
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <h2> Our ideas are free, call us. </h2>
                        <p> Web design is everything you see on a website. We’ll start the web design process with
                           wireframes
                           and high-fidelity mockups in Sketch. Using InVision, we’ll create an interactive mockup for
                           clients
                           to see and leave comments on the web design. After revising the web design to your liking,
                           we’ll
                           move to the frontend (HTML, CSS, JS, Jquery). After revising the web design to your liking,
                           we’ll
                           move to the frontend (HTML, CSS, JS, Jquery). After revising </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @include('home.home-cta')
@endsection
