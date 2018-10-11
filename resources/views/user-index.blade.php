@include('layouts.head')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                {{-- <h1 class="text-center">Create a person</h1> --}}
                <div class="row">
                    <div class="col-md-8">
                        @if (session()->has('message'))
                            <h1 class='alert alert-success'>{{ session()->get('message') }}</h1>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                            @endforeach
                        </div>
                    @endif
                        <h1><a href="/create-person">Create Person</a></h1>
                        <h1><a href="/persons">Person List</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('layouts.end-body')
