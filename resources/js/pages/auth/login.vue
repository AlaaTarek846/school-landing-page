<template>
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
      <div class="my-5 d-flex justify-content-center">
        <a href="/">
          <img src="/website/img/logos/logo1.png" alt="logo" class="desktop-logo" style="width:150px;height:150px">
          <img src="/website/img/logos/logo1.png" alt="logo" class="desktop-dark" style="width:150px;height:150px">
        </a>
      </div>
      <div class="card custom-card">
        <div class="card-body p-5">
          <p class="h5 fw-semibold mb-2 text-center">{{$t('global.sign_in') }}</p>
          <p class="mb-4 text-muted op-7 fw-normal text-center">{{ $t('global.WelcomeBack') }}</p>
          <form>
            <div class="row gy-3">
<!--              <div class="col-xl-12">-->
<!--                <label class="form-label text-default">{{ $t('global.phone')}}</label>-->
<!--                <vue-tel-input-->
<!--                    v-model="v$.phone.$model"-->
<!--                    @validate="phoneValidation"-->
<!--                    defaultCountry="SA"-->
<!--                    :placeholder="'REE'"-->
<!--                    :onlyCountries="['SA']"-->
<!--                    autocomplete="off"-->
<!--                    :styleClasses="['form-control',{ 'is-invalid': v$.phone.$error || !is_valid || errors[`phone`], 'is-valid': !v$.phone.$invalid  && !errors[`phone`] && is_valid}]"-->
<!--                ></vue-tel-input>-->
<!--                <div class="invalid-feedback">-->
<!--                  <span v-if="v$.phone.integer.$invalid || !is_valid">{{$t('global.PhoneIsMustHaveAtLeast') }} <br /></span>-->
<!--                </div>-->
<!--                <template v-if="errors['phone']">-->
<!--                  <error-message v-for="(errorMessage, index) in errors['phone']" :key="index">-->
<!--                    {{ errorMessage }}-->
<!--                  </error-message>-->
<!--                </template>-->
<!--              </div>-->
              <div class="col-md-12 mb-2">
                <label class="form-label">{{ $t('global.email') }} <span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="text" :placeholder="$t('global.email')" class="form-control form-control-lg" v-model.trim="v$.email.$model"
                         :class="{
                                    'is-invalid': v$.email.$error || errors[`email`],
                                    'is-valid': !v$.email.$invalid && !errors[`email`]
                                }">
                </div>

                <div class="invalid-feedback">
                  <span v-if="v$.email.maxLength.$invalid">{{ $t('validation.TitleIsMustHaveAtMost') }} {{
                      v$.email.maxLength.$params.max
                    }} {{ $t('validation.Letters') }}
                  </span>
                </div>
                <template v-if="errors[`email`]">
                  <error-message v-for="(errorMessage, index) in errors[`email`]" :key="index">
                    {{ errorMessage }}
                  </error-message>
                </template>
              </div>
              <div class="col-xl-12 mb-2">
                <label for="signin-password" class="form-label text-default d-block">
                  {{ $t('global.password')}}
<!--                  <a href="/forget-password" class="float-end text-danger">Forget password ?</a>-->
                </label>
                <div class="input-group">
                  <input
                      type="password"
                      v-model.trim="v$.password.$model"
                      :class="['form-control form-control-lg', { 'is-invalid': v$.password.$error || errors[`password`], 'is-valid': !v$.password.$invalid&& !errors[`password`] }]"
                      id="signin-password"
                      :placeholder="$t('global.password')"
                  >
                  <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                </div>
                <div class="mt-2">
                  <div class="form-check">
                    <input class="form-check-input" v-model="v$.remember.$model" type="checkbox"  id="defaultCheck1">
                    <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                      {{ $t('global.rememberPassword') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 d-grid mt-2">
                <button v-if="!is_loading" @click.prevent="AddSubmit" :disabled="is_disabled" type="button" class="btn btn-lg btn-primary">
                  {{ $t('global.sign_in') }}
                </button>
                <button v-else type="button" class="btn btn-lg btn-primary">
                  <div class="spinner-border spinner-border-sm me-4 text-light">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </button>
              </div>
            </div>
          </form>
<!--          <div class="text-center">-->
<!--            <p class="fs-12 text-muted mt-3">Dont have an account? <a href="/register" class="text-primary">Sign Up</a></p>-->
<!--          </div>-->
<!--          <div class="text-center my-3 authentication-barrier">-->
<!--            <span>OR</span>-->
<!--          </div>-->
<!--          <div class="btn-list text-center">-->
<!--            <button class="btn btn-icon btn-light">-->
<!--              <i class="ri-facebook-line fw-bold text-dark op-7"></i>-->
<!--            </button>-->
<!--            <button class="btn btn-icon btn-light">-->
<!--              <i class="ri-google-line fw-bold text-dark op-7"></i>-->
<!--            </button>-->
<!--          </div>-->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {computed, reactive, ref,onMounted} from "vue";
import webApi from "../../api/adminAxios";
import useVuelidate from "@vuelidate/core";
import {alphaNum, maxLength, minLength, required, email} from "@vuelidate/validators";
import {useI18n} from "vue-i18n";

export default {
  name: "login",
  setup() {

    const errors = ref({});
    let is_valid = ref(true);
    let is_loading = ref(false);
    let is_disabled = ref(false);
    const { t } = useI18n({});

    let submitData = reactive({
      data: {
          email: '',
          password: '',
          remember: false,
      }
    });

    // const mustBeCoolPhone = (value) => value.replace(/ /g,'').match(/05[0-9]{8}/);

    const rules = computed(() => {
      return {
        remember: {
          required,
        },
        password: {
          required ,
          maxLength: maxLength(20)
        },
        email: {
          required,
          email,
          maxLength: maxLength(200)
          // integer: mustBeCoolPhone
        },
      }
    });

    const v$ = useVuelidate(rules, submitData.data);

    const AddSubmit = () => {

      v$.value.$validate();
      errors.value = {};

      if (!v$.value.$error && is_valid.value) {
        is_loading.value = true;
        errors.value = {};
        let formData = new FormData();
        // formData.append('phone', submitData.data.phone?.replace(/ /g,''));
        formData.append('password', submitData.data.password);
        formData.append('email', submitData.data.email);
        formData.append('remember', submitData.data.remember ? 1 : 0);
        webApi.post(`login`, formData)
            .then((res) => {
              is_disabled.value = true;
              Swal.fire({
                icon: 'success',
                title: `${ t('global.registrationSuccessful') }`,
                showConfirmButton: false,
                timer: 3000
              });
              setTimeout(() => window.location= '/admin', 3100);
            })
            .catch((err) => {
              if (err) {
                if (err.response) {
                  if (err.response.data) {
                    errors.value['phone'] = [err.response.data.message];
                    setTimeout(() => {
                      errors.value = {};
                    },3000);
                  }
                }
              }
            })
            .finally(() => {
              is_loading.value = false;
            });

      }

    }

    const phoneValidation = (e) => {
      is_valid.value = e.valid;
      if (e.valid == undefined){
        is_valid.value = true;
      }
    }

    return {AddSubmit,v$,phoneValidation,is_valid,errors,is_loading,is_disabled}
  }
}
</script>

<style scoped>

</style>