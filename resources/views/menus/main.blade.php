<nav class="header__menu">
    <ul>
        @foreach($items as $menu_item)
            <li>
                <a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
                {{--  
                @if ($menu_item->title == 'Cart')
                    <span>{{ Cart::instance('default')->count() }}</span>
                @endif--}}
            </li>
        @endforeach
    </ul>
</nav>
