@extends ("main")

@section ("header")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Naglowek</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                    <a href="/internal-events/create" class="btn btn-primary"> Create new </a>
                    <a href="/internal-events/all" class="btn btn-primary">All</a>
            </div>
        </div>
    </div>
@endsection

@section ("content")
    <div class="container">
        <div class="row">
    @foreach($events as $event)
    
    <!-- <p>{{$event->Title}}</p> -->
     
    <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title h5"> {{$event->Title}}</p>
                                    <p><strong>{{$event->ShortDescription}}</strong></p>
                                    {{$event->ContentHTML}} 
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>


    @endforeach
        </div>
    </div>
@endsection
