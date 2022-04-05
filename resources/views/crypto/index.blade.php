@extends('layouts.layout')
@section('title', 'Live Pricing')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Coin</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $currency)
            <tr>
                <td>{{$currency['name']}}</td>
                <td>{{$currency['current_price']}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection