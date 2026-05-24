@extends('layouts.plantilla')

@section('title', trans('Editar Avance'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Editar Avance') }}</h4>

            <form action="{{ route('avances.update', $avance->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="descripcion">{{ trans('Descripción de actividades') }}</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $avance->descripcion) }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="horas">{{ trans('Horas trabajadas') }}</label>
                    <input type="number" name="horas" id="horas" class="form-control" min="1" value="{{ old('horas', $avance->horas) }}">
                    @error('horas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha">{{ trans('Fecha') }}</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $avance->fecha) }}">
                    @error('fecha')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sprint_id">{{ trans('Sprint') }}</label>
                    <select name="sprint_id" id="sprint_id" class="form-control">
                        @foreach($sprints as $sprint)
                            <option value="{{ $sprint->id }}" @selected((string) old('sprint_id', $avance->sprint_id) === (string) $sprint->id)>
                                {{ $sprint->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('sprint_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-principal">{{ trans('Actualizar Avance') }}</button>
                <a href="{{ route('avances.show', $avance->id) }}" class="btn btn-secundario">{{ trans('Cancelar') }}</a>
            </form>
        </div>
    </div>

@endsection
