@foreach ($assets as $asset)
<tr>
    <td class="text-center">

        <img src="{{ asset("$asset->image") }}" alt="{{ $asset->name }}" style="max-height: 40px; width: auto;">
    </td>
    <td>{{ $asset->name }}</td>
    <td>{{ $asset->code }}</td>
    <td>{{ $asset->serial }}</td>
</tr>
@endforeach