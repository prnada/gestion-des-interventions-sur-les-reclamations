<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h3 class="mb-2 text-center">Liste de vos réclamations:</h3>
        </div>
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                @can('reclamation create')
                <a href="{{route('Reclamation.create')}}" class="btn btn-primary">Nouvelle
                    réclamation</a>
                @endcan
            </div>

            <div class="bg-white shadow-md rounded my-6">
                <table id="example" class="table table-striped table-bordered mt-3">
                    <thead>
                        <tr>
                            @can('reclamation validate')<th
                                class="text-center py-3 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Check</th> @endcan
                            <th
                                class="text-center py-3 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Objet</th>
                            <th
                                class=" text-center py-3 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Réclamation</th>
                            <th
                                class="text-center py-3 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Date réclamation</th>

                            <th
                                class="text-center py-3 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">
                                Etat</th>

                            <th
                                class="text-center py-3 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @canany('create and access own reclamations','reclamation add','reclamation edit','reclamation
                        delete','reclamation validate')
                        @foreach($reclamations as $reclamation)
                        <tr class="hover:bg-grey-lighter">
                            @can('reclamation edit')<td><input class="Select" onclick="GetSel()" type="checkbox" name=""
                                    id=""> <input class="sta" type="text" name="status" value="{{$reclamation->status}}"
                                    style="display:none;" /></td> @endcan
                            <td class="py-3 px-4 border-b border-grey-light">{{ $reclamation->objet }}</td>
                            <td class="py-3 px-4 border-b border-grey-light">{{ $reclamation->reclamation }}</td>
                            <td class="py-3 px-4 border-b border-grey-light">{{ $reclamation->datereclamation }}</td>
                            </td>

                            <td class="py-3 px-4 border-b border-grey-light">
                                @if($reclamation->status == 0)
                                <span class="spa " style="color:red;text-align:center;">Pas validé</span>
                                @else
                                <span class="spa " style="color:green;text-align:center;">Validé</span>
                                @endif
                            </td>


                            <td class="py-3 px-4 border-b border-grey-light text-right">
                                <div class="text-center">
                                    @can('reclamation edit')
                                    <a href="{{route('Reclamation.edit',$reclamation->id)}}"
                                        class="btn btn-info btn-sm">Modifier</a>
                                    @endcan

                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="if(confirm('Voulez-vous vraiment supprimer cette réclamation?')){document.getElementById('form-{{$reclamation->id}}').submit()}">Supprimer</a>
                                    @csrf
                                    <form id="form-{{$reclamation->id}}"
                                        action="{{route('Reclamation.supprimer',['reclamation'=>$reclamation->id])}}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endcanany
                    </tbody>
                </table>
            </div>

        </div>
        <form action="{{route('updateAllReclamation')}}" method="POST">
            {{csrf_field()}}
            @can('reclamation validate')
            <button type="submit"
                style="position:fixed;margin-left:200px; color:white;background-color:green;border:1px solid green;width:120px;height:40px;border-radius:5px;">
                valider
            </button>
            @endcan
            <table style="display:none;">
                <thead>
                    <tr>
                        <th>check</th>
                        <th>Validation</th>
                        <th>input</th>
                        <th style="display:none;">ID</th>
                        <th style="display:none;">centre</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>check</th>
                        <th>Validation</th>
                        <th>input</th>
                        <th style="display:none;">ID</th>
                    </tr>
                </tfoot>
                <tbody>



                    @php

                    for($x=0; $x <$nbr; $x++){ $id=isset($prestasi[$x]) ? $prestasi[$x]->id:'';
                        $status = isset($prestasi[$x]) ? $prestasi[$x]->status:'';

                        @endphp


                        <tr class="hover:bg-grey-lighter">
                            <td><input type="checkbox" name="" id=""> </td>
                            <td>
                                <?php
            if($status == 0){
              echo'<span class="spa" style="color:red;">Pas validé</span>';
            }else{
              echo'<span class="spa" style="color:green;">Validé</span>';
            }
          ?>

                            </td>
                            <td><input class="stat" type="text" name="status[]" value="{{$status}}" /></td>
                            <td style="display:none;"><input style="width:100px;height:20px;" type="text" name="id[]"
                                    value="{{$id}}"></td>

                        </tr>
                        @php
                        }
                        @endphp
                </tbody>
            </table>

        </form>
    </main>
    <script>
        function GetSel() {
         
        var grid = document.getElementById("example");
        var spa = document.getElementsByClassName("spa");
         var checkBoxes = document.getElementsByClassName("Select");
         var sta = document.getElementsByClassName("sta");
         var stat = document.getElementsByClassName("stat");
         var btnmodif = document.getElementsByClassName("btnmodif");
         
         for (var i = 0; i < grid.rows.length; i++) {
  
           var row = checkBoxes[i].parentNode.parentNode;
             if (checkBoxes[i].checked) {
                
                 //row.cells[1].textContent = "non valide";
                  sta[i].value = "0";
                  sta[i].value = sta[i].value;
                  stat[i].value = sta[i].value;
                  spa[i].textContent = "Pas validé";
                  spa[i].style.color = "red";
             } else{
                 //row.cells[1].textContent = "valide";
                 sta[i].value = "1";
                 stat[i].value = sta[i].value;
                 spa[i].textContent = "Validé";
                 spa[i].style.color = "green";
                 stat[i].value = sta[i].value;
             }
         }
        
     }
   
     window.onload = (event) => {
        var grid = document.getElementById("example");
        var spa = document.getElementsByClassName("spa");
        var sta = document.getElementsByClassName("sta");
        var checkBoxes = document.getElementsByClassName("Select");
  
  
        
       
        for (var i = 0; i < grid.rows.length; i++) {
  
                var row = checkBoxes[i].parentNode.parentNode;
                if (sta[i].value == "0") {
                  checkBoxes[i].checked = true;
                    //row.cells[1].textContent = "non valide";
                    spa[i].style.color = "red";
                } else{
                    //row.cells[1].textContent = "valide";
                    checkBoxes[i].checked = false;
                  
                    spa[i].style.color = "green";
                  
                }
        }
     }
  
  
  
    </script>
    </div>
</x-app-layout>