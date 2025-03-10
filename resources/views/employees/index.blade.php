@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Pegawai</h5>
                <a class="btn btn-sm btn-success" href="{{ route('employees.create') }}">
                    <i class="bi bi-plus-circle me-1"></i>Tambah Pegawai Baru
                </a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="50" class="text-center">No</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Gaji</th>
                                <th width="200" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + $employees->firstItem() - 1 }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->formatted_salary }}</td>
                                <td class="text-center">
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                        <a class="btn btn-sm btn-info text-white" href="{{ route('employees.show', $employee->id) }}">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('employees.edit', $employee->id) }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data pegawai</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection