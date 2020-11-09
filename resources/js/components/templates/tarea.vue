<template>
    <div class="content">
	    <div class="container-fluid">
	    	<div class="row" v-if="!lista">
			 <div class="col-md-12">
	            <div class="card card-info">
	                <div class="card-header text-center bg-azul">
	                    <h4 class="title">Tareas</h4>  
	                </div>
					<div class="card-body">
                        <fieldset class="border p-2">
                            <legend class="w-auto text-primary">Datos de la tarea</legend>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label>Grado* :</label>
                                </div>
                                <div class="col-md-2">
                                    <select v-model="tarea.grado" @change="getAreas(tarea.grado)" id="grado" class="custom-select custom-select-sm">
                                        <option v-for="g in grados" :key="g.id" :value="g.id">
                                            {{g.Nivel}}: {{g.grado}} - {{g.seccion}} 
                                        </option>
                                    </select>
                                </div>  
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label>Bimestre* :</label>
                                </div>
                                <div class="col-md-2">
                                    <select v-model="tarea.bimestre" class="custom-select custom-select-sm">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>  
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                <label>Curso* :</label>
                                </div>
                                <div class="col-md-5">
                                    <select v-model="tarea.curso" id="area" class="custom-select custom-select-sm">
                                        <option v-for="a in areas" :key="a.IDArea" :value="a.IDArea">
                                            {{a.Descripcion}}
                                        </option>
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                <label>Tema* :</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" v-model="tarea.tema" class="form-control form-control-sm" onKeyPress="return alfa(event)" maxlength="100">
                                </div> 
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                <label>Indicaciones :</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea type="text" v-model="tarea.observaciones" class="form-control form-control-sm" placeholder="Máximo 350 caracteres" onKeyPress="return alfa(event)" maxlength="350"></textarea>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                <label>Fecha de clase* :</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" v-model="tarea.fechac" class="form-control form-control-sm">
                                </div> 
                                <div class="col-md-2">
                                <label>Fecha de entrega* :</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" v-model="tarea.fecha" class="form-control form-control-sm">
                                </div> 
                            </div>
                        </fieldset>
                        <br>
                        <fieldset class="border p-2">
                            <legend class="w-auto text-primary">Datos de la clase virtual</legend>
                            <div class="form-group row">
                                <div class="col-md-2">
                                <label>URL Reunión :</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" v-model="tarea.url" class="form-control form-control-sm" onKeyPress="return alfa(event)" maxlength="100">
                                </div> 
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                <label>ID Reunión :</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" v-model="tarea.idreunion" class="form-control form-control-sm" onKeyPress="return alfa(event)" maxlength="100">
                                </div> 
                                <div class="col-md-2">
                                <label>Pass Reunión :</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" v-model="tarea.pass" class="form-control form-control-sm" onKeyPress="return alfa(event)" maxlength="100">
                                </div> 
                            </div>
                        </fieldset>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                
                            <fieldset class="border p-2">
                                <legend class="w-auto text-primary">Archivos <button @click="add(1)" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>  <button @click="less(1)" class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button></legend>
                                <div class="form-group row" v-for="a in archs" :key="a">
                                    <div class="col-md-3">
                                    <label>Archivo ({{a + 1}}) :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" @change="arc" class="form-control form-control-sm">
                                    </div> 
                                </div>
                            </fieldset>
                            <br><br>
                            <table v-if="modoeditar && zarchivos.length >0" class="table table-sm table-bordered table-striped table-hover">
                                <tr  class="bg-secondary">
                                   <th colspan="3" class="text-center">Archivos Enviados</th>
                                </tr>
                                <tr class="text-center">
                                   <th>Nro</th>
                                   <th>Archivo</th>
                                   <th>Acción</th> 
                                </tr>
                                <tr v-for="(a,index) in zarchivos" :key="a.id">
                                    <td class="text-center">{{(index+1)}}</td>
                                    <td><a title="Descargar Archivo" :href="a.url" :download="tarea.tema" >{{tarea.tema}}({{a.id}})</a></td>
                                    <td><button title="Eliminar Archivo" class="btn btn-danger altoBoton" @click="deleteArchivo(a.id,tarea.id)"> <i class="fa fa-trash"></i></button></td>
                                </tr>
                            </table>
                            </div>
                            <div class="col-md-6">
                                
                            <fieldset class="border p-2">
                                <legend class="w-auto text-primary">Links <button @click="add(2)" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>  <button @click="less(2)" class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button></legend>
                                <div class="form-group row" v-for="a in jlinks" :key="a">
                                    <div class="col-md-3">
                                    <label>link ({{a + 1}}) :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" :id="'link'+a" @blur="agregarLink(a)" class="form-control form-control-sm">
                                    </div> 
                                </div>
                            </fieldset>
                            <br><br>
                                <table v-if="modoeditar && zlinks.length >0" class="table table-sm table-bordered table-striped table-hover">
                                    <tr class="bg-secondary">
                                        <th colspan="3" class="text-center">Links Enviados</th> 
                                    </tr>
                                    <tr class="text-center">
                                        <th>Nro</th>
                                        <th>Link</th>
                                        <th>Acción</th> 
                                    </tr>
                                    <tr v-for="(a,index) in zlinks" :key="a.id">
                                        <td class="text-center">{{(index+1)}}</td>
                                        <td><a title="ir a sitio" :href="a.url" target="_blank">{{a.url}}</a></td>
                                        <td><button title="Eliminar Link" class="btn btn-danger altoBoton" @click="deleteLink(a.id,tarea.id)"> <i class="fa fa-trash"></i></button></td>
                                    </tr>
                                </table>    
                            </div>
                        </div>
                        <br>
                            <div class="row text-left">
                                <div class="col-md-2" v-if="!modoeditar">
                                    <button class="btn btn-primary" @click="guardar()">Guardar</button>
                                </div>
                                <div class="col-md-2" v-if="modoeditar">
                                    <button class="btn bg-indigo" @click="updateTarea()">Actualizar</button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger" @click="cancelar()">cancelar</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-if="lista">
                <div class="col-md-12">
                    <div class="card card-info">
                            <div class="card-header text-center bg-azul">
                                <h4 class="title">Tareas <button title="Agregar Tarea" class="btn bg-indigo altoBoton" @click="crear()"> <i class="fa fa-plus"></i></button></h4>  
                            </div>
                        <div class="card-body">
                            <div class="content table-responsive table-full-width" id="tareas">
                                <v-client-table :data="tareas" :columns="columns" :options="options">
                                    <div slot="Estado" slot-scope="props">
                                        <h4 v-if="props.row.Estado == 'ACTIVO'" class="text-primary font-weight-bold t12">{{props.row.Estado}}</h4>
                                        <h4 v-if="props.row.Estado == 'INACTIVO'" class="text-danger font-weight-bold t12">{{props.row.Estado}}</h4>
                                    </div>
                                    <div slot="Acciones" slot-scope="props">
                                        <button class="btn btn-danger altoBoton" data-toggle="tooltip" v-on:click="changeStatus(props.row.id,props.row.Estado)" data-placement="left" title="cambiar estado"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                        <button class="btn btn-info altoBoton" data-toggle="tooltip" v-on:click="editar(props.row.id)" data-placement="left" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></button>
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
            zarchivos:[],
            zlinks:[],
            modoeditar: false,
        }
	},
	created(){
        this.getGrados();
        this.getData();
	},
	mounted(){
        $('#objetivo').hide();
        $('#edit').hide();
        $('#table').hide();
	},
    methods: {
        deleteArchivo(a,b)
        {
            this.$Progress.start();
            axios.get("deleteArchivo/"+a+"/"+b)
            .then(data=>
            {
                swal({
                    type : "success",
                    text : "Archivo eliminado con éxito!",
                    showConfirmButton : false,
                    timer : 2000,
                });
                this.zarchivos = data.data.archivos;
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        deleteLink(a,b)
        {
            this.$Progress.start();
            axios.get("deleteLink/"+a+"/"+b)
            .then(data=>
            {
                swal({
                    type : "success",
                    text : "Link eliminado con éxito!",
                    showConfirmButton : false,
                    timer : 2000,
                });
                this.zlinks = data.data.links;
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        crear()
        {
            this.lista = false;
        },
        cancelar()
        {
                this.tarea.id               = null;
                this.tarea.grado            = null;
                this.tarea.curso            = null;
                this.tarea.tema             = null;
                this.tarea.observaciones    = null;
                this.tarea.fecha            = null;
                this.tarea.fechac           = null;
                this.tarea.url              = null;
                this.tarea.idreunion        = null;
                this.tarea.pass             = null;
                this.tarea.bimestre         = null;
                this.archivos   = [];
                this.areas   = [];
                this.types      = [];
                this.archs      = [];
                this.links      = [];
                this.jlinks     = [];
                this.i          = 0;
                this.j          = 0;
                this.zarchivos  = [];
                this.zlinks     = [];
                this.lista = true;
                this.modoeditar = false;
        },
        editar(id)
        {
            this.$Progress.start();
            axios.get("getTarea/"+id)
            .then(data=>
            {
                this.getAreas(data.data.tarea.Grado);
                this.tarea.id               = data.data.tarea.id;
                this.tarea.grado            = data.data.tarea.Grado;
                this.tarea.curso            = data.data.tarea.Curso;
                this.tarea.tema             = data.data.tarea.Tema;
                this.tarea.observaciones    = data.data.tarea.Observaciones;
                this.tarea.fecha            = data.data.tarea.FechaEntrega;
                this.tarea.fechac           = data.data.tarea.FechaClase;
                this.tarea.url              = data.data.tarea.Reunion;
                this.tarea.idreunion        = data.data.tarea.IDReunion;
                this.tarea.pass             = data.data.tarea.Pass;
                this.tarea.bimestre         = data.data.tarea.Bimestre;
                this.zarchivos              = data.data.archivos;
                this.zlinks                 = data.data.links;
                this.lista = false;
                this.modoeditar = true;
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        getData()
        {
            this.$Progress.start();
            axios.get("getTareas")
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
        add(entrada)
        {
            if(entrada == 1)
            {
                this.archs.push(this.i);
                this.i++;
            }else if(entrada == 2)
            {
                this.jlinks.push(this.j);
                this.j++;
            }
        },
        less(entrada)
        {
            if(entrada == 1)
            {
                if(this.i === 0)
                {
                    return;
                }else{
                    this.archs.pop();
                    this.archivos.pop();
                    this.types.pop();
                    this.i--;
                }
            }else if(entrada == 2)
            {
                if(this.j === 0)
                {
                    return;
                }else{
                    this.jlinks.pop();
                    this.links.pop();
                    this.j--;
                }
            }
        },
        arc(e)
        {
            console.log(e.target.files);
            var size = e.target.files[0].size;
            var name = e.target.files[0].name;
            var type = name.split('.').pop();;
            // console.log(size);
            var files = new FileReader();
            files.readAsDataURL(e.target.files[0]);
            files.onload = (e) =>
            {
               this.archivos.push(e.target.result);
               this.types.push(type);
            }
            console.log(this.archivos);
            console.log(this.types);
            
        },
        agregarLink(e)
        {
            var link = $("#link"+e).val();
            this.links.push(link);          
        },
        getGrados()
        {
            this.$Progress.start();
            axios.get("getAreasasignadas")
            .then(data=>
            {
                this.grados     = data.data.grados; 
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
        getAreas(grado)
        {
            this.$Progress.start();
            axios.get("/showareas/"+grado)
            .then(data=>
            {
                this.areas     = data.data.areas; 
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
            
        },
       
        guardar()
        {
            this.$Progress.start();
            swal({
                imageUrl    : "img/loading.gif",
                text        : "los archivos se están cargando, por favor no cierre esta ventana",
                showConfirmButton: false
            })
            axios.post("registrarTareas",{
                tarea:this.tarea,
                archivos: this.archivos,
                types: this.types,
                links: this.links,
			}).then(data=>{
                this.$Progress.finish();
                swal({
                    type: "success",
                    text: "se ha subido la tarea con éxito",
                    showConfirmButton: false,
                });
				setTimeout(() => {
					location.reload();
				}, 2000);
			}).catch(error=>{
				console.log(error);	
			})
        },
        updateTarea()
        {
            this.$Progress.start();
            swal({
                imageUrl    : "img/loading.gif",
                text        : "los archivos se están cargando, por favor no cierre esta ventana",
                showConfirmButton: false
            })
            axios.post("updateTarea",{
                tarea:this.tarea,
                archivos: this.archivos,
                types: this.types,
                links: this.links,
			}).then(data=>{
                this.$Progress.finish();
                swal({
                    type: "success",
                    text: "La tarea se actualizó con éxito",
                    showConfirmButton: false,
                });
				setTimeout(() => {
					location.reload();
				}, 2000);
			}).catch(error=>{
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
        
    }
}
</script>