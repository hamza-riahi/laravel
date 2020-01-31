<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>enno</th>
                   <th>name</th>
                  <th>calcult</th>
                 
                  <th>jour</th>
                  <th>s2</th>
                  <th>mod</th>
                </tr>
                </thead>
                <tbody>
                      <tr v-for="calcul in calculs" :key="calcul.id">
                  
                    <td> {{calcul.EnNo}}</td>
                    <td> {{calcul.Name_GMNo}}</td>
                    <td> {{calcul.calcultravail}}</td>
                    <td> {{calcul.jour}}</td>
                   <td>
                            <a href="#" @click="modifheur(heur)" ><i class=" fa fa-edit"></i>modifier h/t</a>
                        
                        </td>
                </tr>
               
               
                
               
              
            
                </tbody>
               
              </table>
               
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    data(){
        return{
       calculs:{},
                form:new Form({
                 id:'',
                    EnNo:'',
                    Name_GMNo:'',
                    calcultravail:'',
                    jour:''
                    

})
               } 

       
        },

methods:{



    
loadHours(){
axios.get("api/calcul").then(({data})=>(this.calculs=data.data));
}


},


        created() {
            this.loadHours();
        }
    }
</script>
