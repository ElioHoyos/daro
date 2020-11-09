
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row" id="tabla">
                    <div class="col-md-12">
                        <div class="card card-info" >
                                <div class="card-header text-center bg-azul">
                                    <h4 class="title">USUARIOS</h4>  
                                </div>
                            <div class="card-body">
                                <div class="content table-responsive table-full-width t12">
                                    <v-client-table :data="usuarios" :columns="columns" :options="options">
                                        <div slot="Tipo" slot-scope="props">
                                            <b v-if="props.row.tipo == 1" class="text-indigo">Administrador</b>
                                            <b v-else-if="props.row.tipo == 2" class="text-primary">Cobrador</b>
                                        </div>
                                        
                                        <div slot="Estado" slot-scope="props">
                                            <button v-if="props.row.estado == 1" @click="changeStatus(props.row.id,0)" title="cambiar estado" class="btn btn-success btn-sm redondeado">Activo</button>
                                            <button v-else title="cambiar estado" @click="changeStatus(props.row.id,1)" class="btn btn-danger btn-sm redondeado">Inactivo</button>
                                            <button title="resetear contraseña" @click="resetPass(props.row.user)" class="btn bg-indigo altoBoton redondeado"> <i class="fa fa-undo"></i></button>
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
            usuarios	:[{
				id: null,
                user: null,
                tipo: null,
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
        }
	},
	created(){
        this.getData();
	},
	mounted(){
	},
    methods: {
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
    }
}
</script>
