@forelse ($doctors as $index =>  $doctor)
<tr class="text-center">
    
    <td style="display: none;">{{ $doctor->id }}</td>
    <td>{{ $index + 1 }}</td>
    <td>{{ $doctor->name }}</td>
    <td>{{ $doctor->email }}</td>
    <td>{{ $doctor->phone }}</td>
    <td>{{ $doctor->specialization }}</td>
    <td>{{ $doctor->organization }}</td>
    <td>{{ $doctor->address }}</td>
    <td>
        @if ($doctor->status == '1')
            <span style="color: green">Active</span>
        
        @elseif ($doctor->status == '0')
            <span style="color: darkred">Suspend</span>
        @endif
    </td>
    <!-- <td class="action d-flex justify-content-center align-items-center">
        <button
            type="button"
            class="btn btn-sm btn-success me-2"
            data-toggle="modal"
            data-target="#doctorModal"
            onclick="showDoctorDetails({{ $doctor }})"
            title="View Doctor">
            <i class="mdi mdi-eye"></i>
        </button>
        
        <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Doctor">
            <i class="mdi mdi-grease-pencil"></i>
        </a>
        <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Doctor">
                <i class="mdi mdi-trash-can"></i>
            </button>
        </form> 
    </td> -->
        <td style="text-align: center;">
        <input type="checkbox"
            class="quiz-access-checkbox"
            data-doctor-id="{{ $doctor->id }}">
    </td>
</tr>
@empty
<tr class="text-center p-10">
     <td colspan="10" style="text-align: center; font-weight: bold; padding: 40px;">
        No data found
    </td>
</tr>
@endforelse