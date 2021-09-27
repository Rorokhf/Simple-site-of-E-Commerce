@extends('user.app.index')

@section('content')

<div class="content">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('user/assets/img/damir-bosnjak.jpg')}}" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{asset('user//assets/img/mike.jpg')}}" alt="...">
                <h5 class="title">Chet Faker</h5>
              </a>
              <p class="description">
                @chetfaker
              </p>
            </div>
            <p class="description text-center">
              "I like the way you work it <br>
              No diggity <br>
              I wanna bag it up"
            </p>
          </div>
          <div class="card-footer">
            <hr>
            <div class="button-container">
              <div class="row">
                <div class="col-lg-3 col-md-6 col-6 ml-auto">
                  <h5>12<br><small>Files</small></h5>
                </div>
                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                  <h5>2GB<br><small>Used</small></h5>
                </div>
                <div class="col-lg-3 mr-auto">
                  <h5>24,6$<br><small>Spent</small></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
      <div class="col-md-8">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Edit Profile</h5>
          </div>
          <div class="card-body">
            <form>

              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="first name" value="{{$user->name}}">
                  </div>
                </div>
                <div class="col-md-6 pl-1">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 px-1">
                    <div class="form-group">
                      <label>code</label>
                      <input type="number" class="form-control" placeholder="02" value="{{$user->phone->code}}">
                    </div>
                  </div>
                <div class="col-md-4 px-1">
                  <div class="form-group">
                    <label>phone</label>
                    <input type="number" class="form-control" placeholder="phone" value="{{$user->phone->number}}">
                  </div>
                </div>
                <div class="col-md-6 pl-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>street</label>
                    <input type="text" class="form-control" placeholder="Home street" value="{{$user->address->street}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>floor</label>
                    <input type="text" class="form-control" placeholder="floor" value="{{$user->address->floor}}">
                  </div>
                </div>
                <div class="col-md-4 px-1">
                  <div class="form-group">
                    <label>flat</label>
                    <input type="text" class="form-control" placeholder="flat" value="{{$user->address->flat}}">
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label>building</label>
                    <input type="text" class="form-control" placeholder=" building" value="{{$user->address->building}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
