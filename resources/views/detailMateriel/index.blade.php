<x-app-layout>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des matériels avec leurs détails</h3>
        <div>
            <div class="d-flex justify-content-end mb-4">
                <a href="{{route('DetailMateriel.create')}}" class="btn btn-outline-primary">Nouveau matériel</a>
            </div>

            @if (session()->has("successDelete"))
            <div class="alert alert-success">
                <h4> {{session()->get('successDelete')}} </h4>
            </div>
            @endif
            <form class="d-flex mr-3" action="{{ route('DetailMateriel') }}" method="GET">
                <div class="form-group input-group-sm mb-0 mr-1">


                    <input id="search" name="search" class=" form-control" placeholder="Rechercher"
                        value="{{ request('search') }}">
                </div>
            </form>
            <table class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Type matériel</th>
                        <th scope="col" class="text-center">Réference</th>

                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_materiels as $detail_materiel)
                    <tr>
                        <th scope="row">{{$loop->index +1}}</th>
                        <td class="fw-normal text-center"> {{ $detail_materiel->materiel?->materiel }}</td>
                        <td class="fw-normal text-center">{{ $detail_materiel->reference }}</td>

                        <td>
                            <div class="text-center">


                                <a href="#" class="btn btn-danger btn-sm"
                                    onclick="if(confirm('Voulez-vous vraiment supprimer ce matériel?')){document.getElementById('form-{{$detail_materiel->id}}').submit()}">Supprimer</a>

                                <form id="form-{{$detail_materiel->id}}"
                                    action="{{route('DetailMateriel.supprimer',['detailmateriel'=>$detail_materiel->id])}}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">

                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            {{$detail_materiels->links()}}
        </div>
    </div>
    <script>
        const searchInput = document.getElementById('search');
    const rows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function(event) {
        const searchQuery = event.target.value.toLowerCase();

        rows.forEach(row => {
            const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (name.includes(searchQuery)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    </script>
    <style>
        .input-group-sm .form-control {
            height: 30px;
            font-size: 0.875rem;
            width: 150px;

        }

        .input-group-sm .btn {
            height: 30px;
            font-size: 0.875rem;
        }

        .input-group-sm {
            justify-content: flex-start;
        }
    </style>
</x-app-layout>