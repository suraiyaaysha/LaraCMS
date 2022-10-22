@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit New</h1>
            <form action="{{ route('pages.update', ['page'=> $model->id]) }}" method="POST">
                {{ method_field('PUT') }}
                @include('admin.pages.partials.fields')
            </form>
        </div>
    </div>
</div>
@endsection
