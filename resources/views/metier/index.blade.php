<x-app-layout>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des métiers</h3>
        <div>
            <div class="d-flex justify-content-end mb-4">
                <a href="{{route('Metier.create')}}" class="btn btn-outline-primary"> Nouveau métier</a>
            </div>
            @if (session()->has("successDelete"))
            <div class="alert alert-success">
                <h4> {{session()->get('successDelete')}} </h4>
            </div>
            @endif
            <form class="d-flex mr-3" action="{{ route('Metier') }}" method="GET">
                <div class="form-group input-group-sm mb-0 mr-1">
                    <input id="search" name="search" class=" form-control" placeholder="Rechercher"
                        value="{{ request('search') }}">
                </div>
            </form>
            <table class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Description</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($metiers as $metier)
                    <tr>
                        <th scope="row">{{$loop->index +1}}</th>
                        <td class="fw-normal text-center">{{ $metier->Metier }}</td>

                        <td>
                            <div class="text-center">
                                <a href="#" class="btn btn-danger btn-sm"
                                    onclick="if(confirm('Voulez-vous vraiment supprimer ce métier?')){document.getElementById('form-{{$metier->id}}').submit()}">Supprimer</a>
                            </div>


                            <form id="form-{{$metier->id}}"
                                action="{{route('Metier.supprimer',['metier'=>$metier->id])}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">

                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            {{$metiers->links()}}
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