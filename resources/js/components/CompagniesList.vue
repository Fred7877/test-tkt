<template>
    <div class="overflow-auto mt-5">
         <b-form-group
          label="Filter"
          label-for="filter-input"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-2"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Type to Search"
            ></b-form-input>

            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>

        <b-table
            id="compagnies"
            striped
            hover
            :filter="filter"
            :filter-included-fields="filterOn"
            @filtered="onFiltered"
            :fields="fields"
            :per-page="perPage"
            :current-page="currentPage"
            :items="compagnies">
        </b-table>
        <div class="mt-3">
            <b-pagination
                v-model="currentPage"
                :total-rows="rows"
                :per-page="perPage"
                align="right"
                aria-controls="compagnies"
            ></b-pagination>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            perPage: 10,
            currentPage: 1,
            total: 0,
            filter: null,
            filterOn: [],
            totalRows: 1,
            fields: [
                { key: 'name', sortable: true },
                { key: 'sector', sortable: true },
                { key: 'siren', sortable: true },
            ],
            compagnies: [],
        }
    },
    mounted() {
        axios.get('api/compagnies/').then(response => {
            this.compagnies = response.data;
            this.totalRows = this.compagnies.length
        })
    },
    computed: {
      rows() {
        return this.totalRows;
      }
    },
    methods: {
        onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      }
    }
}
</script>
