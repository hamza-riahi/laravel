<template>
 
        <div class="row mt-5">
           
        <div class="col-md-12">
              <div class="card">
            <div class="card-header">
              <h3 class="card-title"> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>jours</th>
                   <th>e1</th>
                   <th>p1</th>
                   <th>p2</th>
                  <th>s1</th>
                 
                  <th>e2</th>
                  <th>p3</th>
                  <th>p4</th>
                  <th>s2</th>
                  <th>mod</th>
                </tr>
                </thead>
                <tbody>
                      <tr v-for="heur in heurs.slice(0,1)" :key="heur.id">
                    <td> {{heur.jour}}</td>
                    <td> {{heur.e1}}</td>
                    <td> {{heur.p1}}</td>
                    <td> {{heur.p2}}</td>

                    <td> {{heur.s1}}</td>
                    
                    
                    <td> {{heur.e2}}</td>
                    <td> {{heur.p3}}</td>
                    <td> {{heur.p4}}</td>                    
                    <td> {{heur.s2}}</td>
                   <td>
                            <a href="#" @click="modifheur(heur)" ><i class=" fa fa-edit"></i>modifier h/t</a>
                        
                        </td>
                </tr>
               
                <tr v-for="heur in heurs.slice(1,2)" :key="heur.id">
                    <td> {{heur.jour}}</td>
                    <td> {{heur.e1}}</td>
                    <td> {{heur.p1}}</td>
                    <td> {{heur.p2}}</td>

                    <td> {{heur.s1}}</td>
                    
                     <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>

                    
                   <td>
                            <a href="#" @click="modifheur1(heur)" ><i class=" fa fa-edit"></i>modifier h/t</a>
                        
                        </td>
                </tr>
                
               
              
            
                </tbody>
               
              </table>
               

















   </div>

            </div>
             <div class="card">
            <div class="card-header">
              <h3 class="card-title">   </h3>
            </div>
            <!-- /.card-body -->
              <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
               
                <tbody>
                      <tr v-for="pr in prs" :key="pr.id">
                       <td><h5>l'intervalle de temps:</h5></td>
                    <td>date de debut: {{pr.dateDeb}}</td>
                    <td>date de fin:  {{pr.dateDeb}}</td>
                  
                   <td>
                            <a href="#" @click="modifpr(pr)" ><i class=" fa fa-edit"></i>modifier intervale</a>
                        
                        </td>
                </tr>
               
               
                
               
              
            
                </tbody>
               
              </table>
               














</div>

         
          </div>
        </div>





<!-- Modal -->
<div class="modal fade" id="modifpr" tabindex="-1" role="dialog" aria-labelledby="modifprLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifprLabel">Modif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>




<form @submit.prevent="updatpr()">

      <div class="modal-body">
       
<div class="form-group">
donner la date de début et de fin pour le calcul de pointage de chaque moins (nbr entre 1 et 30):

      
      <input v-model="form1.dateDeb" type="text" name="dateDeb"
      placeholder="dateDeb"
        class="form-control" :class="{ 'is-invalid': form1.errors.has('dateDeb') }">
      <has-error :form="form1" field="dateDeb"></has-error>
    </div>



      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">update</button>
      </div>
      </form>
    </div>
  </div>
</div>

























<!-- Modal -->
<div class="modal fade" id="modifheu" tabindex="-1" role="dialog" aria-labelledby="modifheuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifheuLabel">Modif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>




<form @submit.prevent="updateheur">

      <div class="modal-body">
       
<div class="form-group">
Jour:
      
      <input v-model="form.jour" type="text" name="jour"
      placeholder="Jour"
        class="form-control" :class="{ 'is-invalid': form.errors.has('jour') }">
      <has-error :form="form" field="jour"></has-error>
    </div>

<div class="form-group">
     E1: 
      <input v-model="form.e1" input type="time" name="e1"
      placeholder="e1"
        class="form-control" :class="{ 'is-invalid': form.errors.has('e1') }">
      <has-error :form="form" field="e1"></has-error>
    </div>


<div class="form-group">
     p1: 
      <input v-model="form.p1" input type="time" name="p1"
      placeholder="p1"
        class="form-control" :class="{ 'is-invalid': form.errors.has('p1') }">
      <has-error :form="form" field="p1"></has-error>
    </div>



<div class="form-group">
     p2: 
      <input v-model="form.p2" input type="time" name="p2"
      placeholder="p2"
        class="form-control" :class="{ 'is-invalid': form.errors.has('p2') }">
      <has-error :form="form" field="p2"></has-error>
    </div>


<div class="form-group">
      S1:
      <input v-model="form.s1" input type="time" name="s1"
      placeholder="s1"
        class="form-control" :class="{ 'is-invalid': form.errors.has('s1') }">
      <has-error :form="form" field="s1"></has-error>
    </div>
    <div class="form-group">
      E2:
      <input v-model="form.e2" input type="time" name="e2"
      placeholder="e2"
        class="form-control" :class="{ 'is-invalid': form.errors.has('e2') }">
      <has-error :form="form" field="jour"></has-error>
    </div>




<div class="form-group">
     p3: 
      <input v-model="form.p3" input type="time" name="p3"
      placeholder="p3"
        class="form-control" :class="{ 'is-invalid': form.errors.has('p3') }">
      <has-error :form="form" field="p3"></has-error>
    </div>



<div class="form-group">
     p4: 
      <input v-model="form.p4" input type="time" name="p4"
      placeholder="p4"
        class="form-control" :class="{ 'is-invalid': form.errors.has('p4') }">
      <has-error :form="form" field="p4"></has-error>
    </div>






    <div class="form-group">
      S2:
      <input v-model="form.s2" input type="time" name="s1"
      placeholder="s2"
        class="form-control" :class="{ 'is-invalid': form.errors.has('s2') }">
      <has-error :form="form" field="jour"></has-error>
    </div>



      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">ok</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modifheu1" tabindex="-1" role="dialog" aria-labelledby="modifheu1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifheu1Label">Modif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>




<form @submit.prevent="updateheur1">

      <div class="modal-body">
       
<div class="form-group">
Jour:
      
      <input v-model="form.jour" type="text" name="jour"
      placeholder="Jour"
        class="form-control" :class="{ 'is-invalid': form.errors.has('jour') }">
      <has-error :form="form" field="jour"></has-error>
    </div>

<div class="form-group">
     E1: 
      <input v-model="form.e1" input type="time" name="e1"
      placeholder="e1"
        class="form-control" :class="{ 'is-invalid': form.errors.has('e1') }">
      <has-error :form="form" field="e1"></has-error>
    </div>


<div class="form-group">
     p1: 
      <input v-model="form.p1" input type="time" name="p1"
      placeholder="p1"
        class="form-control" :class="{ 'is-invalid': form.errors.has('p1') }">
      <has-error :form="form" field="p1"></has-error>
    </div>



<div class="form-group">
     p2: 
      <input v-model="form.p2" input type="time" name="p2"
      placeholder="p2"
        class="form-control" :class="{ 'is-invalid': form.errors.has('p2') }">
      <has-error :form="form" field="p2"></has-error>
    </div>


<div class="form-group">
      S1:
      <input v-model="form.s1" input type="time" name="s1"
      placeholder="s1"
        class="form-control" :class="{ 'is-invalid': form.errors.has('s1') }">
      <has-error :form="form" field="s1"></has-error>
    </div>
   

      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">ok</button>
      </div>
      </form>
    </div>
  </div>
</div>



    </div>
</template>

<script>
    export default {
        data(){
        return{
        heurs:{},
        prs:{},
                form:new Form({
                 id:'',
                    jour:'',
                    e1:'',
                    p1:'',
                    p2:'',
                    s1:'',
                    e2:'',
                    p3:'',
                    p4:'',
                    s2:''

}),
form1:new Form({
                 id:'',
                    dateDeb:'',
                    DateFin:'',
                   
})
               } 



       
        },
        

methods:{

updateheur()
{


console.log(this.form)
          this.form.put('api/heur1/'+this.form.id);
     $('#modifheu').modal('hide');


},
updateheur1()
{


console.log(this.form)
          this.form.put('api/heur1/'+this.form.id);
     $('#modifheu1').modal('hide');


},
updatpr()
{
      this.form1.put('api/periode/'+this.form1.id);
     $('#modifpr').modal('hide');


},
modifpr(pr){
    
    this.form1.reset();
     $('#modifpr').modal('show');
     this.form1.fill(pr);

},



    
loadHours(){
axios.get("api/heur1").then(({data})=>(this.heurs=data.data));
},
loadPrs(){ 
axios.get("api/periode").then(({data})=>(this.prs=data.data));
},
modifheur(heur){
    
    this.form.reset();
     $('#modifheu').modal('show');
     this.form.fill(heur);

},


modifheur1(heur){
    
    this.form.reset();
     $('#modifheu1').modal('show');
     this.form.fill(heur);

},
















































},

        created() {
            
            {
            this.loadPrs();
            this.loadHours();
            Fire.$on('afterCreated',()=>{
            this.loadHours()();

            });
            setInterval(()=>this.loadHours(),2000);
           setInterval(()=>this.loadPrs(),2000);

        }
        }
    }
</script>
