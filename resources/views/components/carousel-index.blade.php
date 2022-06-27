
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner ">
  @foreach($urls as $key => $item) 
    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
        <img src="{{url($item)}}" class="d-block w-100" alt="500">
    </div>
   @endforeach
  </div>
  
</div>