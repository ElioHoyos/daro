
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-info" v-if="!lista">
                <div class="card-header bg-azul text-center">
                    <h4 class="title">Usuarios</h4>  
                </div>
                <div class="card-body">
                    <fieldset class="border p-2">
                        <legend class="w-auto t16 text-primary"><b>Datos</b></legend>
                        <div class="form-group row">      
                                <div class="col-md-2 text-left">
                                <label>Usuario</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" v-model="usuario.user" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">      
                                <div class="col-md-2 text-left">
                                <label>Password</label>
                            </div>
                            <div class="col-md-6">
                                <input type="password" v-model="usuario.pass" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">      
                            <div class="col-md-2 text-left">
                            <label>Tipo</label>
                            </div>
                            <div class="col-md-4">
                                <select v-model="usuario.tipo" class="form-control form-control-sm">
                                    <option value="1">{{"ADMINISTRADOR"}}</option>
                                    <option value="2">{{"PERSONAL"}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">      
                            <div class="col-md-2 text-left">
                            <label>Estado</label>
                            </div>
                            <div class="col-md-4">
                                <select v-model="usuario.estado" class="form-control form-control-sm">
                                    <option value="1">{{"ACTIVO"}}</option>
                                    <option value="2">{{"INACTIVO"}}</option>
                                </select>
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
        <div class="row">
            <div class="col-md-12">
                <div class="row" v-if="lista">
                    <div class="col-md-12">
                        <div class="card card-info" >
                                <div class="card-header text-center bg-azul">
                                    <h4 class="title">USUARIOS <button  class="btn bg-navy altoBoton" @click="ocultar('1')">
                                        <i class="fa fa-plus"></i>
                                        </button>
                                    </h4>  
                                </div>
                            <div class="card-body">
                                <div class="content table-responsive table-full-width t12">
                                    <v-client-table :data="usuarios" :columns="columns" :options="options">
                                        <div slot="Tipo" slot-scope="props">
                                            <b v-if="props.row.tipo == 1" class="text-indigo">Administrador</b>
                                            <b v-else-if="props.row.tipo == 2" class="text-primary">Personal</b>
                                        </div>
                                        
                                        <div slot="Estado" slot-scope="props">
                                            <button v-if="props.row.estado == 1" @click="changeStatus(props.row.id,0)" title="cambiar estado" class="btn btn-success btn-sm redondeado">Activo</button>
                                            <button v-else title="cambiar estado" @click="changeStatus(props.row.id,1)" class="btn btn-danger btn-sm redondeado">Inactivo</button>
                                            <button title="restablecer contraseña" @click="resetPass(props.row.user)" class="btn bg-indigo altoBoton redondeado"> <i class="fa fa-undo"></i></button>
                                            <button title="Cambiar contraseña" @click="changePass(props.row)" class="btn bg-olive altoBoton redondeado"> <i class="fa fa-edit"></i></button>
                                        </div>
                                    </v-client-table>
                                </div>
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
            usuario	:{
				id: null,
                user: null,
                tipo: null,
                estado: null,
                pass: null,
            },
            usuarios	:[{
				id: null,
                user: null,
                tipo: null,
                estado: null,
            }],
            columns: ["id","user","Tipo","Estado"],
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
                    id: "ID",
                    user: "Usuario",
                    tipo: "Tipo",
				},
				sortable    : ["id","user","tipo"],
				filterable  : ["id","user","tipo"]
            },
            editar : false,
            lista: true,
        }
	},
	created(){
        this.getData();
	},
	mounted(){
	},
    methods: {
        ocultar(id)
        {
            if(id == 1)
            {
                this.lista = false;
                this.editar = false;
                
            }else
            {
                this.lista = true;
            }   
                this.usuario.id = null;
                this.usuario.user = null;
                this.usuario.tipo = null;
                this.usuario.estado = null;     
                this.usuario.pass = null;     
        },
        changePass(user)
        {
            this.lista = false;
            this.editar = true;
            this.usuario.id = user.id;
            this.usuario.user = user.user;
            this.usuario.tipo = user.tipo;
            this.usuario.estado = user.Estado;
        },
        resetPass(user)
        {
            this.$Progress.start();
            axios.get("reset/"+user)
            .then(data=>
            {
                swal(
                    {
                        type: data.data.type,
                        text: data.data.text,
                        showConfirmButton: false,
                        timer: 2000,
                    });
                this.getData();    
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        changeStatus(id,status)
        {
            this.$Progress.start();
            axios.get("changeStatusUsers/"+id+"/"+status)
            .then(data=>
            {
                swal(
                    {
                        type: data.data.type,
                        text: data.data.text,
                        showConfirmButton: false,
                        timer: 2000,
                    });
                this.getData();    
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        getData(){
            this.$Progress.start();
            axios.get("getUsers")
            .then(data=>
            {
                this.usuarios = data.data.usuarios;
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        addPersonal()
		{
			this.$Progress.start();
			axios.post("addUser",{
				usuario:this.usuario
			}).then(data=>{
				console.log(data);
				swal({
					type: data.data.type,
					// title: data.data.title,
					text: data.data.text,
					showConfirmButton: false,
					timer: 2000
				});
				this.$Progress.finish();
				this.ocultar(2);
				this.getData();
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
			axios.post("editUser",{
				usuario:this.usuario
			}).then(data=>{
				console.log(data);
				swal({
					type: data.data.type,
					// title: data.data.title,
					text: data.data.text,
					showConfirmButton: false,
					timer: 2000
				});
				this.$Progress.finish();
				this.ocultar(2);
				this.getData();
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
    }
}
</script>
