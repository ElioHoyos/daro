<template>
    <div class="content">
	    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                            <div class="card-header text-center bg-azul">
                                <h4 class="title">Tareas</h4>  
                            </div>
                        <div class="card-body">
                            <div class="content table-responsive table-full-width" id="tareas">
                                <v-client-table :data="tareas" :columns="columns" :options="options">
                                    <div slot="Estado" slot-scope="props">
                                        <h4 v-if="props.row.Estado == 'ACTIVO'" class="text-primary font-weight-bold t12">{{props.row.Estado}}</h4>
                                        <h4 v-if="props.row.Estado == 'INACTIVO'" class="text-danger font-weight-bold t12">{{props.row.Estado}}</h4>
                                    </div>
                                    <!-- <div slot="Acciones" slot-scope="props"> -->
                                        <!-- <button class="btn btn-danger altoBoton" data-toggle="tooltip" v-on:click="changeStatus(props.row.id,props.row.Estado)" data-placement="left" title="cambiar estado"><i class="fa fa-arrow-right" aria-hidden="true"></i></button> -->
                                        <!-- <button class="btn btn-info altoBoton" data-toggle="tooltip" v-on:click="editar(props.row.id)" data-placement="left" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                    <!-- </div> -->
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
import { isNullOrUndefined } from 'util';
    export default {
    data() {
        return {
            nombre:null,
            tarea: {
                id:null,
                grado:null,
                curso:null,
                tema:null,
                observaciones:null,
                fecha:null,
                fechac:null,
                url:null,
                idreunion:null,
                pass:null,
                bimestre:null,
            },
            meses: [
                    {val:1,mes:"I"},
                    {val:2,mes:"II"},
                    {val:3,mes:"III"},
                    {val:4,mes:"IV"},
                    ],
            grados:[],
            areas:[],
            mes:null,
            curso:null,
            tipo:null,
            grado:null,
            capacidad:null,
            area:null,
            archivos:[],
            types:[],
            archs:[],
            links:[],
            jlinks:[],
            i:0,
            j:0,
            lista:true,
            tareas	:[{
				id:null,
				grado:null,
				curso:null,
                Tema:null,
                clase:null,
                curso:null,
                entrega:null,
                Estado:null,
                docente:null,
            }],
            columns: ["id","docente","grado","curso","Tema","clase","entrega","Estado"],
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
                    docente:"Docente",
                    id:"ID",
                    Tema:"Tema",
                    curso:"Curso",
                    clase:"Fecha de Clase",
                    entrega:"Clase de Entrega",
                    Estado:"Estado",
					
				},
				sortable    : ["id","docente","grado","curso","Tema","clase","entrega","Estado"],
				filterable  : ["id","docente","grado","curso","Tema","clase","entrega","Estado"]
            },
        }
	},
	created(){
        this.getData();
	},
	mounted(){
        $('#objetivo').hide();
        $('#edit').hide();
        $('#table').hide();
	},
    methods: {
        getData()
        {
            this.$Progress.start();
            axios.get("getTotalTareas")
            .then(data=>
            {
                this.tareas = data.data.tareas;
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