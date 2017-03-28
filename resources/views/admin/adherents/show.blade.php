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
                    @foreach ($adherent->orders as $order)
                        <b>Commande N°{{ $order->id }}</b>
                        <p>{{ count($order->books) }} livre(s)</p>
                        <p>Montant : {{ $order->price }} €</p>
                        @if(!$order->books->isEmpty())
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ISBN</th>
                                    <th>Niveau</th>
                                    <th>Section</th>
                                    <th>Matière</th>
                                    <th>État</th>
                                    <th>Prix</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->books as $book)
                                    <tr>
                                        <td>{{ $book->book_reference->ISBN }}</td>
                                        <td>{{ $book->book_reference->level->name }}</td>
                                        <td>{{ $book->book_reference->section->name }}</td>
                                        <td>{{ $book->book_reference->subject->name }}</td>
                                        <td>{{ $book->state }}</td>
                                        <td>{{ $book->actualised_price }} €</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endforeach
                    @if ($adherent->orders->isEmpty())
                        <small>Pas de commandes à afficher</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection