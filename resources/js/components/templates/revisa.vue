<template>
    <div class="container-fluid">
        <div class="row">
            <button class="btn btn-primary btn-sm" id="vuelta" @click="volver()">volver <i class="fa fa-arrow-left"></i></button>
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
                                <div slot="Acciones" slot-scope="props">
                                    <!-- <button class="btn btn-danger altoBoton" data-toggle="tooltip" v-on:click="changeStatus(props.row.id,props.row.Estado)" data-placement="left" title="cambiar estado"><i class="fa fa-arrow-right" aria-hidden="true"></i></button> -->
                                    <button class="btn btn-info altoBoton" data-toggle="tooltip" v-on:click="getWorks(props.row.id)" data-placement="left" title="ver Tareas entregadas"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </v-client-table>
                        </div>
                        <div class="content table-responsive table-full-width" id="tareasrevisadas">
                            <v-client-table :data="tareasrevisadas" :columns="columnsr" :options="optionsr">
                                <div slot="Acciones" slot-scope="props">
                                    <button class="altoBoton btn btn-success" data-toggle="modal" v-on:click="revisar(props.row.id,props.row.alumno,props.row.nota,props.row.DNI)" title="revisar" data-target="#exampleModal">
                                    	<i class="fa fa-edit" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </v-client-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
        <!-- modal inicio -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header text-center bg-azul">
                    <h5 class="modal-titler text-white" id="exampleModalLabel">TAREA ALUMNO: {{alumno.alumno}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                        <div class="col-md-2">
                            <label for="">Nota: </label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" v-model="alumno.nota" class="form-control form-control-sm" onKeyPress="return solonumeros(event)" maxlength="2">
                        </div>
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-md-2">
                            <label for="">Comentario: </label>
                        </div>
                        <div class="col-md-10">
                            <textarea v-model="alumno.comentario" placeholder="Max 350 caracteres" class="form-control form-control-sm" maxlength="350">
                            </textarea>        
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12 text-center font-weight-bold text-primary">
                            Archivos
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="text-center" v-if="!cargando">
                            <div class="spinner-grow text-success" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
					    </div>
                        <div v-else>
                            <div class="col-md-12" v-for="(a,index) in archivos" :key="a.url">
                                <!-- <a title="Descargar Archivo"  :href="a.url" :download="a.Nombre" >{{a.Nombre}}</a> -->
                                <a title="Descargar Archivo" :href="a.url" :download="alumno.alumno" >{{alumno.alumno}} {{(index+1)}}</a> <br>
                                <!-- <a title="Descargar Archivo" :href="a.url" :download="a.Nombre" >{{a.Nombre}} <img :src="a.url" height="200" width="200" alt=""></a> <br> -->
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" @click="marcar()">Corregir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
        <!-- modal fin -->
        <!-- modal2 -->
        <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="Modal2Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-body">
                    <img src="img/loading.gif" alt="">
                </div>
                </div>
            </div>    
        </div>
        <!-- modal2fin -->
    </div>
</template>
<script>
    export default {
    data() {
        return {
			tareas	:[{
				id:null,
				grado:null,
				curso:null,
                Tema:null,
                clase:null,
                curso:null,
                entrega:null,
                Estado:null,
            }],
            columns: ["id","grado","curso","Tema","clase","entrega","Estado","Acciones"],
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
                    Tema:"Tema",
                    curso:"Curso",
                    clase:"Fecha de Clase",
                    entrega:"Clase de Entrega",
                    Estado:"Estado",
					
				},
				sortable    : ["id","grado","curso","Tema","clase","entrega","Estado"],
				filterable  : ["id","grado","curso","Tema","clase","entrega","Estado"]
            },

            tareasrevisadas	:[{
				id:null,
				alumno:null,
				fecha:null,
				nota:null,
            }],
            columnsr: ["id","alumno","nota","fecha","Acciones"],
            optionsr: {
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
                    alumno:"Alumno",
                    fecha:"Fecha y hora de entrega"
					
				},
				sortable    : ["id","alumno","nota","fecha"],
				filterable  : ["id","alumno","nota","fecha"]
            },
            alumno:{
                alumno:null,
                id:null,
                nota:null,
                comentario:null,
            },
            archivos:[],
            idTarea:null,
            cargando: false,
            dnialumno:null
        }
	},
	created(){
       this.getData();
	},
	mounted(){
        $('#tareasrevisadas').hide();
        $('#vuelta').hide();
        $('#grado').hide();
        $('#descarga').hide();
	},
    methods: {
        volver()
        {
            $("#tareasrevisadas").hide();
            $("#vuelta").hide();
            $("#tareas").show();
            this.borrar();
        },
        load()
        {
            $('#tareas').show();
            
        },
        borrar()
        {
            this.alumno.alumno = null;
            this.alumno.id = null;
            this.alumno.nota = null;
            this.alumno.comentario = null;
        },
        getData()
        {
            this.$Progress.start();
            axios.get("getTareas")
            .then(data=>
            {
                this.tareas = data.data.tareas;
                // this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        changeStatus(id,status)
        {
            this.$Progress.start();
            axios.get("changeStatus/"+id+"/"+status)
            .then(data=>
            {
                this.getData();
                this.load();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        revisar(id,alumno,nota,dni)
        {
            this.cargando = false;
            this.alumno.alumno = alumno;
            this.alumno.id   = id;
            this.alumno.nota   = nota;
            id = this.idTarea;
            this.$Progress.start();
            axios.get("getArchivosTareas/"+id+"/"+dni)
            .then(data=>
            {
                this.cargando = true;
                this.archivos = data.data.archivos;
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        getWorks(id)
        {
            this.tareasrevisadas = [];
            this.idTarea = id;
            $("#tareasrevisadas").show();
            $("#vuelta").show();
            $("#tareas").hide();
            this.$Progress.start();
            axios.get("getWorks/"+id)
            .then(data=>
            {
                this.tareasrevisadas = data.data.tareasentregadas;
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        marcar()
        {
            if(this.alumno.nota == null)
            {
                swal({
                    type : "error",
                    text : "Debe poner una nota de evaluación"
                })
            }else{
                $("#exampleModal .close").click();
                swal({
                        imageUrl : "img/loading.gif",
                        text     : "procesando, por favor no cierre esta ventana",
                        showConfirmButton: false
                    })
                axios.post("notaTarea",{
                    alumno: this.alumno,
                }).then(data=>{
                    $("#modal2").modal("hide");
                    swal({
                        type : "success",
                        text : "Se corrigió la tarea satisfactoriamente",
                        showConfirmButton: false,
                        timer: 2000
                    })
                   this.getWorks(this.idTarea);
                   this.borrar();
                }).catch(error=>{
                	console.log(error);	
                })
            }
            
        },
		ocultar(id){
			if(id == '1')
			{
                $('#objetivo').show();
                $('#nivel').show();
                $('#add').show();
                $('#curso').show();
                $('#editar').hide();
			}
			else if(id == '2')
			{
				$('#objetivo').hide();	
			}
			
		},

    }
}
</script>
