@extends('layouts.app')

@section('content')
    <div class="my-5 w-50 mx-auto">
        <a class="btn btn-sm btn-success" href="{{ route('contacts.index') }}">Contact List</a>
        <h3 class="p-1 bg-secondary text-center text-white my-3">Update Contact</h3>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{ $contact->name }}" class="form-control" id="name" name="name"
                    class="@error('name') is-invalid @enderror">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ $contact->email }}" class="form-control" id="email" name="email"
                    class="@error('email') is-invalid @enderror">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" value="{{ $contact->phone }}" class="form-control" id="c" name="phone"
                    class="@error('phone') is-invalid @enderror">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" value="{{ $contact->address }}" class="form-control" id="address" name="address"
                    class="@error('address') is-invalid @enderror">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
