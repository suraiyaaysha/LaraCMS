@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            
            @if(session('status'))
                <div class="alert alert-info">{{session('status')}}</div>
            @endif

            <br><br>

            <a href="{{ route('blog.create')}}" class="btn btn-primary">Create new blog</a>
            <hr>

            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Slug</th>
                    <th>Published</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($model as $post)
                    <tr>
                        <td>
                            {{-- <a href="{{ url('admin/pages/edit/', $page->id) }}">{{ $page->title }}</a> --}}
                            <a href="{{ route('blog.edit', $post->id) }}">{{ $post->title }}</a>
                        </td>
                        <td>{{ $post->user()->first()->name }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->published_at }}</td>

                        <td>
                            <a href="{{ route('blog.destroy', ['blog'=>$post->id]) }}" 
                            class="btn btn-danger delete-link"
                            data-message="Are you sure you want to delete this page?"
                             data-form="delete-form">
                            Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $model->links() }}
        </div>

    <form id="delete-form" action="" method="POST">
        {{ method_field('DELETE') }}
        {!! csrf_field() !!}

    </form>

    </div>
</div>
@endsection
