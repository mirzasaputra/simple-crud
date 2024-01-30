@extends('layouts.base')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success mb-3">{{ session()->get('success') }}</div>
    @endif

    <h1>{{ $title }}</h1>
    <div class="col-12 mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th width="1%">No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Username</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <button data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}" class="btn btn-danger">Hapus</button>
                            <div class="modal fade" id="deleteModal{{ $item->id }}" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('users.delete', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete?</h5>
                                            </div>
                                            <div class="modal-body">
                                                Data yang dihapus tidak dapat dikembalikan. Yakin ingin melanjutkan?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit">Ya, lanjutkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection