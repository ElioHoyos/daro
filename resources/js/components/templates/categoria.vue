<template>
    <div class="content">
		<div class="row" v-if="!lista">
			<div class="col-md-12">
	            <div class="card card-info">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Agregar Categoria / Marca</h4>  
	                </div>
	                <div class="card-body">
						<fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><b>Datos Generales</b></legend>
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Nombre (*)</label>
                                 </div>
                                <div class="col-md-5">
                                    <input type="text" v-model="categoria.nombre" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Descripción (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <input type="text"  v-model="categoria.descripcion" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
							<div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Tipo (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <select  v-model="categoria.tipo" class="form-control form-control-sm">
									<option value="CATEGORIA">CATEGORIA</option>
									<option value="MARCA">MARCA</option>
								</select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Foto</label>
                                 </div>
                                <div class="col-md-2" v-if="categoria.foto == null">
									<div  class="btn btn-default btn-file">
										<i class="fa fa-image"></i> imagen
										<input @change="arc" type="file">
									</div>
                                </div>
								<div class="col-md-4">
									<img v-if="categoria.foto != null" :src="'data:'+categoria.foto" @click="reset()" alt="" width="120" height="175">
								</div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2" v-if="!zEditar">
                                   <button @click="registrar()" class="btn bg-indigo">Agregar <i class="fa fa-save"></i></button>
                                </div>
                                <div class="col-md-2" v-if="zEditar">
                                   <button @click="editar()" class="btn btn-info">Editar <i class="fa fa-edit"></i></button>
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
	                    <h4 class="title">Lista de Categorias / Marcas
							<button  class="btn bg-navy altoBoton" @click="ocultar('1')" title="Agregar Alumno">
								<i class="fa fa-plus"></i>
							</button></h4>  
	                </div>
	                <div class="card-body">
                        <div class="content table-responsive table-full-width">
                            <v-client-table class="t12" :data="categorias" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
									<button class="altoBoton btn bg-indigo" data-toggle="tooltip" v-on:click="edit(props.row)" data-placement="left" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></button>
									<button class="altoBoton btn bg-danger" data-toggle="tooltip" v-on:click="delCategoria(props.row.id)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            categoria: {
				id:null,
				nombre:null,
				descripcion:null,
				tipo:null,
				foto:null,
				ext:null,
			},
			categorias: [{
				id:null,
				nombre:null,
				descripcion:null,
				Tipo:null,
            }],
            columns: ["id","Tipo","nombre","descripcion","Acciones"],
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
				sortable: ["id","nombre","descripcion"],
				filterable: ["id","nombre","descripcion"],
				
			},
			cargando : false,
			zEditar :false,	
			lista: true,
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
		arc(e)
        {
            var size = e.target.files[0].size;
			var name = e.target.files[0].name;
			var type = e.target.files[0].type;
			this.categoria.ext = name.split('.').pop();
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
			   this.categoria.foto    = e.target.result;
			   console.log("mira"+this.categoria.foto );
            //    this.chat.name       = name;   
            }
            console.log("look"+this.categoria.ext);
            // console.log(this.types);
            
        },
		reset()
		{
			this.categoria.foto = null;
		},
		load()
		{
			this.categoria.id			= null;
			this.categoria.nombre		= null;
			this.categoria.tipo		= null;
			this.categoria.descripcion	= null;
			this.categoria.foto			= null;
			this.categoria.ext			= null;
			this.zEditar				= false;
		},
        registrar()
		{
			axios.post("addCategoria",{
				categoria:this.categoria
			}).then(data=>{

				swal({
					type: data.data.type,
					text: data.data.text,
					showConfirmButton: false,
					timer: 2000
				});
				this.lista = true;
				this.load();
				this.ocultar(2);
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
		editar()
		{
			axios.post("updateCategoria",{
				categoria:this.categoria
			}).then(data=>{
  				swal({
					// position: 'top-end',
					type: 'success',
					title: 'OK',
					text: 'Categoria Editada Correctamente',
					showConfirmButton: false,
					timer: 2000
				});
				this.getDatos();
				this.load();
				this.ocultar(2);
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
            axios.get("zgetCategorias")
            .then(data=>
            {
                this.categorias = data.data.categorias;
                this.$Progress.finish();
                // console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
		},
		delCategoria(id)
        {
			this.$Progress.start();
            swal({
                title: '¿Deseas eliminar esta categoria?',
                text: "No será posible revertir esta acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.value) {
                    axios.get(`/delCategoria/${id}`)
                        .then(data => {
                        if(data.data=="OK"){
                            swal(
                            'Eliminado!',
                             'La categoria ha sido eliminado.',
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
		ocultar(id){
			if(id == '1')
			{
				this.load();
				this.zEditar = false;
				this.lista = false;
			}
			else if(id == '2')
			{
				this.lista = true;
			}
		},
		
		edit(categoria)
		{
			this.zEditar				= true;
			this.lista					= false;
			this.categoria.id 			= categoria.id;
			this.categoria.nombre 		= categoria.nombre;
			this.categoria.descripcion 	= categoria.descripcion;
		},
		
    }
}

</script>
