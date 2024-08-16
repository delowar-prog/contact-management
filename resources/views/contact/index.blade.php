@extends('layouts.app')

@section('content')
    <div class="my-5 w-75 mx-auto">
        <a class="btn btn-sm btn-success" href="{{ route('contacts.create') }}">Create New Contact</a>
        <h3 class="p-1 bg-secondary text-center text-white my-3">Contact List</h3>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
            </div>
        @endif
       <div class="col-md-12 mb-3">
        <form method="GET" action="{{ route('contacts.index') }}" class="d-flex justify-content-between">
            <div>
                <select name="sortBy" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
                    <option value="" {{ is_null($sortBy) ? 'selected' : '' }}>Sort By</option>
                    <option value="name" {{ $sortBy == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="created_at" {{ $sortBy == 'created_at' ? 'selected' : '' }}>Date</option>
                </select>
            </div>
            <div class="d-flex">
                <div>
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ $search }}">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
       </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td class="d-flex">
                            <div>
                                <a class="btn btn-sm btn-success"
                                    href="{{ route('contacts.show', $contact->id) }}">View</a>|<a
                                    class="btn btn-sm btn-primary"
                                    href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                            </div>|
                            <div>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
