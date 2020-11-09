<template>
    <div class="content">
	    <div class="container-fluid" v-if="tipo != null && tipo == 3">
            <horario></horario>
        </div>
        <div class="container-fluid" v-if="tipo != null && tipo != 3">
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
