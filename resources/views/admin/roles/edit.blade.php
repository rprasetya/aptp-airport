@extends('layouts.master')

@section('title', 'Edit Role')

@section('css')
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1') Role @endslot
    @slot('title') Edit Role @endslot
  @endcomponent

  <div class="row">
    <div class="">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menambahkan method PUT untuk update -->

            <div class="mb-3">
              <label for="name" class="form-label">Nama Role</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Admin" value="{{ old('name', $role->name) }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Permissions</label>
              <div class="row">
                @foreach($permissions as $permission)
                  <div class="col-md-6">
                    <div class="form-check mb-2 d-flex gap-2 align-items-center">
                      <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="perm-{{ $permission->id }}" 
                      @if($role->permissions->contains($permission->id)) checked @endif> <!-- Cek apakah role sudah memiliki permission -->
                      <label class="form-check-label fs-5 mt-1" for="perm-{{ $permission->id }}">
                        {{ $permission->permission_name }}
                      </label>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="mt-4">
              <a href="{{ route('roles.index') }}" class="btn btn-secondary">Kembali</a>
              <button type="submit" class="btn btn-primary">Update Role</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
