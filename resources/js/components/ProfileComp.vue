<template>
    <div>
        <div class="card bg-light text-dark  my-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <img src="public/images/icons/edit_user_male.svg" class="img rounded user-img" alt="Avatar">
                    </div>
                    <div class="col-sm-12">
                        <form >
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" v-model="firstname" readonly>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" v-model="lastname" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" v-model="email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">Mobile Number:</label>
                                <input type="text" class="form-control" id="phone" v-model="phone" readonly>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth:</label>
                                <input type="text" class="form-control" id="date_of_birth" v-model="date_of_birth" readonly>
                            </div>
                          

                            <button type="submit" class="btn btn-success " disabled>Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            'profile':[],
            'firstname':'',
            'lastname':'',
            'email':'',
            'phone':'',
            'date_of_birth':'',
        }
    },
    mounted(){
        this.profile =JSON.parse(sessionStorage.getItem('person'));

        //set the values
        this.firstname = this.profile.customer.firstname
        this.lastname = this.profile.customer.lastname
        this.email = this.profile.customer.email
        this.phone = this.profile.customer.phone
        this.date_of_birth = this.profile.customer.date_of_birth
        
    }
}
</script>
<style scoped>
.my-card{
    max-width: 660px;
    width: 100%;
    margin: 0 auto;

}
.user-img{
    width: 90px;
}
</style>