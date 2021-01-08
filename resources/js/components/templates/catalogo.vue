<template>
    <div class="content">
		<div class="row" v-if="!lista">
			<div class="col-md-12">
	            <div class="card card-info">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Agregar Catálogo</h4>  
	                </div>
	                <div class="card-body">
						<fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><b>Datos Generales</b></legend>
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Nombre (*)</label>
                                 </div>
                                <div class="col-md-5">
                                    <input type="text" v-model="catalogo.nombre" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Marca (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <select class="form-control form-control-sm" v-model="catalogo.marca">
                                    <option v-for="m in marcas" :value="m.id" :key="m.id">
                                        {{m.nombre}}
                                    </option>
                                </select>
                                </div>
                            </div>
							<div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Archivo</label>
                                 </div>
                                <div class="col-md-4">
										<input @change="arc" type="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2" v-if="!editar">
                                   <button @click="registrar()" class="btn bg-indigo">Agregar <i class="fa fa-save"></i></button>
                                </div>
                                <div class="col-md-2" v-if="editar">
                                   <button @click="editCatalogo()" class="btn btn-info">Editar <i class="fa fa-edit"></i></button>
                                </div>
								<div class="col-md-2">
									<button class="btn btn-danger"  @click="ocultar(2)">Volver <i class="fa fa-undo"></i></button>
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
	                    <h4 class="title">Catálogos 
							<button  class="btn bg-navy altoBoton" @click="ocultar('1')" title="Agregar Alumno">
								<i class="fa fa-plus"></i>
							</button></h4>  
	                </div>
	                <div class="card-body">
                        <div class="content table-responsive table-full-width">
                            <v-client-table class="t12" :data="catalogos" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
									<button class="altoBoton btn bg-danger" data-toggle="tooltip" v-on:click="delCatalogo(props.row.id)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</div>
					        </v-client-table>
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
            catalogo: {
				marca:null,
				descripcion:null,
				nombre:null,
				archivo:null,
				ext:null,
			},
			catalogos: [{
				id:null,
                nombre:null,
				marcadesc:null,
				descripcion:null,
            }],
            columns: ["id","nombre","marcadesc","Acciones"],
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
					nombre:"Nombre",
					marcadesc:"Marca",
					id:"ID",
				},
				sortable: ["nombre","marcadesc"],
				filterable: ["nombre","marcadesc"],
				
			},
			editar :false,	
			lista: true,
			marcas:[],
        }
	},
	mounted()
	{
	},
	created()
    {
		this.getDatos();
		this.getMarcas();
    },
    methods: {
		arc(e)
        {
            var size = e.target.files[0].size;
			var name = e.target.files[0].name;
			var type = e.target.files[0].type;
			this.catalogo.ext = name.split('.').pop();
			if(!type.includes("pdf"))
			{
				swal({
					type : "warning",
					text : "debe seleccionar un archivo PDF",
				});
				return;
			}
			if(size > 10000000)
            {
				swal({
					type : "warning",
					text : "tamaño max. 10mb",
				});
				return;
			}
            var files = new FileReader();
            files.readAsDataURL(e.target.files[0]);
            files.onload = (e) =>
            {
			   this.catalogo.archivo    = e.target.result;
			   console.log("mira"+this.catalogo.archivo );
            //    this.chat.name       = name;   
            }
            console.log("look"+this.catalogo.ext);
            // console.log(this.types);
            
        },
		reset()
		{
			this.catalogo.archivo = null;
		},
		getMarcas()
        {
            this.$Progress.start();
            axios.get("getMarcas")
            .then(data=>
            {
                this.marcas = data.data.marcas;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
		},
		reset()
		{
			this.catalogo.archivo = null;
		},
		load()
		{
			this.catalogo.id			= null;
			this.catalogo.nombre		= null;
			this.catalogo.marca			= null;
			this.catalogo.descripcion	= null;
			this.editar					= false;
		},
		delCatalogo(id)
        {
			this.$Progress.start();
            swal({
                title: '¿Deseas eliminar este Catálogo?',
                text: "No será posible revertir esta acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.value) {
                    axios.get(`/delCatalogo/${id}`)
                        .then(data => {
                        if(data.data=="OK"){
                            swal(
                            'Eliminado!',
                             'El Catálogo ha sido eliminado.',
                             'success'
								);
						this.$Progress.finish();
						this.getDatos();
                        }
                        }).catch(error => {
                            console.log('Ocurrio un error ' + error);
                            this.$Progress.fail();
                        });
                     }
                });
		},
        registrar()
		{
			axios.post("addCatalogo",{
				catalogo:this.catalogo
			}).then(data=>{

				swal({
					type: data.data.type,
					title: data.data.title,
					text: data.data.text,
					showConfirmButton: false,
					timer: 2000
				});
				this.lista = true;
				this.load();
				this.getDatos();
			}).catch(error=>{
				swal({
					type: 'error',
					title: 'Error',
					text: "Consulte con un administrador",
					showConfirmButton: true,
				});
				console.log(error);
			})
		},
		editCatalogo()
		{
			axios.post("updateCatalogo",{
				catalogo:this.catalogo
			}).then(data=>{
  				swal({
					// position: 'top-end',
					type: 'success',
					title: 'OK',
					text: 'Catalogo Editado Correctamente',
					showConfirmButton: false,
					timer: 2000
				});
				this.getDatos();
				this.load();
				this.lista = true;
			}).catch(error=>{
				swal({
					type: 'error',
					title: 'Error',
					text: "Consulte con un administrador",
					showConfirmButton: true,
				});
			})
		},
		getDatos()
        {
            this.$Progress.start();
            axios.get("getCatalogos")
            .then(data=>
            {
                this.catalogos = data.data.catalogos;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
		},
		
		ocultar(id){
			if(id == '1')
			{
				this.load();
				this.editar = false;
				this.lista	= false;
			}
			else if(id == '2')
			{
				this.lista = true;
			}
		},
		
		edit(catalogo)
		{
			this.editar				= true;
			this.lista				= false;
			this.catalogo.id		= catalogo.dni;
			this.catalogo.nombre 	= catalogo.nombre;
			this.catalogo.marca  	= catalogo.marca;
			this.catalogo.descripcion  	= catalogo.descripcion;
		},
		
    }
}

</script>
