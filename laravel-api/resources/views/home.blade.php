@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <category-list-component></category-list-component>
            </div>
            <div class="col-lg-9">
                <product-list-component></product-list-component>
            </div>
        </div>
    </div>
@endsection
