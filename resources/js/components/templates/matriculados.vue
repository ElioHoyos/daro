<template>
    <div class="content">
	    <div class="container-fluid" id="cabecera">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header bg-blue text-center">
                            <h4 class="title">Lista de Alumnos Matriculados</h4>  
                        </div>
                        <!-- <div class="card-body">
                            <div class="content table-responsive table-full-width">
                                <v-client-table :data="alumnos" :columns="columns" :options="options">
                                    <div slot="Acciones" slot-scope="props">
                                        <button class="btn btn-info" data-toggle="modal" v-on:click="verRegistro(props.row.DNI)" title="Ver Registro" data-target="#exampleModal">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </v-client-table>
                            </div>
                        </div> -->
                        <div class="card-body">
                            <div class="content table-responsive table-full-width">
                                <v-client-table :data="grados" :columns="columnsg" :options="optionsg">
                                    <div slot="Acciones" slot-scope="props">
                                        <router-link class="btn btn-primary altoBoton" :to="'matriculados/'+ props.row.id" target="_blank" title="Ver Registro">
                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        </router-link>
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
            grados: [{
                id:null,
				Nivel:null,
                grado:null,
                seccion:null
            }],
            columnsg: ["Nivel","grado","seccion","Acciones"],
            optionsg: {
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
                    Nivel:"Nivel",
                    grado:"Grado",
                    seccion:"Sección"
				},
				sortable: ["Nivel","grado","seccion",],
				filterable: ["Nivel","grado","seccion",]
			},
        }
	},
	mounted()
	{
    },
    created()
    {
        this.getAutenticacion();
        this.getGrados();
    },
    methods: {
        getAutenticacion()
        {
            this.$Progress.start();
            axios.get("autenticacion")
            .then(data=>
            {
                this.id = data.data.id;
                if(this.id == 1)
                {
                    $('#cabecera').show();
                    $('#error').hide();
                }else{
                    $('#cabecera').hide();
                    $('#error').show();
                }
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            });
            
        },
        getGrados()
        {
            this.$Progress.start();
            axios.get("gradosM")
            .then(data=>
            {
                this.grados = data.data.grados;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
    }
}

</script>

