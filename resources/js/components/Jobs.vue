<template>
    <div>
        <h1>Jobs</h1>
        <form class="mb-3" @submit.prevent="addJob" method="post">
            <div class="form-group">
                <input type="text" placeholder="Title" class="form-control" v-model="job.name">
            </div>
            <div class="form-group">
                <textarea placeholder="Description" v-model="job.description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for=""></label><select v-model="job.category" id="" class="form-control">
                    <option value="">--Choose category--</option>
                    <option v-for="category in categories" v-bind:value="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-light btn-block">Save</button>
        </form>
        <ul class="pagination">
            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchJobs(pagination.prev_page_url)">Previous</a></li>
            <li class="page-item disabled"><a href="" class="page-link text-dark">Page {{pagination.current_page}} of {{ pagination.last_page }}</a></li>
            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchJobs(pagination.next_page_url)">Next</a></li>
          </ul>
        <div class="card card-body mb-2" v-for="job in jobs" v-bind:key="job.id">
            <h3>{{ job.name }}</h3>
            <p>{{ job.description }}</p>
            <p>Posted by: {{job.company.name}} in: <span v-if="job.category">{{ job.category.name }}</span><span v-else>N/A</span></p>
            <p class="pull-right">
                <button type="submit" class="btn btn-primary pull-right" @click="applyToJob(job)">Apply</button>
            </p>
            <hr>
            <button type="button" class="btn btn-success mb-2" name="button">View</button>
            <button type="button" class="btn btn-warning mb-2" name="button" @click="editJob(job)">Edit</button>
            <button type="button" class="btn btn-danger mb-2" @click="deleteJob(job.id)" name="button">Delete</button>
        </div>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Cover letter:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    let notyf = new Notyf();

    import Vue from 'vue'

    export default {
        data() {
                return {
                    jobs: [],
                    categories: [],
                    job: {
                        id: '',
                        name: '',
                        company_id: '',
                        description: '',
                        category: null
                    },
                    user: {},
                    job_id: '',
                    pagination: {},
                    edit: false
                }
            },

            created() {
                this.fetchJobs();
            },

            methods: {
                fetchJobs: function (pageUrl) {
                    let vm = this;
                    pageUrl = pageUrl || '/api/jobs';
                    let myHeaders = new Headers({
                        'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZkZTExZTdiODU0M2UwYjU5MGQ4ZjY3YjFiZTE4ZjA0Mjc1NTNmM2I0YTgwNDhkMGM4NmEzZDc2YjA5YTNiMWRkNGNkODQzZDkyNjY2ZDMxIn0.eyJhdWQiOiIzIiwianRpIjoiZmRlMTFlN2I4NTQzZTBiNTkwZDhmNjdiMWJlMThmMDQyNzU1M2YzYjRhODA0OGQwYzg2YTNkNzZiMDlhM2IxZGQ0Y2Q4NDNkOTI2NjZkMzEiLCJpYXQiOjE1NDEzMzEzNjEsIm5iZiI6MTU0MTMzMTM2MSwiZXhwIjoxNTcyODY3MzYxLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.n-QTU-fArT7RgUe00c4xHw3QwA0yAiqsvhsB1F0ZT8fTq1SxHA61IvLt8cITMLCGXAoirPW0cFunyuFJWovVraLiRPikuzs2kB9EvXO0jK0XVyj8oUeTjlplAwLodmAQkfEv5Xb40x83bRhWsikJsDhwx8ajMoTMrwIntRhm9pcf1zY7og5fPQPISYGfQZN3G786BoZluKKX0aXJ-YyYWofLkT4n5bJaxdfDe-ne_-i7dDhpCs_0HgqGuLQgvuka7s9NKgDsBM7pG-20C5-Y_m32C0lhxTfIRHbOC3SUaeZLXCNBIurcykMwgto0YwG6JygA77qExeiAN8IHGv9p8Cn8ZbJqbdi15ObF3dT_uAFE9XUnkGSiES2sHoE09zSXSqY2FEyB-f7UlFNjxGkUk76-aKVYUxzkkQv5ZSLEfG7gflwM4rRUk-roIDmggULjWgaiPjcNMGcw6tPTFEHi5h90A7vvYw9NMMRAOYcHkKjWN9hw6GER8a-MtGp-9S-3QDoEmCDo2_AthTVQamxfbNUrlrUjKUAgkoPIWFCzBLOa7gQLjbY4X_nt0V6hUEOG3NnMHpodA8oXCx5Q9axLkdAqfkoyqLwMSSvDpOZz2vZmD3JDYjZBat9oNiPPmDGLQV6Dm1MjBj0O3gsWhn4z-qJjbCUVQsnLgRN06Ank6O0',
                        'Accept': 'application/json'
                    });
                    fetch(pageUrl, {
                        headers: myHeaders
                    })
                        .then(res => res.json())
                        .then(res => {
                            this.jobs = res.data.jobs;
                            // if(res.hasOwnProperty(meta) && res.hasOwnProperty(links)) {
                                // display pagination links
                                vm.magePagination(res.meta, res.links);
                            // }
                        })
                        .catch(err => notyf.alert(err));
                    fetch('/api/categories')
                        .then(res => res.json())
                        .then(res => {
                            this.categories = res.data;
                        })
                        .catch(err => notyf.alert(err));
                },
                magePagination(meta, links) {
                    this.pagination = {
                        current_page: meta.current_page,
                        last_page: meta.last_page,
                        next_page_url: links.next,
                        prev_page_url: links.prev
                    };
                },
                deleteJob(id) {
                    if(confirm('Are you sure?')) {
                        // so not right...
                        fetch(`api/job/` + id, {
                            method: 'delete'
                        })
                        .then(res => res.json)
                        .then(data => {
                            Vue.notify({
                                group: 'foo',
                                title: 'Job deleted',
                                text: data
                            });
                            this.fetchJobs();
                        })
                        .catch(err => notyf.alert(err));
                    }
                },
                addJob() {
                    if(this.edit === false) {
                        // add
                        fetch('api/job', {
                            method: 'post',
                            body: JSON.stringify(this.job),
                            headers: {
                                'content-type': 'application/json'
                            }
                        })
                        .then(res => res.json)
                        .then(data => {
                            this.job.name = '';
                            this.job.description = '';
                            this.job.category = '';
                            Pusher.logToConsole = true;

                            let pusher = new Pusher('b94f296c668afae85561', {
                                cluster: 'eu',
                                forceTLS: true
                            });

                            let channel = pusher.subscribe('jobs4all');
                            channel.bind('App\\Events\\JobCreated', function(data) {
                                notyf.confirm('Job created', {
                                    delay: 2000,
                                    alertIcon: 'notyf-alert-icon',
                                    confirmIcon: 'notyf-confirm-icon'
                                });
                            });
                            this.fetchJobs();
                        })
                        .catch(err => notyf.alert(err));
                    } else {
                        // update
                        fetch('api/job', {
                            method: 'put',
                            body: JSON.stringify(this.job),
                            headers: {
                                'content-type': 'application/json'
                            }
                        })
                        .then(res => res.json)
                        .then(data => {
                            this.job.name = '';
                            this.job.description = '';
                            this.job.category = '';

                            notyf.confirm('Job updated', {
                                delay: 2000,
                                alertIcon: 'notyf-alert-icon',
                                confirmIcon: 'notyf-confirm-icon'
                            });
                            this.fetchJobs();
                        })
                        .catch(err => notyf.alert(err));
                    }
                },
                editJob(job) {
                    this.edit = true;
                    this.job.id = job.id;
                    this.job.job_id = job.id;
                    this.job.name = job.name;
                    this.job.description = job.description;
                    this.job.category = '';

                },
                applyToJob(job) {
                    let vm = this; // we may just need it ... :)
                    // display modal with all fields like CV, cover letter, additional fields ...
                    // get cv, add cover letter field
                    $('#myModal').modal('show');
                    fetch('api/getcv', {
                        method: 'get',
                        body: JSON.stringify(this.user),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                        .then(res => res.json)
                        .then(data => {
                            this.user.cv = res.cv
                        })
                        .catch(err => notyf.alert(err));
                }
            }
        }
</script>
