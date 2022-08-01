<div>
    @if($status) 
        <a class="dropdown-item text-danger" href="{{ route('student.down', ['id'=> $id]) }}">
            <span><i class="fa fa-arrow-down " aria-hidden="true"></i></span>
            Dar de baja
        </a>  
    @else
        <a class="dropdown-item text-success" href="{{ route('student.active', ['id'=> $id]) }}">
            <span><i class="fa fa-arrow-up " aria-hidden="true"></i></span>
            Activar 
        </a>                 
    @endif
                            
</div>