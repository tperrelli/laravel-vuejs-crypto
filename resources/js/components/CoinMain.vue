<template>
  <div class="container main-container text-center">
    <div class="input-group input-group-lg mt-6">
      <input type="text" class="form-control" placeholder="Search for your coin here" v-model="search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>

    <loading-data v-if="loading" />

    <table v-else class="table table-striped mt-2">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">High 24h</th>
          <th scope="col">Low 24h</th>
          <th scope="col">Market Cap 24h</th>
        </tr>
      </thead>
      <tbody>
        <tr :key="index" v-for="(coin, index) in filteredList" @click="coinDetailPage(coin)">
          <th scope="row">{{ index + 1 }} </th>
          <td>
            <img height="30px" :src="coin.image" :alt="coin.id" />
            {{ coin.name }} <span class="badge text-bg-light text-uppercase">{{ coin.symbol }}</span>
          </td>
          <td>{{ coin.current_price }}</td>
          <td>{{ coin.high_24h }}</td>
          <td>{{ coin.low_24h }}</td>
          <td>{{ coin.market_cap_change_24h }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import axios from 'axios';
import { useRouter } from 'vue-router';
import { ref, computed, onMounted } from 'vue';
import LoadingData from './LoadingData.vue';
import { formatMoney } from '../libraries/money';

const OK = 200;
const loading = ref(false);
const itemList = ref([]);
const search = ref('');
const router = useRouter();

const filteredList = computed(() => {

  const query = search.value.toLowerCase().trim();
  if (!query) {
    return itemList.value.map(formattingValues);
  }

  return itemList
    .value
    .filter(item => item.name.toLowerCase().includes(query) || item.symbol.toLowerCase().includes(query))
    .map(formattingValues);
});

const formattingValues = (item) => {
  item.high_24h = formatMoney(item.high_24h);
  item.low_24h = formatMoney(item.low_24h);
  item.market_cap_change_24h = formatMoney(item.market_cap_change_24h);
  item.current_price = formatMoney(item.current_price);

  return item;
};

const loadData = async () => {

  loading.value = true;
  
  const response = await axios.get('/api/coins/markets?vs_currency=usd');
  if (response.status === OK) {
    itemList.value = response.data.data;
  }
  loading.value = false;
};

const coinDetailPage = (item) => {
  router.push({ name: 'coin-details', params: {id: item.id }});
};

onMounted(() => loadData());

</script>

<style scoped>
  tbody tr {
    cursor: pointer;
  }

  tbody tr:hover {
    font-size: 15px;
    font-weight: bold;
  }
</style>
  
  