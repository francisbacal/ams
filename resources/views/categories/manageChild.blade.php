<ul>
    @foreach($childs as $child)
    <li>

        {{ $child->name }}
        @if(count($child->childs))
        @include('categories.manageChild',['childs' => $child->childs])
        @endif

    </li>
    @endforeach
</ul>
