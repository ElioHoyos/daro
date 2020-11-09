<template>
    <div class="content">
	    <div class="container-fluid"  id="cabecera">
	    	<div class="row">
			 <div class="col-md-12">
	            <div class="card card-info"  id="objetivo">
	                <div class="card-header text-center">
	                    <h4 class="title">Mis Cursos</h4>  
	                </div>
					<div class="card-body">
                        <fieldset class="border p-2">
                                <legend class="w-auto t16 text-primary"><b>Cursos</b></legend>
                                <div v-if="!cargando" class="row justify-content-center">
                                    <div  class="spinner-border text-primary" role="status">
                                    </div>
                                    <br>
                                    <b class="text-primary">Cargando Cursos ...</b>
                                </div>
                                <div class="row">    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" v-for="(c,index) in cursos" :key="c.IDCurso">
                                        <div :class="'small-box '+color[index].bg">
                                            <div class="inner">
                                                <h4 class="text-center">{{c.cursos}}</h4>
                                                <p>{{c.grado}}</p>
                                                <h5 v-if="docente[grado][c.IDCurso] != null" class="t11">{{docente[grado][c.IDCurso]}}</h5>
                                                <h4 v-else class="t11">{{"Docente no asignado"}}</h4>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-document"></i>
                                            </div>
                                            <a :href="'curso/'+c.IDCurso" class="small-box-footer">ver tareas <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>    
                                </div>
                                
                            </fieldset>
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
			cursos:[],
            color:[
                {bg:"bg-indigo"},{bg:"bg-warning"},{bg:"bg-success"},{bg:"bg-primary"},{bg:"bg-info"},{bg:"bg-olive"},
                {bg:"bg-indigo"},{bg:"bg-warning"},{bg:"bg-success"},{bg:"bg-primary"},{bg:"bg-info"},{bg:"bg-olive"},
                {bg:"bg-indigo"},{bg:"bg-warning"},{bg:"bg-success"},{bg:"bg-primary"},{bg:"bg-info"},{bg:"bg-olive"},
                {bg:"bg-indigo"},{bg:"bg-warning"},{bg:"bg-success"},{bg:"bg-primary"},{bg:"bg-info"},{bg:"bg-olive"},
                {bg:"bg-indigo"},{bg:"bg-warning"},{bg:"bg-success"},{bg:"bg-primary"},{bg:"bg-info"},{bg:"bg-olive"},
                ],
            docente:[],
            grado:null,
            cargando: false,
        }
	},
	created(){
        this.getDatos();
        
	},
	mounted(){
       
	},
    methods: {
        
		getDatos()
        {
            this.cargando = false;
            this.$Progress.start();
            axios.get("getCursoAlumnos")
            .then(data=>
            {
                this.cargando   = true;
                this.cursos     = data.data.cursos;
                this.docente    = data.data.docente;
                this.grado      = data.data.grado;
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
