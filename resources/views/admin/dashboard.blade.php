@extends('layouts.admin_layout')
@section('content')
    @php
        $admin_name=Session::get('admin_name');
        echo "<h1>xin chào $admin_name</h1>"
    @endphp

@endsection
