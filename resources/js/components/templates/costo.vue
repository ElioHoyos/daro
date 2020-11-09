<template>
    <div class="content">
	    <div class="container-fluid"  id="cabecera" >
	    	<div class="row">
			 <div class="col-md-12">
				<!-- <div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<button  class="btn btn-outline-primary" @click="ocultar('1')">
							Costos <i class="fa fa-plus"></i>
							</button>
							<button  class="btn btn-outline-primary" @click="ocultar('2')">
								<i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
				</div> -->
	            <div class="card card-info"  id="objetivo">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Costo</h4>  
	                </div>
					<div class="card-body">
                        <fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><b>Datos</b></legend>
                            <div class="form-group row">  
                                <div class="col-md-2">
                                <label>Descripcion (*)</label>
                                </div>                             
                                <div class="col-md-6">
                                   <input type="hidden" v-model="costo.id" class="form-control">
                                    <input type="text" v-model="costo.descripcion" class="form-control form-control-sm" maxlength="200">
                                </div>
                            </div>    
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Costo (*)</label>
                                 </div>
                                <div class="col-md-2">
                                    <input type="text" v-model="costo.costo" onkeypress="return filterFloat(event,this);" class="form-control form-control-sm" maxlength="10">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-2" id="add" >
                                    <button @click="addCosto()" class="btn bg-indigo">Agregar <i class="fa fa-save"></i></button>
                                </div>
                                <div class="col-md-2" id="edit">
                                    <button @click="editCosto()" class="btn bg-indigo">Editar <i class="fa fa-edit"></i></button>
                                </div>
                                <div class="col-md-2">
                                    <button @click="ocultar(2)" class="btn bg-olive">Volver <i class="fa fa-undo"></i></button>
                                </div>
                            </div>
                        </fieldset>
                        
                        <div class="clearfix"></div>
	                </div>
				</div>
			</div>
	    	</div>
			<div class="row" id="tabla">
			 <div class="col-md-12">
				<div class="card card-info">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">COSTOS <button  class="btn altoBoton bg-navy" @click="ocultar('1')">
							 <i class="fa fa-plus"></i>
							</button> </h4>  
	                </div>
	                <div class="card-body">
						<div class="content table-responsive table-full-width">
                            <v-client-table :data="costos" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
	    							<button class="btn bg-indigo altoBoton" data-toggle="tooltip" v-on:click="edit(props.row.ID,props.row.Descripcion,props.row.Monto)" data-placement="left" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
    								<button class="btn btn-danger altoBoton" data-toggle="tooltip" v-on:click="deleteCosto(props.row.ID)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
			costo:{
                id:null,
                descripcion:null,
                costo:null,
			},
			costos:[{
				ID:null,
                Descripcion:null,
                Monto:null
            }],
            columns: ["ID","Descripcion","Monto","Acciones"],
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
					ID: "ID",
                    Descripcion: "Descripción",
                    Monto:"Monto",
					Acciones: "Acciones",
					
				},
				sortable    : ["ID","Descripcion","Monto"],
				filterable  : ["ID","Descripcion","Monto"]
            },
            tipo:null,
        }
	},
	created(){
        this.getDatos();
	},
	mounted(){
        $('#objetivo').hide();
        $('#edit').hide();
	},
    methods: {
        load()
        {
            this.costo.id           = null;
            this.costo.descripcion  = null;
            this.costo.costo        = null;
        },
		getDatos()
        {
            this.$Progress.start();
            axios.get("getCostos")
            .then(data=>
            {
                this.costos = data.data.costos;
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
		addCosto()
		{
			axios.post("addCosto",{
				costo:this.costo
			}).then(data=>{
				console.log(data);
				swal({
					type: 'success',
					title: 'Datos ingresados correctamente',
					showConfirmButton: false,
					timer: 2000
				});
				$('#objetivo').hide();
                $('#edit').hide();
                $('#error').show();
                this.load();
				this.getDatos();
			}).catch(error=>{
				console.log(error);	
				swal({
					type: 'error',
					title: 'Error',
					text: 'Verifique los campos los campos obligatorios',
					showConfirmButton: true,
				});
			})
		},
		ocultar(id){
			if(id == '1')
			{
				$('#objetivo').show();
                $('#tabla').hide();
                $('#edit').hide();
                $('#add').show();
                this.load();
			}
			else if(id == '2')
			{
				$('#tabla').show();
				$('#objetivo').hide();	
			}
			
		},
        deleteCosto(id)
        {
            swal({
                title: '¿Deseas eliminar este Costo?',
                text: "No será posible revertir esta acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.value) {
                    axios.get(`/deleteCosto/${id}`)
                        .then(data => {
                        if(data.data=="OK"){
                            swal(
                            'Eliminado!',
                             'El Costo ha sido eliminado.',
                             'success'
                                );
                        this.load();
                        this.getDatos();
                        }
                        }).catch(error => {
                            console.log('Ocurrio un error ' + error);
                            this.$Progress.fail();
                        });
                     }
                });
		},
		edit(id,descripcion,costo)
		{
			$('#objetivo').show();
            $('#edit').show();
            $('#add').hide();
            $('#tabla').hide();
            this.costo.id = id;
            this.costo.descripcion = descripcion;
            this.costo.costo = costo;
		},
		editCosto()
		{
			axios.post("editCosto",{
				costo:this.costo
			}).then(data=>{
				console.log(data);
				swal({
					type: 'success',
					title: 'Costo editado correctamente',
					showConfirmButton: false,
					timer: 2000
                });
                $('#objetivo').hide();
                $('#edit').hide();
                $('#add').show();
                $('#tabla').show();
                this.load();
				this.getDatos();
			}).catch(error=>{
				console.log(error);	
				swal({
					type: 'error',
					title: 'Error',
					text: 'Verifique los campos los campos obligatorios',
					showConfirmButton: true,
				});
			})
		}
    }
}
</script>
