<div class="breadcrumbs">
    <ul>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

        @php
            $segments = request()->segments();
            $url = '';
        @endphp

        @foreach ($segments as $key => $segment)
            @php
                $url .= '/' . $segment;
            @endphp

            @if ($key + 1 < count($segments))
                <li>
                    <a href="{{ url($url) }}">{{ ucfirst($segment) }}</a>
                </li>
            @else
                <li class="active">{{ ucfirst($segment) }}</li>
            @endif
        @endforeach
    </ul>
</div>