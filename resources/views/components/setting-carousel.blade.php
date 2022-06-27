<div>
    <div class="row">
        @foreach($sliders as $key => $slider)
        <div class="col-2 ml-2 mr-2 text-center">
            <img src="{{ url($slider->url)}}" alt="60" height="60" class="">
            <span>
                <form class="dropdown-item" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link m-0 p-0 text-dark" type="submit">
                        <span><i class="fa fa-times text-danger" aria-hidden="true"></i></span>
                        
                    </button>
                </form>
                
            </span>
        </div>
        @endforeach
    </div>
</div>