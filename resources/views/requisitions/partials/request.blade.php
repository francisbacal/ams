@foreach ($requisitions as $requisition)

<tr>
    <td class="text-center">
        {{ $requisition->code }}
    </td>
    @role('admin')
    <td class="text-center">
        {{ $requisition->user->firstname }} {{ $requisition->user->lastname }}
    </td>
    @endrole
    <td class="text-center">
        {{ $requisition->requested_date }}
    </td>
    <td class="text-center">
        <span id="requestStatusIndex{{ $requisition->id }}" class="badge 
            @if ($requisition->requisition_status_id == 1)
                badge-warning
            @elseif ($requisition->requisition_status_id == 2)
                badge-info
            @elseif ($requisition->requisition_status_id == 3)
                badge-success
            @else
                badge-danger
            @endif
        ">{{ $requisition->status->name }}</span>
    </td>
    <td>
        <div class="row">
            <div class="col-auto mx-auto">
                <button type="button" class="btn btn-primary btn-sm my-1 showRequestModal"
                    data-id={{ $requisition->id }} data-code={{ $requisition->code }}
                    data-status="{{ $requisition->status->name }}">
                    <i class="fas fa-search">
                    </i>
                    View
                </button>
                {{-- <a class="btn btn-info btn-sm my-1" href="{{ '__ID__' }}">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
                </a>
                <form action="{{ '__ID__' }}" method="POST" id="deleteAssetForm{{ '__ID__' }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm my-1 deleteAssetBtn" href="#"
                        data-form="deleteAssetForm{{ '__ID__' }}">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </button>
                </form> --}}
            </div>
        </div>
    </td>
</tr>


@endforeach
