<template>
	<div class="container-fluid">
		<br><br>
			<div v-if="!cargando" class="row justify-content-center">
				<div  class="spinner-grow text-secondary" role="status">
					<span class="sr-only">Loading...</span>
				</div>
				<div class="spinner-grow text-primary" role="status">
					<span class="sr-only">Loading...</span>
				</div>
				<div class="spinner-grow text-success" role="status">
					<span class="sr-only">Loading...</span>
				</div>
			</div>
            <div class="row" v-else>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-indigo">
						<div class="inner">
							<h3>{{prestamos}}</h3>
							<p>PRESTAMOS</p>
						</div>
						<div class="icon">
							<i class="fa fa-dollar-sign x3"></i>
						</div>
							<a href="#" class="small-box-footer">Mas Información<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>{{clientes}}</h3>

                        <p>CLIENTES</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-user-friends x3"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas Información<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                   
            </div>
	</div>    
</template>

<script>
    export default {
    data() {
        return {

			clientes:null,
			prestamos:null,
            cargando:false,
        }
	},
	mounted()
	{
	},
	created()
    {
		this.getDatos();
    },
    methods: {
  		getDatos()
		{
			this.cargando = false;
			this.$Progress.start();
			axios.get("getDatos")
			.then(data=>
			{
				this.cargando = true;
				this.clientes = data.data.clientes;
				this.prestamos = data.data.prestamos;
				this.$Progress.finish();
				console.log(data.data);
			}
			).catch(error=>
			{
				console.log(error);
			})
		},
		
    }
}
</script>
