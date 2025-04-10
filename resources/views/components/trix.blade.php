<input type="hidden" {{$attributes}}  id="{{$attributes->get('name')}}" >
<trix-editor input="{{$attributes->get('name')}}" style="min-height: 200px;"></trix-editor>

@once
    {{--Файлы расположены через npm CDN--}}
{{--    @push('css')--}}
{{--        <link rel="stylesheet" type="text/css" href="{{asset('css/trix.css')}}">--}}
{{--    @endpush--}}
{{--    @push('js')--}}
{{--        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>--}}
{{--    @endpush--}}

    {{--Файлы расположены локально--}}
    @push('css')
        <link rel="stylesheet" type="text/css" href="{{asset('css/trix.css')}}">
    @endpush
    @push('js')
        <script type="text/javascript" src="{{asset('js/trix.js')}}"></script>
    @endpush
@endonce
