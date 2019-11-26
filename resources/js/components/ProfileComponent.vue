<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            Hello :)
            <ul v-for="error in errors" :key="error.lenght">
              <li style="color: #e3342f;">{{error}}</li>
            </ul>
          </div>

          <div class="card-body">
            <!-- profile -->
            <div v-if="(profile && hidden == true)">
              <h4>Your profile:</h4>
              <ul>
                <li>Name: {{profile.name}}</li>
                <li>Gender: {{profile.gender}}</li>
                <li>About: {{profile.about}}</li>
              </ul>
              <button type="button" class="btn-primary" @click="hidden = false">Edit</button>
            </div>
            <!-- profile -->

            <!-- edit profile -->
            <div v-if="hidden === false">
              <h4>Edit profile:</h4>
              <ul>
                <li>
                  Name:
                  <input type="text" v-model="profile.name" />
                </li>
                <li>
                  Gender
                  <select v-model="profile.gender">
                    <option value="male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </li>
                <li>
                  About:
                  <textarea cols="30" rows="5" v-model="profile.about"></textarea>
                </li>
              </ul>
              <button type="button" class="btn-success" @click="hidden = true;editProfile();">Send</button>
              <button type="button" class="btn-danger" @click="hidden = true">Cancel</button>
            </div>
            <!-- edit profile -->

            <!--add profile -->
            <div v-if="!profile">
              <h3>{{status}}</h3>
              <h4>Please add info about you:</h4>
              <label for="name">Name:</label>
              <input type="text" name="name" v-model="newProfile.name" required />
              <hr />
              <label for="gender">Gender:</label>
              <select name="gender" v-model="newProfile.gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <hr />
              <h6>About you:</h6>
              <textarea name="about" cols="30" rows="5" v-model="newProfile.about" required></textarea>
              <br />
              <button type="button" @click="addProfile">Send</button>
            </div>
            <!--add profile -->
          </div>
        </div>
      </div>

      <!-- all profiles -->
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Our users</div>

          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">More info</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in profiles" :key="item.user_id">
                  <th scope="row">{{item.user_id}}</th>
                  <td>{{item.name}}</td>
                  <td>{{item.gender}}</td>
                  <td>
                    <a v-bind:href="'profile/' + item.user_id">View profile</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- all profiles -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      hidden: true,
      status: "",
      profiles: [],
      profile: null,
      newProfile: {
        name: "",
        gender: "",
        about: "",
        user_id: this.user_id
      },
      errors: []
    };
  },
  props: {
    user_id: ""
  },
  mounted() {
    this.getProfile();
    this.getProfiles();
  },
  methods: {
    //get ALL user list
    getProfiles() {
      let _this = this;
      axios
        .get("api/profile")
        .then(function(response) {
          _this.profiles = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    getProfile() {
      let _this = this;
      let id = this.user_id;
      axios
        .get("api/profile/" + id)
        .then(function(response) {
          _this.profile = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    //add info about user
    addProfile() {
      let _this = this;
      let accept = confirm("Данные введены верно?");
      if (accept) {
        axios
          .post("api/profile", _this.newProfile)
          .then(function(response) {
            _this.status = "Your account was created";
            _this.getProfile();
            _this.getProfiles();
            _this.errors = [];
          })
          .catch(error => {
            _this.errors = error.response.data.errors;
            console.log(error.response.data.errors);
          });
      }
    },
    //edit user profile
    editProfile() {
      let _this = this;
      let id = this.user_id;
      axios
        .put("api/profile/" + id, _this.profile)
        .then(function(response) {
          _this.getProfile();
          _this.getProfiles();
        })
        .catch(error => {
          console.log(error.response);
        });
    }
  }
};
</script>
