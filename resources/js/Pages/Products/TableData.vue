<template>
    <div>
        <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Description
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                barcode
            </th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Remove</span>
            </th>
        </thead>
        <tbody>
            <tr v-for="(product, key) in products" :key="key">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="">
                    <div class="text-sm font-medium text-gray-900">
                      {{product.name}} {{product.id}}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{product.category.name}}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 w-64 truncate ...">{{ product.description }}</div>
                <div class="text-sm text-gray-500">{{product.variants.length}} variantes</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-500">{{product.barcode}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button v-on:click="showDetails(product)" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Details
                </button>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button v-on:click="deleteProduct(product)" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                    Delete
                </button>
              </td>
            </tr>
        </tbody>
        </table>
    </div>
</template>

<script>
    export default {
      methods: {
        showDetails(product){
          this.$emit('showDetails', product)
        },
        deleteProduct(product){
          this.$emit('delete', product)
        }
      },
      props: {
          products: Object,
      }
    }
</script>