@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i>{{ session('success') }}</i>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @endif
                    <div class="card">
                        <div class="card-header text-center">
                            All Brand
                        </div>
                    </div>
                    {{-- {{var_dump($brands);}} --}}
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact_No</th>
                                <th scope="col" style="width: 35%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $contact->location }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->contact_no }}</td>
                                    <td>
                                        <a href="{{ route('contact.edit', ['id' => $contact->id]) }}"
                                            class="btn btn-outline-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('contact.delete', ['id' => $contact->id]) }}"
                                           class="btn btn-outline-danger"
                                           onclick="return confirm('Are You Sure to Delete this Contact Info ..?')"
                                           >

                                            delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            Add Contact Info
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.contact') }}" method="POST">
                                @csrf
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" placeholder="Address" name="contact_address" required>
                                    @error('ontact_address')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="contact_email" required>
                                    @error('contact_email')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" placeholder="Contact Number" name="contact_no" required>
                                    @error('contact_no')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-secondary">Add Contact Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection