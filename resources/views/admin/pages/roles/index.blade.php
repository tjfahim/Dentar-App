@extends('admin.layouts.master')

@section('title')
Role & Permission |
@endsection

@section('content')
<div class="container mt-4">
	<div class="main-card mb-3 card">
		<div class="card-header">Role List
			<div class="btn-actions-pane-right">
				<div role="group" class="btn-group-sm btn-group">
					<a href="{{route('role.create')}}" class="active btn btn-focus">Create Role</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			@error('name')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
			@endif

			<div class="container">
				<table class="align-middle mt-4 mb-0 table table-borderless table-striped table-hover">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Permissions</th>
							<th class="text-center">Created Time</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse($roles as $role)
						<tr id="role-row-{{ $role->id }}">
							<td class="text-center">{{ $role->id }}</td>
							<td class="text-center">{{ $role->name }}</td>
							<td class="text-center">
								@foreach($role->permissions as $permission)
								<button class="btn btn-primary btn-sm mb-1 mr-1">{{ $permission->name }}</button>
								@endforeach
							</td>
							<td class="text-center">{{ \Carbon\Carbon::parse($role->created_at)->format('d M Y') }}</td>
							<td class="text-center">
								@if(auth()->user()->hasRole('root admin'))
								@if($role->name !== 'root admin')
								<a href="{{route('role.edit', $role->id)}}" class="btn btn-primary btn-sm">Edit</a>
								<a href="{{route('role.destroy',$role->id)}}" class="btn btn-danger btn-sm ">Delete</a>
								@endif
								@endif
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="3" class="text-center">No Data</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="deleteRoleForm" method="POST">
                    @csrf 
 @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                @method('DELETE')
                    <input type="hidden" name="id" id="delete-id">
                    <div class="form-group">
                        <input type="text" name="name" id="delete-name" class="form-control" placeholder="Permission Name" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
	document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');

                console.log('Delete button clicked:', { id, name });

                document.getElementById('delete-id').value = id;
                document.getElementById('delete-name').value = name;

                const formAction = `/role/${id}`;
                document.getElementById('deleteRoleForm').setAttribute('action', formAction);

                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });

        document.querySelectorAll('[data-dismiss="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const modal = bootstrap.Modal.getInstance(document.querySelector('.modal.show'));
                if (modal) {
                    modal.hide();
                }
            });
        });
    });
</script>

@endsection
