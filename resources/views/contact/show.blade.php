@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Contact Details</h4>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <div class="flex-grow-1 ms-3">
              <h5 class="card-title">{{$contact->name}}</h5>
              <p class="card-text mb-0"><strong>Email:</strong> {{$contact->email}}</p>
              <p class="card-text mb-0"><strong>Phone:</strong> {{$contact->phone}}</p>
              <p class="card-text mb-0"><strong>Address:</strong> {{$contact->address}}</p>
            </div>
          </div>
          <a class="btn btn-sm btn-success" href="{{ route('contacts.index') }}">Contact List</a>
        </div>
      </div>
    </div>
  </div>
  @endsection
