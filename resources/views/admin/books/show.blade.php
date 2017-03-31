@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('admin.books.edit',$book_reference) }}" class="btn btn-success">
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
                            <td>ISBN</td>
                            <td>{{ $book_reference->ISBN }}</td>
                        </tr>
                        <tr>
                            <td>Prix initial</td>
                            <td>{{ $book_reference->initial_price }}</td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td>{{ $book_reference->section->name }}</td>
                        </tr>
                        <tr>
                            <td>Niveau </td>
                            <td> {{ $book_reference->level->name }}</td>
                        </tr>
                        <tr>
                            <td>Matière</td>
                            <td>{{ $book_reference->subject->name }}</td>
                        </tr>
                        <tr>
                            <td>Nombre de livres avec cette référence</td>
                            <td>{{ $a_book  }}</td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="box show">
                <div class="box-body">
                    <h4>Livres correspondant à cette référence</h4>
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Etat</th>
                                    <th>Available</th>
                                </tr>
                            </thead>
                            @foreach($books as $book)
                            <tbody>
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->state }}</td>
                                    <td>{{ $book->available }}</td>

                                </tr>
                            </tbody>
                                @endforeach
                        </table>
                </div>
            </div>
            <div class="box show" id="histo" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto">

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('histo', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Stacked bar chart'
            },
            xAxis: {
                categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total fruit consumption'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'John',
                data: [5, 3, 4, 7, 2]
            }, {
                name: 'Jane',
                data: [2, 2, 3, 2, 1]
            }, {
                name: 'Joe',
                data: [3, 4, 4, 2, 5]
            }]
        });

    </script>
@endsection