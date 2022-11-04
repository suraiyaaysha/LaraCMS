@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            
            @if(session('status'))
                <div class="alert alert-info">{{session('status')}}</div>
            @endif

            <br><br>

            <a href="{{ route('pages.create')}}" class="btn btn-primary">Create new page</a>
            <hr>

            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>URL</th>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>
                            {{-- <a href="{{ url('admin/pages/edit/', $page->id) }}">{{ $page->title }}</a> --}}
                            {{-- <a href="{{ route('pages.edit', $page->id) }}">{{ $page->title }}</a> --}}
                            <a href="{{ route('pages.edit', $page->id) }}">{!! $page->present()->paddedTitle !!}</a>
                        </td>
                        <td>{{ $page->url }}</td>
                        <td class="text-right">
                            <a href="{{ route('pages.destroy', ['page'=>$page->id]) }}"
                            data-message="Are you sure you want to delete this page?"
                             data-form="delete-form">
                            Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pages->links() }}
        </div>

    <form id="delete-form" action="" method="POST">
        {{ method_field('DELETE') }}
        {!! csrf_field() !!}

    </form>

    </div>
</div>
@endsection
