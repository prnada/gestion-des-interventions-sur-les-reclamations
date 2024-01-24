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
        <form action="{{ route('annulerReclamation') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id_recl" value="{{ $reclamation->id }}">
            <div class="flex flex-col space-y-2">


                <label for="commentaire" class="label-style">Ajoutez un commentaire
                    pour justifier
                    l'annulation de cette réclamation:</label>
                <textarea id="commentaire" name="commentaire" rows="4" class="form-control"></textarea>

            </div>
            <div class="flex justify-center py-6">
                <button type="submit"
                    class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">Valider</button>
            </div>

        </form>
    </div>

</x-app-layout>