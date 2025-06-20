@extends('frontend.layout.main')
@section('title', 'Inscripciones')
@section('content')

    <div class="links">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
            </div>
        @endif
   <div class=" alert alert-light text-center text-danger"><h2>INGRESO 2025 </h2></div>

 
       <form method="get" action="{{ route('inscripciones.confirmar')}}">
        <div class="form-group ">
            {{ Form::label('dni', 'DNI', ['class' => 'control-label']) }}
            {!! Form::number('dni', old('dni'), [
                'step' => '1',
                'min' => '10000000',
                'max' => '100000000',
                'class' => 'form-control',
                'placeholder' => 'Ingrese el DNI',
            ]) !!}
            @error('dni')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
 
        <div class="col text-center mt-3"></b>
            {!! Form::submit('VALIDAR TURNO', ['class' => 'btn btn-outline-success', 'style' => 'width: 100%']) !!}
            </b></div>
  </form> <br>
        {!! $html !!}
   
        <br>  <br> <br> <br> <br> <br><br>  <br> <br> <br> <br> <br> <br> <br> <br>
      
       
    </div>
@endsection
