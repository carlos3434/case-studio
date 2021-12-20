<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">

                            <div>
                                <label for="title">name</label>
                                <input
                                    type="text"
                                    v-model="form.name"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.name">The ID is Required</div>
                            </div>
                            <div>
                                <label for="title">password</label>
                                <input
                                    type="password"
                                    v-model="form.password"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                            </div>
                            <div>
                                <label for="title">role</label>
                                <select class="form-select block w-full mt-1" v-model="form.role_selected">
                                    <option v-for="role in roles" v-bind:value="role.name">
                                        {{role.name}}
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label for="title">user_id</label>
                                <input
                                    type="text"
                                    v-model="form.user_id"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.user_id">The ID is Required</div>
                            </div>
                            <div class="mt-4">
                                <label for="title">name_prefix</label>
                                <input
                                    type="text"
                                    v-model="form.name_prefix"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.name_prefix">The name_prefix is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">first_name</label>
                                <input
                                    type="text"
                                    v-model="form.first_name"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.first_name">The first_name is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">middle_initial</label>
                                <input
                                    type="text"
                                    v-model="form.middle_initial"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.middle_initial">The middle_initial is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">last_name</label>
                                <input
                                    type="text"
                                    v-model="form.last_name"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.last_name">The last_name is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">gender</label>
                                <input
                                    type="text"
                                    v-model="form.gender"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.gender">The gender is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">email</label>
                                <input
                                    type="text"
                                    v-model="form.email"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.email">The email is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">fathers_name</label>
                                <input
                                    type="text"
                                    v-model="form.fathers_name"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.fathers_name">The fathers_name is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">mothers_name</label>
                                <input
                                    type="text"
                                    v-model="form.mothers_name"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.mothers_name">The mothers_name is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">mothers_maiden_name</label>
                                <input
                                    type="text"
                                    v-model="form.mothers_maiden_name"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.mothers_maiden_name">The mothers_maiden_name is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">date_of_birth</label>
                                <input
                                    type="text"
                                    v-model="form.date_of_birth"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.date_of_birth">The date_of_birth is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">date_of_joining</label>
                                <input
                                    type="text"
                                    v-model="form.date_of_joining"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.date_of_joining">The date_of_joining is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">salary</label>
                                <input
                                    type="text"
                                    v-model="form.salary"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.salary">The salary is Required</div>
                            </div>

                            
                            <div class="mt-4">
                                <label for="title">ssn</label>
                                <input
                                    type="text"
                                    v-model="form.ssn"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.ssn">The ssn is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">phone</label>
                                <input
                                    type="text"
                                    v-model="form.phone"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.phone">The phone is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">city</label>
                                <input
                                    type="text"
                                    v-model="form.city"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.city">The city is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">state</label>
                                <input
                                    type="text"
                                    v-model="form.state"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.state">The state is Required</div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="title">zip</label>
                                <input
                                    type="text"
                                    v-model="form.zip"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.zip">El zip es Required</div>
                            </div>

                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button
                                    class="
                                        px-6
                                        py-2
                                        text-white
                                        bg-gray-900
                                        rounded
                                    "
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLabel from "@/Components/Label";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    props: {
        errors: Object,
    },
    setup() {
        const form = useForm({
            name: null,
            password: null,
            user_id: null,
            name_prefix: null,
            first_name: null,
            middle_initial: null,
            last_name: null,
            gender: null,
            email: null,
            fathers_name: null,
            mothers_name: null,
            mothers_maiden_name: null,
            date_of_birth: null,
            date_of_joining: null,
            salary: null,
            ssn: null,
            phone: null,
            city: null,
            state: null,
            zip: null
        });

        return { form };
    },
    methods: {
        submit() {
            this.form.post(route("users.store"));
        },
    },
};
</script>