@extends('adminView.AdminDashboard')
@section('content')
    <h2>Leave Type </h2>
    @foreach ($list as $type)
        <form method="POST" action="{{ route('removeLeaveType', $type) }}">
            @csrf
            <div style="margin: 3rem ;">
                {{ $type }}
                <button type="submit"name="remove">remove</button>
            </div>
        </form>
    @endforeach
@endsection

@section('options')
    <h2>add Type</h2>
    <form method="POST" action="{{ route('addType') }}">
        @csrf
        <label>
            <input type="text" name='type'>
            <input type="text" name='days'>
        </label>
        <button type="submit">Add Type</button>
    </form>
@endsection
