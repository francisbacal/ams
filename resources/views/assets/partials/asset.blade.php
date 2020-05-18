@foreach ($assets as $asset)

<tr>
    <td>
        {{ $asset->name }}
    </td>
    <td>
        {{-- <img src="{{ $asset->image }}" style="max-height: 40px; width: auto;"> --}}
        <img src="@if($asset->name == 'Macbook Pro 13"'){{  asset('dist/img/assets/mbpmbp13.jpg') }}@else{{ $asset->image }}@endif"
        style="max-height: 40px; width: auto;">
    </td>
    <td>
        {{ $asset->code }}
    </td>
    <td>
        {{ $asset->serial }}
    </td>
    <td class="text-center">
        <span class="badge
        @if ($asset->asset_status_id == 1)
            badge-success
        @elseif ($asset->asset_status_id == 2)
            badge-info
        @elseif ($asset->asset_status_id == 3)
            badge-warning
        @else
            badge-danger
        @endif
        ">{{ $asset->status->name }}</span>

    </td>
    <td class="text-center">
        {{ $asset->category->name }}
    </td>
    
    @role('admin') 
    <td>
        <span>&#8369;{{ number_format($asset->price, 2) }}</span>
    </td>

    @endrole
    <td>
        <a class="btn btn-primary btn-sm my-1" href="{{ route('assets.show', ['asset' => $asset->id])  }}">
            <i class="fas fa-folder">
            </i>
            View
        </a>
        @role('admin')
        <a class="btn btn-info btn-sm my-1" href="{{ route('assets.edit', ['asset' => $asset->id]) }}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>
        <form action="{{ route('assets.destroy', ['asset'=> $asset->id]) }}" method="POST"
            id="deleteAssetForm{{ $asset->id }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm my-1 deleteAssetBtn" href="#"
                data-form="deleteAssetForm{{ $asset->id }}">
                <i class="fas fa-trash">
                </i>
                Delete
            </button>
        </form>
        @endrole
    </td>
</tr>

@endforeach