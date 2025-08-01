@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role(s)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->roles->isNotEmpty())
                            @foreach($user->roles as $role)
                                <span class="badge bg-info">{{ $role->name }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">No role</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
