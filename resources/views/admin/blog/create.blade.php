@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create New</h1>
            <form action="{{ route('blog.store') }}" method="POST">
                @include('admin.blog.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('admin.blog.partials.scripts')
@endsection