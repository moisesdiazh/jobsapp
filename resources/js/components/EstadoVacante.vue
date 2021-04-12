<template>

    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
          :class="claseEstadoVacante()"
          @click="cambiarEstado"
          :key="estadoVacanteData"
    >

        {{ estadoVacante }}
    </span>
</template>

<script>
export default {
    props:['estado', 'vacanteId'],
    mounted() {
        this.estadoVacanteData = Number(this.estado)
    },
    // data es donde manejamos los datos dinamicos
    data: function(){

        return{
        estadoVacanteData: null
        }
    },
    //los methods esperan que sucedan un evento
    methods: {
        // condiciones para que cambie de color si esta inactiva o activa
        claseEstadoVacante() {

            return this.estadoVacanteData === 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800"
        },
        // condicion para que cambie el estado
        cambiarEstado() {
            if(this.estadoVacanteData === 1) {

                this.estadoVacanteData = 0;
            }else{

                this.estadoVacanteData = 1;
            }

            //Enviar la peticion a axios
            const params = {

                estado: this.estadoVacanteData
            }
            axios
                .post('/vacantes/' + this.vacanteId, params)
                .then(respuesta => console.log(respuesta))
                .catch(error => console.log(error))
        }
    },
    //computed es cuando esta listo el documento y se ejecuta automaticamente
    computed: {
        // para que pueda cambiar el mensaje de activa a inactiva y viceversa
        estadoVacante() {

            return this.estadoVacanteData === 1 ? 'Activa' : 'Inactiva'
        }
    }

}
</script>
