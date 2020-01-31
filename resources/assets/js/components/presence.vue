<template>
    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->


              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      
                      <th>EnNo</th>
                      <th>Name_GMNo</th>
                      <th>DateTime</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="point in points" :key="point.id">
                    
                      <td> {{point.EnNo}}</td>
                      <td>{{point.Name_GMNo}}</td>
                      <td>{{point.DateTime}}</td>
                    
                    </tr>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
</template>

<script>
    export default {
      data(){
            return{
            points:{},
                form: new Form({
                  EnNo:'',
                  Name_GMNo:'',
                  DateTime:''







                })





            }




      },

mounted() {




            console.log()
        },
methods:{
  loadpointeuse(){


axios.get("api/pointeuse").then(({data})=>(this.points=data.data));



  }





},



        created() {
                        this.loadpointeuse()        }
    }
</script>
