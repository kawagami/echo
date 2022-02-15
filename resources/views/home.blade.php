@extends('layouts.app')

@section('content')
    <div id="echo">
        <container></container>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/socket.io.js') }}"></script>
    {{-- <script>
        window.onload = (event) => {
            console.log('here');
            window.Echo.channel('test-event')
                .listen('TestEvent', (e) => {
                    console.log(e);
                });
        };
    </script> --}}
@endsection
