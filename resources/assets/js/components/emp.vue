<template>
    <div class="container">
      <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employés</h3>

                <div class="card-tools">
                  
                  <button  class="btn btn-success" @click="newModal">Ajouter<i class="fas fa-user-plus fa-fw"></i></button> 
                </div>
              </div>
              <!-- /.card-header -->

              
              <div class="card-body table-responsive p-0">

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>matricule</th>
                      <th>Email</th>
                      <th>Portable</th>
                      <th>Addresse</th>
                      <th>Date de creation</th>
                      <th>Modifier</th>
                       <th>info</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="emp in emps" :key="emp.id">
                      
                      <td>{{emp.name}}</td>
                      <td>{{emp.email}}</td>
                       <td>{{emp.portable}}</td>

                      <td>{{emp.addresse}}</td>
                      <td>{{emp.created_at}}</td>
                        <td>
                            <a href="#" @click="modifierModal(emp)"  ><i class=" fa fa-edit"></i></a>
                            /
                            <a href="#" @click="deletemp(emp.id)"><i class=" fa fa-trash"></i></a>

                        </td>
                        <td>
             
                     <router-link v-bind:to="'/info/' + emp.name">Info</router-link>

<router-view></router-view>
  <!--                    <a href="#" @click="infoModal(emp,rapports)"  ><i class=" fa fa-edit"></i></a>
-->

                           
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="infoLabel">fiche emp</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form @submit.prevent="">
      <div class="modal-body">

       <div class="form-group">
               <h2 >rapport emp</h2>

      <ol>
    <li v-for="todo in infoemploy(form.name)">
     
    <p ><span style="white-space: nowrap"><span style="color: #e6511e;">emp num: </span> {{ todo }}</span></p>
    </li>
  </ol>
     
    </div>

        
<p>
    
    <a href="#total">total</a><br />
    <a href="#pointeuse">pointeuse</a><br />
</p>



        <div class="form-group">
        <h2 id="total">total</h2>

      <ol>
    <li v-for="todo in infoModal1()">
     
    <p ><span style="white-space: nowrap"><span style="color: #e6511e;">le moi de: </span> {{ todo }}</span></p>
    </li>
  </ol>
     
    </div>



       <div class="form-group">
               <h2 id="pointeuse">pointeuse</h2>

      <ol>
    <li v-for="todo in infoModal2(form.name,filtres)">
     
    <p ><span style="white-space: nowrap"><span style="color: #e6511e;">le moi de: </span> {{ todo }}</span></p>
    </li>
  </ol>
     
    </div>
    <div class="form-group">
      
       <a href="#" @click="infoempModal(form.name,filtres)"  ><i class=" fa fa-edit"></i></a>
                           
    </div>
   



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </form>
    </div>
  </div>
</div>





                        </td>


                    </tr>
                    
                    
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  "  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" v-show="!modifmode" id="addNewLabel">Ajouter</h5>
        <h5 class="modal-title" v-show="modifmode" id="addNewLabel">modifier info</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form @submit.prevent="modifmode ?modifemp() : ajoutemp()">
      <div class="modal-body">
        
        <div class="form-group">
      
      <input v-model="form.name" type="text" name="name"
      placeholder="Name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
      <has-error :form="form" field="name"></has-error>
    </div>
    <div class="form-group">
      
      <input v-model="form.email" type="text" name="email"
      placeholder="Email"
        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
      <has-error :form="form" field="email"></has-error>
    </div><div class="form-group">
      
      <input v-model="form.portable" type="text" name="portable"
      placeholder="Portable"
        class="form-control" :class="{ 'is-invalid': form.errors.has('portable') }">
      <has-error :form="form" field="portable"></has-error>
    </div><div class="form-group">
      
      <input v-model="form.addresse" type="text" name="addresse"
      placeholder="Addresse"
        class="form-control" :class="{ 'is-invalid': form.errors.has('addresse') }">
      <has-error :form="form" field="addresse"></has-error>
    </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button v-show="!modifmode" type="submit" class="btn btn-primary">Ajouter</button>
        <button v-show="modifmode" type="submit" class="btn btn-success">modofier</button>

      </div>
    </form>
    </div>
  </div>
</div>




<div class="modal fade" id="infoemp" tabindex="-1" role="dialog" aria-labelledby="infoempLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="infoempLabel">fiche emp2</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form @submit.prevent="">
      <div class="modal-body">
        
      
    <div class="form-group">
      
      <input v-model="form.email" type="text" name="email"
      placeholder="Email"
        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
      <has-error :form="form" field="email"></has-error>
    </div><div class="form-group">
      
      <input v-model="form.portable" type="text" name="portable"
      placeholder="Portable"
        class="form-control" :class="{ 'is-invalid': form.errors.has('portable') }">
      <has-error :form="form" field="portable"></has-error>
    </div><div class="form-group">
      
      <input v-model="form.addresse" type="text" name="addresse"
      placeholder="Addresse"
        class="form-control" :class="{ 'is-invalid': form.errors.has('addresse') }">
      <has-error :form="form" field="addresse"></has-error>
    </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </form>
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
                    heurs:{},
                    form:new Form({
                        id:'',
                        name: '',
                        email: '',
                        portable: '',
                        addresse: ''


                })
            }



},
mounted() {
    if (localStorage.getItem('reloaded')) {
        // The page was just reloaded. Clear the value from local storage
        // so that it will reload the next time this page is visited.
        localStorage.removeItem('reloaded');
    } else {
        // Set a flag so that we know not to reload the page twice.
        localStorage.setItem('reloaded', '1');
        location.reload();
    }
},
methods: {


loadperiodes(){


axios.get("api/periode").then(({data})=>(


this.periodes=data.data

//console.log(this.periodes)



));
},

 loadpointeuse(){


axios.get("api/pointeuse").then(({data})=>(


this.points=data.data
//console.log(this.points)


));
},
loadHours(){
axios.get("api/heur1").then(({data})=>(this.heurs=data.data,
console.log(this.heurs)));
},
modifemp(){
  this.form.put('api/point/'+this.form.id)
},




calcultot(array,arr1)
{var duree=0



  console.log(array.length)
    var i=0;
   while (i < array.length) { 
if(i+7 < array.length){

 const day = array[i].DateTime.substring(0, 2);
        var month = array[i].DateTime.substring(3, 5);
        month=parseInt(month) - 1
        const year = array[i].DateTime.substring(6, 10);
        const date = new Date(year, month, day);
 const day1 = array[i+1].DateTime.substring(0, 2);
        var month1 = array[i+1].DateTime.substring(3, 5);
        month1=parseInt(month1) - 1
        const year1 = array[i+1].DateTime.substring(6, 10);
        const date1 = new Date(year1, month1, day1);
 const day2 = array[i+2].DateTime.substring(0, 2);
        var month2 = array[i+2].DateTime.substring(3, 5);
        month2=parseInt(month2) - 1
        const year2 = array[i+2].DateTime.substring(6, 10);
        const date2 = new Date(year2, month2, day2);
 const day3 = array[i+3].DateTime.substring(0, 2);
        var month3 = array[i+3].DateTime.substring(3, 5);
        month3=parseInt(month3) - 1
        const year3 = array[i+3].DateTime.substring(6, 10);
        const date3 = new Date(year3, month3, day3);
   const day4 = array[i+4].DateTime.substring(0, 2);
        var month4 = array[i+4].DateTime.substring(3, 5);
        month4=parseInt(month4) - 1
        const year4 = array[i+4].DateTime.substring(6, 10);
        const date4 = new Date(year4, month4, day4);
   const day5 = array[i+5].DateTime.substring(0, 2);
        var month5 = array[i+5].DateTime.substring(3, 5);
        month5=parseInt(month5) - 1
        const year5 = array[i+5].DateTime.substring(6, 10);
        const date5 = new Date(year5, month5, day5);
   const day6 = array[i+6].DateTime.substring(0, 2);
        var month6 = array[i+6].DateTime.substring(3, 5);
        month6=parseInt(month6) - 1
        const year6 = array[i+6].DateTime.substring(6, 10);
        const date6 = new Date(year6, month6, day6);
   const day7 = array[i+7].DateTime.substring(0, 2);
        var month7 = array[i+7].DateTime.substring(3, 5);
        month7=parseInt(month7) - 1
        const year7 = array[7+i].DateTime.substring(6, 10);
        const date7 = new Date(year7, month7, day7);

     if((date7.getTime() === date.getTime())&&(array[i].EnNo == array[i+7].EnNo )){  
//console.log(8)

        const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);

         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);

         const heure2 = array[i+2].DateTime.substring(11, 13);
        const min2= array[i+2].DateTime.substring(14, 16);
        const dateDeb2 = new Date(year, month, day, heure2, min2);

         const heure3 = array[i+3].DateTime.substring(11, 13);
        const min3= array[i+3].DateTime.substring(14, 16);
        const dateDeb3 = new Date(year, month, day, heure3, min3);

         const heure4 = array[i+4].DateTime.substring(11, 13);
        const min4= array[i+4].DateTime.substring(14, 16);
        const dateDeb4 = new Date(year, month, day, heure4, min4);

         const heure5 = array[i+5].DateTime.substring(11, 13);
        const min5= array[i+5].DateTime.substring(14, 16);
        const dateDeb5 = new Date(year, month, day, heure5, min5);

         const heure6 = array[i+6].DateTime.substring(11, 13);
        const min6= array[i+6].DateTime.substring(14, 16);
        const dateDeb6 = new Date(year, month, day, heure6, min6);

 const heure7 = array[i+7].DateTime.substring(11, 13);
        const min7= array[i+7].DateTime.substring(14, 16);
        const dateDeb7 = new Date(year, month, day, heure7, min7);


 duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2)+(dateDeb5-dateDeb4)+(dateDeb7-dateDeb6))/ 60000)
 const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }

        var p=0;

   for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
    
//console.log('p=1')
      p=1

  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+8

//console.log(duree)

}

 else if((date5.getTime() === date.getTime())&&(date6.getTime() !== date.getTime())&&(array[i].EnNo == array[i+5].EnNo )){  
//console.log(6)
 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);

         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);

         const heure2 = array[i+2].DateTime.substring(11, 13);
        const min2= array[i+2].DateTime.substring(14, 16);
        const dateDeb2 = new Date(year, month, day, heure2, min2);

         const heure3 = array[i+3].DateTime.substring(11, 13);
        const min3= array[i+3].DateTime.substring(14, 16);
        const dateDeb3 = new Date(year, month, day, heure3, min3);

        const heure4 = array[i+4].DateTime.substring(11, 13);
        const min4= array[i+4].DateTime.substring(14, 16);
        const dateDeb4 = new Date(year, month, day, heure4, min4);

         const heure5 = array[i+5].DateTime.substring(11, 13);
        const min5= array[i+5].DateTime.substring(14, 16);
        const dateDeb5 = new Date(year, month, day, heure5, min5);


 duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2)+(dateDeb5-dateDeb4))/ 60000)
  const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
        var p=0;
     
 for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
    //  console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+6
//console.log(duree)


}

else if((date3.getTime() === date.getTime())&&(date4.getTime() !== date.getTime())&&(array[i].EnNo == array[i+3].EnNo )){  
//console.log(4)
 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);

         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);

         const heure2 = array[i+2].DateTime.substring(11, 13);
        const min2= array[i+2].DateTime.substring(14, 16);
        const dateDeb2 = new Date(year, month, day, heure2, min2);

         const heure3 = array[i+3].DateTime.substring(11, 13);
        const min3= array[i+3].DateTime.substring(14, 16);
        const dateDeb3 = new Date(year, month, day, heure3, min3);

 duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2))/ 60000)
 const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
       var p=0;
      
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
//console.log('p=1')

  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}i=i+4

//console.log(duree)


}

else if((date1.getTime() === date.getTime())&&(array[i].EnNo == array[i+1].EnNo )&&((date2.getTime() !== date.getTime())||(array[i].EnNo != array[i+2].EnNo ))){  
//console.log(2)

 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);
//console.log(dateDeb)
         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);


 duree=((dateDeb1-dateDeb)/ 60000)
 const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
        var p=0;
      
 for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
   //   console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+2

//console.log(duree)
}
else {  

//console.log('i+1')
 duree=0
//console.log(duree)
 const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
       var p=0;
      
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
//console.log('p=1')

  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+1


}


}
else if(i+5 < array.length){

 const day = array[i].DateTime.substring(0, 2);
        var month = array[i].DateTime.substring(3, 5);
        month=parseInt(month) - 1
        const year = array[i].DateTime.substring(6, 10);
        const date = new Date(year, month, day);
 const day1 = array[i+1].DateTime.substring(0, 2);
        var month1 = array[i+1].DateTime.substring(3, 5);
        month1=parseInt(month1) - 1
        const year1 = array[i+1].DateTime.substring(6, 10);
        const date1 = new Date(year1, month1, day1);
 const day2 = array[i+2].DateTime.substring(0, 2);
        var month2 = array[i+2].DateTime.substring(3, 5);
        month2=parseInt(month2) - 1
        const year2 = array[i+2].DateTime.substring(6, 10);
        const date2 = new Date(year2, month2, day2);
 const day3 = array[i+3].DateTime.substring(0, 2);
        var month3 = array[i+3].DateTime.substring(3, 5);
        month3=parseInt(month3) - 1
        const year3 = array[i+3].DateTime.substring(6, 10);
        const date3 = new Date(year3, month3, day3);
   const day4 = array[i+4].DateTime.substring(0, 2);
        var month4 = array[i+4].DateTime.substring(3, 5);
        month4=parseInt(month4) - 1
        const year4 = array[i+4].DateTime.substring(6, 10);
        const date4 = new Date(year4, month4, day4);
   const day5 = array[i+5].DateTime.substring(0, 2);
        var month5 = array[i+5].DateTime.substring(3, 5);
        month5=parseInt(month5) - 1
        const year5 = array[i+5].DateTime.substring(6, 10);
        const date5 = new Date(year5, month5, day5);
 


  if((date5.getTime() === date.getTime())&&(date6.getTime() !== date.getTime())&&(array[i].EnNo == array[i+5].EnNo )){  
//console.log(6)
 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);

         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);

         const heure2 = array[i+2].DateTime.substring(11, 13);
        const min2= array[i+2].DateTime.substring(14, 16);
        const dateDeb2 = new Date(year, month, day, heure2, min2);

         const heure3 = array[i+3].DateTime.substring(11, 13);
        const min3= array[i+3].DateTime.substring(14, 16);
        const dateDeb3 = new Date(year, month, day, heure3, min3);

        const heure4 = array[i+4].DateTime.substring(11, 13);
        const min4= array[i+4].DateTime.substring(14, 16);
        const dateDeb4 = new Date(year, month, day, heure4, min4);

         const heure5 = array[i+5].DateTime.substring(11, 13);
        const min5= array[i+5].DateTime.substring(14, 16);
        const dateDeb5 = new Date(year, month, day, heure5, min5);


 duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2)+(dateDeb5-dateDeb4))/ 60000)
 const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
       var p=0;
     
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
//console.log('p=1')

  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}

i=i+6
//console.log(duree)


}

else if((date3.getTime() === date.getTime())&&(date4.getTime() !== date.getTime())&&(array[i].EnNo == array[i+3].EnNo )){  
//console.log(4)
 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);

         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);

         const heure2 = array[i+2].DateTime.substring(11, 13);
        const min2= array[i+2].DateTime.substring(14, 16);
        const dateDeb2 = new Date(year, month, day, heure2, min2);

         const heure3 = array[i+3].DateTime.substring(11, 13);
        const min3= array[i+3].DateTime.substring(14, 16);
        const dateDeb3 = new Date(year, month, day, heure3, min3);

 duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2))/ 60000)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
        var p=0;
     
 for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
   //   console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+4

//console.log(duree)

}

else if((date1.getTime() === date.getTime())&&(array[i].EnNo == array[i+1].EnNo )&&((date2.getTime() !== date.getTime())||(array[i].EnNo != array[i+2].EnNo ))){  
//console.log(2)

 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);
//console.log(dateDeb)
         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);


 duree=((dateDeb1-dateDeb)/ 60000)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
       var p=0;
    
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
    //  console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+2

//console.log(duree)
}
else {  

//console.log('i+1')
duree=0
//console.log(duree)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
       var p=0;
    
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
    //  console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+1


}


}

 else if(i+3 < array.length){

 const day = array[i].DateTime.substring(0, 2);
        var month = array[i].DateTime.substring(3, 5);
        month=parseInt(month) - 1
        const year = array[i].DateTime.substring(6, 10);
        const date = new Date(year, month, day);
 const day1 = array[i+1].DateTime.substring(0, 2);
        var month1 = array[i+1].DateTime.substring(3, 5);
        month1=parseInt(month1) - 1
        const year1 = array[i+1].DateTime.substring(6, 10);
        const date1 = new Date(year1, month1, day1);
 const day2 = array[i+2].DateTime.substring(0, 2);
        var month2 = array[i+2].DateTime.substring(3, 5);
        month2=parseInt(month2) - 1
        const year2 = array[i+2].DateTime.substring(6, 10);
        const date2 = new Date(year2, month2, day2);
 const day3 = array[i+3].DateTime.substring(0, 2);
        var month3 = array[i+3].DateTime.substring(3, 5);
        month3=parseInt(month3) - 1
        const year3 = array[i+3].DateTime.substring(6, 10);
        const date3 = new Date(year3, month3, day3);
  

  

 if((date3.getTime() === date.getTime())&&(array[i].EnNo == array[i+3].EnNo )){  
//console.log(4)
 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);

         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);

         const heure2 = array[i+2].DateTime.substring(11, 13);
        const min2= array[i+2].DateTime.substring(14, 16);
        const dateDeb2 = new Date(year, month, day, heure2, min2);

         const heure3 = array[i+3].DateTime.substring(11, 13);
        const min3= array[i+3].DateTime.substring(14, 16);
        const dateDeb3 = new Date(year, month, day, heure3, min3);

 duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2))/ 60000)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
         var p=0;
       
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
      //console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+4

//console.log(duree)

}

else if((date1.getTime() === date.getTime())&&(array[i].EnNo == array[i+1].EnNo )&&((date2.getTime() !== date.getTime())||(array[i].EnNo != array[i+2].EnNo ))){  
//console.log(2)

 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);
//console.log(dateDeb)
         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);


 duree=((dateDeb1-dateDeb)/ 60000)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
        var p=0;
    
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
//console.log('p=1')

  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+2

//console.log(duree)
}
else {  
//console.log('i+1')
 duree=0
//console.log(duree)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
       var p=0;
    
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
    //  console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+1


}


}
else if(i+1 < array.length){

 const day = array[i].DateTime.substring(0, 2);
        var month = array[i].DateTime.substring(3, 5);
        month=parseInt(month) - 1
        const year = array[i].DateTime.substring(6, 10);
        const date = new Date(year, month, day);
 const day1 = array[i+1].DateTime.substring(0, 2);
        var month1 = array[i+1].DateTime.substring(3, 5);
        month1=parseInt(month1) - 1
        const year1 = array[i+1].DateTime.substring(6, 10);
        const date1 = new Date(year1, month1, day1);


 if((date1.getTime() === date.getTime())&&(array[i].EnNo == array[i+1].EnNo )){  
//console.log(2)

 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);
//console.log(dateDeb)
         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);


 duree=((dateDeb1-dateDeb)/ 60000)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
         var p=0;
      
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
     

        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
     // console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+2

//console.log(duree)
}
else {  
//console.log('i+1')
 duree=0
//console.log(duree)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
        var p=0;
      
      for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        var YY = arr1[j].jour.substring(6, 10);
       
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
//console.log('p=1')

  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+1


}


}
else {  
const day = array[i].DateTime.substring(0, 2);
        var month = array[i].DateTime.substring(3, 5);
        month=parseInt(month) - 1
        const year = array[i].DateTime.substring(6, 10);
        const date = new Date(year, month, day);
//console.log('i+1')
 duree=0
//console.log(duree)
const obj = {
            EnNo: array[i].EnNo,
            Name_GMNo: array[i].Name_GMNo,
            nbrHeureus: duree,
            jour:array[i].DateTime,
            
        }
       var p=0;
    
  for(var j=0;j<arr1.length;j++)
{ const DD = arr1[j].jour.substring(0, 2);
        var MM = arr1[j].jour.substring(3, 5);
        MM=parseInt(MM) - 1
        const YY = arr1[j].jour.substring(6, 10);
        const HH = arr1[j].jour.substring(11, 13);
        const MNMN= arr1[j].jour.substring(14, 16);

        const DDMMYY = new Date(YY, MM, DD);
  if((DDMMYY.getTime()=== date.getTime())&&(arr1[j].EnNo ==array[i].EnNo )){
      p=1
    //  console.log('p=1')


  }
}
if(p==0)
{
   axios.post('api/objet',obj);
}
i=i+1


}
console.log(i)
}

}




  ,






newModal(){
this.modifmode=false;

this.form.reset();
  $('#addNew').modal('show');



},
modifierModal(emp){
this.modifmode=true;
this.form.reset();
  $('#addNew').modal('show');
  this.form.fill(emp);



},



infoempModal(emp,filtre){
console.log(emp)

this.form.reset();
console.log(555)
  $('#info').modal('hide');

  $('#infoemp').modal('show');
  this.form.fill(emp);



},

     infoemploy(name)


{return (name)},

infoModal(emp,rapport){

this.form.reset();
  $('#info').modal('show');
  this.form.fill(emp);


},



infoModal2(emp,filtres){


var tab=[]
var i=0
  var tab_jour=new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");


  filtres.forEach(function(element) {
   const dayDeb = element.DateTime.substring(0, 2);
        
        var monthDeb = element.DateTime.substring(3, 5);
        monthDeb=parseInt(monthDeb) - 1
        const yearDeb = element.DateTime.substring(6, 10);
        
        const dateDeb = new Date(yearDeb, monthDeb, dayDeb);
  if(emp==element.EnNo){

tab[i]='le jour   '+tab_jour[dateDeb.getDay()]+'/'+element.DateTime
i=i+1
  }});
return (tab)

},

infoModal1(){

console.log(151515)
},




deletemp(id){
  this.form.delete('api/point/'+id);
Fire.$emit('afterCreated');



},


   loadusers(){

axios.get("api/point").then(({data})=>(this.emps=data.data));


   },

loadfiltre(){


axios.get("api/filtre_pointeuse").then(({data})=>(
this.filtres=data.data,
this.calendarFilter(this.points,this.filtres),
this.calcultot(this.filtres,this.objets)


//console.log(this.filtres)
));


 },

   
 loadobjet(){


axios.get("api/objet").then(({data})=>(


this.objets=data.data
//console.log(this.objets)



));



},


   loadrapports(){


axios.get("api/rapport").then(({data})=>(


this.rapports=data.data
//console.log(this.rapports)



));



},
                            ajoutemp(){
                            this.form.post('api/point');
                            Fire.$emit('afterCreated');
                           
                                
                            },


            calendarFilter(array,array2){
 var x=0;
 var y=0;

  var result = []
Object.keys(array).forEach(key => {
  const arr = array[key];
   const dayDeb = arr.DateTime.substring(0, 2);
    var monthDeb = arr.DateTime.substring(3, 5);
    monthDeb = parseInt(monthDeb) - 1
    const yearDeb = arr.DateTime.substring(6, 10);
    const heureDeb = arr.DateTime.substring(11, 13);
    const minDeb = arr.DateTime.substring(14, 16);
    const dateDeb = new Date(yearDeb, monthDeb, dayDeb, heureDeb, minDeb);
   // console.log(dateDeb)
    Object.keys(array2).forEach(key2 => {
  const arr2 = array2[key2];
   const dayDeb2 = arr2.DateTime.substring(0, 2);
    var monthDeb2 = arr2.DateTime.substring(3, 5);
    monthDeb2 = parseInt(monthDeb2) - 1
    const yearDeb2 = arr2.DateTime.substring(6, 10);
    const heureDeb2 = arr2.DateTime.substring(11, 13);
    const minDeb2 = arr2.DateTime.substring(14, 16);
    const dateDeb2 = new Date(yearDeb2, monthDeb2, dayDeb2, heureDeb2, minDeb2);
    //console.log(dateDeb2)
         if (dateDeb2.getTime() === dateDeb.getTime()) {

        // console.log(arr);
     var x1=Number(arr.EnNo);

     var x2=Number(arr2.EnNo);

                   if ( x1 == x2){
                  x=1
                   //console.log(2)
                       //axios.post('api/filtre_pointeuse',arr);
                   }
                  

  }
 
    });
  
if(x==0){
  axios.post('api/filtre_pointeuse',arr);
 

} 
else{
    x=0;
}

});
return result
  
  },

        },


 


        
        created() {


                   this.loadobjet();
                     this.loadHours();

                    this.loadperiodes();
           this.loadrapports();
           this.loadfiltre();

           this.loadpointeuse();
            this.loadusers();
            Fire.$on('afterCreated',()=>{
            this.loadusers();

            });
            setInterval(()=>this.loadusers(),3000);
            setInterval(()=>this.loadpointeuse(),3000);
            setInterval(()=>this.loadobjet(),3000);

            setInterval(()=>this.loadfiltre(),3000);

        }
    }
</script>
