<template>
<div class="container">
<h1 class="form-heading text-center">BUSINESS REWARDS</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
    
   <img :src="'public/images/companylogos/'+complogo" class="img-responsive mb-2" alt="The cakebar">

   <p>Please enter your Phone to Reset Password</p>
   </div>
   <p class="err_msg" v-if="errorMessages" v-text="errorMessages"> <span class="fas fa-times"></span></p>
   <!-- Form one -->
    <form id="Login" @submit.prevent="" v-on:keyup.enter="submit_phone" v-if="form1==true">

        <div class="form-group">
            <input type="text" class="form-control" id="inputEmail" placeholder="Phone Number"  v-model="phone">
        </div>
   
        <button  class="btn btn-primary"  @click="submit_phone">NEXT</button>
         <div class="forgot">
          <a :href="'register.php?q='+comphash">Need an account? Register here</a>
        </div>

    </form>
   <!-- Form two -->
    <form id="Login" @submit.prevent="" v-on:keyup.enter="submit_pass" v-if="form2==true">

        <div class="form-group">

            <input type="text" class="form-control" id="inputPassword" placeholder="Enter OTP" v-model="otp">

        </div>
   

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Enter New Password" v-model="newpass">

        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm New Password" v-model="confirmpass">
        </div>
   
        <button  class="btn btn-primary"  @click="submit_pass">SAVE</button>
         <div class="forgot">
          <a :href="'register.php?q='+comphash">Need an account? Register here</a>
        </div>

    </form>
    </div>
<!-- <p class="botto-text">Powered by Book Now Zambia</p> -->
</div>
</div>
</template>
<style scoped>
.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #ad7956 none repeat scroll 0 0;
  border-color: #ad7956;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ad7956 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}
p.err_msg {
    padding: 8px;
    border: 1px solid brown;
    color: red;
    font-weight: bold;
}
p.err_msg span{
    float: left;
    cursor: pointer;
    color:brown;
}
img.img-responsive.mb-2 {
    width: 100%;
    max-width: 220px;
}
 @media screen and (max-width: 767px) {
  .main-div {
    max-width: 90%;
    padding: 10px;
  }
  img.img-responsive.mb-2 {
    width: 100%;
    max-width: 145px;
}
}
</style>

<script>
    export default {
        name:'reset',
        props: [
            'complogo',
            'company',
            'comphash'
        ],
        data() {
              return {
                submitStatus: null,
                  phone: '',
                  otp:'',
                  newpass:'',
                  confirmpass:'',
                  errorMessages: '',
                  companyid: this.company,
                  form1:true,
                  form2:false,
              
              
              }
          },
      methods: {
        submit_phone(){
           this.errorMessages='';
           let data = new FormData();
           data.append('mobile', this.phone);
           data.append('company_id', this.companyid);

          axios.post("http://testrewardsapi.dczambia.com/v1/pin_request", data)
           .then(response => {
             if(response.data.error == true){
               this.errorMessages=response.data.message
             }else{
              this.form1 =false;
              this.form2 =true;
             }
           })
        },
          submit_pass () {
          this.errorMessages='';
        
              if(this.newpass !=this.confirmpass){
                 this.errorMessages='Passwords Do not match';
              }else{
              let data = new FormData();
              data.append('pin', this.otp);
              data.append('mobile', this.phone);
              data.append('company_id', this.companyid);
              data.append('new_password', this.confirmpass);

              axios.post("http://testrewardsapi.dczambia.com/v1/reset_password", data)
                .then(response => {
                  //if response error == true

                  if(response.data.error === true){
                
                    this.errorMessages=response.data.message
                  }else{
                    //redirect to success page
                    
                  
                    var r = confirm("You have successfully changed your password");
                    if (r == true) {
                        window.location.assign('index.php?q='+comphash);
                    } else {
                    
                    }
                  }
                }).catch(error => {
                
         
                })

          }
        },
      }
    }
</script>
