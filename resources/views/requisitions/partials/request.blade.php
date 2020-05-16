@foreach ($requisitions as $requisition)

<tr>
    <td class="text-center">
        {{ $requisition->code }}
    </td>
    <td class="text-center">
        {{ $requisition->requested_date }}
    </td>
    <td class="text-center">
        @if ($requisition->requisition_status_id === 1 )

        <span class="badge badge-success">{{ $requisition->status->name }}</span>

        @else

        <span class="badge badge-danger">{{ $requisition->status->name }}</span>

        @endif
    </td>
    <td>
        <div class="row">
            <div class="col-auto mx-auto">
                <a class="btn btn-primary btn-sm my-1" href="{{ '__ID__'  }}">
                    <i class="fas fa-folder">
                    </i>
                    View
                </a>
                <a class="btn btn-info btn-sm my-1" href="{{ '__ID__' }}">
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
                </form>
            </div>
        </div>

    </td>
</tr>

@endforeach
