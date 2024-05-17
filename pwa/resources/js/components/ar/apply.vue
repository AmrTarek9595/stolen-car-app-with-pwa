<template>

        <div >   
            
              
        <!-- Services -->
     <section class="page-section" id="contact" > 
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">إرسال بيانات السياره المفقوده</h2>
                <h3 class="section-subheading text-muted">نحن نسطتيع أن <span>نساعد</span>.</h3>
              </div>
            </div>
               <div class="row">
              <div class="col-lg-12 text-center">
                <h3 class="text-uppercase" id="warning" v-if = "err_messg_if_returned_errro_form">{{err_messg_if_returned_errro_form}}</h3>
               <h3 class="text-uppercase" id="success" v-if = "registerd_message">{{registerd_message}}</h3>
               <h3 class="text-uppercase" id="success" v-if = "registerd_message">من فضلك احفظ الكود السري المبين ادناه: <p style="color:red">{{code}}</p></h3>
              </div>
            </div>
           <div v-if="isLoading" >
              <rotate-square2 id="spinner" ></rotate-square2> 
            </div>
            <div class="row" v-if="formshow" style="text-align:right">
            <div class="col-4" id="apllyimage">
           <img src="public/images/apply/apply_carInfo.png" id="img2">
         </div>
              <div class="col-md-8  ">
                <p v-if="errors.length" style="color:red;">
                    <b>Please correct the following error(s):</b>
                    <ul>
                      <li v-for="error in errors" :key="error">{{error}}</li>
                    </ul>
                </p>
                <form id="contactForm" enctype="multipart/form-data" >
                
                  <div class="row">
                   <div class="col-6">
               
                    <input type="text" class="form-control" placeholder="الإسم كاملا" v-model="fullName">
                  </div>
                    <div class="col-6">
                      
                     <the-mask mask="2-###-###-###-##"  type="tel" placeholder="رقم الموبايل الشخصي" class="form-control" v-model="phoneNumber"></the-mask>
                  </div>
                  </div>
                     <div class="row">
                       <!--Section radio input numbers -->
                       <div class="col-6 " >
                         <br>
                      <label style="color:#ffff;"> أرقام فقط </label>
                      <input type="radio" name="postage" @change="checkDisplayoffirstinputNumbersOnly"  /> 
                      
                      <the-mask mask="######" type="text" id="car"  v-if="display1" v-model="noOnly" placeholder="123456" style="width:80%" />
                       </div>
                       <!--Section radio input characters and numbers -->
                       <div class="col-6" >
                         <br>
                        <label>حروف وأرقام</label>
                        <input type="radio" name="postage" @change="checkDisplayoffirstinputNumbersAndChars"/> 

<the-mask mask="####" type="text" id="input4"  v-if="display2" v-model="no4" style="width:53px;" minlength="3" maxlength="4" placeholder="1234" tabindex=4 />
                      <input id="input3" v-on:keyup="nextPlease3" value="" type="text" v-if="display2" v-model="no3" style="width:29px;" placeholder="ج" v-on:input="CheckArabicOnly3" tabindex=3 />
                      <input id="input2" v-on:keyup="nextPlease2" value="" type="text" v-if="display2" v-model="no2" style="width:29px;" placeholder="ب" v-on:input="CheckArabicOnly2" tabindex=2 />
                      <input id="input1" v-on:keyup="nextPlease1" value="" type="text" v-if="display2" v-model="no1" style="width:29px;" placeholder="ا" v-on:input="CheckArabicOnly1" tabindex=1 />
                       </div>
                     </div>
                      <div class="row">
                        <div class="col-6">
                          <label>صورة السياره من الأمام </label>
                          <input type="file" accept="image/*" @change="displayuploadfile" name="imageone" class="far fa-gem ml-1"> 
                        </div>
                        <div class="col-6"> 
                          <label>صورة السياره من الخلف </label>
                          <input type="file" accept="image/*" @change="imageOfRearOfCar" class="far fa-gem ml-1">
                          </div>
                      </div> 
                      <div class="row">
                        <div class="col-6">
                            <img :src="url1" style="width:50%"/>
                        </div>
                        <div class="col-6"> 
                         <img :src="url2" style="width:50%"/>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <label>منطقة السرقه: </label>
                       <select class="form-control" v-model="govid" @change="cityselect">
                         <option disabled value="">أختر واحده فقط</option>
                         <option v-for="info in govornorates" :key="info.id" :value="info.id">{{info.governorate_name_en}}</option>
                         </select>
                        </div>
                        <div class="col-6" v-if="govIsSelected">
                          <label>City: </label>
                          
                          <select class="form-control" v-model="cityId">
                           
                            <option v-for="info in city" :key="info.id" :value="info.id">{{info.city_name_en}}</option>
                            </select>
                        </div>
                      </div>
                     <div class="text-center">
                      <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase text-center" type="submit" @click.prevent="submitForm">إرسال الطلب</button>
                  </div>
           
      
                </form>
    
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
      fullName:'',
      phoneNumber:'',  
      noOnly:'',
       no1:'',
       no2:'',
       no3:'',
       no4:'',
      
       errors:[
     
       ],
       
       url1:'',
       url2:'',
       govornorates:'',
       govid:'',
        cityId:'',
       city:null,
       govIsSelected:null,
       fronCarImage:'',
       rearCarImage:'',
       registerd_message:false,
       err_messg_if_returned_errro_form:false,
        formshow:false,
        isLoading:true,
        code:''
 
   
           }
},
mounted(){
    this.formda()
    
},
methods:{
 nextPlease1: function (event) {
        document.getElementById('input2').focus();
      },
      nextPlease2: function (event) {
        document.getElementById('input3').focus();
      }, 
      nextPlease3: function (event) {
        document.getElementById('input4').focus();
      },
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
    displayuploadfile:function(e)
    {
      const file1=e.target.files[0];
   
       this.url1 = URL.createObjectURL(file1);  
        this.fronCarImage=e.target.files[0];
        console.log(file1.size);
     
      
    },
    imageOfRearOfCar:function(e)
    {
       const file2=e.target.files[0];
        this.url2 = URL.createObjectURL(file2);  
        this.rearCarImage=e.target.files[0];
    },
    formda:function()
    {
      
      axios.get(' https://saree.nrchrod.org/api/auth/govornorates')
      .then(response => (this.govornorates = response.data,this.isLoading=false,this.formshow=true));
    },
    cityselect:function()
    {
      this.govIsSelected=true;
      axios.post(' https://saree.nrchrod.org/api/auth/'+this.govid+'/cities')
      .then(response=>(this.city = response.data));
    },
    submitForm:function()
    {
      
      this.errors = [];
      
      if(!this.fullName)
        {
        this.errors.push('Name required.');
        }
      else if(!this.phoneNumber || this.phoneNumber.length<11)
        {
        this.errors.push('mobile required.');
        }
      else if(!this.govid || !this.cityId)
        {
        this.errors.push("govornorates and City are required");
        }
      else if(!this.noOnly && !this.no4 && !this.no2 && !this.no1 && !this.no3)
        {
        this.errors.push('Car Numbers required.');
        }
     
  
     
      else
        {
          let formData = new FormData();
          formData.append('fullName', this.fullName);
          formData.append('Mobile_Number', this.phoneNumber);
          if(this.noOnly)
           {
               formData.append('carNumbers',this.noOnly)
           }
          else
          {
              formData.append('carchar1',this.no1);
              formData.append('carchar2',this.no2);
              formData.append('carchar3',this.no3);
              formData.append('carchar4',this.no4);
          }
           if(this.fronCarImage)
           {
          formData.append('image1',this.fronCarImage);
            }
      
          if(this.rearCarImage)
          {
            formData.append('image2',this.rearCarImage)
          }
              formData.append('stolenFrom',this.govid);
              formData.append('city',this.cityId);
           
              this.isLoading=true;
              this.formshow=false;
            axios.post(' https://saree.nrchrod.org/api/auth/uploadimg',formData).then(
             response=>{
               if(response.data.message){
                 this.err_messg_if_returned_errro_form=false;
                 this.formshow=false;
                 this.isLoading=false
                 this.registerd_message=response.data.message;
                 this.code=response.data.code
                 
               }
               else{
                 this.formshow=true
                 this.isLoading=false;
                  this.err_messg_if_returned_errro_form = response.data.error_message;
                  console.log(this.err_messg_if_returned_errro_form)

               }
               
                
             
                        });
  
                                                                                    

     
        }
    }
}
}
</script>

<style>
#contact {
  background-color:white 
}
#input1,#input2,#input3,#input4, #car{
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
}
#img2{
  width: 100%;
}
@media screen and (max-width: 1024px) {
    #apllyimage {
        display: none !important;
    }
}

</style>