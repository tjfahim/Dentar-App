@extends('admin.layouts.master')

@section('title')
Role & Permission |
@endsection

@section('content')
<div class="container mt-4">
	<div class="main-card mb-3 card">
		<div class="card-header">Permissions List
			<div class="btn-actions-pane-right">
				<div role="group" class="btn-group-sm btn-group">
					<button data-toggle="modal" data-target="#createModal" class="active btn btn-focus">Add</button>
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

			<div class="container" >
				<table class="align-middle mt-4 mb-0 table table-borderless table-striped table-hover" >
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Created Time</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse($permissions as $permission)
						<tr>
							<td class="text-center">{{ $permission->id }}</td>
							<td class="text-center">{{ $permission->name }}</td>
							<td class="text-center">{{ \Carbon\Carbon::parse($permission->created_at)->format('d M Y') }}</td>
							<td class="text-center">
								<button class="btn btn-primary btn-sm edit-button"
									data-id="{{ $permission->id }}"
									data-name="{{ $permission->name }}"
									data-toggle="modal"
									data-target="#editModal">Edit</button>

                                <button class="btn btn-danger btn-sm delete-button"
									data-id="{{ $permission->id }}"
									data-name="{{ $permission->name }}"
									data-toggle="modal"
									data-target="#deleteModal">Delete</button>
								{{-- <a href="#" class="btn btn-danger btn-sm" data-id="{{ $permission->id }}">Delete</a> --}}

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

	<!-- Create Modal -->
	<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="createModalLabel">Create New Permission</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('permission.store') }}" method="post">
						@csrf
						<div class="form-group">
							<input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Permission Name">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Edit Permission</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" id="editPermissionForm" method="post">
						@csrf
						<input type="hidden" name="id" id="edit-id">
						<div class="form-group">
							<input type="text" name="name" id="edit-name" class="form-control" placeholder="Permission Name">
						</div>
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
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
					<form action="" id="deletePermissionForm" method="POST">
						@csrf 
 @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                    @method('DELETE')
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
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-button');
        const deleteButtons = document.querySelectorAll('.delete-button');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');

                console.log('Edit button clicked:', { id, name });

                document.getElementById('edit-id').value = id;
                document.getElementById('edit-name').value = name;

                const formAction = `/permission/${id}`;
                document.getElementById('editPermissionForm').setAttribute('action', formAction);

                const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');

                console.log('Delete button clicked:', { id, name });

                document.getElementById('delete-id').value = id;
                document.getElementById('delete-name').value = name;

                const formAction = `/permission/${id}`;
                document.getElementById('deletePermissionForm').setAttribute('action', formAction);

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
