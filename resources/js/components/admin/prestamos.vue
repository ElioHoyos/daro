<template>
    <div class="content">
	    <div class="container-fluid" v-if="tipo == 1">
            <prestamo></prestamo>
        </div>
        <div class="container-fluid" v-else-if="tipo == 2">
            <prestamov2></prestamov2>
        </div>
        <div class="container-fluid" v-else-if="tipo != null && tipo != 1 && tipo != 2">
            <error></error>
        </div>
    </div>	
</template>

<script>
    export default {
    data() {
        return {
            tipo:null,
        }
	},
	created(){
		this.getAutenticacion();
     
	},
	mounted(){
     
	},
    methods: {
        getAutenticacion()
        {
            this.$Progress.start();
            axios.get("autenticacion")
            .then(data=>
            {
                this.tipo = data.data.id;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            });
        },
       
       
    }
}
</script>
