<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="card card-default">
          <div class="card-header">Reset Password</div>
          <div class="card-body">
            <form autocomplete="off" @submit.prevent="" method="post">
              <div class="form-group">
                  <label for="phone">Enter Your Phone To request a PIN</label>
                  <input type="phone" id="phone" class="form-control" placeholder="09xxxxxxxx" v-model="phone" required>
              </div>
              <button type="submit" class="btn btn-primary">Send Password Reset PIN</button>
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

              axios.post("http://testrewardsapi.dczambia.com/v1/pin_request?company_id="+this.companyid, data)
                .then(response => {
                  //if response error == true

                  if(response.data.error === true){
                
                    this.errorMessages=response.data.message
                  }else{
                    //collect data for session
                    const customer=response.data;

                    sessionStorage.setItem('person',JSON.stringify(customer));
                    window.location.assign('pin_reset.php');
                    

                  }
                }).catch(error => {
                
         
                })

            
        },
      }
    }
    </Script>