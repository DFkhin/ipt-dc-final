@extends('base')

@section('title', 'Logs')

@extends('navbar')

@section('content')
    <div class="container">
        <div class="d-grid gap-2 d-md-flex mt-2">
            <h1 style="font-family: ubuntu">Activity Log</h1>
        </div>
        <table class="table table-bordered table-striped table-sm table-hover">
            <thead style="background-color: rgb(17, 162, 172); font-size: 20px;height:50px">
                <th>Timestamp</th>
                <th>Log Entry</th>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                <tr style="font-size: 1.5rem">
                    <td>{{ $log->created_at->format('l, d F Y g:i A') }}</td>
                    <td>{{ $log->log_entry }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $logs->links() }}
        
        <section style="margin-top: 5%; font-size: 1.3rem">
            <div class="col">
                <hr>
                <div class="col-sm-6 mt-3">
                    <h2 style="font-family: Ubuntu">Recent Blog</h2>
                    <div class="recent-only">
                        <livewire:blogs.dash-recent-blog/>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

