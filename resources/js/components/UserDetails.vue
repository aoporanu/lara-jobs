<template>
  <div class="card">
	<div class="card-header">
	  User Details
	</div>
	<div class="card-body">
	  <ul class="nav nav-pills nav-fill">
      <li class="nav-item">
	<a class="nav-link active" href="#">Companies</a>
      </li>
      <li class="nav-item">
	<a class="nav-link" href="#">Jobs</a>
      </li>
      <li class="nav-item">
	<a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
	<a class="nav-link disabled" href="#">Disabled</a>
      </li>
	  </ul>
	</div>
	</div>
</template>

<script>
    let notyf = Notyf();

import Vue from "vue";
    
    export default {
        created() {
            this.fetchUser(this.userId);
			this.fetchCompanies();
			this.fetchJobs();
		},

		props: {
			userId: Number,
			myHeaders: new Headers({
'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZkZTExZTdiODU0M2UwYjU5MGQ4ZjY3YjFiZTE4ZjA0Mjc1NTNmM2I0YTgwNDhkMGM4NmEzZDc2YjA5YTNiMWRkNGNkODQzZDkyNjY2ZDMxIn0.eyJhdWQiOiIzIiwianRpIjoiZmRlMTFlN2I4NTQzZTBiNTkwZDhmNjdiMWJlMThmMDQyNzU1M2YzYjRhODA0OGQwYzg2YTNkNzZiMDlhM2IxZGQ0Y2Q4NDNkOTI2NjZkMzEiLCJpYXQiOjE1NDEzMzEzNjEsIm5iZiI6MTU0MTMzMTM2MSwiZXhwIjoxNTcyODY3MzYxLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.n-QTU-fArT7RgUe00c4xHw3QwA0yAiqsvhsB1F0ZT8fTq1SxHA61IvLt8cITMLCGXAoirPW0cFunyuFJWovVraLiRPikuzs2kB9EvXO0jK0XVyj8oUeTjlplAwLodmAQkfEv5Xb40x83bRhWsikJsDhwx8ajMoTMrwIntRhm9pcf1zY7og5fPQPISYGfQZN3G786BoZluKKX0aXJ-YyYWofLkT4n5bJaxdfDe-ne_-i7dDhpCs_0HgqGuLQgvuka7s9NKgDsBM7pG-20C5-Y_m32C0lhxTfIRHbOC3SUaeZLXCNBIurcykMwgto0YwG6JygA77qExeiAN8IHGv9p8Cn8ZbJqbdi15ObF3dT_uAFE9XUnkGSiES2sHoE09zSXSqY2FEyB-f7UlFNjxGkUk76-aKVYUxzkkQv5ZSLEfG7gflwM4rRUk-roIDmggULjWgaiPjcNMGcw6tPTFEHi5h90A7vvYw9NMMRAOYcHkKjWN9hw6GER8a-MtGp-9S-3QDoEmCDo2_AthTVQamxfbNUrlrUjKUAgkoPIWFCzBLOa7gQLjbY4X_nt0V6hUEOG3NnMHpodA8oXCx5Q9axLkdAqfkoyqLwMSSvDpOZz2vZmD3JDYjZBat9oNiPPmDGLQV6Dm1MjBj0O3gsWhn4z-qJjbCUVQsnLgRN06Ank6O0',
                        'Accept': 'application/json'
				})
		},

		methods: {
            fetchUser: function(currentUser) {
				console.info(this.userId);
				fetch('/api/details', { headers: this.myHeaders, method: "get" })
					.then(res => res.json())
					.then(res => { this.user = res.data; })
					.catch(err => notyf.alert(err));
			},
			fetchCompanies: function(currentUser) {

			},
			fetchJobs: function(currentCompany) {

			}
		}
    }
</script>

<style scoped>

</style>
