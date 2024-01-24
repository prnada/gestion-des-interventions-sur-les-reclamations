<x-app-layout>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des réclamations:</h3>
        @if (session()->has("successDelete"))
        <div class="alert alert-success">
            <h4> {{session()->get('successDelete')}} </h4>
        </div>
        @endif



        <div class="container mx-auto px-6 py-2">
            <div class="bg-white shadow-md rounded my-6">
                <table id="example" class="table table-striped table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>

                            <th class="text-center">Objet</th>
                            <th class="text-center"> Date réclamation</th>
                            <th class="text-center"> Local </th>
                            <th class="text-center">Matériel</th>
                            <th class="text-center">Etat</th>
                            <th class="text-center">Utilisateur réclamé</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @canany('reclamation access','reclamation assign','cancel reclamation')
                        @foreach($reclamations as $reclamation)
                        <tr>
                            <th scope="row">{{$loop->index +1}}</th>
                            <td class="fw-normal text-center py-3 px-3">{{ $reclamation->objet }}</td>

                            <td class="fw-normal text-center py-3 px-3">{{ $reclamation->datereclamation }}
                            </td>
                            <td class="fw-normal text-center py-3 px-3">{{ $reclamation->site?->Site .'> '.
                                $reclamation->batiment?->Batiment .'>'.$reclamation->etage?->Etage .'
                                > '.$reclamation->listeLocal?->Local
                                .'> '.$reclamation->local?->inventaire.'> '.$reclamation->local?->NumLoc}}</td>
                            <td class="fw-normal text-center py-3 px-3">{{ $reclamation->typemateriel?->materiel .'
                                => '.$reclamation->detailmateriel?->reference }}
                            </td>
                            <td class="fw-normal text-center py-3 px-3">
                                @if($reclamation->status == 0)
                                <span class="fw-bolder" style="color:red;text-align:center;">En cours..</span>
                                @else
                                <span class="fw-bolder" style="color:green;text-align:center;">Terminé</span>
                                @endif
                            </td>
                            <td class="fw-normal text-center py-3 px-3">{{
                                $reclamation->userAll?->nom.'=>'.$reclamation->userAll?->email}}</td>

                            <td class="fw-normal text-center">


                                @canany('reclamation assign','cancel reclamation')
                                <a href="{{route('Intervention',['reclamation'=>$reclamation->id])}}" class="btn
                                    btn-info btn-sm">Intervenir</a>

                                <a href="{{route('AnnulerIntervention',['reclamation'=>$reclamation->id])}}"
                                    class="btn btn-danger btn-sm">Annuler</a>
                                @endcanany
                                {{-- <a href="#"
                                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400"
                                    onclick="if(confirm('Voulez-vous vraiment supprimer cettz réclamation?')){document.getElementById('form-{{$reclamation->id}}').submit()}">Delete</a>
                                @csrf
                                <form id="form-{{$reclamation->id}}"
                                    action="{{route('Reclamation.supprimer',['reclamation'=>$reclamation->id])}}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">

                                </form>

                            </td> --}}
                        </tr>
                        @endforeach
                        @endcanany
                    </tbody>
                </table>

                {{$reclamations->links()}}
            </div>

        </div>


    </div>

</x-app-layout>