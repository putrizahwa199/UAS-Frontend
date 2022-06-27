<template>
  <div class="dep">
    <div id="app">
      <div class="container-fluid">
        <div class="row bg-dark">
          <div class="col-lg-12">
            <p
              class="text-light display-4 pt-2"
              style="font-size: 25px"
            >
              Data Karyawan
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered table-striped">
            <thead>
              <tr
                class="text-center bg-dark text-light"
                style="font-size: 18px"
              >
                <th>Id Karyawan</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>No Telpon</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="text-center"
                v-for="user in users"
                :key="user"
                style="font-size: 14px"
              >
                <td>{{ user.id_karyawan }}</td>
                <td>{{ user.nama }}</td>
                <td>{{ user.jabatan }}</td>
                <td>{{ user.jenis_kelamin }}</td>
                <td>{{ user.alamat }}</td>
                <td>{{ user.tanggal_lahir }}</td>
                <td>{{ user.no_telp }}</td>
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
      axios.get(          
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