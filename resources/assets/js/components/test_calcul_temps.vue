<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
<table id="table" class="table table-bordered table-striped" border=1>
            
            <!-- The Row Number 0 -->
            <tr>
                <th>DateTime</th>
                <th>EnNo</th>
                <th>Name</th>
                 <th>E1r</th>
                <th>E1plus</th>
                <th>S1r</th>
                 <th>S1plus</th>
                <th>E2r</th>
                <th>E2plus</th>
                 <th>s2r</th>
                <th>S2plus</th>
                <th>total</th>
                 
            </tr>
            </table>




            <table id="table2" class="table table-bordered table-striped" border=1>
            
            <!-- The Row Number 0 -->
            <tr>
                
                <th>EnNo</th>
                <th>Name</th>
                 <th>somme</th>
               
                 
            </tr>
            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default { data(){
            return{
            heurs:[],
            rapports:[],
            periodes:[],
            pointeuses:{},
                form: new Form({
                  EnNo:'',
                  Name_GMNo:'',
                  DateTime:''

                })}},


    methods:{
 loadperiodes(){


axios.get("api/periode").then(({data})=>(


this.periodes=data.data,

console.log(this.periodes)



));
},


 loadcalcultemps(){


axios.get("api/heur").then(({data})=>(


this.heurs=data.data,
console.log(this.heurs),
this.affiche(this.heurs)


));
},





  loadpointeuse(){


axios.get("api/filtre_pointeuse").then(({data})=>(
this.pointeuses=data.data,
console.log(this.pointeuses),
this.calcultot(this.pointeuses,this.heurs),

this.datetimes(this.periodes,this.pointeuses,this.rapports)

));




  },


 //mochkel awel char kifechna9es 3am

datetimes(arr,arr1,arry2)
{   var body=document.template
    var x=arr[0].dateDeb;
    var tab=[];
    var tab1=[];
var tab2=[];

    var dayDebmax = arr1[0].DateTime.substring(0, 2);
    var monthDebmax = arr1[0].DateTime.substring(3, 5);
    monthDebmax = parseInt(monthDebmax) - 1
    var yearDebmax = arr1[0].DateTime.substring(6, 10);
    var dateDebmax = new Date(yearDebmax, monthDebmax, dayDebmax);
    arr1.forEach(function(element) {

const dayDeb = element.DateTime.substring(0, 2);
    var monthDeb = element.DateTime.substring(3, 5);
    monthDeb = parseInt(monthDeb) - 1
    const yearDeb = element.DateTime.substring(6, 10);
    const dateDeb = new Date(yearDeb, monthDeb, dayDeb);



// akber date 7sebet 3leha char le5er menha hiya 
    if(dateDebmax<dateDeb)
  {

dateDebmax=dateDeb
monthDebmax=monthDeb
yearDebmax=yearDeb
dayDebmax=dayDeb

  }

 
});
 var i=0;

 //mochkel awel char kifechna9es 3am

 console.log(monthDebmax)
 arry2.forEach(function(element1) {
  console.log(15)
 console.log(monthDebmax)
const dayDeb = element1.DateTime.substring(0, 2);
    var monthDeb = element1.DateTime.substring(3, 5);
    monthDeb = parseInt(monthDeb) - 1
    const yearDeb = element1.DateTime.substring(6, 10);
    const dateDeb = new Date(yearDeb, monthDeb, dayDeb);


console.log(101010)
//console.log(parseInt(monthDebmax))
console.log(monthDebmax)

  if(parseInt(dayDebmax)>x)
  {    if(((monthDeb==monthDebmax)))
if(x>parseInt(dayDeb)){
{
tab[i]=element1
i=i+1
console.log(101010)
console.log(tab[i])
  }}
  if((monthDeb==(monthDebmax)-1))
 {
 if(x<parseInt(dayDeb)){
tab[i]=element1
i=i+1
console.log(101010)
console.log(tab[i])
  }}
 }

else{
  
 if((monthDeb==(monthDebmax)-1))
 {
 if(x<parseInt(dayDeb)){
tab[i]=element1
i=i+1
console.log(101010)
console.log(tab[i])
  }}

if((monthDeb==(monthDebmax)-2))
 {
 if(x>parseInt(dayDeb)){
tab[i]=element1
i=i+1
console.log(101010)
console.log(tab[i])
  }}



}




 
});

// calculde somme des heures du travail
for(var i = 0; i < tab.length; i++)
{var z=tab[i].EnNo
var somme =0
var heu,heu1 =0
var min,min1 =0
var min2,heu2 =0

for(var j = 0; j < tab.length; j++)
{
if (z==tab[j].EnNo)
{

 heu = tab[j].Tottravail.substring(0, 1);
 min = tab[j].Tottravail.substring(2, 4);
heu1=parseInt(heu)+heu1
min1=parseInt(min)+min1
min2=min1-(min1%60)
console.log(min)
console.log(1818)
heu1=heu1+(min2/60)
console.log(heu)
min1=min1-min2
}







}

somme= heu1+':'+min1;
const obj = {
            EnNo: tab[i].EnNo,
            Name_GMNo: tab[i].Name_GMNo,
            somme1: somme
           
            
        }

tab1[i]=obj


tab2[0]=obj
  

}


for(var i = 0; i < tab1.length; i++)
{
    
    var v=0
for(var j = 0; j < tab2.length; j++){
if ( tab1[i].EnNo==tab2[j].EnNo)
{
    v=1
}

}
if(v==0)
{
    tab2.push(tab1[i])
    
}
v=0
}


//affiche tab tot calcul

var    table2 = document.getElementById("table2");

for(var i = 0; i < tab2.length; i++)
           {
               // create a new row
               var newRow = table2.insertRow(table2.length);
              
                   // create a new cell
                   var cell = newRow.insertCell(0);
                   var cell1 = newRow.insertCell(1);
                   var cell2 = newRow.insertCell(2);


                   // add value to the cell
                  
                    cell.innerHTML = tab2[i].EnNo;
                   cell1.innerHTML = tab2[i].Name_GMNo;
                     cell2.innerHTML =tab2[i].somme1;
                     
                    
           }











//affichage tab rapport
var    table = document.getElementById("table");

for(var i = 0; i < tab.length; i++)
           {
              console.log("hamzariahi")
               // create a new row
               var newRow = table.insertRow(table.length);
              
                   // create a new cell
                   var cell = newRow.insertCell(0);
                   var cell1 = newRow.insertCell(1);
                   var cell2 = newRow.insertCell(2);
                    var cell3 = newRow.insertCell(3);
                   var cell4 = newRow.insertCell(4);
                   var cell5 = newRow.insertCell(5);
                   var cell6 = newRow.insertCell(6);
                   var cell7 = newRow.insertCell(7);
                   var cell8 = newRow.insertCell(8);
                    var cell9 = newRow.insertCell(9);
                   var cell10 = newRow.insertCell(10);
                   var cell11 = newRow.insertCell(11);

                   // add value to the cell
                   cell.innerHTML = tab[i].DateTime;
                    cell1.innerHTML = tab[i].EnNo;
                   cell2.innerHTML = tab[i].Name_GMNo;
                     cell3.innerHTML = tab[i].E1r;
                     cell4.innerHTML = tab[i].E1plus;
                     cell5.innerHTML = tab[i].S1r;
                     cell6.innerHTML = tab[i].S1plus;
                     cell7.innerHTML = tab[i].E2r;
                     cell8.innerHTML = tab[i].E2plus;
                      cell9.innerHTML = tab[i].S2r;
                     cell10.innerHTML = tab[i].S2plus;
                     cell11.innerHTML = tab[i].Tottravail;
                    
           }
console.log(dateDebmax)
    console.log(141414147)





},



calcultot(array,array1)
{
    console.log(array[0].Name_GMNo)
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
        const year7 = array[7+1].DateTime.substring(6, 10);
        const date7 = new Date(year7, month7, day7);

     if((date7.getTime() === date.getTime())&&(array[i].EnNo == array[i+7].EnNo )){  
console.log(8)

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


var duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2)+(dateDeb5-dateDeb4)+(dateDeb7-dateDeb6))/ 60000)


i=i+8

console.log(duree)

}

 else if((date5.getTime() === date.getTime())&&(date6.getTime() !== date.getTime())&&(array[i].EnNo == array[i+5].EnNo )){  
console.log(6)
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


var duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2)+(dateDeb5-dateDeb4))/ 60000)
i=i+6
console.log(duree)


}

else if((date3.getTime() === date.getTime())&&(date4.getTime() !== date.getTime())&&(array[i].EnNo == array[i+3].EnNo )){  
console.log(4)
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

var duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2))/ 60000)
i=i+4

console.log(duree)

}

else if((date1.getTime() === date.getTime())&&(array[i].EnNo == array[i+1].EnNo )&&((date2.getTime() !== date.getTime())||(array[i].EnNo != array[i+2].EnNo ))){  
console.log(2)

 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);
console.log(dateDeb)
         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);


var duree=((dateDeb1-dateDeb)/ 60000)
i=i+2

console.log(duree)
}
else {  

console.log('i+1')

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
console.log(6)
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


var duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2)+(dateDeb5-dateDeb4))/ 60000)
i=i+6
console.log(duree)


}

else if((date3.getTime() === date.getTime())&&(date4.getTime() !== date.getTime())&&(array[i].EnNo == array[i+3].EnNo )){  
console.log(4)
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

var duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2))/ 60000)
i=i+4

console.log(duree)

}

else if((date1.getTime() === date.getTime())&&(array[i].EnNo == array[i+1].EnNo )&&((date2.getTime() !== date.getTime())||(array[i].EnNo != array[i+2].EnNo ))){  
console.log(2)

 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);
console.log(dateDeb)
         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);


var duree=((dateDeb1-dateDeb)/ 60000)
i=i+2

console.log(duree)
}
else {  

console.log('i+1')

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
console.log(4)
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

var duree=(((dateDeb1-dateDeb)+(dateDeb3-dateDeb2))/ 60000)
i=i+4

console.log(duree)

}

else if((date1.getTime() === date.getTime())&&(array[i].EnNo == array[i+1].EnNo )&&((date2.getTime() !== date.getTime())||(array[i].EnNo != array[i+2].EnNo ))){  
console.log(2)

 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);
console.log(dateDeb)
         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);


var duree=((dateDeb1-dateDeb)/ 60000)
i=i+2

console.log(duree)
}
else {  
console.log('i+1')

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
console.log(2)

 const heure = array[i].DateTime.substring(11, 13);
        const min= array[i].DateTime.substring(14, 16);
        const dateDeb = new Date(year, month, day, heure, min);
console.log(dateDeb)
         const heure1 = array[i+1].DateTime.substring(11, 13);
        const min1= array[i+1].DateTime.substring(14, 16);
        const dateDeb1 = new Date(year, month, day, heure1, min1);


var duree=((dateDeb1-dateDeb)/ 60000)
i=i+2

console.log(duree)
}
else {  
console.log('i+1')


i=i+1


}


}

}

}




  ,
  affiche(array){

var i = 0;


while (array[i]) {
  console.log(array[i]) ;
  i++;
}


  },


loadrapports(){


axios.get("api/rapport").then(({data})=>(


this.rapports=data.data,
console.log(this.rapports)



));


  },



  

         },


                created() {
                            this.loadrapports();

             this.loadperiodes();
            this.loadcalcultemps();
            this.loadpointeuse();
                       

        }
   
    }

</script>
