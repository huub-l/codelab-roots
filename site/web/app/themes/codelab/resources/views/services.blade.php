{{--
  Template Name: Services
--}}

@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         @foreach($services as $service)
            <div class="col-6">
               <div class="card p-4">
                  <div class="card-body">
                     <h2> {{ $service['title'] }} </h2>
                     <p> {{ $service['description'] }} </p>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
@endsection
