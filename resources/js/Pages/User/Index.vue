<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                user
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-12 bg-white border-b border-gray-200">

                        <div class="mb-4">
                            <Link
                                class="
                                    px-6
                                    py-2
                                    mb-2
                                    text-green-100
                                    bg-green-500
                                    rounded
                                "
                                :href="route('users.create')"
                            >
                                user Create
                            </Link>
                        </div>

                        <div class="mb-4">
                            <input type="search" v-model="params.name" aria-label="Search" placeholder="Search..." class="block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">
                                
                                    <span class="inline-flex py-3 px-6 w-full justify-between" @click="sort('name')">name

                                        <svg v-if="params.sortBy === 'name' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                        </svg>

                                        <svg v-if="params.sortBy === 'name' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                        </svg>
                                    </span>


                                </td>
                                <td class="px-4 py-2">email</td>
                                <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                                <tr v-for="user in users.data" :key="user.id">
                                    <td class="px-4 py-2">{{ user.user_id }}</td>
                                    <td class="px-4 py-2">{{ user.name }}</td>
                                    <td class="px-4 py-2">{{ user.email }}</td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link
                                            class="text-green-700"
                                            :href="route('users.edit', user.id)"
                                        >
                                            Edit
                                        </Link>
                                        <Link
                                            class="text-blue-700"
                                            :href="route('users.show', user.id )"
                                        >
                                            See
                                        </Link>
                                        <Link
                                            class="text-red-700" method="delete" as="button"
                                            :href="route('users.destroy', user.id )"
                                        >
                                            Delete
                                        </Link>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination class="mt-6" :links="users.meta.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import { pickBy, throttle } from 'lodash';
import Pagination from '@/Components/Pagination'
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeNavLink,
        Link,
        Pagination,
    },
    props: {
        users: Object,
        filters: Object,
    },
    data(){
        return {
            params:{
                name: this.filters.name,
                sortBy: this.filters.sortBy,
                direction: this.filters.direction,
            },
        };
    },
    methods: {
        sort(sortBy) {
          this.params.sortBy = sortBy;
          this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc';
        },
    },

  watch: {
    params: {
      handler: throttle(function () {
        let params = pickBy(this.params);

        this.$inertia.get( 'users', params, { replace: true, preserveState: true });
      }, 150),
      deep: true,
    },
  },


};
</script>