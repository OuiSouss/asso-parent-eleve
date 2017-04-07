@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('admin.adherents.edit', $adherent) }}" class="btn btn-success">
        <i class="fa fa-pencil-square-o"></i>
    </a>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box show">
                <div class="box-body">
                    <table>
                        <tr>
                            <td>Nom</td>
                            <td>{{ $adherent->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td>{{ $adherent->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Contribution</td>
                            <td>{{ $adherent->contribution }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><a href="mailto:{{ $adherent->user->email }}">{{ $adherent->user->email }}</a></td>
                        </tr>
                        <tr>
                            <td>Numéro de téléphone</td>
                            <td><a href="phone:{{ $adherent->phone }}">{{ $adherent->phone }}</a></td>
                        </tr>
                        <tr>
                            <td>Adresse</td>
                            <td>{{ $adherent->address }}</td>
                        </tr>
                        <tr>
                            <td>Ville</td>
                            <td>{{ $adherent->city }}</td>
                        </tr>
                        <tr>
                            <td>Code postal</td>
                            <td>{{ $adherent->postal_code }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="box-body">
                    <h4>Commandes</h4>
                    <ul>
                        @foreach ($adherent->orders as $order)
                            <li><a href="{{ route('admin.orders.show', $order->id) }}">Commande N°{{ $order->id }}</a>
                            </li>
                        @endforeach
                    </ul>
                    @if ($adherent->orders->isEmpty())
                        <small>Pas de commandes à afficher</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection