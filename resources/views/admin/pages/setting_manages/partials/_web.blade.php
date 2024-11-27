<form action="{{route('settings.update', $record->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">

        <div class="row">

            <div class="col">
                <input type="text" name="website_name" value="{{$record->website_name ?? ''}}" class="form-control border-info  @error('website_name') is-invalid @enderror"
                    placeholder="Website Name..." data-toggle="tooltip" data-placement="right"
                    title="Website Name" required>
            </div>
            <div class="col">
                <input type="email" name="website_email" class="form-control border-info bg-transparent  @error('website_email') is-invalid @enderror"
                    placeholder="Website Name" data-toggle="tooltip" data-placement="right"
                    title="Website Email" value="{{$record->website_email ?? ''}}"  required>
            </div>

        </div>
        <div class="row mt-4">

            <div class="col">
                <input type="text" name="address" value="{{$record->address ?? ''}}" class="form-control border-info  @error('address') is-invalid @enderror"
                    placeholder="Address..." data-toggle="tooltip" data-placement="right"
                    title="Address">
            </div>
            <div class="col">
                <input type="text" name="phone" class="form-control border-info bg-transparent  @error('phone') is-invalid @enderror"
                    placeholder="Phone..." data-toggle="tooltip" data-placement="right"
                    title="Phone" value="{{$record->phone ?? ''}}"  >
            </div>

        </div>
        <div class="row mt-4">
            <div class="col">
                <input type="file" name="website_logo" class="form-control border-info  @error('website_logo') is-invalid @enderror" accept="image/*"
                    data-toggle="tooltip" data-placement="right"
                    title="Website Logo" max="10">

            </div>
            <div class="col">
                <input type="file" name="website_favicon" class="form-control border-info  @error('website_favicon') is-invalid @enderror" accept="image/*"
                    data-toggle="tooltip" data-placement="right"
                    title="Website Favicon" >

            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
             <small> Existing Logo: </small> <br>
                <img src="{{asset('storage/admin')}}/{{$record->website_logo ?? ''}}" alt="Website Logo"  class="w-50 mt-1">
            </div>
            <div class="col">
              <small>Existing Favicon: </small><br>
                <img src="{{asset('storage/admin')}}/{{$record->website_favicon ?? ''}}" alt="Website Favicon" class="w-50 mt-1">
            </div>
        </div>

        {{-- <div class="row mt-4">
            <div class="col">
                <input type="text" name="api_url" class="form-control border-info bg-transparent  @error('api_url') is-invalid @enderror"
                    placeholder="API Url.." data-toggle="tooltip" data-placement="right"
                    title="API URL" value="{{$record->api_url ?? ''}}"  >
            </div>
        </div> --}}

        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-sm btn-info"><i
                            class="mdi mdi-content-save "></i> Update Settings</button>
                </div>
            </div>
        </div>
    </div>

</form>
