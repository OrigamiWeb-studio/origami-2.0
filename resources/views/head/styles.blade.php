@if(isset($styles) && count($styles) > 0)
  @foreach($styles as $style)
    @if(is_array($style))
      <link rel="stylesheet" type="text/css" media="{{ $style['media'] ? $style['media'] : 'all' }}"
            href="{{ mix($style['link'] ? $style['link'] : '') }}">
    @else
      <link rel="stylesheet" type="text/css" media="all" href="{{ mix($style) }}">
    @endif
  @endforeach
@else
  <link rel="stylesheet" type="text/css" media="all" href="{{ mix('css/common.css') }}">
@endif