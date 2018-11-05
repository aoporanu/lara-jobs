<template>
    <div class="panel">
    	 <div class="panel panel-header">User Details</div>
		 <div class="panel panel-body">

		 </div>
	</div>
</template>

<script>
    let notyf = Notyf();

    import Vue from "vue";
    
    export default {
        created() {
            this.fetchUser();
		},

		methods: {
            fetchUser: function(currentUser) {
				let vm = this;
			}
		}
    }
</script>

<style scoped>

</style>