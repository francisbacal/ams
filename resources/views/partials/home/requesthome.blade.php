@foreach ($requisitions as $requisition)
<tr>
    <td>
        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
        {{ $requisition->user->firstname }} {{ $requisition->user->lastname }}
    </td>
    <td>{{ $requisition->requested_date }}</td>
    <td class="text-center">
        <span class="ml-2 badge
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
</tr>
@endforeach