<template>
<div class="container">
<h1 class="form-heading text-center">CAKE BAR REWARDS</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
    
  <img class="justify-center" :src="'public/images/companylogos/'+camplogo" alt="The cakebar">

   <p class="text">Register Here</p>
   </div>
   <p class="err_msg" v-if="errorMessages" v-text="errorMessages"> <span class="fas fa-times"></span></p>
    <form id="Login" @submit.prevent="">
 
       
       <div class="form-group">
            <input type="text" class="form-control" id="inputName" placeholder="Enter Your First Name"  v-model="firstname">

        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="inputLastName" placeholder="Enter Your LastName Name"  v-model="lastname">

        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="inputEmail" placeholder="Enter Your Email Address"  v-model="email">

        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="inputPhone" placeholder="Enter Your Phone Number"  v-model="mobile">

        </div>
        <div class="form-group datepicker">
            <input type="text" class="form-control" id="inputDateofBirth" placeholder="Date of Birth (dd/mm/yyyy)"  v-model="date_of_birth">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Password" v-model="password">

        </div>
      <div class="text-center">
        <button  class="btn btn-primary"  @click="submit">Register</button>
      </div>
      <div class="forgot">
        <a href="index.php">Have an account? Login Here</a>
</div>
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
  margin: auto auto auto;
  max-width: 600px;
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
  text-align: left; margin-bottom:auto;
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


</style>

<script>
    export default {
        name:'login',
        data() {
              return {
                submitStatus: null,
                  company_id: 18,
                  firstname: '',
                  lastname: '',
                  email: '',
                  mobile: '',
                  date_of_birth: '',
                  password:'',
                  errorMessages: '',
              
              }
          },
      methods: {
          submit () {
          this.errorMessages='';
        

              let data = new FormData();
              data.append('company_id', this.company_id);
              data.append('firstname', this.firstname);
              data.append('lastname', this.lastname);
              data.append('email', this.email);
              data.append('mobile', this.mobile);
              data.append('date_of_birth', this.date_of_birth);
              data.append('password', this.password);

              axios.post('http://testrewardsapi.dczambia.com/v1/register?company_id=18', data)
                .then(response => {
                  //if response error == true
                  if(response.data.error === true){
                
                    this.errorMessages=response.data.message
                  }else{
                    //collect data for session
                    const customer=response.data;

                    sessionStorage.setItem('person',JSON.stringify(customer));
                    window.location.assign('success.php');
                    
                  }
                }).catch(error => {
                
         
                })

            
        },
      }
    }
</script>
