<x-app-layout>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Edition d'un fonctionnaire</h3>
        <div class="mt-4">
            @if (session()->has("success"))
            <div class="alert alert-success">
                <h4> {{session()->get('success')}} </h4>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form style="width:60%" method="post" action="{{route('Fonctionnaire.update', ['frontuser'=>
                $frontuser->id]) }}">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" value="{{$frontuser->nom}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="prenom" value="{{$frontuser->prenom}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$frontuser->email}}">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Télephone</label>
                    <input type="text" class="form-control" name="telephone" value="{{$frontuser->telephone}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Structure</label>
                    <select class="form-control" name="id_str">
                        <option value=" "></option>
                        @foreach ($structures as $structure)
                        @if ($structure->id==$frontuser->str_id)
                        <option value="{{$structure->id}}" selected>{{$structure->Description}}</option>
                        @else
                        <option value="{{$structure->id}}">{{$structure->Description}}</option>
                        @endif
                        @endforeach


                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Métier</label>
                    <select class="form-control" name="id_met">
                        <option value=" "></option>
                        @foreach ($metiers as $metier)
                        @if ($metier->id==$frontuser->id_met)
                        <option value="{{$metier->id}}" selected>{{$metier->Metier}}</option>
                        @else
                        <option value="{{$metier->id}}">{{$metier->Metier}}</option>
                        @endif
                        @endforeach


                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{route('Fonctionnaire')}}" class="btn btn-danger">Annuler</a>

            </form>
        </div>
    </div>
</x-app-layout>