<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body">
                       
                    </div>
                      <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>name</th>
                   <th>id</th>
                   <th>jour</th>
                   <th>nbrheurs</th>
                  <th>mod</th>
                 
              
                </tr>
                </thead>
                <tbody>
                      <tr v-for="objet in objets"v-if="objet.nbrHeureus==0"  :key="objet.id">
                    <td> {{objet.EnNo}}</td>
                    <td> {{objet.Name_GMNo}}</td>
                    <td> {{objet.jour}}</td>
                    <td> {{objet.nbrHeureus}}</td>

                   
                   <td>
                            <a href="#" @click="modifobj(objet)" ><i class=" fa fa-edit"></i>modifier h/t</a>
                        
                        </td>
                </tr>
               
               
                
               
              
            
                </tbody>
               
              </table>



<div class="modal fade" id="modifobj" tabindex="-1" role="dialog" aria-labelledby="modifobjLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifprLabel">Modif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>




<form @submit.prevent="updatobj()">

      <div class="modal-body">
       
<div class="form-group">
donner la date de début et de fin pour le calcul de pointage de chaque moins (nbr entre 1 et 30):

      
      <input v-model="form.nbrHeureus" type="text" name="nbrHeureus"
      placeholder="nbrHeureus"
        class="form-control" :class="{ 'is-invalid': form.errors.has('nbrHeureus') }">
      <has-error :form="form" field="nbrHeureus"></has-error>
    </div>



      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">update</button>
      </div>
      </form>
    </div>
  </div>
</div>






                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    data() {
          
            return{ 
                        modifmode:false,

                    emps:{},
                    rapports:{},
                    filtres:{},
                    points:{},
                    objets:{},
                    periodes:{},
                    form:new Form({
                        id:'',
                        nbrHeureus: '',
                        jour: '',
                        EnNo: '',
                        Name_GMNo: ''


                })
            }



},
        methods:{
        updatobj()
{
      this.form.put('api/objet/'+this.form.id);
     $('#modifobj').modal('hide');


},
    
modifobj(obj){
    
    this.form.reset();
     $('#modifobj').modal('show');
     this.form.fill(obj);

},

loadobjet(){


axios.get("api/objet").then(({data})=>(


this.objets=data.data
//console.log(this.objets)



));



},        },

created() {
                   this.loadobjet();
                    

            setInterval(()=>this.loadobjet(),3000);

        }
    }
</script>
