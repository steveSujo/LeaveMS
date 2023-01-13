@extends('adminView.AdminDashboard')
@section('content')
    <h2>Employees</h2>
    @foreach ($list as $emp)
        <form method="POST" action="{{ route('CRUDEmp', [$emp->id]) }}">
            @csrf
            <div style="margin: 3rem;">
                {{ $emp }}
                <button type="submit" name='remove'>remove Employee</button>
                <select name="EmployeeType" id="">
                    @if ($emp->type == null)
                        <option selected value="null">None</option>
                        @foreach ($typeList as $empType)
                            <option value="{{ $empType->id }}">{{ $empType->type }}</option>
                        @endforeach
                    @else
                        <option value="null">None</option>
                        @foreach ($typeList as $empType)
                            @if ($emp->type == $empType->type)
                                <option selected value="{{ $empType->id }}">{{ $empType->type }}</option>
                            @else
                                <option value="{{ $empType->id }}">{{ $empType->type }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                <button type="submit" name='changeType'>ChangeType</button>
            </div>
        </form>
    @endforeach
@endsection

@section('options')
    <h2>Add emp</h2>
    <form method="POST" action="{{ route('addEmp') }}">
        @csrf
        <label>
            <input type="text" name='email'>
        </label>
        <button type="submit">Add employee</button>
    </form>
@endsection
