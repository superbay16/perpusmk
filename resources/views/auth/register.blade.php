@extends('layouts.auth')

@section('content')
<div class="page-content page-auth" id="register">
  <div class="section-auth" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center row-login">
        <div class="col-lg-4 mx-auto">
          <h2>
            Memulai baca buku <br />
            dengan cara terbaru
          </h2>
          <form class="mt-3" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
              <label>Full Name</label>
              <input v-model="nama" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
              @error('nama')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Email</label>
              <input v-model="email" @change="checkForEmailAvailability()" id="email" type="email"
                class="form-control @error('email') is-invalid @enderror"
                :class="{ 'is-invalid': this.email_unavailable }" name="email" value="{{ old('email') }}" required
                autocomplete="email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-4" :disabled="this.email_unavailable">
              Sign Up Now
            </button>
            <a href="{{ route('login') }}" class="btn btn-light btn-block mt-2">Back to Sign In</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
<script src="vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  Vue.use(Toasted);

    var register = new Vue({
      el: "#register",
      mounted() {
        AOS.init();
      },
      methods: {
        checkForEmailAvailability: function () {
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                                "Email anda tersedia! Silahkan lanjut langkah selanjutnya!", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );
                            self.email_unavailable = false;
                        } else {
                            self.$toasted.error(
                                "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );
                            self.email_unavailable = true;
                        }
                        // handle success
                        console.log(response.data);
                    })
      }
      
      },
      data: {
        nama: "",
        email: "",
        email_unavailable: false
      },
    });
</script>
@endpush