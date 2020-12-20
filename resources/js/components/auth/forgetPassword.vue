<template>

<div>
<div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Forget Password</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                   
                   
                    <div class="form-group">
                      <a href="index.html" class="btn btn-primary btn-block"> Reset password </a>
                    </div>
                    <hr>
                    <div class="text-center">
                    <router-link to="/"> Back to login page </router-link>
                  </div>
                   
                  </form>
                  <hr>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    
</template>


<script>
export default {
    
    
}
</script>

<style scoped>

</style>