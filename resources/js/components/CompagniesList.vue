<template>

    <div class="overflow-auto mt-5">
        <h1 class="mb-5"> Liste des compagnies </h1>

         <b-form-group
          label="Recherche"
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

            <template #cell(actions)="row">
                <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
                    Détails
                </b-button>
            </template>

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

        <!-- Info modal -->
        <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">

            <p> <span class="font-weight-bold" >Secteur : </span> {{ infoModal.sector }} </p>
            <p> <span class="font-weight-bold" > Siren : </span> {{ infoModal.siren }} </p>

            <b-table
                id="compagnies"
                hover
                :fields="fieldsResults"
                :items="infoModal.results">
            </b-table>

            <hr/>
            <h5> Comparaison {{this.firstYear}} / {{this.lastYear}}</h5>

            <b-table
                id="compare"
                hover
                :items="compare(infoModal.results)">
                <template #cell(ca)="row">
                    <div v-bind:class="[row.item.ca > 0 ? caPositif : caNegatif]" > {{ row.item.ca }} </div>
                </template>

                <template #cell(margin)="row">
                    <div v-bind:class="[row.item.margin > 0 ? caPositif : caNegatif]" > {{ row.item.margin }} </div>
                </template>

                <template #cell(ebitda)="row">
                    <div v-bind:class="[row.item.ebitda > 0 ? caPositif : caNegatif]" > {{ row.item.ebitda }} </div>
                </template>

                <template #cell(loss)="row">
                    <div v-bind:class="[row.item.loss > 0 ? caPositif : caNegatif]" > {{ row.item.loss }} </div>
                </template>
            </b-table>
        </b-modal>
    </div>
</template>

<script>
export default {
    data() {
        return {
            caPositif: 'text-success',
            caNegatif: 'text-danger',
            firstYear: 0,
            lastYear: 0,
            perPage: 10,
            currentPage: 1,
            total: 0,
            filter: null,
            filterOn: [],
            totalRows: 1,
            fields: [
                { key: 'name', label: 'Nom', sortable: true },
                { key: 'sector', label: 'Secteur', sortable: true },
                { key: 'siren', label: 'Siren', sortable: true },
                { key: 'actions', label: 'Actions' },
            ],
            fieldsResults: [
                { key: 'ca', label: 'CA', sortable: true },
                { key: 'margin', label: 'Margin', sortable: true },
                { key: 'ebitda', label: 'Ebitda', sortable: true },
                { key: 'loss', label: 'Perte' },
                { key: 'year', label: 'Année' },
            ],
            compagnies: [],
            infoModal: {
                id: 'info-modal',
                siren: '',
                sector: '',
                results: [],
            }
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
      },

    },
    methods: {
        onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      info(item, index, button) {
          axios.get('api/compagnies/'+item.id).then(response => {
            this.infoModal.title = response.data.name;
            this.infoModal.siren = response.data.siren;
            this.infoModal.sector = response.data.sector;
            this.infoModal.results = response.data.results;
            this.firstYear = response.data.results[1].year;
            this.lastYear = response.data.results[0].year;
        })

        this.$root.$emit('bv::show::modal', this.infoModal.id, button)
      },
      resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      compare(results) {
          let ca = 0;
          let margin = 0;
          let ebitda = 0;
          let loss = 0;
          if (results[0] !== undefined && results[1] !== undefined) {
            ca = results[0].ca;
            ca = results[0].ca - results[1].ca;
            if (ca > 0) {
                ca = '+'+ca;
            }

            margin = results[0].margin;
            margin = results[0].margin - results[1].margin;
            if (margin > 0) {
                margin = '+'+margin;
            }

            ebitda = results[0].ebitda;
            ebitda = results[0].ebitda - results[1].ebitda;
            if (ebitda > 0) {
                ebitda = '+'+ebitda;
            }

            loss = results[0].loss;
            loss = results[0].loss - results[1].loss;
            if (loss > 0) {
                loss = '+'+loss;
            }
          }

        return [{ca: ca, margin: margin, ebitda: ebitda, loss: loss}];
      }
    }
}
</script>
