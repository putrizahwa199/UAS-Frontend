<template>
  <div>
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="pe-7s-shopbag icon-gradient bg-mean-fruit">
            </i>
          </div>
          <div>Produk</div>
        </div>         
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-12">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Form Barang</h5>
            <form class="" @submit.prevent="submitFormProduk">
              <div class="position-relative form-group"><label for="nama" class="">Nama</label>
                <input name="nama" id="nama" placeholder="Nama Barang" type="text" class="form-control" v-model="modelProduk.nama">
              </div>
              <div class="position-relative form-group"><label for="deskripsi" class="">Deskripsi</label>
                <input name="deskripsi" id="deskripsi" placeholder="Deskripsi Barang" type="text" class="form-control" v-model="modelProduk.deskripsi">
              </div>
              <div class="position-relative form-group"><label for="penerbit" class="">Penerbit</label>
                <input name="penerbit" id="penerbit" placeholder="Penerbit Barang" type="text" class="form-control" v-model="modelProduk.penerbit">
              </div>
              <div class="position-relative form-group"><label for="harga" class="">Harga</label>
                <input name="harga" id="harga" placeholder="Harga Barang" type="text" class="form-control" v-model="modelProduk.harga">
              </div>
              <div class="position-relative form-group"><label for="stok" class="">Stok</label>
                <input name="stok" id="stok" placeholder="Stok Barang" type="number" class="form-control" v-model="modelProduk.stok">
              </div>
              <button class="mt-2 btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  <div class="row">
      <div class="col-12">
        <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Daftar Barang</h5>
            <table class="mb-0 table table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Deksripsi</th>
                <th>Penerbit</th>
                <th>Harga</th>
                <th>Stok</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(item, index) in dataProduk" :key="item.id">
                <th scope="row">{{index + 1}}</th>
                <td>{{item.id}}</td>
                <td>{{item.nama}}</td>
                <td>{{item.deskripsi}}</td>
                <td>{{item.penerbit}}</td>
                <td>{{item.harga}}</td>
                <td>{{item.stok}}</td>
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
  name: "ProductView",
  data(){
    return {
      dataProduk: [],
      modelProduk:{
        nama: '',
        deksripsi: '',
        penerbit: '',
        harga: '',
        stok: ''
      }
    }
  },
  mounted() {
    this.loadData()
  },
  methods: {
    loadData() {
      axios.get(" http://localhost:3000/products")
          .then(response => {
            this.dataProduk = response.data
          }).catch(error => {
        console.log(error)
      }).finally({})
    },
    submitFormCustomer(){
      const dataPayload = {
        nama: this.modelProduk.nama,
        deksripsi: this.modelProduk.deksripsi,
        penerbit: this.modelProduk.penerbit,
        harga: this.modelProduk.harga,
        stok: this.modelProduk.stok
      }
      axios.post(' http://localhost:3000/products/save', dataPayload)
        .then(response => {
          this.dataProduk.push(response.data);
          this.modelProduk.nama = '';
          this.modelProduk.deksripsi = '';
          this.modelProduk.penerbit = '';
          this.modelProduk.harga = '';
          this.modelProduk.stok = '';
        }).catch(error => {
          console.log(error)
      }).finally({

      })
    }
  }
}
</script>

<style scoped>

</style>