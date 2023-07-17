<template>
  <div class="mt-5">
    <h1 class="d-flex justify-content-center align-items-center">
      <span class="cripto-cor">CRIPTO</span><strong>PREÇO</strong>
    </h1>
    <div class="d-flex justify-content-center align-items-center">
    <select v-model="selecionarMoeda" @change="addCard" class="select-personalizado">
      <option value="" disabled><span class="selecione">Selecione uma criptomoeda...</span></option>
      <option value="bitcoin">Bitcoin</option>
      <option value="ethereum">Ethereum</option>
      <option value="cardano">Cardano</option>
      <option value="bnb">BNB</option>
      <option value="tether">Tether</option>
      <option value="solana">Solana</option>
      <option value="xrp">XRP</option>
      <option value="doge">DogeCoin</option>
    </select>
  </div>
  
  <div class="container d-flex justify-content-center align-items-center espaco">
    <div class="row">
    <ul class="list-unstyled d-flex flex-wrap ml-5">
      <li v-for="(moeda, index) in moedasSelecionadas" :key="index" class="card mt-3 ms-4 position-relative zoom-on-hover">
        <div class="card-body text-center">
          <button @click="removerMoeda(index)" class="btn btn-sm position-absolute top-0 end-0">
            <i class="fas fa-times branco"></i>
          </button>
          <h5 v-if="moeda.nome === 'bitcoin'" class="card-title">
            <i class="fa-brands fa-bitcoin fa-fade fa-xl" style="color: #cbc515;"></i>Bitcoin <span style="color:#cbc515">ᵇᵗᶜ</span>
          </h5>
          <h5 v-else-if="moeda.nome === 'ethereum'" class="card-title">
            <i class="fa-brands fa-ethereum fa-fade fa-xl" style="color: #949494;"></i>Ethereum <span style="color: #949494;">ᵉᵗʰ</span>
          </h5>
          <h5 v-else-if="moeda.nome === 'cardano'" class="card-title">
            <img class="cripto-icon" src="https://s3.eu-central-1.amazonaws.com/bbxt-static-icons/type-id/png_512/2701173b1b7740f286939659359e225c.png" alt="">Cardano <span style="color: #61c1f9;">ᵃᵈᵃ</span>
          </h5>
          <h5 v-else-if="moeda.nome === 'bnb'" class="card-title">
            <img class="cripto-icon" src="https://cdn-icons-png.flaticon.com/512/7403/7403652.png" alt="">BNB <span style="color: #ffd638;">ᵇⁿᵇ</span>
          </h5>
          <h5 v-else-if="moeda.nome === 'tether'" class="card-title">
            <img class="cripto-icon" src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="">Tether <span style="color: #50af95;">ᵘˢᵈᵗ</span>
          </h5>
          <h5 v-else-if="moeda.nome === 'solana'" class="card-title">
            <img class="cripto-icon" src="https://assets-global.website-files.com/5e73a1e3ba24f2cd5dd2232a/62337715d748ddd7931c11dd_sol.png" alt="">Solana <span style="color: #ba4bea;">ˢᵒˡ</span>
          </h5>
          <h5 v-else-if="moeda.nome === 'xrp'" class="card-title">
            <img class="cripto-icon" src="https://i.pinimg.com/originals/e6/9d/92/e69d92c8f36c37c84ecf8104e1fc386d.png" alt="">XRP <span style="color: #303030;">ˣʳᵖ</span>
          </h5>
          <h5 v-else-if="moeda.nome === 'doge'" class="card-title">
            <img class="cripto-icon" src="https://cdn.freebiesupply.com/logos/large/2x/dogecoin-logo-png-transparent.png" alt="">DogeCoin <span style="color: #d3b50b;">ᵈᵒᵍᵉ</span>
          </h5>
          <h5 class="card-text">R${{ moeda.preco }}</h5>
          
        </div>
      </li>
    </ul>
  </div>
  </div>
</div>
</template>

<script>
export default {
  props: [
    'btcprice', 
    'ethprice', 
    'cardanoprice', 
    'bnbprice', 
    'usdtprice', 
    'tetherprice', 
    'solanaprice',
    'xrpprice',
    'dogeprice'
  ], // Defina as propriedades 'btcprice' e 'ethprice' recebidas do Laravel
  data() {
    return {
      selecionarMoeda: '', // Inicializa a moeda selecionada como vazia
      mostrarValor: false, // Não exibir a box inicialmente
      moedasSelecionadas: [], // Lista de moedas selecionadas com seus valores
    };
  },
  watch: {
    selecionarMoeda: function() {
      if (this.selecionarMoeda !== '') {
        // Procura a moeda selecionada nas moedasSelecionadas
        const moedaSelecionada = this.moedasSelecionadas.find(
          (moeda) => moeda.nome === this.selecionarMoeda
        );

        // Se a moeda selecionada ainda não estiver na lista, adiciona-a com o valor de exemplo
        if (!moedaSelecionada) {
          let preco = 0;

          // Define o preço de acordo com a moeda selecionada
          if (this.selecionarMoeda === 'bitcoin') {
            preco = this.btcprice.price;
          } else if (this.selecionarMoeda === 'ethereum') {
            preco = this.ethprice.price;
          } else if (this.selecionarMoeda === 'cardano'){
            preco = this.cardanoprice.price; 
          } else if(this.selecionarMoeda === 'bnb'){
            preco = this.bnbprice.price; 
          } else if(this.selecionarMoeda === 'tether'){
            preco = this.tetherprice.price; 
          } else if(this.selecionarMoeda === 'solana'){
            preco = this.solanaprice.price;
          } else if(this.selecionarMoeda === 'xrp'){
            preco = this.xrpprice.price; 
          } else if (this.selecionarMoeda === 'doge'){
            preco = this.dogeprice.price;
          }

          this.moedasSelecionadas.push({
            nome: this.selecionarMoeda,
            preco: preco,
          });
        }
      }
    },
  },
  methods: {
    removerMoeda(index) {
      this.moedasSelecionadas.splice(index, 1);
    },
  },
};
</script>
