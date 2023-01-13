@extends('adminView.AdminDashboard')
@section('content')
    <h2>Leave Notices</h2>
    @foreach ($list as $leave)
        <form method="POST" action="{{ route('updateleave', $leave) }}">
            @csrf
            <div style="margin: 3rem ;">
                {{ $leave }}
                <button type="submit"name="reject">reject</button>
                <button type="submit"name="approve">approve</button>
            </div>
        </form>
    @endforeach
@endsection
