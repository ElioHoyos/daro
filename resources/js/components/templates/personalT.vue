<template>
    <div class="content">
	    <div class="container-fluid">
	    	<div class="row">
			 <div class="col-md-12">
				<div class="row">
				</div>
	            <div class="card card-info" v-if="!lista">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Personal</h4>  
	                </div>
					<div class="card-body">
						<fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><b>Datos</b></legend>
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Nombre</label>
								</div>
                                <div class="col-md-6">
                                   <input type="text" v-model="personal.nombre" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Descripción</label>
								</div>
                                <div class="col-md-6">
                                   <textarea type="text" v-model="personal.descripcion" class="form-control form-control-sm">

								   </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Foto</label>
                                 </div>
                                <div class="col-md-2" v-if="personal.foto == null">
									<div  class="btn btn-default btn-file">
										<i class="fa fa-image"></i> imagen
										<input @change="arc" type="file">
									</div>
                                </div>
								<div class="col-md-4">
									<img v-if="personal.foto != null" :src="'data:'+personal.foto" @click="reset()" alt="" width="120" height="175">
								</div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2" v-if="!editar">
                                    <button @click="addPersonal()" class="btn bg-indigo">Agregar <i class="fa fa-save"></i></button>
                                </div>
                                <div class="col-md-2" v-if="editar">
                                   <button @click="editPersonal()" class="btn bg-indigo">Editar <i class="fa fa-edit"></i></button>
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
	                    <h4 class="title">Personal 
							<button  class="btn bg-navy altoBoton" @click="ocultar('1')">
							<i class="fa fa-plus"></i>
							</button>
						</h4>  
	                </div>
	                <div class="card-body t12">
						<div class="content table-responsive table-full-width">
                            <v-client-table :data="personales" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
									<button class="btn btn-info altoBoton" data-toggle="tooltip" v-on:click="edit(props.row)" data-placement="left" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></button>
									<button class="btn btn-danger altoBoton" data-toggle="tooltip" v-on:click="deletePersonal(props.row.id)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
			personal:{
                nombre:null,
				descripcion:null,
				id:null,
				foto:null,
				ext:null,
			},
			personales	:[{
				id:null,
				nombre:null,
				descripcion:null,
            }],
            columns: ["id","nombre","descripcion","Acciones"],
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
					nombre:"Nombre",
					descripcion:"Descripción",
				},
				sortable    : ["id","nombre","descripcion"],
				filterable  : ["id","nombre","descripcion"]
			},
			editar: false,
			lista: true
            
        }
	},
	created(){
		this.getPersonal();
	},
	mounted(){
	},
    methods: {
		arc(e)
        {
            var size = e.target.files[0].size;
			var name = e.target.files[0].name;
			var type = e.target.files[0].type;
			this.personal.ext = name.split('.').pop();
			if(!type.includes("image"))
			{
				swal({
					type : "warning",
					text : "debe seleccionar una imagen",
				});
				return;
			}
			if(size > 5000000)
            {
				swal({
					type : "warning",
					text : "tamaño max. 1mb",
				});
				return;
			}
            var files = new FileReader();
            files.readAsDataURL(e.target.files[0]);
            files.onload = (e) =>
            {
			   this.personal.foto    = e.target.result;
			   console.log("mira"+this.personal.foto );
            }
            console.log("look"+this.personal.ext);
            
        },
		reset()
		{
			this.personal.foto = null;
		},
        load()
        {
            this.personal.id 		    = null;
            this.personal.nombre 	    = null;
            this.personal.descripcion   = null;
            this.personal.foto          = null;
            this.personal.ext           = null;
        },
		getPersonal()
        {
            this.$Progress.start();
            axios.get("getPersonal")
            .then(data=>
            {
                this.personales = data.data.personales;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
		addPersonal()
		{
			this.$Progress.start();
			axios.post("addPersonal",{
				personal:this.personal
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
				this.getPersonal();
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
		editPersonal()
		{
			this.$Progress.start();
			axios.post("editPersonal",{
				personal:this.personal
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
				this.getPersonal();
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
        deletePersonal(id)
        {
			this.$Progress.start();
            swal({
                title: '¿Deseas eliminar este personal?',
                text: "No será posible revertir esta acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.value) {
                    axios.get(`/deletePersonal/${id}`)
                        .then(data => {
                        if(data.data=="OK"){
                            swal(
                            'Eliminado!',
                             'Se eliminó el personal',
                             'success'
								);
							this.$Progress.finish();
							this.load();
							this.getPersonal();
							this.lista = true;
							}
                        }).catch(error => {
                            console.log('Ocurrio un error ' + error);
                            this.$Progress.fail();
                        });
                     }
                });
		},
		edit(personal)
		{
			this.editar 			= true;
			this.lista 				= false;
            this.personal.id 			= personal.id;
            this.personal.nombre 		= personal.nombre;
            this.personal.descripcion 	= personal.descripcion;
		},
    }
}
</script>