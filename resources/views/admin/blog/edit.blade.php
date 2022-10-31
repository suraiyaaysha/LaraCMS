@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Blog</h1>
            <form action="{{ route('blog.update', ['blog'=> $model->id]) }}" method="POST">
                {{ method_field('PUT') }}
                @include('admin.blog.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection
