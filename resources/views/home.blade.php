
@extends('layouts.app')
@section('title', 'Home')
{{-- @section('content') --}}     {{-- @endsection --}}
@include('index.menu')
<div style="margin: 25px;">
    <div class="card-container" style="margin-left: 18%">
        <div class="card col-md-6 offset-md-3" style="width: 18rem;">
            <div class="card-body" style="box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);">
              <h5 class="card-title"><p>TOTAL FILIERE &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i class="fas fa-book mr-1"></i></p></h5>
              <h3 class="card-text">{{ App\Models\Filiere::count() }}</h3>
              <a href="{{ url('admin/filiere') }}" class="small-box-footer" style="text-decoration: none;">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="footer" style="position: fixed;bottom: 0; width: 100%; text-align: center;">
        <p>&copy; Copyright WEBMARKO. Tous Les Droits Sont Réservés</p>
    </div>
</div>
