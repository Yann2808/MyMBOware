@extends('layouts.app')

@section('title')
    Acceuil | {{ config('app.name', 'Laravel') }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connecté !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
