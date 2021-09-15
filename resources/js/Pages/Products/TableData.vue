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
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
        </thead>
        <tbody>
            <tr v-for="(product, key) in products" :key="key">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <!--<img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">-->
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{product.name}}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{product.created_at}}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{product.description}}</div>
                <div class="text-sm text-gray-500">Description</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Edit
                </button>
              </td>
            </tr>
        </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            products: Object,
        }
    }
</script>
