@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Pegawai</h5>
                <a class="btn btn-sm btn-secondary" href="{{ route('employees.index') }}">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 fw-bold">Nama:</label>
                    <div class="col-sm-10">
                        {{ $employee->name }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 fw-bold">Posisi:</label>
                    <div class="col-sm-10">
                        {{ $employee->position }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 fw-bold">Gaji:</label>
                    <div class="col-sm-10">
                        {{ $employee->formatted_salary }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 fw-bold">Terdaftar Pada:</label>
                    <div class="col-sm-10">
                        {{ $employee->created_at->format('d-m-Y H:i:s') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <a class="btn btn-primary me-2" href="{{ route('employees.edit', $employee->id) }}">
                            <i class="bi bi-pencil-square me-1"></i>Edit
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash me-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection