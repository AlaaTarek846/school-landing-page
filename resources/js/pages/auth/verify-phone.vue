<template>
    <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
          <div class="my-5 d-flex justify-content-center">
            <a href="index.html">
              <img src="/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
              <img src="/assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
            </a>
          </div>
          <div class="card custom-card">
            <div class="card-body p-5">
              <p class="h5 fw-semibold mb-2 text-center">Verify Your Account</p>
              <p class="mb-4 text-muted op-7 fw-normal text-center">Enter the 4 digit code sent to the registered email Id.</p>
              <div class="d-flex align-items-center mb-3">
                <div class="lh-1">
                    <span class="avatar avatar-md avatar-rounded">
                        <img src="/assets/images/faces/15.jpg" alt="">
                    </span>
                </div>
                <div class="ms-3">
                  <p class="mb-0 fw-semibold text-dark">jhonslicer21@gmail.com</p>
                </div>
              </div>
              <div class="row gy-3">
                <div class="col-xl-12 mb-2">
                  <div class="row">
                    <div class="col-3">
                      <input type="text" class="form-control form-control-lg text-center" id="one" maxlength="1" onkeyup="clickEvent(this,'two')">
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control form-control-lg text-center" id="two" maxlength="1" onkeyup="clickEvent(this,'three')">
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control form-control-lg text-center" id="three" maxlength="1" onkeyup="clickEvent(this,'four')">
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control form-control-lg text-center" id="four" maxlength="1">
                    </div>
                  </div>
                  <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Did not recieve a code ?<a href="mail.html" class="text-primary ms-2 d-inline-block">Resend</a>
                    </label>
                  </div>
                </div>
                <div class="col-xl-12 d-grid mt-2">
                  <a href="index.html" class="btn btn-lg btn-primary">Verify</a>
                </div>
              </div>
              <div class="text-center">
                <p class="fs-12 text-danger mt-3 mb-0"><sup><i class="ri-asterisk"></i></sup>Don't share the verification code with anyone !</p>
              </div>

            </div>
          </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "verify-phone"
}
</script>

<style scoped>

</style>