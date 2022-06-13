@extends('layouts.app')

@section('title')
    Insertion des objectifs | {{ config('app.name', 'Laravel') }}
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
                       <!-- <img src="/imgs/objectif-smart-marketing.jpg" alt="Objectif SMART" width="600" height="250" padding="40 40"> -->
                        <img src="/imgs/objectifs2.png" alt="Objectif SMART" width="600" height="250" padding="40 40">
                    </div>
                </div>
            </div>
        </div>

    <!--- Ajout du formulaire d'insertion des objectifs -->

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Insertion des objectifs</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Identifiant de l'objectif</label>

                                <div class="col-md-6">
                                    <input id="id_objectif" type="text" class="form-control" name="id_objectif" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Libellé_objectif" class="col-md-4 control-label">Libellé</label>

                                <div class="col-md-6">
                                    <input id="libellé_objectif" type="text" class="form-control" name="libellé_objectif" value="" required>
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
                                <label for="deadline" class="col-md-4 control-label">DeadLine</label>

                                <div class="col-md-6">
                                    <input id="deadline" type="date" class="form-control" name="deadline" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="département" class="col-md-4 control-label">Département</label>

                                <div class="col-md-6">
                                    <!-- <input id="date_fin" type="date" class="form-control" name="date_fin" value="" required autofocus> -->
                                    <select name="departement" id="code_dép" class="form-control">
                                        <!-- Ajouter ici les codes des départements statiquement -->
                                        &nbsp;
                                        <option value="">--- Sélectionner un département ---</option>
                                    <!--
                                        <option value="dia/srm">Service Réseaux & Maintenance</option>
                                    -->

                                        @foreach($departement as $departement)
                                            <option value="{{ $departement -> Code_dir}}/{{ $departement -> Code_dep}}">{{ $departement -> Nom_dep }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Insérer objecif
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
                                <div class="panel-heading text-center">Tableau récapitulatif des objectifs</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Identifiant de l'objectif</th>
                                                    <th>Libellé</th>
                                                    <th>DeadLine</th>
                                                    <th>Département</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($objectifs as $objectif)
                                                    <tr>
                                                        <td>{{ $objectif -> Id_objectif }}</td>
                                                        <td>{{ $objectif -> Libelle_objectif }}</td>
                                                        <td>{{ $objectif -> DeadLine }}</td>
                                                        <td>{{ $objectif -> Code_dep}}</td>
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