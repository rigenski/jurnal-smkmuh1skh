@extends('layouts.admin')
@section('jurnal_karyawan', 'active')

@section('title', 'Jurnal Karyawan')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row w-100 mx-0">
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <form action="{{ route('admin.jurnal_karyawan') }}" method="get"
                            class="d-flex align-items-center mb-2">
                            <input type="text" class="form-control datepicker mr-2" name="search1" autocomplete="off"
                                value="{{ $input1 }}">
                            <div class="mr-2 mt-2">
                                <h5>-</h5>
                            </div>
                            <input type="text" class="form-control datepicker mr-2" name="search2" autocomplete="off"
                                value="{{ $input2 }}">
                            <button class="btn btn-primary ml-2">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-end align-items-center flex-wrap">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('admin.jurnal_karyawan') }}" class="btn btn-warning px-2 ml-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="currentColor"
                                    class="bi bi-arrow-repeat m-auto text-white" viewBox="0 0 16 16">
                                    <path
                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                    <path fill-rule="evenodd"
                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                </svg>
                            </a>
                            @if ($input1 !== null || $input2 !== null)
                                <a href="{{ route('admin.jurnal_karyawan.export') }}"
                                    class="btn btn-success ml-2 mb-2">Export</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($data as $journal)
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td>{{ $journal->tanggal }}</td>
                                <td>{{ $journal->jumlah }}</td>
                            </tr>
                            <?php $count++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
