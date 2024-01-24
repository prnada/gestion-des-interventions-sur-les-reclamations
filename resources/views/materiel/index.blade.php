<x-app-layout>
    <x-slot name="head">
        <link href="{{asset('css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/cdn.jsdelivr.net_npm_bootstrap-icons@1.7.2_font_bootstrap-icons.css')}}"
            rel="stylesheet">
    </x-slot>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des matériaux:</h3>

        <div class="container mx-auto px-6 py-2">
            <div class="text-right">

                <a href="{{route('Materiel.create')}}" class="btn btn-outline-primary">Nouveau
                    matériel</a>

            </div>
            @if (session()->has("successDelete"))
            <div class="alert alert-success">
                <h4> {{session()->get('successDelete')}} </h4>
            </div>
            @endif


            <form class="d-flex mr-3" action="{{ route('Materiel') }}" method="GET">
                <div class="form-group input-group-sm mb-0 mr-1">


                    <input id="search" name="search" class=" form-control" placeholder="Rechercher"
                        value="{{ request('search') }}">
                </div>
            </form>
            <table id="example" class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Type du matériel</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($materiels as $materiel)

                    <tr class="hover:bg-grey-lighter">
                        <th scope="row">{{$loop->index +1}}</th>
                        <td class="fw-normal text-center">{{ $materiel->materiel }}</td>
                        <td class="fw-normal text-center">

                            <div class="text-center">
                                <!-- -->

                                <a href="#" class="btn btn-danger btn-sm"
                                    onclick="if(confirm('Voulez-vous vraiment supprimer ce matériel?')){document.getElementById('form-{{$materiel->id}}').submit()}">Supprimer</a>
                                @csrf
                                <form id="form-{{$materiel->id}}"
                                    action="{{route('Materiel.supprimer',['materiel'=>$materiel->id])}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">

                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            {{$materiels->links()}}

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