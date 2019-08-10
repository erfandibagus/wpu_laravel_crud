@extends('layout.app')
@section('title', 'Student Detail')
@section('content')
    <div class="row">
        <div class="col-md">
            <h3>Detail Mahasiswa yang Dihapus</h3>
            @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $student[0]['nama'] }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $student[0]['jurusan'] }}</h6>
                    <p class="card-text">
                        <strong>NRP :</strong> {{ $student[0]['nrp'] }}
                        <br />
                        <strong>Email :</strong> {{ $student[0]['email'] }}
                    </p>
                    <a href="/students" class="btn btn-primary btn-sm">Kembali</a>
                    <form action="/students/{{ $student[0]['id'] }}/trashed" method="post" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                    </form>
                    <form action="/students/{{ $student[0]['id'] }}/trashed" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
