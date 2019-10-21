<template>
<div class="container">
<h1 class="form-heading">BUSINESS REWARDS</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
    
   <img :src="'public/images/companylogos/'+camplogo" class="img-responsive mb-2" alt="The cakebar">

   <p>Please enter your email/Phone and password</p>
   </div>
   <p class="err_msg" v-if="errorMessages" v-text="errorMessages"> <span class="fas fa-times"></span></p>
    <form id="Login" @submit.prevent="" v-on:keyup.enter="submit">

        <div class="form-group">
            <input type="text" class="form-control" id="inputEmail" placeholder="Phone or Email Address"  v-model="emailorPhone">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Password" v-model="password">

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div>
        <button  class="btn btn-primary"  @click="submit">Login</button>

    </form>
    </div>
<p class="botto-text">Powered by Book Now Zambia</p>
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
 @media screen and (max-width: 767px) {
  .main-div {
    max-width: 90%;
  }
}
</style>

<script>
    export default {
        name:'login',
        props: [
            'camplogo',
            'company'
        ],
        data() {
              return {
                submitStatus: null,
                  emailorPhone: '',
                  password:'',
                  errorMessages: '',
                  companyid: this.company,

              
              }
          },
      methods: {
          submit () {
          this.errorMessages='';
        

              let data = new FormData();
              data.append('emailorPhone', this.emailorPhone);
              data.append('password', this.password);
              data.append('company_id', this.companyid);

              axios.post("http://testrewardsapi.dczambia.com/v1/login?company_id="+this.companyid, data)
                .then(response => {
                  //if response error == true

                  if(response.data.error === true){
                
                    this.errorMessages=response.data.message
                  }else{
                    //collect data for session
                    const customer=response.data;

                    sessionStorage.setItem('person',JSON.stringify(customer));
                    window.location.assign('home.php');
                    

                  }
                }).catch(error => {
                
         
                })

            
        },
      }
    }
</script>
