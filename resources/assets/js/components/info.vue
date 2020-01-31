<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="panel panel-default">
                  

                    <div class="panel-body">
        

<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class=" mt-300 pb-300 mb-300 d-flex">
        <div class="image">
          <img src="/img/man.png" class="img-circle "height="200" width="200" alt="User Image">
        </div>
        <div class="info">
         <p ><span style="white-space: nowrap; font-size:150%"><span style="color: #e6511e;">    name: </span> <span id="demo0"></span></span></p>
       <p ><span style="white-space: nowrap;font-size:150%;"><span style="color: #e6511e;"  >   email:    </span> <span id="demo1"></span></span></p>
          <p ><span style="white-space: nowrap ;font-size:150%;"><span style="color: #e6511e;">    portable:     </span> <span id="demo2"></span></span></p>
            <p ><span style="white-space: nowrap;font-size:150%;"><span style="color: #e6511e;">   addresse:       </span> <span id="demo3"></span></span></p>
        </div>
      </div>
                     
      
                  <!--   // <p id="route">{{$route.params.teamId}}</p>
                     //<button @click="isi($route.params.teamId)">click</button>-->
                        

            <div class="col-md-20">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">table de pointage</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

           <table id="table3" class="table table-bordered table-hover table-striped" border=1  >
            
            <!-- The Row Number 0 -->
             <thead>
            <tr>
                
                <th>Nbre heures de travail</th>
                <th>Moy d'heure de travail/moi</th>
                <th>Def</th>
                 <th>Le moi</th>

                 
            </tr>
             </thead>
            </table>
<router-link v-bind:to="'/details/' + $route.params.teamId"><p align="right">details>></p>
</router-link>

<router-view></router-view>
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
                    heur1s:{},
                    form:new Form({
                        id:'',
                        name: '',
                        email: '',
                        portable: '',
                        addresse: ''


                })
            }



},
    
     methods:{


     loadperiodes(){


axios.get("/api/periode").then(({data})=>(


this.periodes=data.data,
           this.loadusers()



//console.log(this.periodes)



));
},


loadHours(){
axios.get("/api/heur1").then(({data})=>(this.heurs=data.data,
 this.loadobjet()

//console.log(this.heurs)
));
},


     loadfiltre(){


axios.get("/api/filtre_pointeuse").then(({data})=>(
this.filtres=data.data,
           this.loadpointeuse()


//console.log(this.filtres),
//this.exelFilter(this.points,this.filtres),
//this.calcultot(this.filtres,this.objets)
));


 },

loadobjet(){


axios.get("/api/objet").then(({data})=>(


this.objets=data.data,
          this.loadperiodes()


//console.log(this.objets)



));



},

 loadpointeuse(){


axios.get("/api/pointeuse").then(({data})=>(


this.points=data.data,
this.infoModal1(this.$route.params.teamId,this.objets,this.periodes,this.heurs)

//console.log(this.points)


));
},


display(data,emp){
    
    var name,email,portable,addresse
    console.log(emp)
   Object.keys(emp).forEach(key => {
  const emp2 = emp[key];
   if( data== emp2.name){
  
         name=emp2.name
         email=emp2.email
         portable=emp2.portable
         addresse=emp2.addresse

  }
 
    });



document.getElementById("demo0").innerHTML = name;
document.getElementById("demo1").innerHTML = email;
document.getElementById("demo2").innerHTML = portable;
document.getElementById("demo3").innerHTML = addresse;



console.log(name)
console.log(email)

console.log(portable)
console.log(addresse)





} 

,

 loadusers(){

axios.get("/api/point").then(({data})=>(
this.emps=data.data,
this.display(this.$route.params.teamId,this.emps),
           this.loadfiltre()


//console.log(this.emps)
));


   },
     isi(data){

       console.log(data)  
       var    table2 = document.getElementById("table2");

for(var i = 0; i <6; i++)
           {
               // create a new row
               var newRow = table2.insertRow(table2.length);
              
                   // create a new cell
                   var cell = newRow.insertCell(0);
                   var cell1 = newRow.insertCell(1);
                   var cell2 = newRow.insertCell(2);


                   // add value to the cell
                  
                    cell.innerHTML = 1;
                   cell1.innerHTML = 2;
                     cell2.innerHTML =data;






                     
                     
                    
           }
 
     },

  


infoModal1(emp,objet,periode,heur){
    var lue1=heur[0].e1
    var lup1=heur[0].p1
    var lup2=heur[0].p2
    var lus1=heur[0].s1
    var lue2=heur[0].e2
    var lup3=heur[0].p3
    var lup4=heur[0].p4
    var lus2=heur[0].s2
  var sap1=heur[1].p1
    var sap2=heur[1].p2
    var sas1=heur[1].s1
    var sae2=heur[1].e2
    var sap3=heur[1].p3
    var sap4=heur[1].p4
    var sas2=heur[1].s2


    var lue1h = heur[0].e1.substring(0, 2);
    var lue1m = heur[0].e1.substring(3, 5);
    var lup1h = heur[0].p1.substring(0, 2);
    var lup1m = heur[0].p1.substring(3, 5);
    var lup2h = heur[0].p2.substring(0, 2);
    var lup2m = heur[0].p2.substring(3, 5);
   var lus1h = heur[0].s1.substring(0, 2);
    var lus1m = heur[0].s1.substring(3, 5);
    var lue2h = heur[0].e2.substring(0, 2);
    var lue2m = heur[0].e2.substring(3, 5);
    var lup3h = heur[0].p3.substring(0, 2);
    var lup3m = heur[0].p3.substring(3, 5);
    var lup4h = heur[0].p4.substring(0, 2);
    var lup4m = heur[0].p4.substring(3, 5);
    var lus2h = heur[0].s2.substring(0, 2);
    var lus2m = heur[0].s2.substring(3, 5);

  var sae1h = heur[1].e1.substring(0, 2);
    var sae1m = heur[1].e1.substring(3, 5);
    var sap1h = heur[1].p1.substring(0, 2);
    var sap1m = heur[1].p1.substring(3, 5);
    var sap2h = heur[1].p2.substring(0, 2);
    var sap2m = heur[1].p2.substring(3, 5);
   var sas1h = heur[1].s1.substring(0, 2);
    var sas1m = heur[1].s1.substring(3, 5);
    var sae2h = heur[1].e2.substring(0, 2);
    var sae2m = heur[1].e2.substring(3, 5);
    var sap3h = heur[1].p3.substring(0, 2);
    var sap3m = heur[1].p3.substring(3, 5);
    var sap4h = heur[1].p4.substring(0, 2);
    var sap4m = heur[1].p4.substring(3, 5);
    var sas2h = heur[1].s2.substring(0, 2);
    var sas2m = heur[1].s2.substring(3, 5);


    var totLu=((((lup1h-lue1h)+(lus1h-lup2h)+(lup3h-lue2h)+(lus2h-lup4h))*60)+(lup1m-lue1m)+(lus1m-lup2m)+(lup3m-lue2m)+(lus2m-lup4m))
    var totSa=((((sap1h-sae1h)+(sas1h-sap2h)+(sap3h-sae2h)+(sas2h-sap4h))*60)+(sap1m-sae1m)+(sas1m-sap2m)+(sap3m-sae2m)+(sas2m-sap4m))
    console.log(totLu)
    console.log('////')
    console.log(totSa)
var tab_filtre_name=[]
var dateDeb=periode[0].dateDeb
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
  //console.log(datemax)
  //console.log(datemin)
  var i=0;
  objet.forEach(function(element1) {
  
if (element1.EnNo==emp)
{
  tab_filtre_name[i]=element1
i=i+1

}
  
  });
  var date1Max1 = new Date(yearmax, monthmax, periode[0].dateDeb);
  if(date1Max1.getTime()<=datemax.getTime())
  {
  var testMois=datemax.getTime()+2629800000
datemax=new Date(testMois);
  }

  var j=0
var tab1=[]
var tab2=[]
var tab3=[]
var tab4=[]

while(datemin.getTime()<=datemax.getTime())
{
  //console.log(datemin.getTime())

if(parseInt(daymin)<parseInt(periode[0].dateDeb)){
//1
console.log('hamzariahi')
if(monthmin>0){
var monthmin1=monthmin-1
 var date1 = new Date(yearmin, monthmin1, periode[0].dateDeb);
 var date2= new Date(yearmin, monthmin, periode[0].dateDeb);
}else{
  var monthmin1=11
  var yearmin1=yearmin-1
 var date1 = new Date(yearmin1, monthmin1, periode[0].dateDeb);
  var date2= new Date(yearmin, monthmin, periode[0].dateDeb);

}
var s=0;
objet.forEach(function(element2) {
//console.log(datemin.getTime())
 var tdaymin = element2.jour.substring(0, 2);
    var tmonthmin = element2.jour.substring(3, 5);
    tmonthmin= parseInt(tmonthmin) - 1
    var tyearmin = element2.jour.substring(6, 10);
    var tdatemin = new Date(tyearmin,tmonthmin,tdaymin);
   //console.log(1)
    //console.log(date1)
    //console.log(date2)
    //console.log(1)
    if((tdatemin.getTime()<date2.getTime())&&(tdatemin.getTime()>=date1.getTime()))
//console.log(1408)
{ if(emp==element2.EnNo){
  s=s+parseInt(element2.nbrHeureus)
  //console.log(tdatemin)
  //console.log(s)
}
}
  
  });
  console.log(date1)

var sommeHeureReel=0
    var testJour=0
    
    



while(date1.getTime()<date2.getTime()){

if((date1.getDay()<6)&&(date1.getDay()>0))
{

sommeHeureReel=sommeHeureReel+totLu
testJour=date1.getTime()+86400000
date1=new Date(testJour);


}
else if(date1.getDay()==6){
sommeHeureReel=sommeHeureReel+totSa
testJour=date1.getTime()+86400000
date1=new Date(testJour);

}
else{
  testJour=date1.getTime()+86400000
date1=new Date(testJour);
}

}

console.log('*')
console.log(sommeHeureReel)
var minLu=sommeHeureReel%60
var def1=sommeHeureReel
if(minLu<10)
{
  minLu='0'+minLu
}
sommeHeureReel=((sommeHeureReel-(sommeHeureReel%60))/60)+':'+(minLu)
console.log(sommeHeureReel)
console.log(date2)

tab2[j]=sommeHeureReel
sommeHeureReel=0
  //testJour=0
console.log('*')
if(monthmin1==12){
  tab3[j]='de: '+periode[0].dateDeb+'/'+(monthmin1+1)+'/'+yearmin1+' a '+periode[0].dateDeb+'/'+(monthmin+1)+'/'+yearmin
}
else if(monthmin==0){
  tab3[j]='de: '+periode[0].dateDeb+'/'+(monthmin1+1)+'/'+yearmin1+' a '+periode[0].dateDeb+'/'+(monthmin+1)+'/'+yearmin

}
else{
    tab3[j]='de:  '+periode[0].dateDeb+'/'+(monthmin1+1)+'/'+yearmin+' a '+periode[0].dateDeb+'/'+(monthmin+1)+'/'+yearmin

}
var sominLu=s%60
if(sominLu<10)
{
  sominLu='0'+sominLu
}
var def2=s
s=((s-(s%60))/60)+':'+(sominLu)

  tab1[j]=s
    tab4[j]=def1-def2

j=j+1

if(parseInt(monthmin)<11)
{
  monthmin=parseInt(monthmin)+1
}else
{
  monthmin=0
  yearmin=parseInt(yearmin)+1
}
 // datemin=date1
 // var date3 = 
//console.log(date2)
//console.log(date3)

}
else{
  //1
  //1
if(parseInt(monthmin)<11){
var monthmin2=parseInt(monthmin)+1
 var date1 = new Date(yearmin, monthmin, periode[0].dateDeb);
 var date2= new Date(yearmin, monthmin2, periode[0].dateDeb);
}else{
  var monthmin1=0
  var yearmin1=parseInt(yearmin)+1
 var date1 = new Date(yearmin, monthmin, periode[0].dateDeb);
  var date2= new Date(yearmin1, monthmin1, periode[0].dateDeb);

}





var s=0;
objet.forEach(function(element2) {

 var tdaymin = element2.jour.substring(0, 2);
    var tmonthmin = element2.jour.substring(3, 5);
    tmonthmin= parseInt(tmonthmin) - 1
    var tyearmin = element2.jour.substring(6, 10);
    var tdatemin = new Date(tyearmin, tmonthmin, tdaymin);


if((tdatemin.getTime()<date2.getTime())&&(tdatemin.getTime()>=date1.getTime()))

{ if(emp==element2.EnNo){
  s=s+parseInt(element2.nbrHeureus)
}
}

  
  });
    var sommeHeureReel=0
    var testJour=0
while(date1.getTime()<date2.getTime()){

if((date1.getDay()<6)&&(date1.getDay()>0))
{
sommeHeureReel=sommeHeureReel+totLu
testJour=date1.getTime()+86400000
date1=new Date(testJour);


}
else if(date1.getDay()==6){
sommeHeureReel=sommeHeureReel+totSa
testJour=date1.getTime()+86400000
date1=new Date(testJour);

}
else{
  testJour=date1.getTime()+86400000
date1=new Date(testJour);
}

}
console.log(sommeHeureReel)
var minLu=sommeHeureReel%60
var def1=sommeHeureReel
if(minLu<10)
{
  minLu='0'+minLu
}
sommeHeureReel=((sommeHeureReel-(sommeHeureReel%60))/60)+':'+(minLu)
console.log(sommeHeureReel)
console.log(date2)

tab2[j]=sommeHeureReel
sommeHeureReel=0
  //testJour=0
console.log('*')



if(monthmin==11){
  tab3[j]='de: '+periode[0].dateDeb+'/'+(monthmin+1)+'/'+yearmin+' a '+periode[0].dateDeb+'/'+(monthmin1+1)+'/'+yearmin1
}
else if(monthmin==0){
  tab3[j]='de: '+periode[0].dateDeb+'/'+(monthmin+1)+'/'+yearmin1+' a '+periode[0].dateDeb+'/'+(monthmin2+1)+'/'+yearmin

}
else{
    tab3[j]='de:  '+periode[0].dateDeb+'/'+(monthmin+1)+'/'+yearmin+' a '+periode[0].dateDeb+'/'+(monthmin2+1)+'/'+yearmin

}



var sominLu=s%60
if(sominLu<10)
{
  sominLu='0'+sominLu
}
var def1=s
s=((s-(s%60))/60)+':'+(sominLu)

  tab1[j]=s
    tab4[j]=def1-def2

j=j+1

if(monthmin<11)
{
  monthmin=parseInt(monthmin)+1
}else
{
  monthmin=0
  yearmin=parseInt(yearmin)+1
}


}



datemin=new Date(yearmin, monthmin, daymin);




}


  var tab=[]
tab[0]=datemax
tab[1]=datemin

//somme=heu1+':'+min1

tab[2]=datemax
  
  //emp.name=[]
  //emp.name[0]='date:'+test+'total'+somme

//emp.name=[]
//for(var i=0;i<10;i++){
  
//emp.name[i]=i

//}



  var table3 = document.getElementById("table3");


for(var i = j-1; i >= 0; i--)
           {
               // create a new row
               var newRow = table3.insertRow(table3.length);
              
                   // create a new cell
                   var cell = newRow.insertCell(0);
                   var cell1 = newRow.insertCell(1);
                   var cell2 = newRow.insertCell(2);
                    var cell3 = newRow.insertCell(3);



                   // add value to the cell
                  
                    cell.innerHTML = tab1[i];
                   cell1.innerHTML = tab2[i];
                     
                   cell3.innerHTML =tab3[i];
                     


var [hours,minutes,seconds] = tab2[i].split(':'); // using ES6 destructuring
// var time = "18:19:02".split(':'); // "old" ES5 version


console.log(hours1)
//console.log('*****')
console.log(minutes1)
var [hours1,minutes1,seconds1] = tab1[i].split(':'); // using ES6 destructuring
// var time = "18:19:02".split(':'); // "old" ES5 version

//console.log((hours1*60)+minutes1)
//console.log('*****')

//console.log(minutes1)

var sub=(((parseInt(hours1)*60)+parseInt(minutes1))-((parseInt(hours)*60)+parseInt(minutes)))
//console.log('*****')
//console.log(((hours1*60)+minutes1))

var minSub=sub%60
minSub=Math.abs(minSub)

if(minSub<10)
{
  minSub='0'+minSub
}


//console.log((sub-(sub%60))/60)
  cell2.innerHTML = ((sub-(sub%60))/60)+':'+(minSub);
}
                       
           









return (tab2)

},


        },
        
        created() {
         this.loadHours();

         

          


        }

    }
</script>




