@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('admin.books.edit',$book_reference) }}" class="btn btn-success">
        <i class="fa fa-pencil-square-o"></i>
    </a>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-6'>
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
                            <td>
                                @if(is_null($book_reference->section))
                                    N/A
                                @else
                                    {{ $book_reference->section->name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Niveau </td>
                            <td>
                                @if(is_null($book_reference->level))
                                    N/A
                                @else
                                    {{ $book_reference->level->name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Matière</td>
                            <td>
                                @if(is_null($book_reference->subject))
                                    N/A
                                @else
                                    {{ $book_reference->subject->name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Nombre de livres avec cette référence</td>
                            <td>
                                <span class="badge">{{ $a_book  }}</span>
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6" >
            <div class="box show" id="histo">

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('histo', {
            chart: {
                type: 'bar',
            },
            title: {
                text: 'Etat livres libres/pris'
            },
            xAxis: {
                categories: ['5', '4', '3', '2', '1']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nombre de livres'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal',
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function () {
                                if (this.series.name.localeCompare("Available") === 0)
                                {
                                    location.href = '{{url("admin/books_views/")}}/' + {{$book_reference->id}} + '/1/' + this.category ;
                                }
                                else
                                {
                                    location.href = '{{url("admin/books_views/")}}/' + {{$book_reference->id}} + '/0/' + this.category ;
                                }
                                //alert('Category: ' + this.category + 'value: ' + this.y);
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Available',
                data: {{  $available }}
            }, {
                name: 'Not_available',
                data: {{ $not_available }}
            }]
        });

    </script>
@endsection