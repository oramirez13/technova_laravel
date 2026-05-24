@extends('layouts.plantilla')

@section('title', trans('Nuevo Avance'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Nuevo Avance') }}</h4>

            <form action="{{ route('avances.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="descripcion">{{ trans('Descripción de actividades') }}</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="horas">{{ trans('Horas trabajadas') }}</label>
                    <input type="number" name="horas" id="horas" class="form-control" min="1" value="{{ old('horas') }}">
                    @error('horas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha">{{ trans('Fecha') }}</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}">
                    @error('fecha')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sprint_id">{{ trans('Sprint') }}</label>
                    <select name="sprint_id" id="sprint_id" class="form-control">
                        <option value="">{{ trans('Seleccione un sprint') }}</option>
                        @foreach($sprints as $sprint)
                            <option value="{{ $sprint->id }}" @selected((string) old('sprint_id') === (string) $sprint->id)>
                                {{ $sprint->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('sprint_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-principal">{{ trans('Guardar Avance') }}</button>
                <a href="{{ route('avances.index') }}" class="btn btn-secundario">{{ trans('Cancelar') }}</a>
            </form>
        </div>
    </div>

@endsection
