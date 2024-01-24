<x-app-layout>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="mb-2 text-center">Les informations de cette réclamation:</h3>
    </div>

    <div class="container mx-auto px-6 py-8">

        <div class="mb-4">
            <div class="label-style">Objet réclamation:</div>
            <div class="value-style">{{ $reclamation->objet }}</div>

        </div>
        <div class="mb-4">
            <div class="label-style">Réclamation:</div>
            <div class="value-style">{{ $reclamation->reclamation }}</div>
        </div>
        <div class="mb-4">
            <div class="label-style">Local réclamation:</div>
            <div class="value-style">{{ $reclamation->site->Site .' '. $reclamation->batiment->Batiment .'
                '.$reclamation->etage->Etage .' '.$reclamation->listeLocal->Local .'
                '.$reclamation->local->inventaire }}</div>
        </div>
        <div class="mb-4">
            <div class="label-style">Matériel réclamation:</div>
            <div class="value-style">{{ $reclamation->typemateriel?->materiel .'
                '.$reclamation->detailmateriel?->reference}}</div>
        </div>

        <style>
            .label-style {
                font-weight: bold;
                font-size: 18px;
                color: #333;
                margin-bottom: 5px;
            }

            .value-style {
                font-size: 17px;
                color: #777;
            }
        </style>



        <form action="{{route('validerIntervention')}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="id_recl" value="{{ $reclamation->id }}">
            <div class="flex flex-col mb-4">
                {{-- <div class="w-full max-w-md mb-4">
                    <select name="id_met" id="metier"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                        <optgroup label="Choisissez le métier de l'intervenant">
                            <option value="" disabled selected hidden>Sélectionner un métier</option>
                        </optgroup>
                        @foreach($metiers as $metier)
                        <option value="{{ $metier->id }}">{{ $metier->Metier }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="w-full max-w-md mb-4">
                    <div class="label-style">Veuillez choisir le métier approprié:
                    </div>
                    <select name="id_met" id="metier"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                        <option value="">Sélectionner un métier</option>
                        @foreach($metiers as $metier)
                        <option value="{{ $metier->id }}">{{ $metier->Metier }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="label-style">Veuillez sélectionner l'intervenant pour cette réclamation:
                </div>
                <div class="select-container">

                    <div class="w-full max-w-md">
                        <select name="id_intr" id="intervenant"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                            <option value="">Sélectionnez un intervenant externe</option>
                        </select>
                    </div>

                    <div class="w-full max-w-md">
                        <select name="id_fonct" id="intervenant_interne"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                            <option value="">Sélectionnez un intervenant interne</option>
                        </select>
                    </div>
                </div>


                <div class="flex justify-center py-6">
                    <button type="submit"
                        class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">Valider</button>
                </div>
        </form>
    </div>

    <style>
        .select-container {
            display: flex;
            gap: 10px;
        }

        .select-container select {
            flex: 1;
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            outline: none;
            transition: border-color 0.3s;
        }

        .select-container select:focus {
            border-color: #3f83f8;
        }
    </style>


    <script>
        document.getElementById('metier').addEventListener('change', function () {
            var metierId = this.value;
            var intervenantSelect = document.getElementById('intervenant');
            intervenantSelect.innerHTML = '<option value="">Sélectionner un intervenant externe</option>';
            var intervenants = @json($intervenants);
            
             
            var searchInput = document.getElementById('searchInput').value.toLowerCase();
            
            var filteredIntervenants = intervenants.filter(function (intervenant) {
                return intervenant.id_met == metierId && intervenant.id != 0 && (
                    intervenant.denomination.toLowerCase().includes(searchInput) ||
                    intervenant.tel_int.includes(searchInput)
                );
            });
            
            filteredIntervenants.forEach(function (intervenant) {
                var option = document.createElement('option');
                option.value = intervenant.id;
                option.textContent = intervenant.denomination + '=>' + intervenant.tel_int;
                intervenantSelect.appendChild(option);
            });
        });
  
             
                document.getElementById('metier').addEventListener('change', function () {
                        var metierId = this.value;
                        var intervenant_interneSelect = document.getElementById('intervenant_interne');
                        intervenant_interneSelect.innerHTML = '<option value="">Sélectionner un intervenant interne</option><option value="0">Aucun</option>';
                        var fonctionnaires = @json($fonctionnaires);
                        
                        var filteredFonctionnaire = fonctionnaires.filter(function (fonctionnaire) {
                            return fonctionnaire.id_met == metierId && fonctionnaire.disponibilite == 1;
                        });
                        filteredFonctionnaire.forEach(function (fonctionnaire) {
                            var option = document.createElement('option');
                            option.value = fonctionnaire.id;
                            option.textContent = fonctionnaire.nom+'=>'+fonctionnaire.telephone;
                            intervenant_interneSelect.appendChild(option);
                        });
                    });
                    document.getElementById('intervenant_interne').addEventListener('change', function () {
                    var fonctionnaireId = this.value;

                    
                    var fonctionnaires = @json($fonctionnaires);
                    var selectedFonctionnaire= fonctionnaires.find(function (fonctionnaire) {
                        return fonctionnaire.id == fonctionnaireId;
                    });
                    if (selectedFonctionnaire) {
                        selectedFonctionnaire.disponibilite = 0;
                    }
                    
                });
    </script>
    <script>
        document.getElementById('metier').addEventListener('change', function () {
                    var metierId = this.value;
                    var intervenantSelect = document.getElementById('intervenant');
                    intervenantSelect.innerHTML = '<option value="">Sélectionner un intervenant externe</option> <option value="0">Aucun</option>';
                    var intervenants = @json($intervenants);
                    var filteredIntervenants = intervenants.filter(function (intervenant) {
                        return intervenant.id_met == metierId && intervenant.id != 0 ;  
                    });
                    filteredIntervenants.forEach(function (intervenant) {
                        var option = document.createElement('option');
                        option.value = intervenant.id;
                        option.textContent = intervenant.denomination+'=>'+intervenant.tel_int;
                        intervenantSelect.appendChild(option);
                    });
                });
            
                document.getElementById('intervenant_interne').addEventListener('change', function () {
                    var fonctionnaireId = this.value;
                    var intervenantSelect = document.getElementById('intervenant');
                    intervenantSelect.value = "0"; // Définir la valeur sur "Aucun"
                    
                    var fonctionnaires = @json($fonctionnaires);
                    var selectedFonctionnaire = fonctionnaires.find(function (fonctionnaire) {
                        return fonctionnaire.id == fonctionnaireId;
                    });
                    if (selectedFonctionnaire) {
                        selectedFonctionnaire.disponibilite = 0;
                    }
                });
            
                document.getElementById('intervenant').addEventListener('change', function () {
                    var intervenantId = this.value;
                    var intervenantInterneSelect = document.getElementById('intervenant_interne');
                    intervenantInterneSelect.value = "0"; // Définir la valeur sur "Aucun"
                });
    </script>




</x-app-layout>