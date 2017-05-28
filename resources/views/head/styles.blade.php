<link rel="stylesheet" type="text/css" media="all" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/fonts.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/common.css') }}">

@if(isset($styles) && count($styles) > 0)
    @foreach($styles as $style)
        @if(is_array($style))
            <link rel="stylesheet" type="text/css" media="{{ $style['media'] ? $style['media'] : 'all' }}"
                  href="{{ asset($style['link'] ? $style['link'] : '') }}">
        @else
            <link rel="stylesheet" type="text/css" media="all" href="{{ asset($style) }}">
        @endif
    @endforeach
@endif