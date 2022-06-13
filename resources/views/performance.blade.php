@extends('layouts.app')

@section('title')
    Evaluation Performances | {{ config('app.name', 'Laravel') }}
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
                        <img src="/imgs/Performance.png" alt="Evaluation des performances" width="600" height="250" padding="40 40">
                    </div>
                </div>
            </div>
        </div>


                    <!---Ajout de formulaire-->



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default text-center">
                <div class="panel-heading">Evaluation des performances</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('performance') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                            <!--
                                <input type="text" for="name" class="form-control">
                            -->

                            <select name="name" id="name" class="form-control">
                                    <option value="" selected>--- Sélectionner un Nom ---</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user -> id }}">{{$user -> name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                    <!--    <div class="form-group">
                            <label for="Libellé" class="col-md-4 control-label">Département</label>

                            <div class="col-md-6">
                                <select name="département" id="département" class="form-control">
                                        <option value="">
                                            <!--Ajout dynamique de la liste des départements --><!--
                                        </option>
                                </select>
                            </div>
                        </div>
                    -->

                        <div class="form-group">
                            <label for="date_début" class="col-md-4 control-label">Période</label>

                            <div class="col-md-6">
                            <!--    <input id="période" type="date" class="form-control" name="période" value="" required> -->
                            Du <input type="date" class="form-control" name="startdate"> au <input type="date" class="form-control" name="enddate">

                            </input>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="critere" class="col-md-4 control-label" name="competence">Compétences évaluer</label>
                        <!--
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="Productivité" id="Productivite" name="Productivité">
                                <label for="Productivite" class="form-check-label">Productivité</label> &nbsp; &nbsp;

                                <input type="checkbox" class="form-check-input" value="Efficacité" id="Efficacite" name="Efficacité">
                                <label for="Efficacite" class="form-check-label">Efficacité</label> &nbsp; &nbsp;

                                <input type="checkbox" class="form-check-input" value="Pertinence" id="Pertinence" name="Pertinence">
                                <label for="Pertinence" class="form-check-label">Pertinence</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="Cohérence" id="Coherence" name="Cohérence">
                                <label for="Coherence" class="form-check-label">Cohérence</label> &nbsp; &nbsp;
                            
                                <input type="checkbox" class="form-check-input" value="Efficience" id="Efficience" name="Efficience">
                                <label for="Efficience" class="form-check-label">Efficience</label> &nbsp; &nbsp;

                                <input type="checkbox" class="form-check-input" value="Viabilité/Durabilité" id="Viabilite" name="Viabilité/Durabilité">
                                <label for="Viabilite" class="form-check-label">Viabilité/Durabilité</label>
                            </div>
                        -->

                        @foreach ($competence as $comp)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="{{ $comp -> Id_Comp }}" id="{{ $comp -> Id_Comp }}" name="{{ $comp -> Nom_Comp }}">
                                <label for="{{ $comp -> Id_Comp }}" class="form-check-label" name="{{ $comp -> Nom_Comp }}">{{ $comp -> Nom_Comp }}</label>
                            </div>
                        @endforeach
                        </div>

                        <div class="form-group">
                            <label for="Libellé" class="col-md-4 control-label" name="note">Note</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" min="1" max="20" name="note"> &nbsp; sur 20
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Evaluer
                                </button>
                                <!--
                                    <a href="{{ route('prime') }}">
                                        <button type="" class="btn btn-success">
                                            Calculer prime 
                                        </button>                                   
                                    </a>
                                -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ajout d'un tableau pour afficher les évaluations -->
<div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Tableau de consultation des évaluations</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Période</th>
                                                    <th>Compétences évaluer</th>
                                                    <th>Note</th>
                                                <!--    <th>Notes</th>  -->
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($evaluation as $evaluation)
                                                    <tr>
                                                        <td>{{ $evaluation -> name }}</td>
                                                        <td>du {{ $evaluation -> periodedebut_eval }} au {{ $evaluation -> periodefin_eval }}</td>
                                                        <td>{{ $evaluation -> id }}</td>
                                                        @foreach ($evaluation -> competences as $competence)
                                                            <td>{{ $competence -> pivot -> note }}</td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                                <!-- Boucle pour remplir dynamiquement la table -->
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>        

@endsection