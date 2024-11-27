@extends('admin.layouts.master')

@section('title')
    Create User |
@endsection
@section('content')

<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('usersStore') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Create User</h4>
                        <a href="{{ route('usersIndex') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Users"><i class="mdi mdi-step-backward"></i> List Users</a>
                    </div>
                    <div class="row mt-5">
                        <div class="mt-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control border-info" placeholder="Enter Name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control border-info" placeholder="Enter Email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control border-info" placeholder="Enter Password" value="12345678" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mt-2">
                            <label for="country">Country</label>
                            <select name="country" class="form-control border-info" required>
                                <option value="">Select Country</option>
                                @foreach ($countriesTable as $country)
                                    <option value="{{ $country->iso }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="mt-2">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control border-info" placeholder="Enter Phone">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="country">Country</label>
                                    <div class="input-group">
                                        <select name="country" id="country" class="form-select border-info" onchange="selectedCountry(this)" required>
                                            @foreach ($countriesTable as $country)
                                                <option value="{{ $country->iso }}" data-phonecode="{{ $country->phonecode }}">
                                                    {{ $country->name }} (+{{ $country->phonecode }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="phone">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="phone-code">+93</span> <!-- Default placeholder -->
                                        <input type="number" name="phone" id="phone" class="form-control border-info" placeholder="Enter Phone Number" required>
                                    </div>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="full_phone" id="full_phone"> --}}

                        <div class="mt-2">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" name="profile_picture" class="form-control border-info">
                            @error('profile_picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="role" class="flex items-center space-x-2">
                                Role:
                                <select id="role" name="role" class="rounded-lg px-4 py-2 border border-gray-300 focus:outline-none">
                                    <option value="admin">Admin</option>
                                    <option value="user" selected>User</option>
                                </select>
                            </label>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="status" class="flex items-center space-x-2">
                                Status:
                                <select id="status" name="status" class="rounded-lg px-4 py-2 border border-gray-300 focus:outline-none">
                                    <option value="active" selected>Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="block">Block</option>
                                    <option value="suspend">Suspend</option>
                                </select>
                            </label>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-content-save "></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
<script>

    function selectedCountry(input){
        const selectedOption = input.options[input.selectedIndex];
        const phoneCode = selectedOption.getAttribute('data-phonecode');
        console.log(phoneCode);

        document.getElementById('phone-code').textContent = '+' + phoneCode;

        // Update full phone when the country changes
        var phoneNumber = document.getElementById('phone').value;
        document.getElementById('full_phone').value = phoneCode + phoneNumber;
    }
</script>
