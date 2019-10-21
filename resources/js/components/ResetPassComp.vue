<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="card card-default">
          <div class="card-header">Create New Password</div>
          <div class="card-body">
            <!-- <ul v-if="errors">
              <li v-for="error in errors" v-bind:key="error">{{ msg }}</li>
            </ul> -->
            <form autocomplete="off" @submit.prevent="resetPassword" method="post">
              <div class="form-group">
                  <label for="mobile">Enter your pin here</label>
                  <input type="phone" id="pin" class="form-control" placeholder="xxxxxx" v-model="pin" required>
              </div>
              <form autocomplete="off" @submit.prevent="resetPassword" method="post">
              <div class="form-group">
                  <label for="email">Enter New Password</label>
                  <input type="password" id="password" class="form-control" placeholder="" v-model="new_password" required>
              </div>
              <!-- <div class="form-group">
                  <label for="email">Confirm Password</label>
                  <input type="password" id="password_confirmation" class="form-control" placeholder="" v-model="password_confirmation" required>
              </div> -->
              <button type="submit" class="btn btn-primary" @click="submit">Create New Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { Script } from 'vm';
    export default {
        name:'login',
        props: [
            'camplogo',
            'company'
        ],
        data() {
              return {
                submitStatus: null,
                  mobile: '',
                  new_password: '',
                  errorMessages: '',
                  companyid: this.company,

              
              }
          },
      methods: {
          submit () {
          this.errorMessages='';
        

              let data = new FormData();
              data.append('companyid', this.companyid);
              data.append('mobile', this.mobile);
              data.append('new_password', this.new_password);

              axios.post("http://testrewardsapi.dczambia.com/v1/reset_password?company_id="+this.companyid, data)
                .then(response => {
                  //if response error == true

                  if(response.data.error === true){
                
                    this.errorMessages=response.data.message
                  }else{
                    //collect data for session
                    const customer=response.data;

                    sessionStorage.setItem('person',JSON.stringify(customer));
                    window.location.assign('reset_password.php');
                    

                  }
                }).catch(error => {
                
         
                })

            
        },
      }
    }
    </Script>
    <style>
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