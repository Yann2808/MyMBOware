@extends('layouts.app')

@section('title')
    Calcul de Prime | {{ config('app.name', 'Laravel') }}
@endsection

@section('content')

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <!-- Ajout d'une photo pour décrire le don d'un bonus -->

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default text-center">
                        <img src="/imgs/prime-activite.png" alt="Prime d'Activité" width="600" height="250" padding="40 40">
                    </div>
                </div>
            </div>
        </div>


                    <!---Ajout de formulaire-->


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Calcul de prime</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">

                            <select name="name" id="name" class="form-control">
                                    <option value="" selected>--- Sélectionner un Nom ---</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user -> id }}">{{$user -> name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Libellé" class="col-md-4 control-label">Département</label>

                            <div class="col-md-6">
                                <select name="département" id="département" class="form-control" disabled>
                                        <option value="">
                                            <!--Ajout dynamique de la liste des départements -->
                                        </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="date_début" class="col-md-4 control-label">Salaire de base</label>

                            <div class="col-md-6">
                                <input id="période" type="number" class="form-control" name="période" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Libellé" class="col-md-4 control-label">Pourcentage de progression</label>

                            <div class="col-md-6">
                                <input type="number" id="progression" class="form-control" name="pourcentage" required>
                            </div>
                        </div>
                            <div class="text-center">
                                    <a href="{{ route('prime') }}">
                                        <button type="" class="btn btn-primary">
                                            Calculer prime 
                                        </button>                                   
                                    </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ajout d'un tableau qui va lister les entrées et les calculs effectués dans le formulaire -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Tableau de recensement des primes calculées</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Département</th>
                                                    <th>Salaire de base</th>
                                                    <th>Pourcentage de progression</th>
                                                    <th>Prime</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <!-- Boucle pour remplir dynamiquement le tableau -->
                                                <!-- La colonne prime va prendre le résultat du bouton "Calculer Prime" -->
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection