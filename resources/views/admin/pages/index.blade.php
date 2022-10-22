@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
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
                            <a href="{{ route('pages.edit', $page->id) }}">{{ $page->title }}</a>
                        </td>
                        <td>{{ $page->url }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
