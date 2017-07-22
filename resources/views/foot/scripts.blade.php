<!-- Libs -->

<!--[if lt IE 9]>
<script type="text/javascript" src="{{ asset('libs/html5shiv/es5-shim.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('libs/html5shiv/html5shiv.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('libs/html5shiv/html5shiv-printshiv.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('libs/respond/respond.min.js')}}"></script>
<![endif]-->

<script type="text/javascript" src="{{ asset('libs/jquery/jquery-3.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/jcf/jcf.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/jcf/jcf.select.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/vue/vue.v2.3.0.min.js') }}"></script>

@if(isset($scripts) && count($scripts) > 0)
    @foreach($scripts as $script)
        <script type="text/javascript" src="{{ asset($script) }}"></script>
    @endforeach
@endif

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>