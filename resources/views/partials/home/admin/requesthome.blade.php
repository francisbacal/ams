@foreach ($requisitions as $requisition)
<tr>
    <td>{{ $requisition->user->firstname }} {{ $requisition->user->lastname }}</td>
    <td>{{ $requisition->requested_date }}</td>
    <td>
        <span id="requestStatus" class="ml-2 badge
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