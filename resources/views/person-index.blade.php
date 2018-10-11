@include('layouts.head')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">

                <h1><a href="/">go to home</a></h1>
                <h1 class="text-center">all persons</h1>

                <div class="row">

                        @foreach ($persons as $person)
                        <div style="border:2px solid red" class="col-md-4">
                            <h2 class="text-center">{{ $person->name }}</h2>
                            <div class="image-block">
                                <img width="100%" height="200px" src="{{ asset('images').'/'.$person->img }}" alt="">
                            </div>
                            <h3 class="text-center"><a href="#">{{ $person->email }}</a></h3>
                            <h5 class="text-center">created at {{ $person->created_at }}</h5>
                            <div class="buttons">

                                <form class='pull-right' action="{{ route('destroy-person', $person->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class='btn btn-warning' type="submit">Delete person</button>
                                </form>
                                <a href="{{ route('edit-person',$person->id) }}" class="btn btn-success">edit</a>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@include('layouts.end-body')
