<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                      <div class="col-md-20">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">détails emps num: {{$route.params.teamId}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

           <table id="table3" class="table table-bordered table-hover table-striped" border=1  >
            
            <!-- The Row Number 0 -->
             <thead>
            <tr>
                
                <th>jours</th>
                <th>nombre de minutes</th>
            

                 
            </tr>
             </thead>
            </table>
              </div>
              </div>
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
        data(){
        return{
        objets:{}
            
       
        }},

methods:{
detail(emp,objet) {
    var daymin = objet[0].jour.substring(0, 2);
    var monthmin = objet[0].jour.substring(3, 5);
    monthmin= parseInt(monthmin) - 1
    var yearmin = objet[0].jour.substring(6, 10);
    var datemin = new Date(yearmin, monthmin, daymin);

     var daymax = objet[0].jour.substring(0, 2);
    var monthmax = objet[0].jour.substring(3, 5);
    monthmax= parseInt(monthmax) - 1
    var yearmax = objet[0].jour.substring(6, 10);
    var datemax = new Date(yearmax, monthmax, daymax);
objet.forEach(function(element) {
  if(emp==element.EnNo){
const dayDeb = element.jour.substring(0, 2);
    var monthDeb = element.jour.substring(3, 5);
    monthDeb = parseInt(monthDeb) - 1
    const yearDeb = element.jour.substring(6, 10);
    const dateDeb = new Date(yearDeb, monthDeb, dayDeb);
// obtenir la date la plus petit dans la table objet 
 if(datemin>dateDeb)
  {

datemin=dateDeb
monthmin=monthDeb
yearmin=yearDeb
daymin=dayDeb

  }
  if(datemax<dateDeb)
  {

datemax=dateDeb
monthmax=monthDeb
yearmax=yearDeb
daymax=dayDeb

  }
  }
  });
 
var tab=[]
var i=0
while(datemin<=datemax)
{
var tmp=-1
 objet.forEach(function(element) {
  if(emp==element.EnNo){
const dayDeb = element.jour.substring(0, 2);
    var monthDeb = element.jour.substring(3, 5);
    monthDeb = parseInt(monthDeb) - 1
    const yearDeb = element.jour.substring(6, 10);
    const dateDeb = new Date(yearDeb, monthDeb, dayDeb);
// obtenir la date la plus petit dans la table objet 
 if(datemin.getTime()===dateDeb.getTime())
 {
console.log(1)
tmp=element.nbrHeureus
}
  
  }
  });

  if(tmp!=-1)
{
    tab[i]=tmp
}
else{
    tab[i]="<span style='color: red;'>abs</span>" 
}
i=i+1
var x=datemin.getTime()+86400000
datemin=new Date(x);

}



  var table3 = document.getElementById("table3");


for(var j = i-1; j >= 0; j--)
           {
               // create a new row
             if(datemax.getDay()!=0)
             {  var newRow = table3.insertRow(table3.length);
              
                   // create a new cell
                   var cell = newRow.insertCell(0);
                   var cell1 = newRow.insertCell(1);
                   
               


                   // add value to the cell
                  
                    cell.innerHTML = datemax.getDate()+'/'+(datemax.getMonth()+1)+'/'+datemax.getFullYear();

                   cell1.innerHTML = tab[j];
                   }
                   var y=datemax.getTime()-86400000
datemax=new Date(y);
                    
                  
           }













},

loadObjs(){
axios.get("/api/objet").then(({data})=>(
this.objets=data.data,
console.log(this.$route.params.teamId),
this.detail(this.$route.params.teamId,this.objets) 



));
}









},

        created() {
            
            
            
            this.loadObjs();

        
          
        
        }
    }
</script>
