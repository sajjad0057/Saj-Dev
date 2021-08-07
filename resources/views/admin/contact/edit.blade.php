@extends('admin.admin_master')
@section('admin')

<div class="py-12">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            Update Contact Info
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.update.contact',['id'=>$contact->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" value="{{ $contact->location }}" name="contact_address" required>
                                    @error('ontact_address')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="email" class="form-control" value="{{ $contact->email }}" name="contact_email" required>
                                    @error('contact_email')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" value="{{ $contact->contact_no }}" name="contact_no" required>
                                    @error('contact_no')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-secondary">Update Contact Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
   
@endsection