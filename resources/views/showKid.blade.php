@extends('layouts.app')
@section('content')

    <div class="containerShow">

        <div class="backBtnStyle">
            <a href="{{ route('kidshome') }}" class="backBtnStyle">Back</a>
        </div>
    
        <table class="styleTableShow">
                <tr> 
                    <td rowspan="3" class="no-border"><img src="{{$kids->photo}}" alt="{{$kids->name}}"></td>
                    <td class="nameSurnameTable" colspan="2">{{$kids->name}} {{$kids->surname}}</td>
                </tr>   
                <tr>
                    <td>{{$kids->age}} years old</td>
                    <td>{{$kids->country}}</td>
                </tr>
                <tr>
                    <td>ID - {{$kids->id}}</td>
                    <td>
                        @if ($kids->behaviour === 1)
                            <span class="active">Good</span>
                        @else
                            <span class="inactive">Bad</span>
                        @endif
                    </td>
                </tr>
        </table>
    </div>
@endsection