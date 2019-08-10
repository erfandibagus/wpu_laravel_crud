@extends('layout.app')
@section('title', 'Students')
@section('content')
    <div class="row">
        <div class="col-md">
            <h3>Daftar Mahasiswa Baru</h3>
            @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/students/create" class="btn btn-primary btn-sm mb-3">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student['nama'] }}</td>
                            <td>
                                <a href="/students/{{ $student['id'] }}" class="badge badge-info mr-1">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h3 class="mt-3">Daftar Mahasiswa Dihapus</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trashed as $trash)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trash['nama'] }}</td>
                            <td>
                                <a href="/students/{{ $trash['id'] }}/trashed" class="badge badge-info mr-1">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
