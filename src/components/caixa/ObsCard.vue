<template>
    <v-menu
        v-model="menuObs"
        :close-on-content-click="false"
        :nudge-width="200"
        >
        <template v-slot:activator="{ on, attrs }">
            <v-btn  
            height="100%" 
            width="15%" 
            color='grey' 
            dark  
            v-bind="attrs" 
            v-on="on"
            title="adicionar uma observação"
            @click='aditObs' >
            <v-icon color="white" size='35'> fa fa-list</v-icon>
            </v-btn>      
        </template>
        <v-card>
        <v-list>
        <v-list-item>
            <v-list-item-avatar rouded color="var(--primary">
                <v-icon color="white"> fa fa-list</v-icon>
            </v-list-item-avatar>
            <v-list-item-content>
            <v-list-item-title>Observação da sale</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
        </v-list>
        <v-divider></v-divider>
        <v-list>
        <v-textarea
            autofocus
            label="Observação"
            hide-details="auto"
            v-model="observacao"
            couter='200'
            color="var(--primary)"
            class='pa-2'
            counter="200"
            prepend-icon='fa fa-list'
            @keyup.native.enter="saveObs()">                
        </v-textarea>
        </v-list>
        <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn text @click="menuObs = false">Cancelar</v-btn>
        <v-btn color="var(--primary)" text @click="saveObs()">salvar</v-btn>
        </v-card-actions>
        </v-card>
    </v-menu>
    <!-- fim -->
</template>

<script>
import alert from '../../services/errorHandler'
export default {
  name: 'ObsCard',    
  computed:{
    sale(){
      return this.$store.state.cashierStore
    },
  },
  data:()=>({    
    menuObs:false,
    observacao:'',
  }),
  methods:{
    aditObs(){
      this.observacao = this.sale.obs
    },
    saveObs(){
      if(this.observacao.length <=200){
        this.$store.dispatch('addObs',this.observacao)
        this.menuObs = false
        this.observacao = ''
        alert('info','Comentário adicionado.')
      }else{
        alert('error','O comentário possui mais de 200 caracteres.')
      }
    },
  }
  
}
</script>

<style>

</style>