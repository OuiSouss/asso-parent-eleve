@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('adherents.edit', $adherent) }}" class="btn btn-success">
        <i class="fa fa-pencil-square-o"></i>
    </a>
@endsection

@section('content')
    <div class='row show'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box">
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
                        <ul>
                        @foreach($order->books as $book)
                            <li>
                                <ul>
                                    <li>{{ $book->book_reference->initial_price }} €</li>
                                    <li>{{ $book->state }}</li>
                                    <li>{{ $book->book_reference->ISBN }}</li>
                                    <li>{{ $book->book_reference->section->name }}</li>
                                    <li>{{ $book->book_reference->level->name }}</li>
                                    <li>{{ $book->book_reference->subject->name }}</li>
                                </ul>
                            </li>
                        @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection