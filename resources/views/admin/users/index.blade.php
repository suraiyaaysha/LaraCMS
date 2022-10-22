@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            {{-- <a href="{{ route('users.create')}}" class="btn btn-primary">Create new User</a>
            <hr> --}}
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                </thead>
                <tbody>
                    @foreach ($model as $user)
                    <tr>
                        <td>
                            {{-- <a href="{{ url('admin/pages/edit/', $page->id) }}">{{ $page->title }}</a> --}}
                            <a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
