
@include('layouts.head')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                    <h1><a href="/">go to home</a></h1>
                    <h1><a href="/persons">show all persons</a></h1>
                <h1 class="text-center">edit person</h1>
                <div class="row">
                    <div class="col-md-8">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                            @endforeach
                        </div>
                        @endif
                            {{ Form::model($person, ['route' => ['update-person', $person->id], "enctype"=>"multipart/form-data" ,'method' => 'PUT']) }}

                                <div class="form-group">
                                      <label for="name">name</label>
                                      <input type="text" name="name" value="{{ $person->name }}" class="form-control" id="name" placeholder="Enter your name here!">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">email</label>
                                      <input type="email" name="email" value="{{ $person->email }}" class="form-control" id="email" placeholder="Enter email here!">
                                    </div>
                                    <div class="form-group">
                                      <label for="password">password</label>
                                      <input type="password" name="password" value="{{ $person->password }}"  class="form-control" id="password" placeholder="enter your password here">
                                    </div>
                                    <div class="form-group">
                                      <label for="img">Your image here!</label>
                                        <p>old image is <img width='50px' src="{{ asset('images').'/'.$person->img }}" alt="" srcset=""></p>
                                      <input type="file" name="img" value="{{ $person->img }}" class="form-control" id="img" placeholder="browse image">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.end-body')