<x-app-layout>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Les réclamations à traiter:</h3>

        <div class="container mx-auto px-6 py-2">


            <div class="bg-white shadow-md rounded my-6">
                <table id="example" class="table table-bordered table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>

                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Objet</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Réclamation</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12 local-column">
                                Local
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">
                                Date réclamation</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($reclamations as $reclamation)
                        <tr class="hover:bg-grey-lighter">
                            <th scope="row">{{$loop->index +1}}</th>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $reclamation->objet }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $reclamation->reclamation }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $reclamation->site->Site
                                .' '. $reclamation->batiment->Batiment .'
                                '. $reclamation->etage->Etage .'
                                '.$reclamation->listeLocal->Local .'
                                '.$reclamation->local->inventaire.'
                                '.$reclamation->local->NumLoc }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{
                                $reclamation->datereclamation }}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>

        </div>


    </div>
</x-app-layout>