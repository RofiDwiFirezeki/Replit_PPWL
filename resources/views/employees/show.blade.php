@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0">Detail Pegawai</h5>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Nama</div>
            <div class="col-md-9">{{ $employee->name }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Posisi</div>
            <div class="col-md-9">{{ $employee->position }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Gaji</div>
            <div class="col-md-9">Rp {{ number_format($employee->salary, 0, ',', '.') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Tanggal Dibuat</div>
            <div class="col-md-9">{{ $employee->created_at->format('d/m/Y H:i') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Terakhir Diperbarui</div>
            <div class="col-md-9">{{ $employee->updated_at->format('d/m/Y H:i') }}</div>
        </div>
    </div>
</div>
@endsection