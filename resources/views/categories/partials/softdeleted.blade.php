<tbody>

    <!--====== <LIST SECTION> ======-->

    @foreach ($categories as $category)

    <tr class="text-center">
        <td colspan="3">
            {{ $category->name }}
        </td>
        <td></td>
        <td></td>
        <td>
            {!! Form::open(['action'=>['CategoryController@restore', $category->id], 'method' => 'PUT', 'id' =>
            'categoryRestoreForm']) !!}

            {{-- {!! Form::hidden('id', $category->id) !!} --}}

            <button type="submit" class="btn btn-tool btn-sm" data-toggle="tooltip" title="Restore">
                <i class="fas fa-window-restore"></i>
            </button>

            {!! Form::close() !!}
        </td>
    </tr>

    @endforeach

    <!--====== <LIST SECTION> ======-->
</tbody>
