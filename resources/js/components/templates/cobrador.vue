<template>
    <div class="content">
		<div class="row" v-if="!lista">
			<div class="col-md-12">
	            <div class="card card-info">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Agregar Cobrador</h4>  
	                </div>
	                <div class="card-body">
						<fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><b>Datos Generales</b></legend>
                            <div class="form-group row">  
                                <div class="col-md-2">
                                <label>DNI (*)</label>
                                </div>                             
								<div class="col-md-2">
									<input type="text" v-if="!zEditar" onkeypress='return solonumeros(event)' v-model="cliente.dni" @blur="consultaDNI(cliente.dni)" class="form-control form-control-sm"  maxlength="8">
									<input type="text" v-if="zEditar"  v-model="cliente.dni" class="form-control form-control-sm" readonly>
								</div>
								<div class="col-md-5">
									<div v-if="cargando" class="spinner-grow text-secondary" role="status">
										<span class="sr-only">Loading...</span>
									</div>
									<div v-if="cargando" class="spinner-grow text-primary" role="status">
										<span class="sr-only">Loading...</span>
									</div>
									<div v-if="cargando" class="spinner-grow text-success" role="status">
										<span class="sr-only">Loading...</span>
									</div>
								</div>
                            </div>    
                            <div class="form-group row">      
                                 <div class="col-md-2 text-left">
                                    <label>Nombres (*)</label>
                                 </div>
                                <div class="col-md-5">
                                    <input type="text" onkeypress='return soloLetras(event)' v-model="cliente.nombre" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Apellido Paterno (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <input type="text" onkeypress='return soloLetras(event)' v-model="cliente.pater" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Apellido Materno (*)</label>
                                 </div>
                                <div class="col-md-5">
                                <input type="text" onkeypress='return soloLetras(event)' v-model="cliente.mater" class="form-control form-control-sm"  maxlength="60">
                                </div>
                            </div>
							<div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Género (*)</label>
                                 </div>
                                <div class="col-md-2">
                                	<select v-model="cliente.genero" class="form-control form-control-sm">
										<option value="M">M</option>
										<option value="F">F</option>
									</select>
                                </div>
                            </div>
							<div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label class="t12">Celular (*)</label>
                                 </div>
                                <div class="col-md-3">
                                <input type="text" v-model="cliente.celular" class="form-control form-control-sm" onKeyPress="return solonumeros(event)" maxlength="9">
                                </div>
                            </div>
							<div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Direccion</label>
                                 </div>
                                <div class="col-md-6">
                                <input type="text" onkeypress='return alfa(event)' v-model="cliente.dir" class="form-control form-control-sm" maxlength="100">
                                </div>
                            </div>
							<!-- <div class="form-group row">
                                <div class="col-md-2 text-left">
                                    <label>Foto</label>
                                 </div>
                                <div class="col-md-2" v-if="cliente.foto == null">
									<div  class="btn btn-default btn-file">
										<i class="fa fa-image"></i> imagen
										<input @change="arc" type="file">
									</div>
                                </div>
								<div class="col-md-4">
									<img v-if="cliente.foto != null" :src="'data:'+cliente.foto" @click="reset()" alt="" width="120" height="175">
								</div>
                            </div> -->
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
	                    <h4 class="title">Lista de Cobradores 
							<button  class="btn bg-navy altoBoton" @click="ocultar('1')" title="Agregar Alumno">
								<i class="fa fa-plus"></i>
							</button></h4>  
	                </div>
	                <div class="card-body">
                        <div class="content table-responsive table-full-width">
                            <v-client-table class="t12" :data="alumnos" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
									<button class="altoBoton btn bg-indigo" data-toggle="tooltip" v-on:click="edit(props.row.DNI,props.row.Nombre,props.row.ApePaterno,props.row.ApeMaterno,props.row.Genero,props.row.Direccion,props.row.Celular)" data-placement="left" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></button>
									<button class="altoBoton btn bg-danger" data-toggle="tooltip" v-on:click="delCobrador(props.row.DNI)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            cliente: {
				dni:null,
				nombre:null,
				pater:null,
				mater:null,
				dir:null,
				fecha:null,
				celular:null,
				genero:null,
				foto:null,
				ext:null,
			},
			alumnos: [{
				DNI:null,
				Nombre:null,
				ApePaterno:null,
                ApeMaterno:null,
                Apellidos:null,
                Genero:null,
                Celular:null,
                Direccion:null,
				fechaNac:null,
				
            }],
            columns: ["DNI","Nombre","Apellidos","Genero","Celular","Direccion","Acciones"],
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
				DNI:"DNI",
				Nombre:"Nombres",
				ApePaterno:"Apellido Paterno",
                ApeMaterno:"Apellido Materno",
                Celular:"Celular",
                Direccion:"Direccion",
                Genero:"Género",
				},
				sortable: ["DNI","Nombre","ApePaterno","ApeMaterno","Genero","Celular","Direccion"],
				filterable: ["DNI","Nombre","ApePaterno","ApeMaterno","Genero","Celular","Direccion"],
				
			},
			dni:null,
			zAlumno:null,
			niveles:[],
			grados:[],
			secciones:[],
			parentesco:[
				{val:"PADRE"},{val:"MADRE"},{val:"APODERADO"}
				],
			apoderados:[],
			cargando : false,
			registro : {},
			gradoalumno : {
				Nivel:null,
				grado:null,
				seccion:null
				},
			zEditar :false,	
			lista: true,
        }
	},
	mounted()
	{
		$('#cod').hide();
		$('#objetivo').hide();
		$('#matricula').hide();
		$('#editar').hide();
		$('#apoderado').hide();
	},
	created()
    {
		this.getDatos();
    },
    methods: {
		consultaDNI(dni)
        {
			this.cargando = true;
			this.cliente.nombre	= null;
			this.cliente.pater	= null;
			this.cliente.mater	= null;
            this.$Progress.start();
            axios.get("consultaDNI/"+dni)
            .then(data=>
            {
				this.cargando = false;
                this.cliente.nombre	= data.data.nombres;
                this.cliente.pater	= data.data.paterno;
                this.cliente.mater	= data.data.materno;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
		

		load()
		{
			this.cliente.dni	= null;
			this.cliente.nombre	= null;
			this.cliente.pater	= null;
			this.cliente.mater	= null;
			this.cliente.dir	= null;
			this.cliente.fecha	= null;
			this.cliente.cel	= null;
			this.cliente.genero	= null;
			this.cliente.foto	= null;
			this.cliente.ext	= null;
			this.zEditar		= false;
		},
        registrar()
		{
			axios.post("addCobrador",{
				cliente:this.cliente
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
			axios.post("updateCliente",{
				cliente:this.cliente
			}).then(data=>{
  				swal({
					// position: 'top-end',
					type: 'success',
					title: 'OK',
					text: 'Cobrador Editado Correctamente',
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
            axios.get("getCobradores")
            .then(data=>
            {
                this.alumnos = data.data.alumnos;
                this.$Progress.finish();
                // console.log(data.data);
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
				$('#editar').hide();
				$('#agregar').show();
			}
			else if(id == '2')
			{
				this.lista = true;
			}
			
		},
		
		edit(dni,nombre,paterno,materno,genero,dir,celular)
		{
			this.zEditar		= true;
			this.lista			= false;
			this.cliente.dni 	= dni;
			this.cliente.nombre 	= nombre;
			this.cliente.pater  	= paterno;
			this.cliente.mater  	= materno;
			this.cliente.dir    	= dir;
			this.cliente.celular  	= celular;
			this.cliente.genero 	= genero;
		},
		
    }
}

</script>
