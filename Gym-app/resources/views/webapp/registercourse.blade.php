@extends('webapp.templates.allpagestemplate')
@section('title', 'nuova prenotazione')

@section('content')

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('course.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome_corso" class="form-label">Nome Corso</label>
                <select class="form-select" id="nome_corso" name="nome_corso">
                    <?php
                    $corsi = [$selectedcourse, "Bodybuildng", "Zumba", "Yoga", "Pilates", "CrossFit", "Kickboxing"];
                    foreach ($corsi as $corso) {
                        $selected = ($selectedcourse == $corso) ? "selected" : ""; // Imposta selected se $selectedcourse corrisponde al corso attuale
                        echo "<option value='$corso' $selected>$corso</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="numero_sala" class="form-label">Numero Sala</label>
                <select class="form-select" id="numero_sala" name="numero_sala"></select>
            </div>

            <div class="mb-3">
                <label for="data_prenotazione" class="form-label">Data Prenotazione</label>
                <input type="date" class="form-control" id="data_prenotazione" name="data_prenotazione" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
            </div>

            <div class="mb-3">
                <label for="fascia_oraria" class="form-label">Fascia Oraria</label>
                <select class="form-select" id="fascia_oraria" name="fascia_oraria">
                    <?php
                    $startHour = 8;
                    $endHour = 19;
                    for ($hour = $startHour; $hour <= $endHour; $hour++) {
                        $timeStart = sprintf('%02d:00', $hour);
                        $timeEnd = sprintf('%02d:00', $hour + 1);
                        $optionText = "$timeStart - $timeEnd";
                        echo "<option value='$timeStart - $timeEnd'>$optionText</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>
        </form>
    </div>

    @if ($selectedcourse)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src= "/{{ $selectedcourse }}.png" class="card-img-top" alt="...">
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    const corsiSala = {
        "Bodybuildng": [1, 2],
        "Zumba": [3, 4],
        "Yoga": [5, 6],
        "Pilates": [7, 8],
        "CrossFit": [9, 10],
        "Kickboxing": [11, 12]
    };

    function updateNumeroSala() {
        const corsoSelezionato = document.getElementById("nome_corso").value;
        const opzioniSala = corsiSala[corsoSelezionato] || []; // Ottiene le opzioni per il corso selezionato
        const numeroSalaSelect = document.getElementById("numero_sala");

        numeroSalaSelect.innerHTML = "";

        opzioniSala.forEach(numero => {
            const option = document.createElement("option");
            option.value = numero;
            option.textContent = numero;
            numeroSalaSelect.appendChild(option);
        });
    }

    document.getElementById("nome_corso").addEventListener("change", updateNumeroSala);

    updateNumeroSala();
</script>

@endsection
