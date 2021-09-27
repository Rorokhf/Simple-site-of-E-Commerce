@extends('user.app.index')

@section('content')

<div class="content">
    <div class="row">
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{asset('user/assets/img/apple-icon.png')}}" alt="Card image cap">
    <div class="card-body">

      <h5 class="card-title">paymentMethod( {{$user->order->paymentMethod}} )</h5>
      <p class="card-text">{{$user->order->description}}</p>
      <a href="#" class="btn btn-primary">{{$user->order->totalCash}}</a>
    </div>
  </div>
    </div>
</div>
@endsection

