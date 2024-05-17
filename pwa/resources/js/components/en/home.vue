<template>
<div>
         <header class="masthead">
          <div class="container">
            <div class="intro-text">
              <div class="intro-lead-in"><p style="font-weight: bold;font-variant:small-caps;">Apply..Inquiry..Find</p></div>
              <div class="intro-heading text-uppercase">can apply<br><i class="fas fa-angle-double-down"></i></div>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="/apply">Apply</a>
            </div>
          </div>
        </header>
      
        <!-- Services -->
        <section class="page-section" id="services">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">We work hard to provide the best service.</h3>
              </div>
            </div>
            <div class="row ">
              <div class="col-md-12 text-center">
                  <img src="public/images/home/car-thief1.jpg" style="max-width:40%;
                    border-radius: 100%;">
              
                <h4 class="service-heading">stolen cars</h4>
                <p class="text-muted">Our service is currently tracking the stolen cars.</p>
              </div>
           
      
            </div>
          </div>
        </section>
      
      
        <!-- About -->
        <section class="page-section" id="about">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">A brief summary about us.</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <h4>About Company:</h4>
                <p>NRCHROD is a local HR &amp; OD, CD, and IT Services professional organization was founded early 2012 and officially was set May 2014 by Ashraf Ezzat, Ph.D., HRM a certified team learning coach with proven success track in working with SM and big enterprises mainly for establishing.</p>

              </div>
               <div class="col-6" >
                   <img src="public/images/about/logo2.png" class = "img-fluid">
              </div>
            </div>
              <div class="row">
              <div class="col-6">
                <h4>About Application:</h4>
                <p>"Saree" is an application to search for stolen cars with 50% human efforts and 50% electronic specifications and is not intended for profit at all.</p>
                <p>The main purpose of the application is to find stolen cars from different regions across the governorates of the Arab Republic of Egypt.</p>
              </div>
               <div class="col-6" >
                   <img src="public/images/about/Side-view-car-thief-min.2e16d0ba.fill-800x450.jpg" class = "img-fluid">
              </div>
            </div>
          </div>
        </section>
      
        <!-- Contact -->
        <section class="page-section" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">For more Information contact us , please.</h3>
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
                        <input class="form-control" id="name" type="text" placeholder="Your Name *"  v-model="FullName" required>
                      </div>
                      <div class="form-group">
                        <input class="form-control" id="email" type="email" placeholder="Your Email *"  v-model="email" required>
                      </div>
                      <div class="form-group">
                        <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"  v-model="mobilenumber" maxlength="11" pattern="[0-9]{11}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <textarea class="form-control" id="message" placeholder="Your Message *"   v-model="textmessage" required></textarea>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                      <div id="success"></div>
                      <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" @click.prevent="sendmessage">Send Message</button>
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
