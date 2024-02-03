<template>
  <div class="container main-container text-center mt-6">
    <loading-data v-if="loading" />

    <div v-else class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <a href="/" class="btn btn-link btn-primary">Go Back</a>
              <span class="badge text-bg-light text-uppercase">{{ coin.symbol }}</span>
            </div>
          </div>
          <div class="card-body">
            <img :src="coin.image" class="" :alt="coin.symbol">  
            <h5 class="card-title">{{ coin.name }}</h5>
          </div>

          <div class="card-body">
            <p class="card-text" v-html="coin.description"></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Current price: {{ coin.price }}</li>
            <li class="list-group-item">Market Cap Change 24h: {{ coin.market_cap_change_24h }}</li>
            <li class="list-group-item">Price change 24h: {{ coin.price_change_24h }}</li>
            <li class="list-group-item">Low 24h: {{ coin.low_24h }}</li>
          </ul>

          <div class="card-footer">
            <p class="card-text text-left"><small class="text-muted">Last Update: {{ coin.last_updated }}</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import httpRequest from '../Services/Http';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import LoadingData from './LoadingData.vue';
import { formatMoney } from '../libraries/money';
import { dateFormat } from '../libraries/date';

const OK = 200;
const coin = ref({});
const route = useRoute();
const loading = ref(false);

const loadData = async () => {
  loading.value = true;
  const id = route.params.id;
  const response = await httpRequest.get('/api/coins/'.concat(id));

  if (response.status === OK) {

    const data = response.data.data;
    coin.value.name = data.name;
    coin.value.symbol = data.symbol;
    coin.value.description = data.description.en;
    coin.value.image = data.images.small;
    coin.value.price = formatMoney(data.market_data.current_price.usd);
    coin.value.market_cap_change_24h = formatMoney(data.market_data.market_cap_change_24h);
    coin.value.low_24h = formatMoney(data.market_data.low_24h.usd);
    coin.value.price_change_24h = formatMoney(data.market_data.price_change_24h);
    coin.value.last_updated = dateFormat(data.last_updated);
  }

  console.log( response);

  loading.value = false;
};

onMounted(() => loadData());
</script>
