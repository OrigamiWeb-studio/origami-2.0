<!-- Libs -->

<!--[if lt IE 9]>
<script type="text/javascript" src="{{ asset('libs/html5shiv/es5-shim.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('libs/html5shiv/html5shiv.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('libs/html5shiv/html5shiv-printshiv.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('libs/respond/respond.min.js')}}"></script>
<![endif]-->

@if(isset($scripts) && count($scripts) > 0)
  @foreach($scripts as $script)
    <script type="text/javascript" src="{{ mix($script) }}"></script>
  @endforeach
@else
  <script type="text/javascript" src="{{ mix('js/common.js') }}"></script>
@endif

{!! $captcha->scriptWithCallback(['captcha-contact-us', 'captcha-start-project']) !!}