@extends('layouts.app')

@section('content')

<div style="margin: 160px auto !important; text-align: center;">
    <div>
        <h1>Welcome To Your Profile</h1>
        <h3>Profile Name : {{ Auth::user()->name }}</h3>
        <h3>Customer ID : {{ Auth::user()->id }}</h3>
        <h3>Address : {{ Auth::user()->address }}</h3>
        <h3>Contact Number : {{ Auth::user()->contact_number }}</h3>
    </div>
    <a href="/project_type"><button>Select Project Type</button></a>
</div>

@endsection