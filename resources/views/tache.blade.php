@extends('layouts.app')

@section('title')
    Mes tâches | {{ config('app.name', 'Laravel') }}
@endsection

@section('content')

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <!-- Ajout d'une photo pour objectif SMART -->

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default text-center">
                        <img src="/imgs/tache.png" alt="Objectif SMART" width="600" height="250" padding="40 40">
                    </div>
                </div>
            </div>
        </div>


                    <!---Ajout de formulaire-->


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajout des tâches</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('tache')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="id_objectif" class="col-md-4 control-label">Identifiant de l'objectif</label>

                            <div class="col-md-6">
                                <select name="id_objectif" id="id_objectif" class="form-control">
                                        <option value="" selected>--- Sélectionner un objectif ---</option>
                                    @foreach ($objectifs as $objectif)
                                        <option value="{{ $objectif -> Id_objectif }}">{{$objectif -> Id_objectif}}</option>
                                    @endforeach
                                </select>                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Identifiant de la tâche</label>

                            <div class="col-md-6">
                                <input id="id_tache" type="text" class="form-control" name="id_tache" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Libellé" class="col-md-4 control-label">Libellé</label>

                            <div class="col-md-6">
                                <input id="libellé_tache" type="text" class="form-control" name="libellé_tache" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description_tache" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea name="description_tache" id="description_tache" cols="45" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                    <!--
                        <div class="form-group">
                            <label for="progression" class="col-md-4 control-label">Progression</label>

                            <div class="col-md-6 progress-bar">
                                progress
                            </div>
                        </div>
                    -->

                        <div class="form-group">
                            <label for="date_début" class="col-md-4 control-label">Date de début</label>

                            <div class="col-md-6">
                                <input id="date_début" type="date" class="form-control" name="date_début" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date_fin" class="col-md-4 control-label">Date de fin</label>

                            <div class="col-md-6">
                                <input id="date_fin" type="date" class="form-control" name="date_fin" value="" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter tâche
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ajout du tableau dynamique -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Tableau récapitulatif des tâches</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Identifiant de l'objectif</th>
                                                    <th>Identifiant de la tâche</th>
                                                    <th>Libellé</th>
                                                    <th>Description</th>
                                                    <th>Date de début</th>
                                                    <th>Date de fin</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($taches as $tache)
                                                    <tr>
                                                        <td>{{ $tache -> Id_objectif }}</td>
                                                        <td>{{ $tache -> id_tache }}</td>
                                                        <td>{{ $tache -> libelle_tache}}</td>
                                                        <td>{{ $tache -> description_tache}}</td>
                                                        <td>{{ $tache -> DateDebut_tache}}</td>
                                                        <td>{{ $tache -> DateFin_tache }}</td>
                                                    </tr>
                                                @endforeach
                                                <!-- Boucle pour remplir dynamiquement le table -->
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
