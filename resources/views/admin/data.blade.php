@extends('/layouts/app')

@section('title', 'Data Jurnal')

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Jurnal</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-start flex-column bd-highlight my-2">
                    <div class="px-2 bd-highlight">
                        <form action="/admin/data" method="get" class="d-flex">
                            <div class="form-group ">
                                <input type="text" class="form-control datepicker" name="search1" autocomplete="off" value="{{ $input1}}">
                            </div>
                            <div class="my-2 mx-2"><h5>-</h5></div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="search2" autocomplete="off" value="{{ $input2}}">
                            </div>
                            <div class="mx-2">
                                <button class="btn btn-primary ">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-end flex-column bd-highlight my-2">
                    <div class="px-2 bd-highlight">
                        <div class="d-flex ">
                            <div class="mx-2">
                                <a href="/admin/data" class="btn btn-warning p-1 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="currentColor" class="bi bi-arrow-repeat m-auto text-white" viewBox="0 0 16 16">
                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a href="/admin/data/export" class="btn btn-success">Export Semua</a>
                            </div>
                    </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $journal)
                    <tr>
                        <td>{{ $journal->tanggal }}</td>
                        <td>{{ $journal->jumlah }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection