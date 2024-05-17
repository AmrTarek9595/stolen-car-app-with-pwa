<template>
<div>
         <header class="masthead">
          <div class="container">
            <div class="intro-text">
              <div class="intro-lead-in"><p style="font-weight: bold;font-variant:small-caps;">تقديم بيانات السياره..استعلم..ايجاد السياره</p></div>
              <div class="intro-heading text-uppercase">قدم الأن<br><i class="fas fa-angle-double-down"></i></div>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="/ar/apply">تقديم</a>
            </div>
          </div>
        </header>
      
        <!-- Services -->
        <section class="page-section" id="services">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">الخدمات</h2>
                <h3 class="section-subheading text-muted">نحن نعمل بجديه للحصول علي اعلي أداء للخدمه</h3>
              </div>
            </div>
            <div class="row ">
              <div class="col-md-12 text-center">
                  <img src="public/images/home/car-thief1.jpg" style="max-width:40%;
                    border-radius: 100%;">
              
                <h4 class="service-heading">السيارات المسروقه</h4>
                <p class="text-muted">خدمتنا الأن هي متابعة السيارات المسروقه.</p>
              </div>
           
      
            </div>
          </div>
        </section>
      
      
        <!-- About -->
        <section class="page-section" id="about">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">من نحن</h2>
                <h3 class="section-subheading text-muted">"نبذه عن "من نحن</h3>
              </div>
            </div>
            <div class="row" >
               <div class="col-6" >
                   <img src="public/images/about/logo2.png" class = "img-fluid">
              </div>
              <div class="col-6" style="text-align:right">
                <h4>عن الشركه:</h4>
                <p>مكتب بحوث الموارد البشريه و التطوير المؤسسي تقدم خدمات الإستشاريه في مجال الموارد البشريه والتطوير المؤسسي و التنمية المجتمعيه وبعض خدمات تكنولوجيا المعلومات.
                  <br> تأسست المنظمة المهنية في أوائل عام 2012 وتم تعيينها رسميًا في مايو 2014 من قبل أشرف عزت, دكتوراه ، إدارة الموارد البشرية ، مدرب تعلم فريق معتمد مع مسار نجاح مثبت في العمل مع المؤسسات الصغيرة والمؤسسات الكبيرة بشكل أساسي من أجل التأسيس.</p>

              </div>
              
            </div>
              <div class="row" >
                <div class="col-6" >
                   <img src="public/images/about/Side-view-car-thief-min.2e16d0ba.fill-800x450.jpg" class = "img-fluid">
              </div>
              <div class="col-6" style="text-align:right">
                <h4>عن البرنامج:</h4>
                <p> <b>سريع: </b> هو برنامج لتتبع السيارات المسروقه بجهود بشريه بنسبة 50% وتكنولوجيا بنسبة 50% وليس الغرض منه الربح علي الإطلاق.</p>
                <p>الغرض الأساسي من البرنامج هو العثور علي أكبر عدد من السيارات المسروقه و إعادتها لأسحابها بمختلف المناطق في جمهورية مصر العربيه.</p>
              </div>
               
            </div>
          </div>
        </section>
      
        <!-- Contact -->
        <section class="page-section" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">تواصل معنا</h2>
                <h3 class="section-subheading text-muted">للحصول علي معلومات أكثر ,الرجاء التواصل معنا.</h3>
              </div>
            </div>
            <div class="row"> 
              <div class="col-12">
                <ul>
                  <li v-for="error in errors" :key="error" id="errorM">{{error}}</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <form id="contactForm" name="sentMessage" v-if="display_form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input class="form-control" id="name" type="text" placeholder="الإسم *"  v-model="FullName" required>
                      </div>
                      <div class="form-group">
                        <input class="form-control" id="email" type="email" placeholder="البريد الإلكتروني *"  v-model="email" required>
                      </div>
                      <div class="form-group">
                        <input class="form-control" id="phone" type="tel" placeholder="رقم الموبايل الشخصي *"  v-model="mobilenumber" maxlength="11" pattern="[0-9]{11}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <textarea class="form-control" id="message" placeholder="...... استفسارك عن*"   v-model="textmessage" required></textarea>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                      <div id="success"></div>
                      <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" @click.prevent="sendmessage">إرسال الإستفسار</button>
                    </div>
                  </div>
                </form>
                <p v-if="display_message" style="color:red;text-align: center;font-size: 3em;">{{message}}</p>
              </div>
            </div>
          </div>
        </section>  
        </div>
</template>

<script>

    export default {
       data(){
         return {
         FullName:'',
         email:'',
         mobilenumber:'',
         textmessage:'',
         errors:[],
         display_form:true,
         message:'',
         display_message:false
            }
       }
       ,

            methods:{
sendmessage:function(){
  this.errors=[];
  if(!this.FullName)
  {
    this.errors.push('Your Name is required.');
  }
  if(!this.email)
  {
    this.errors.push('Your Email is required.');
  }
  if(!this.mobilenumber)
  {
    this.errors.push('Your Phone Number is required.');
  }
  if(!this.textmessage)
  {
    this.errors.push('Your Messae is required.');
  }
  let formData=new FormData();
  formData.append('name',this.FullName);
  formData.append('email',this.email);
  formData.append('phone',this.mobilenumber)
  formData.append('text',this.textmessage);
  axios.post('https://saree.nrchrod.org/api/auth/sendmessage',formData).then(
  response=>{this.message=response.data;
  this.display_form=false;
  this.display_message=true}
  );
}
            }
    }
</script>
<style>
#services{
    padding-bottom: 0px;
}
#about{
    padding-top: 50px;
}
#errorM{
  color:red
}
</style>
