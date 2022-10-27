@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create New</h1>
            <form action="{{ route('pages.store') }}" method="POST">
                @include('admin.pages.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection
