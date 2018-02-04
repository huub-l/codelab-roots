<article class="card Card Card-service
index-{{ $loop->index }}
@if($loop->index % 2 == 1)
   Card-service--rotateCounterclockwise @else
   Card-service--rotateClockwise @endif
{{ $cardClass or ''}}
   ">
   <img class="card-img-top Card-serviceThumbnail"
        width="100"
        height="100"
        src="{{ get_the_post_thumbnail_url($service->ID) }}"
        alt="Card image cap">
   <p class="card-text Card-serviceTitle"> {{ $service->_codelab_card_title }} </p>
</article>
