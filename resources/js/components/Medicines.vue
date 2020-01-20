<template>
    <div class="container">
        <h2>Daftar Obat</h2>
        <form @submit.prevent="addMedicine(medicine.id)" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Obat" v-model="medicine.nama_obat">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Keterangan" v-model="medicine.keterangan">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Harga" v-model="medicine.harga">
            </div>
            <button type="submit" class="btn btn-success btn-block">Save</button>
        </form>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchMedicines(pagination.prev_page_url)">Previous</a></li>
                <li v-bind:class="[{disabled: !pagination.current_page_url}]" class="page-item"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchMedicines(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>

        <div class="card card-body mb-2" v-for="medicine in medicines" v-bind:key="medicine.id">
            <p>ID : {{ medicine.id }}</p>
            <p>Nama Obat : {{ medicine.nama_obat }}</p>
            <p>Keterangan : {{ medicine.keterangan }}</p>
            <p>Harga : {{ medicine.harga }}</p>
            <hr>
            <div class="btn-group btn-group-justified">
                <!--Edit-->
                <button @click="editMedicine(medicine)" class="btn btn-primary mb-2">Edit</button>
                <!--Delete-->
                <button @click="deleteMedicine(medicine.id)" class="btn btn-danger mb-2">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            medicines: [],
            medicine: {
                id: '',
                nama_obat: '',
                keterangan: '',
                harga: ''
            },
            id: '',
            pagination: {},
            edit: false
        }
    },

    created() {
        this.fetchMedicines();
    },

    methods: {
        fetchMedicines(page_url) {
            let vm = this;
            page_url = page_url || '/api/medicines'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.medicines = res.data;
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
        deleteMedicine(id) {
            if(confirm('Anda Yakin ?')) {
                fetch(`api/medicine/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Obat Dihapus !');
                    this.fetchMedicines();
                })
                .catch(err => console.log(err));
            }
        },
        addMedicine(id) {
            if(this.edit === false) {
                // Add
                fetch('api/medicine', {
                    method: 'post',
                    body: JSON.stringify(this.medicine),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.medicine.nama_obat = '';
                    this.medicine.keterangan = '';
                    this.medicine.harga = '';
                    alert('Obat Ditambahkan !');
                    this.fetchMedicines();
                })
                .catch(err => console.log(err));
            }else {
                //Update
                fetch(`api/medicine/${id}`, {
                    method: 'put',
                    body: JSON.stringify(this.medicine),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.medicine.nama_obat = '';
                    this.medicine.keterangan = '';
                    this.medicine.harga = '';
                    alert('Data Obat Diperbaharui !');
                    this.fetchMedicines();
                    location.reload();
                })
                .catch(err => console.log(err));
            }
        },
        editMedicine(medicine) {
            this.edit = true;
            this.medicine.id = medicine.id;
            this.medicine.nama_obat = medicine.nama_obat;
            this.medicine.keterangan = medicine.keterangan;
            this.medicine.harga = medicine.harga;
        }
    }
};
</script>