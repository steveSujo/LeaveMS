@extends('employeeView.EmployeeDashboard')
@section('details')
    <div>
        <h2>total amount of days</h2>
        {{ $total_days }}
    </div>
    @if ($remaining_days != 0)
        <div>
            <h2>Remaining days</h2>
            {{ $remaining_days }}
        </div>
    @endif
@endsection
@section('content')
    @foreach ($leaveList as $leave)
        <div style="margin: 3rem;">
            {{ $leave }}
        </div>
    @endforeach
@endsection
@section('options')
    <form method="POST" action="{{ route('applyLeave') }}">
        @csrf
        <input type="text" name="days" placeholder="Days">
        <button type="submit">Apply leave</button>
    </form>
@endsection
