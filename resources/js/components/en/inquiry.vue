<template>
  <div>
  
     <section class="page-section" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Inquiry for Cars stolen</h2>
                <h3 class="section-subheading text-muted">We Can <span>HELP</span>.</h3>
              </div>
            </div>
            <div class="row" v-if="formshow">
              <div class="col-12">
                  <p v-if="errors.length" style="color:red;">
                    <b>Please correct the following error(s):</b>
                    <ul>
                      <li v-for="error in errors" :key="error">{{error}}</li>
                    </ul>
                </p>
                <p style="color:red;">{{errmessage}} </p>
                <form id="contactForm" enctype="multipart/form-data" v-if="formshow">
                
                  <div class="row">
                   <div class="col-6">
                     <the-mask mask="2-###-###-###-##"  type="tel" placeholder="Phone Number" class="form-control" v-model="monumber"></the-mask>
                    
                  </div>
                 <div class="col-6">
                     <input type="text" class="form-control" placeholder="Inquiry Pattern" maxlength="15" v-model="code">
                 </div>
                  </div>
                     <div class="text-center">
                      <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase text-center" type="submit" @click.prevent="getinqdata">Search</button>
                  </div>
           
                
                </form>
         </div>
        
       
    

             
            </div>

       <div class="row" v-if="ifdatafound">
           <div class="col-12">
             <table class="table table-borderless api">

  <tbody v-for= "data in data" :key = "data.id">
    <tr >
      <td >Owner Name</td>
      <td >{{data.fullname}}</td>
      
    
    </tr>
    <tr>
      <td >Car Number</td>
      <th >{{data.carnumber}}</th>
      
   
    </tr>
  
  </tbody>
</table>
           </div>
         </div>
         <div class="row" v-if="ifdatafound">
           <div class="col-12">
              <table class="table table-bordered api2">
                                            <thead>
                                                <tr>
                                                
                                                
                                                
                                                <th scope="col">Location</th>
                                                <th scope="col">Root</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for ="datafound in informeddata" :key="datafound.id">
                                                <td >{{datafound.address_address}}</td>
  <td><a :href=" 'http://maps.google.com/maps?z=18&t=m&q=loc:'+datafound.address_latitude+','+datafound.address_longitude">Location</a></td>
                                               
                                                
                                                
                                                </tr>
                                            
                                            
                                            </tbody>
                                            </table>
           </div>
           
         </div>
         <p style="color:red; text-align: center;">{{informmessage}} </p>
          </div>
  
        </section>  
      
     
</div>
</template>

<script>
import {TheMask} from 'vue-the-mask'
export default {
components:{TheMask},
data(){
  return {
    ifdatafound:false,
    informeddata:'',
    code:'',
    monumber:'',
    data:'',
    errors:[],
    formshow:true,
    errmessage:'',
    informmessage:'',


  }
},

methods:{
  getinqdata:function()
  {
    this.errors=[];
    if(!this.monumber)
        {
        this.errors.push('Mobile Numbers required.');
        }
          if(!this.code)
        {
        this.errors.push('Secure Code required.');
        }
              let formData= new FormData();
              formData.append("code",this.code);
              formData.append("phonenumber",this.monumber);
              axios.post('https://saree.nrchrod.org/api/auth/inquiry',formData).then(
                response=>{
                  if(response.data.message){
                    this.errmessage= response.data.message
                    this.ifdatafound=false;
                    this.informmessage=''
                  }
                  else{
                    this.errmessage=''
                  this.data=response.data,
                  

                  this.informeddat(this.data)
                  
                  }
                  }
              );
              
              

  },
  informeddat:function(vae){
    let formData=new FormData();
    formData.append('carinfo_id',vae[0].id)
    
    axios.post('https://saree.nrchrod.org/api/auth/inquiry',formData).then(
      response=>
      {
        if(response.data.informmessage)
        {
          this.informmessage=response.data.informmessage;
          this.ifdatafound=false;

        }
        else{
        this.informeddata=response.data;
        this.ifdatafound=true;
        
  }
              
      }
      );
  },
  

  
}
}
</script>

<style>
.api{
  color:red;
}
.table {
  width:50%
}
</style>