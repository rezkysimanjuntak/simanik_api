<template>
    <div class="container">
        <h2>Catatan Medis</h2>
        <form @submit.prevent="addMedicalRecord(/*medicalrecord.id*/)" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Pasien" v-model="medicalrecord.nama_pasien">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Dokter" v-model="medicalrecord.nama_dokter">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Jenis Penyakit" v-model="medicalrecord.jenis_penyakit">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" placeholder="Tanggal" v-model="medicalrecord.tanggal">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Total Biaya" v-model="medicalrecord.total_biaya">
            </div>
            <button type="submit" class="btn btn-success btn-block">Save</button>
        </form>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchMedicalRecords(pagination.prev_page_url)">Previous</a></li>
                <li v-bind:class="[{disabled: !pagination.current_page_url}]" class="page-item"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchMedicalRecords(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>

        <div class="card card-body mb-2" v-for="medicalrecord in medicalrecords" v-bind:key="medicalrecord.id">
            <p>ID : {{ medicalrecord.id }}</p>
            <p>Nama Pasien : {{ medicalrecord.nama_pasien }}</p>
            <p>Nama Dokter : {{ medicalrecord.nama_dokter }}</p>
            <p>Jenis Penyakit : {{ medicalrecord.jenis_penyakit }}</p>
            <p>Tanggal : {{ medicalrecord.tanggal }}</p>
            <p>Total Biaya : {{ medicalrecord.total_biaya }}</p>
            <hr>
            <!--
            <button @click="editMedicalRecord(medical_record)" class="btn btn-primary mb-2">Edit</button>
            <button @click="deleteMedicalRecord(medical_record.id)" class="btn btn-danger">Delete</button>
            -->
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            medicalrecords: [],
            medicalrecord: {
                id: '',
                nama_pasien: '',
                nama_dokter: '',
                jenis_penyakit: '',
                tanggal: '',
                total_biaya: ''
            },
            id: '',
            pagination: {},
            edit: false
        }
    },

    created() {
        this.fetchMedicalRecords();
    },

    methods: {
        fetchMedicalRecords(page_url) {
            let vm = this;
            page_url = page_url || '/api/medicalrecords'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.medicalrecords = res.data;
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
        /*
        deleteMedicalRecord(id) {
            if(confirm('Anda Yakin ?')) {
                fetch(`api/medicalrecord/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Catatan Medis Dihapus !');
                    this.fetchMedicalRecords();
                })
                .catch(err => console.log(err));
            }
        },
        */
        addMedicalRecord(/*id*/) {
            this.edit = false;
            if(this.edit === false) {
                // Add
                fetch('api/medicalrecord', {
                    method: 'post',
                    body: JSON.stringify(this.medicalrecord),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.medical_record.nama_pasien = '';
                    this.medical_record.nama_dokter = '';
                    this.medical_record.jenis_penyakit = '';
                    this.medical_record.tanggal = '';
                    this.medical_record.total_biaya = '';
                    alert('Catatan Medis Ditambahkan !');
                    this.fetchMedicalRecords();
                })
                .catch(err => console.log(err));
            }
            /*
            else {
                //Update
                fetch(`api/medicalrecord/${id}`, {
                    method: 'put',
                    body: JSON.stringify(this.medicalrecord),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.medicalrecord.nama_pasien = '';
                    this.medicalrecord.nama_dokter = '';
                    this.medicalrecord.jenis_penyakit = '';
                    this.medicalrecord.tanggal = '';
                    this.medicalrecord.total_biaya = '';
                    alert('Catatan Medis Diperbaharui !');
                    this.fetchMedicalRecords();
                })
                .catch(err => console.log(err));
            }
            */
        }/*,
        editMedicalRecord(medicalrecord) {
            this.edit = true;
            this.medicalrecord.id = medicalrecord.id;
            this.medicalrecord.nama_pasien = medicalrecord.nama_pasien;
            this.medicalrecord.nama_dokter = medicalrecord.nama_dokter;
            this.medicalrecord.jenis_penyakit = medicalrecord.jenis_penyakit;
            this.medicalrecord.tanggal = medicalrecord.tanggal;
            this.medicalrecord.total_biaya = medicalrecord.total_biaya;
        }
        */
    }
};
</script>