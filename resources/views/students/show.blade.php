@extends('layout.app')
@section('title', 'Student Detail')
@section('content')
    <div class="row">
        <div class="col-md">
            <h3>Detail Mahasiswa</h3>
            @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $student['nama'] }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $student['jurusan'] }}</h6>
                    <p class="card-text">
                        <strong>NRP :</strong> {{ $student['nrp'] }}
                        <br />
                        <strong>Email :</strong> {{ $student['email'] }}
                    </p>
                    <a href="/students" class="btn btn-primary btn-sm">Kembali</a>
                    <a href="/students/{{ $student['id'] }}/edit" class="btn btn-info btn-sm">Edit</a>
                    <form action="/students/{{ $student['id'] }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
