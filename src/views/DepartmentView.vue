<template>
  <div class="dep">
    <div id="app">
      <div class="container-fluid">
        <div class="row bg-dark">
          <div class="col-lg-12">
            <p
              class="text-center text-light display-4 pt-2"
              style="font-size: 25px"
            >
              Semua Department
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered table-striped">
            <thead>
              <tr
                class="text-center bg-info text-light"
                style="font-size: 18px"
              >
                <th>Department Id</th>
                <th>Department Name</th>
                <th>Manager Id</th>
                <th>Manager Name</th>
                <th>Manager StartDate</th>
                <th>Department Region</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="text-center"
                v-for="user in users"
                :key="user"
                style="font-size: 14px"
              >
                <td>{{ user.department_id }}</td>
                <td>{{ user.department_name }}</td>
                <td>{{ user.manager_id }}</td>
                <td>{{ user.manager_name }}</td>
                <td>{{ user.manager_startdate }}</td>
                <td>{{ user.department_region }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "AboutView",
  data: () => {
    return {
      users: [],
    };
  },
  mounted: function () {
    this.getAllUsers();
  },
  methods: {
    getAllUsers() {
      axios
        .get(
          "https://api-pegawai.000webhostapp.com/UAS_PWEB/api.php?action=dep"
        )
        .then((res) => {
          if (res.data.error) {
            this.errorMsg = res.data.message;
          } else {
            // console.warn(res.data.users);
            this.users = res.data.users;
          }
        });
    },
  },
};
</script>