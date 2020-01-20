<template>
    <div class="container">
        <h2>Daftar Pasien</h2>
        <form @submit.prevent="addPatient(patient.id)" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama" v-model="patient.nama">
            </div>
            <div class="form-group">
                <textarea input type="text" class="form-control" placeholder="Alamat" v-model="patient.alamat"></textarea>
            </div>
            <div class="form-group">
                <select class="form-control" v-model="patient.jenis_kelamin">
                    <option disabled value="">Jenis Kelamin</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Umur" v-model="patient.umur">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Jenis Penyakit" v-model="patient.jenis_penyakit">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nomor Telepon" v-model="patient.nomor_telepon">
            </div>
            <button type="submit" class="btn btn-success btn-block">Save</button>

            <hr>

        </form>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPatients(pagination.prev_page_url)">Previous</a></li>
                        <li v-bind:class="[{disabled: !pagination.current_page_url}]" class="page-item"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPatients(pagination.next_page_url)">Next</a></li>
                    </ul>
                </nav>
            </div>
            <!--
            <form @submit.prevent="detailPatient(patient.id)">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari ID" v-model="patient.id">
                        <button class="btn btn-warning" type="submit" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">Search</button>
                    </div>
            </form>
            -->
        </div>

        <div class="card card-body mb-2" v-for="patient in patients" v-bind:key="patient.id">
            <p>ID : {{ patient.id }}</p>
            <p>Nama : {{ patient.nama }}</p>
            <p>Alamat : {{ patient.alamat }}</p>
            <p>Jenis Kelamin : {{ patient.jenis_kelamin }}</p>
            <p>Umur : {{ patient.umur }}</p>
            <p>Penyakit : {{ patient.jenis_penyakit }}</p>
            <p>No. HP : {{ patient.nomor_telepon }}</p>
            <hr>
            <div class="btn-group btn-group-justified">
                    <!--Edit-->
                    <button @click="editPatient(patient)" class="btn btn-primary mb-2">Edit</button>
                    <!--Delete-->
                    <button @click="deletePatient(patient.id)" class="btn btn-danger mb-2">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            patients: [],
            patient: {
                id: '',
                nama: '',
                alamat: '',
                jenis_kelamin: '',
                umur: '',
                jenis_penyakit: '',
                nomor_telepon: ''
            },
            id: '',
            pagination: {},
            edit: false
        }
    },

    created() {
        this.fetchPatients();
    },

    methods: {
        fetchPatients(page_url) {
            let vm = this;
            page_url = page_url || '/api/patients'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.patients = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
        },
        makePagination(meta, links){
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };

            this.pagination = pagination;
        },
        deletePatient(id) {
            if(confirm('Anda Yakin ?')) {
                fetch(`api/patient/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Pasien Dihapus !');
                    this.fetchPatients();
                })
                .catch(err => console.log(err));
            }
        },
        addPatient(id) {
            if(this.edit === false) {
                // Add
                fetch('api/patient', {
                    method: 'post',
                    body: JSON.stringify(this.patient),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.patient.nama = '';
                    this.patient.alamat = '';
                    this.patient.jenis_kelamin = '';
                    this.patient.umur = '';
                    this.patient.jenis_penyakit = '';
                    this.patient.nomor_telepon = '';
                    alert('Pasien Ditambahkan !');
                    this.fetchPatients();
                })
                .catch(err => console.log(err));
            }else {
                //Update
                fetch(`api/patient/${id}`, {
                    method: 'put',
                    body: JSON.stringify(this.patient),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.patient.nama = '';
                    this.patient.alamat = '';
                    this.patient.jenis_kelamin = '';
                    this.patient.umur = '';
                    this.patient.jenis_penyakit = '';
                    this.patient.nomor_telepon = '';
                    alert('Data Pasien Diperbaharui !');
                    this.fetchPatients();
                    location.reload();
                })
                .catch(err => console.log(err));
            }
        },
        editPatient(patient) {
            this.edit = true;
            this.patient.id = patient.id;
            this.patient.nama = patient.nama;
            this.patient.alamat = patient.alamat;
            this.patient.jenis_kelamin = patient.jenis_kelamin;
            this.patient.umur = patient.umur;
            this.patient.jenis_penyakit = patient.jenis_kelamin;
            this.patient.nomor_telepon = patient.nomor_telepon;
        }
    }
};
</script>