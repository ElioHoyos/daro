<template>
    <div class="content">
		<div class="row" v-if="!lista">
			<div class="col-md-12">
	            <div class="card card-info">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Agregar Producto</h4>  
	                </div>
	                <div class="card-body">
						<fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><b>Datos Generales</b></legend>
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Código (*)</label>
                                 </div>
                                <div class="col-md-5">
                                    <input type="text" v-model="producto.codigo" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Nombre (*)</label>
                                 </div>
                                <div class="col-md-5">
                                    <input type="text" v-model="producto.nombre" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Descripción (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <input type="text"  v-model="producto.descripcion" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Medidas (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <input type="text"  v-model="producto.medidas" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Etiquetas (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <input type="text" v-model="producto.etiquetas" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Categoria (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <select class="form-control form-control-sm" v-model="producto.categoria">
                                    <option v-for="c in categorias" :value="c.id" :key="c.id">
                                        {{c.nombre}}
                                    </option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Foto</label>
                                 </div>
                                <div class="col-md-2" v-if="producto.foto == null">
									<div  class="btn btn-default btn-file">
										<i class="fa fa-image"></i> imagen
										<input @change="arc" type="file">
									</div>
                                </div>
								<div class="col-md-4">
									<img v-if="producto.foto != null" :src="'data:'+producto.foto" @click="reset()" alt="" width="120" height="175">
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
	                    <h4 class="title">Lista de Productos 
							<button  class="btn bg-navy altoBoton" @click="ocultar('1')" title="Agregar Producto">
								<i class="fa fa-plus"></i>
							</button></h4>  
	                </div>
	                <div class="card-body">
                        <div class="content table-responsive table-full-width">
                            <v-client-table class="t12" :data="productos" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
									<button class="altoBoton btn bg-indigo" data-toggle="tooltip" v-on:click="edit(props.row)" data-placement="left" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></button>
									<button class="altoBoton btn bg-danger" data-toggle="tooltip" v-on:click="delCobrador(props.row.id)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            producto: {
				id:null,
				nombre:null,
				descripcion:null,
				categoria:null,
				medidas:null,
				descripcion:null,
				etiquetas:null,
				foto:null,
                ext:null,
                codigo:null,
            },
            categorias:[],
			productos: [{
				id:null,
				nombre:null,
				categoria:null,
				categoriadesc:null,
				codigo:null,
				etiquetas:null,
				medidas:null,
            }],
            columns: ["id","codigo","nombre","descripcion","categoriadesc","etiquetas","medidas","Acciones"],
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
					categoriadesc:"Categoria",
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
		this.getCategorias();
    },
    methods: {
		arc(e)
        {
            var size = e.target.files[0].size;
			var name = e.target.files[0].name;
			var type = e.target.files[0].type;
			this.producto.ext = name.split('.').pop();
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
			   this.producto.foto    = e.target.result;
			   console.log("mira"+this.producto.foto );
            //    this.chat.name       = name;   
            }
            console.log("look"+this.producto.ext);
            // console.log(this.types);
            
        },
		reset()
		{
			this.producto.foto = null;
		},
		load()
		{
			this.producto.id			= null;
			this.producto.nombre		= null;
			this.producto.descripcion	= null;
			this.producto.categoria	    = null;
			this.producto.medidas	    = null;
			this.producto.etiquetas	    = null;
			this.producto.foto			= null;
			this.producto.ext			= null;
			this.zEditar				= false;
		},
        registrar()
		{
			axios.post("addProducto",{
				producto:this.producto
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
			axios.post("updateproducto",{
				producto:this.producto
			}).then(data=>{
  				swal({
					// position: 'top-end',
					type: 'success',
					title: 'OK',
					text: 'producto Editada Correctamente',
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
            axios.get("getProductos")
            .then(data=>
            {
                this.productos = data.data.productos;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        getCategorias()
        {
            this.$Progress.start();
            axios.get("getCategorias")
            .then(data=>
            {
                this.categorias = data.data.categorias;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
		},
		delCobrador(id)
        {
			this.$Progress.start();
            swal({
                title: '¿Deseas eliminar este Cobrador?',
                text: "No será posible revertir esta acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'cancelar',
            }).then((result) => {
                if (result.value) {
                    axios.get(`/delCobrador/${id}`)
                        .then(data => {
                        if(data.data=="OK"){
                            swal(
                            'Eliminado!',
                             'El Cobrador ha sido eliminado.',
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
		
		edit(producto)
		{
			this.zEditar				= true;
			this.lista					= false;
			this.producto.id 			= producto.id;
			this.producto.nombre 		= producto.nombre;
			this.producto.categoria 	= producto.categoria;
			this.producto.medidas 		= producto.medidas;
			this.producto.descripcion 	= producto.descripcion;
			this.producto.etiquetas 	= producto.etiquetas;
			this.producto.codigo 	    = producto.codigo;
		},
    }
}

</script>
