@extends('layouts.main')

@section('title', 'home')

@section('content')
    <pre>
        @php
            var_dump(phpinfo());
        @endphp
</pre>
@endsection