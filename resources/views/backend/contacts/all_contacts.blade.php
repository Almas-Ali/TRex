@extends('backend.layouts.main')
@push('title')All Contact @endpush
@push('contacts-active')active @endpush
@push('all-contacts-active')active @endpush
@section('content')

@include('backend.layouts.navbar')

<div class="container pt-2 px-2">

  {{-- <div class="my-3">
    <form class="row g-3" method="get" action="{{ route('add_contact') }}">
      @if(isset($message))
      <p class="alert alert-success px-3">{{ $message }}</p>
      @endif

      @if (session('message'))
      <div class="alert alert-success px-3">
        {{ session('message') }}
      </div>
      @endif

      <div class="col-auto">
        <input type="text" class="form-control is-validation  @error('add_contact') is-invalid @enderror"
          name="add_contact" id="add_contact_check" placeholder="Add contact" required>

        <span class="invalid-feedback hidden" role="alert" id="add_error">
          <strong>The add contact must be at least 4 characters.</strong>
        </span>
        @error('add_contact')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3" id="add_btn">Add</button>
      </div>
    </form>
  </div> --}}


  <div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0">All Categories</h6>
    </div>
    <div class="table-responsive">
      <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
          <tr class="text-dark">
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $i = 1; @endphp

          @foreach ($contacts as $contact)
          <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->created_at }}</td>
            <td>{{ $contact->updated_at }}</td>
            <td class="text-light">
              <a href="javascript:void(0);" class="btn btn-primary btn-sm" type="button" class="btn btn-primary"
                data-bs-toggle="modal" data-bs-target="{{ '#view_modal_'.$contact->id }}">View</a>
              {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="{{ '#view_modal_'.$contact->id }}">
                Edit
              </button> --}}

              <a href="{{ url('contact/delete/'.$contact->id) }}" class="btn btn-danger btn-sm">Delete</a>
              <i class="fa fa-clock-o"></i><i class="fa fa-solid fa-hourglass-clock"></i>
            </td>
          </tr>
          @php $i++; @endphp

          <div class="modal fade" id="{{ 'view_modal_'.$contact->id }}" tabindex="-1" aria-labelledby="edit_modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="edit_modalLabel">View contact</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="my-3">
                    <form class="row g-3" method="post" action="{{ url('contact/edit/'.$contact->id) }}">
                      @csrf
                      <div class="col-auto">
                        <div align="left">
                          <p><strong>Name:</strong>
                            {{ $contact->name }}
                          </p>
                          <p><strong>Email:</strong>
                            {{ $contact->email }}
                          </p>
                          <p><strong>Subject:</strong>
                            {{ $contact->subject }}
                          </p>
                          <p><strong>Message:</strong><br>
                            {{ $contact->message }}
                          </p>
                        </div>
                      </div>
                      <div class="mt-3" align="right">
                        <button type="submit" class="btn btn-primary" id="edit_btn">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection