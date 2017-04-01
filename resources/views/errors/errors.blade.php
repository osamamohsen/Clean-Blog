
@if($errors->any())
    <ul class="alert alert-danger">
        <span class="alert-danger"><strong> Whoops! </strong>There were some problems with your input.</span>
        <div class="container">
            @foreach($errors->all() as $error)
                <h5>{!! $error !!}</h5>
            @endforeach
        </div>
    </ul>
@endif