<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!nhhv
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default { data(){
            return{
            points:{},
            filtres:{},
                form: new Form({
                  EnNo:'',
                  Name_GMNo:'',
                  DateTime:''

                })}},


    methods:{
 loadpointeuse(){


axios.get("api/pointeuse").then(({data})=>(


this.points=data.data,
console.log(this.points)


));



  },
 loadfiltre(){


axios.get("api/filtre_pointeuse").then(({data})=>(
this.filtres=data.data,
this.calendarFilter(this.points,this.filtres),

console.log(this.filtres)));


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
  
  },},
         


                created() {
            this.loadfiltre();
            this.loadpointeuse();

            Fire.$on('afterCreated',()=>{
            this.loadpointeuse(),
            this.loadfiltre();

            });
            setInterval(()=>this.loadpointeuse(),3000);
            setInterval(()=>this.loadfiltre(),3000);

        }
   
    }

</script>