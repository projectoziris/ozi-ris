@extends('layouts.app')
@section('title', 'Temujanji Baru')
@section('header', 'Buat Janji Temu')

@section('content')
<form method="POST" action="{{ route('appointments.store') }}">
    @csrf

    <div class="form-group">
        <label>Pesakit</label>
        <select name="pesakit_id" class="form-control" required>
            <option value="">-- Pilih Pesakit --</option>
            @foreach ($pesakits as $pesakit)
                <option value="{{ $pesakit->id }}">{{ $pesakit->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Modality</label>
        <select name="modality_id" id="modality_id" class="form-control" required>
            <option value="">-- Pilih Modality --</option>
            @foreach ($modalities as $modality)
                <option value="{{ $modality->id }}">{{ $modality->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tarikh Temujanji</label>
        <input type="date" name="tarikh_temujanji" id="tarikh_temujanji" class="form-control" value="{{ $defaultDate }}" required>
    </div>

    <div class="form-group">
        <label>Masa Tersedia</label>
        <select name="masa_mula" id="masa_mula" class="form-control" required>
            {{-- Nanti kita load slot secara AJAX --}}
        </select>
    </div>

    <button class="btn btn-primary">Simpan Temujanji</button>
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    function loadSlots() {
        let modalityId = document.getElementById('modality_id').value;
        let date = document.getElementById('tarikh_temujanji').value;

        if (modalityId && date) {
            fetch(`/appointments/slots?modality_id=${modalityId}&date=${date}`)
                .then(res => res.json())
                .then(data => {
                    let select = document.getElementById('masa_mula');
                    select.innerHTML = '';
                    data.forEach(slot => {
                        let option = document.createElement('option');
                        option.value = slot.start;
                        option.text = `${slot.start} - ${slot.end}`;
                        select.appendChild(option);
                    });
                });
        }
    }

    document.getElementById('modality_id').addEventListener('change', loadSlots);
    document.getElementById('tarikh_temujanji').addEventListener('change', loadSlots);
});
</script>
@endpush
