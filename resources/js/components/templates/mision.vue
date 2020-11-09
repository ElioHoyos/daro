<template>
    <div class="content">
	    <div class="container-fluid">
	    	<div class="row">
			 <div class="col-md-12">
				<div class="row">
				</div>
	            <div class="card card-info" v-if="!lista">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Configuraciones</h4>  
	                </div>
					<div class="card-body">
						<fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><b>Datos</b></legend>
                            <div class="form-group row">  
                                <div class="col-md-2 text-left">
                                <label>Tipo</label>
                                </div>                             
                                <div class="col-md-3">
                                   <select v-model="config.tipo" class="form-control form-control-sm">
									   <option value="MISION">Misión</option>
									   <option value="VISION">Visión</option>
									   <option value="NOSOTROS">Nosotros</option>
								   </select>
                                </div>
                            </div>    
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Detalle</label>
								</div>
                                <div class="col-md-6">
                                   <textarea type="text" v-model="config.detalle" class="form-control form-control-sm">

								   </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-2" v-if="!editar">
                                    <button @click="addConfig()" class="btn bg-indigo">Agregar <i class="fa fa-save"></i></button>
                                </div>
                                <div class="col-md-2" v-if="editar">
                                   <button @click="editConfig()" class="btn bg-indigo">Editar <i class="fa fa-edit"></i></button>
                                </div>
								<div class="col-md-2">
                                   <button @click="ocultar(2)" class="btn bg-danger">Volver <i class="fa fa-undo"></i></button>
                                </div>
                            </div>
                        </fieldset>
						<div class="clearfix"></div>
	                </div>
				</div>
			</div>
	    	</div>
			<div class="row" v-if="lista">
			 <div class="col-md-12">
				<div class="card card-info">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Configuración 
							<button  class="btn bg-navy altoBoton" @click="ocultar('1')">
							<i class="fa fa-plus"></i>
							</button>
						</h4>  
	                </div>
	                <div class="card-body t12">
						<div class="content table-responsive table-full-width">
                            <v-client-table :data="configuraciones" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
									<button class="btn btn-info altoBoton" data-toggle="tooltip" v-on:click="edit(props.row)" data-placement="left" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></button>
									<button class="btn btn-danger altoBoton" data-toggle="tooltip" v-on:click="deleteConfig(props.row)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
						    </v-client-table>
                        </div>
					</div>
	    		</div>
			 </div>
			</div>	
	    </div>
    </div>	
</template>
<script>
	export default {
    data() {
        return {
			config:{
                tipo:null,
				detalle:null,
				id:null,
			},
			configuraciones	:[{
				id:null,
				tipo:null,
				detalle:null,
            }],
            columns: ["id","tipo","detalle","Acciones"],
            options: {
				perPageValues : [5,10,15,20,25],
                perPage : 5,
                texts: {
                    filter: "Buscar:",
                    count: "Mostando {from} a {to} de {count} registros|{count} registros|Un registro",
                    first: 'Primero',
                    last: 'Último',
                    filterPlaceholder: "Buscar",
                    limit: "Registros:",
                    page: "Pagina:",
                    noResults: "No se encontraron registros",
                    filterBy: "Filtrar por {column}",
                    loading: 'Cargando...',
                    defaultOption: 'Seleccionar {column}',
                    columns: 'Columnas'
                },
				headings:
				{
					id:"ID",
					tipo:"Tipo",
					detalle:"Detalle",
				},
				sortable    : ["id","tipo","detalle"],
				filterable  : ["id","tipo","detalle"]
			},
			niveles:[],
			editar: false,
			lista: true
            
        }
	},
	created(){
        // this.getNiveles();
		this.getConfiguraciones();
	},
	mounted(){
	},
    methods: {
        load()
        {
            this.config.id 		= null;
            this.config.tipo 	= null;
            this.config.detalle = null;
        },
		getConfiguraciones()
        {
            this.$Progress.start();
            axios.get("getConfiguraciones")
            .then(data=>
            {
                this.configuraciones = data.data.configuraciones;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
		addConfig()
		{
			this.$Progress.start();
			axios.post("addConfig",{
				config:this.config
			}).then(data=>{
				console.log(data);
				swal({
					type: data.data.type,
					title: data.data.title,
					text: data.data.text,
					showConfirmButton: false,
					timer: 2000
				});
				this.$Progress.finish();
				this.load();
				this.getConfiguraciones();
				this.lista = true;
			}).catch(error=>{
				console.log(error);	
				swal({
					type: 'error',
					title: 'Error',
					text: 'comuniquese con un administrador',
					showConfirmButton: true,
				});
			})
            
			
		},
		editConfig()
		{
			this.$Progress.start();
			axios.post("editConfig",{
				config:this.config
			}).then(data=>{
				console.log(data);
				swal({
					type: data.data.type,
					title: data.data.title,
					text: data.data.text,
					showConfirmButton: false,
					timer: 2000
				});
				this.$Progress.finish();
				this.load();
				this.getConfiguraciones();
				this.lista = true;
			}).catch(error=>{
				console.log(error);	
				swal({
					type: 'error',
					title: 'Error',
					text: 'comuniquese con un administrador',
					showConfirmButton: true,
				});
			})
		},
		ocultar(id){
			if(id == '1')
			{
				this.load();
				this.lista = false;
			}
			else if(id == '2')
			{
				this.lista = true;	
			}
			
		},
        deleteConfig(id)
        {
			this.$Progress.start();
            swal({
                title: '¿Deseas eliminar esta configuración?',
                text: "No será posible revertir esta acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.value) {
                    axios.get(`/deleteConfig/${id}`)
                        .then(data => {
                        if(data.data=="OK"){
                            swal(
                            'Eliminado!',
                             'Se eliminó la configuración',
                             'success'
								);
							this.$Progress.finish();
							this.load();
							this.getConfiguraciones();
							this.lista = true;
							}
                        }).catch(error => {
                            console.log('Ocurrio un error ' + error);
                            this.$Progress.fail();
                        });
                     }
                });
		},
		edit(configuracion)
		{
			this.editar 			= true;
			this.lista 				= false;
            this.config.id 			= configuracion.id;
            this.config.tipo 		= configuracion.tipo;
            this.config.detalle 	= configuracion.detalle;
		},
    }
}
</script>