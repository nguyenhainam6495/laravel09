{{-- <a href="{{ route('products.show', 2)}}">San Pham</a>
<a href="{{ route('products.index')}}">San Pham</a> --}}
@extends('products.index')

@section('name')

@include('products.name')
<button data-toggle="modal" data-target="#add" class="btn btn-primary" style="margin-top: 30px;">Add new</button>
@endsection
	
