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
  <!-- <div class=" alert alert-light text-center text-danger"><h2>INGRESO 2025 </h2></div> -->

     {{--   {!! $html !!}
        {!! $html2 !!}  --}}

        <br>



    </div>
@endsection
