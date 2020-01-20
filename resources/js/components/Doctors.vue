<template>
    <div class="container">
        <h2>Daftar Dokter</h2>
        <form @submit.prevent="addDoctor(doctor.id)" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama" v-model="doctor.nama">
            </div>
            <div class="form-group">
                <textarea input type="text" class="form-control" placeholder="Alamat" v-model="doctor.alamat"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="No. Telepon" v-model="doctor.nomor_telepon">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Kategori (ex. Ahli Gigi, THT, ...)" v-model="doctor.kategori">
            </div>
            <div class="form-group">
                <select class="form-control" v-model="doctor.rating">
                    <option disabled value="">Rating</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Save</button>
        </form>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDoctors(pagination.prev_page_url)">Previous</a></li>
                <li v-bind:class="[{disabled: !pagination.current_page_url}]" class="page-item"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDoctors(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>

        <div class="card card-body mb-2" v-for="doctor in doctors" v-bind:key="doctor.id">
            <p>ID : {{ doctor.id }}</p>
            <p>Nama : {{ doctor.nama }}</p>
            <p>Alamat : {{ doctor.alamat }}</p>
            <p>No. HP : {{ doctor.nomor_telepon }}</p>
            <p>Kategori : {{ doctor.kategori }}</p>
            <p>Rating : {{ doctor.rating }}</p>
            <hr>
            <div class="btn-group btn-group-justified">
                <!--Edit-->
                <button @click="editDoctor(doctor)" class="btn btn-primary mb-2">Edit</button>
                <!--Delete-->
                <button @click="deleteDoctor(doctor.id)" class="btn btn-danger mb-2">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            doctors: [],
            doctor: {
                id: '',
                nama: '',
                alamat: '',
                nomor_telepon: '',
                kategori: '',
                rating: ''
            },
            id: '',
            pagination: {},
            edit: false
        }
    },

    created() {
        this.fetchDoctors();
    },

    methods: {
        fetchDoctors(page_url) {
            let vm = this;
            page_url = page_url || '/api/doctors'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.doctors = res.data;
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
        deleteDoctor(id) {
            if(confirm('Anda Yakin ?')) {
                fetch(`api/doctor/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Dokter Dihapus !');
                    this.fetchDoctors();
                })
                .catch(err => console.log(err));
            }
        },
        addDoctor(id) {
            if(this.edit === false) {
                // Add
                fetch('api/doctor', {
                    method: 'post',
                    body: JSON.stringify(this.doctor),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.doctor.nama = '';
                    this.doctor.alamat = '';
                    this.doctor.nomor_telepon = '';
                    this.doctor.kategori = '';
                    this.doctor.rating = '';
                    alert('Dokter Ditambahkan !');
                    this.fetchDoctors();
                })
                .catch(err => console.log(err));
            }else {
                //Update
                fetch(`api/doctor/${id}`, {
                    method: 'put',
                    body: JSON.stringify(this.doctor),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.doctor.nama = '';
                    this.doctor.alamat = '';
                    this.doctor.nomor_telepon = '';
                    this.doctor.kategori = '';
                    this.doctor.rating = '';
                    alert('Data Dokter Diperbaharui !');
                    this.fetchDoctors();
                    location.reload();
                })
                .catch(err => console.log(err));
            }
        },
        editDoctor(doctor) {
            this.edit = true;
            this.doctor.id = doctor.id;
            this.doctor.nama = doctor.nama;
            this.doctor.alamat = doctor.alamat;
            this.doctor.nomor_telepon = doctor.nomor_telepon;
            this.doctor.kategori = doctor.kategori;
            this.doctor.rating = doctor.rating;
        }
    }
};
</script>