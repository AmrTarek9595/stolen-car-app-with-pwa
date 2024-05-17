<template>

        <div >   
            
              
        <!-- Services -->
     <section class="page-section" id="contact" > 
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">!! بلغ عن سياره مسروقه ... ساعدنا</h2>
               
              </div>
            </div>
           
           <div v-if="isLoading" class="row">
              <rotate-square2 id="spinner" ></rotate-square2> 
            </div>
            <div class="row" v-if="showinformmessage">
              <div class="col-md-12">
              <h3 style="color:red"> {{informmessage}}</h3>
              </div>
            </div>
            <div class="row" v-if="formshow" >
           
              <div class="col-md-12">
                <p v-if="errors.length" style="color:red;">
                    <b>Please correct the following error(s):</b>
                    <ul>
                      <li v-for="error in errors" :key="error">{{error}}</li>
                    </ul>
                </p>
                <form id="contactForm" enctype="multipart/form-data" v-if='showform'>
                
              
                     <div class="row">
                       <!--Section radio input numbers -->
                       <div class="col-6 " >
                         <br>
                      <label style="color:#ffff;"> أرقام فقط </label>
                      <input type="radio" name="postage" @change="checkDisplayoffirstinputNumbersOnly"  /> 
                      
                      <the-mask mask="######" type="text" id="car"  v-if="display1" v-model="noOnly" placeholder="123456" v-on:input="passdataforNomNnly" style="width:80%"/>
                       </div>
                       <!--Section radio input characters and numbers -->
                       <div class="col-6" >
                         <br>
                        <label>حروف وأرقم</label>
                        <input type="radio" name="postage" @change="checkDisplayoffirstinputNumbersAndChars"/> 

                      <the-mask mask="####" type="text" id="car" v-if="display2" v-model="no4" style="width:53px;" minlength="3" maxlength="4" placeholder="1234" tabindex=4  v-on:input="passdataforCharonly"/>
                      <input value="" type="text" id="car"  v-if="display2" v-model="no3" style="width:29px;" placeholder="ج" v-on:input="CheckArabicOnly3" tabindex=3 />
                      <input value="" type="text" id="car"  v-if="display2" v-model="no2" style="width:29px;" placeholder="ب" v-on:input="CheckArabicOnly2" tabindex=2 />
                      <input value="" type="text" id="car" v-if="display2" v-model="no1" style="width:29px;" placeholder="ا" v-on:input="CheckArabicOnly1" tabindex=1 />
                       </div>
                     </div>
                  </form>
    
         </div>
    
    

             
            </div>
            <div class="row" v-if='spineer2'>
                    <rotate-square2 id="spinner" ></rotate-square2>
            </div>
                <div class="row">
                        
                        <div class="col-12 api" v-if="notfounddata" style="text-align: center;">{{notfoundmessage}}</div>
                        
                        <div class="col-sm-12 col-md-12 col-xs-12 table-responsive" v-if="founddata" style="text-align: center;">
                            
                            <table class="table api2" style="overflow-x:auto;">
                                            <thead>
                                                <tr>
                                                
                                                <th scope="col">أرقام السياره</th>
                                                
                                                <th scope="col">الموقع</th>
                                                <th scope="col">بلغ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for ="datafound in founddatamessage" :key="datafound.id">
                                                <td >{{datafound.carnumber}}</td>
                                             
                                                <td><input type="text" v-model="location"> </td>
                                                <td><a href="#" @click="inform"> بلغ </a></td>
                                                
                                                </tr>
                                            
                                            
                                            </tbody>
                                            </table>
                            </div>
                    </div>
                     <div class="row"><div class="col-12" style="text-align:right; color:red;margin-top:10%">
     <h2>:ملاحظات</h2>
     <p>نحن نستخدم القمر الصناعي في تحديد الموقع * </p>
     <p> الرجاء التأكد من تفعيل استخدام القمر الصناعي من الجهاز *</p>
     <p>بدون تفعيل القمر الصناعي لن تتمكن من الإبلاغ عن السياره المفقوده *</p>
     </div> 
     </div>
          </div>                
  
        </section>

          </div>
</template>

<script>

import {TheMask} from 'vue-the-mask'
import {RotateSquare2} from 'vue-loading-spinner'
export default {
    components:{TheMask,RotateSquare2},
data() {
    return {
        display1:null,
        display2:null,
      
      noOnly:'',
       no1:'',
       no2:'',
       no3:'',
       no4:'',
    
       errors:[
     
       ],
      formshow:true,
       isLoading:false,
       /*below section for dynamic search*/
        notfounddata:false,
        notfoundmessage:'',
        spineer2:false,
        founddata:false,
        founddatamessage:'',
        showform:true,
        informmessage:'',
        showinformmessage:false,
        location:''
           }
},

methods:{
    checkDisplayoffirstinputNumbersOnly: function()
    {
       
       this.display1=true;
       this.display2=false;
       this.no1='';
       this.no2='';
       this.no3='';
       this.no4='';

    } , 
    checkDisplayoffirstinputNumbersAndChars: function()
    {
       
       this.display1=false;
       this.display2=true;
       this.noOnly=''
  
    },
    CheckArabicOnly1:function() 
    {

                      
        for (var i = 0; i < this.no1.length; i++) {
          var ch = this.no1.charAt(i),
              c  = ch.charCodeAt(0);

          if (this.no1.charAt(38)) {
            this.no1='';
          }
          else if (this.no1.charAt(40)) {
            this.no1='';
          }
          else if (this.no1.charAt(37)) {
          }
          else if (this.no1.charAt(39)) {
            // right arrow
          }

          if (c < 1536 || c > 1791) {
              this.no1='';
          }
          else {
              this.no1 += ch;
          }
      }

                      
    },
    CheckArabicOnly2:function() 
    {
                
                  for (var i = 0; i < this.no2.length; i++) {
                    var ch = this.no2.charAt(i),
                        c  = ch.charCodeAt(0);

                    if (this.no2.charAt(38)) {
                      this.no2='';
                    }
                    else if (this.no2.charAt(40)) {
                       this.no2='';
                    }
                    else if (this.no2.charAt(37)) {
                    }
                    else if (this.no2.charAt(39)) {
                       // right arrow
                    }

                    if (c < 1536 || c > 1791) {
                        this.no2='';
                    }
                    else {
                        this.no2 += ch;
                    }
                }

                
    },
    CheckArabicOnly3:function() 
    {
                
                              for (var i = 0; i < this.no3.length; i++) {
                    var ch = this.no3.charAt(i),
                        c  = ch.charCodeAt(0);

                    if (this.no3.charAt(38)) {
                      this.no3='';
                    }
                    else if (this.no3.charAt(40)) {
                       this.no3='';
                    }
                    else if (this.no3.charAt(37)) {
                    }
                    else if (this.no3.charAt(39)) {
                       // right arrow
                    }

                    if (c < 1536 || c > 1791) {
                        this.no3='';
                    }
                    else {
                        this.no3 += ch;
                    }
                }

                
    },

 
 
  
    passdataforNomNnly:function()
    { 
        
        this.spineer2=true
        let formData=new FormData();
        formData.append('numbercar',this.noOnly);
        axios.post('https://saree.nrchrod.org/api/auth/details',formData).then(
            response=>{
                
                    if(response.data.datanotfound)
                    {
                        this.notfounddata=true;
                        this.founddata=false;
                        this.notfoundmessage = response.data.datanotfound 
                        this.spineer2=false;
                        if(!this.noOnly)
                        {
                            this.notfoundmessage='';
                        }
                    } 
                    else if(response.data.datafound)
                    {
                        this.founddata=true;
                        this.notfounddata=false;
                        this.founddatamessage =response.data.datafound
                        this.spineer2=false;
                       
                    }               
                }
        )
    },
    passdataforCharonly:function(){
        this.spineer2=true
        let formData=new FormData();
        formData.append('no1',this.no1);
        formData.append('no2',this.no2);
        formData.append('no3',this.no3);
        formData.append('no4',this.no4);
        axios.post('https://saree.nrchrod.org/api/auth/details',formData).then(
            response=>{
                
                    if(response.data.datanotfound)
                    {
                        this.notfounddata=true;
                        this.founddata=false;
                        this.notfoundmessage = response.data.datanotfound 
                        this.spineer2=false;
                         if(!this.no4)
                        {
                            this.notfoundmessage='';
                        }
                     
                    } 
                    else if(response.data.datafound)
                    {
                        this.founddata=true;
                        this.notfounddata=false;
                        this.founddatamessage =response.data.datafound
                        this.spineer2=false;
                       
                    }               
                }
        )

    },
    inform:function(id){
        if (navigator.geolocation) {
                          
      navigator.geolocation.getCurrentPosition(this.showPosition);
    
                } 
          else
            {

          console.log("Geolocation is not supported by this browser.");

}
    },
     showPosition:function(position,id) {
       this.spineer2=true
       this.founddata=false;
         let carid=this.founddatamessage[0].id;
         let lat=position.coords.latitude;
         let long=position.coords.longitude;
         let formData=new FormData();
         formData.append('carid',carid);
         formData.append('lat',lat);
         formData.append('long',long);
         formData.append('location',this.location);
         axios.post('https://saree.nrchrod.org/api/auth/submitinform',formData).then(
           response=>{
             if(response.data.message){
               this.showform=false;
               this.founddata=false;
              this.notfounddata=false
               this.showinformmessage=true;
                        this.spineer2=false
                      this.informmessage=response.data.message;
             }
                else if(response.data.error_message){
               this.showform=false;
               this.founddata=false;
               this.notfounddata=false
               this.showinformmessage=true;
               this.spineer2=false         
                      this.informmessage=response.data.error_message;
             }
           }
         );
         
}
}
}
</script>

<style>
#contact {
  background-color:white 
}
#car{
  background-color:gray;
} 
#sendMessageButton{
  margin: 5px;
}
label {
  color:#ffff;
}
#warning {
    color: red;
}
#success{
  color:#CD7F32
}
#spinner{
     min-width: 100px;
    min-height: 100px;
    margin-top: 30%;
    margin-left: 50%;
    color:red;
}
@media screen and (max-width: 1024px) {
    #apllyimage {
        display: none !important;
    }
}
.api{
  color:red;
}
.api2{
    width:100%;
    color:red;
    
}

</style>