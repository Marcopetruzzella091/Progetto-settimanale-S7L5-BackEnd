@extends('webapp.templates.allpagestemplate')
@section('title', 'Corsi Disponibili')

@section('content')

<div class="row my-5">
    <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/bodybuilding.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body d-flex flex-wrap" style="height: 100%;">
                        <h5 class="card-title">Bodybuilding</h5>
                        <p>Corsi intensivi di sollevamento pesi per sviluppare la forza e la massa muscolare.</p>
                        <a href="/course/create?selectedcourse=Bodybuilding" class="btn btn-dark w-100 mt-auto">Prenota</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/zumba.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body d-flex flex-wrap" style="height: 100%;">
                        <h5 class="card-title">Zumba</h5>
                        <p class="card-text">Allenamenti divertenti e dinamici che combinano movimenti di danza con ritmi vivaci.</p>
                        <a href="/course/create?selectedcourse=Zumba" class="btn btn-dark w-100 mt-auto">Prenota</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/yoga.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body d-flex flex-wrap" style="height: 100%;">
                        <h5 class="card-title">Yoga</h5>
                        <p class="card-text">Lezioni di yoga per migliorare la flessibilità, ridurre lo stress e ritrovare l'equilibrio interiore.</p>
                        <a href="/course/create?selectedcourse=Yoga" class="btn btn-dark w-100 mt-auto">Prenota</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/pilates.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body d-flex flex-wrap" style="height: 100%;">
                        <h5 class="card-title">Pilates</h5>
                        <p class="card-text">Corsi che enfatizzano il controllo del corpo, la postura corretta e il rafforzamento del nucleo.</p>
                        <a href="/course/create?selectedcourse=Pilates" class="btn btn-dark w-100 mt-auto">Prenota</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/crossfit.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body d-flex flex-wrap" style="height: 100%;">
                        <h5 class="card-title">Crossfit</h5>
                        <p class="card-text">Programmi di allenamento ad alta intensità che combinano esercizi di resistenza, sollevamento pesi e cardio.</p>
                        <a href="/course/create?selectedcourse=CrossFit" class="btn btn-dark w-100 mt-auto">Prenota</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/kickboxing.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body d-flex flex-wrap" style="height: 100%;">
                        <h5 class="card-title">Kickboxing</h5>
                        <p class="card-text">Corsi che offrono un mix di tecniche di pugilato e calci, perfetti per migliorare la forza e la coordinazione.</p>
                        <a href="/course/create?selectedcourse=Kickboxing" class="btn btn-dark w-100 mt-auto">Prenota</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Auth::user()->role == 'admin'){<h2 class="text-center my-5">Prenotazioni di tutti gli utenti</h2>}
@else {
    <h2 class="text-center my-5">Prenotazioni recenti</h2>
}
@endif



<ul>
    @if($courses)
        @foreach($courses as $key => $value)
        <li class="list-group-item">
            <h1>{{$value->progetto}}</h1>
        </li>
        @endforeach
    @endif

    @if(count($courses) > 0 )
    <table class="table">
    <thead>
        <tr>
            <th>Corso</th>
            <th>Sala</th>
            <th>Stato richiesta</th>
            <th>Data Prenotazione</th>
            <th>Fascia oraria</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses  as $item)
        <tr>
            <td>{{ $item['nome_corso'] }}</td>
            <td>{{ $item['numero_sala'] }}</td>
            <td>{{ $item['stato_richiesta'] }}</td>
            <td>{{ $item['data_prenotazione'] }}</td>
            <td>{{ $item['fascia_oraria'] }}</td>
            <td>
                <form action="/course/{{ $item -> id }}" method="post">
                    @csrf 
                    @method('DELETE') 
                    <button type="submit" class="btn btn-danger">Cancella</button>
                </form>
            </td>
            <td>
                <a href="/course/{{ $item -> id }}/edit" class="btn btn-primary">Modifica</a>
            </td>
         
            
        </tr>
        @endforeach
    </tbody>
</table>

    @else
    <h2>Non ci sono Prenotazioni</h2>
    @endif
</ul>

@endsection
