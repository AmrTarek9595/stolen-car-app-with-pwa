<template>







<div >
    <img src="/public/images/tumblr_odllgjF19s1qabbyto1_500.gif" v-if="isloading"/>
<Nav/>
<router-view v-if="!isloading"></router-view>
<Footer/>

</div>


</template>

<script>
import Nav from "./nav.vue";

import Footer from "./footer.vue";
    export default {
    components:{'Nav':Nav,'Footer':Footer},
data(){
return{
    isloading:true
}
},
mounted(){
document.onreadystatechange = () => { 
    if (document.readyState == "complete") { 
        this.isloading=false;
    } 
  }
}
    }
</script>
