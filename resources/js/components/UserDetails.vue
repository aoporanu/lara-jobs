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
            this.fetchUser();
			this.fetchCompanies();
			this.fetchJobs();
		},

		methods: {
            fetchUser: function(currentUser) {
				let vm = this;
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
