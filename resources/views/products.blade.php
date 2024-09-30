@extends('shop')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('searchh') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ isset($searchh) ? $searchh : '' }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

<br>
<br>
<div class="row">
    @foreach ($shoes as $shoe)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
               <img src="{{asset('images')}}/{{ $shoe->image}}" class="card-img-top" alt="{{ $shoe->name }} Image" style="max-height: 200px; object-fit: contain;">
            </div>
            <div class="card-body">
                <h3 class="card-title text-center" style="font-size:20px;">{{$shoe->name}}</h3>
                <p class="card-text text-center" style="font-size:15px; width:100%">{{$shoe->description}}</p>
                <p class="card-text text-center"><strong>Price:</strong> ₱ {{ number_format($shoe->price) }}</p>
                <p class="btn-holder text-center"><a href="{{route('addtocart',$shoe->id)}}" class="btn btn-outline-info">Add to cart</a></p>
            </div>
        </div>
    @endforeach
</div>

@endsection
