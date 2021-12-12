<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
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
                            </div>
                            <div>
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
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    setup(props) {
        const form = useForm({
            employee_id: props.employee.employee_id,
            name_prefix: props.employee.name_prefix,
            first_name: props.employee.first_name,
            middle_initial: props.employee.middle_initial,
            last_name: props.employee.last_name,
            gender: props.employee.gender,
            email: props.employee.email,
            fathers_name: props.employee.fathers_name,
            mothers_name: props.employee.mothers_name,
            mothers_maiden_name: props.employee.mothers_maiden_name,
            date_of_birth: props.employee.date_of_birth,
            date_of_joining: props.employee.date_of_joining,
            salary: props.employee.salary,
            ssn: props.employee.ssn,
            phone: props.employee.phone,
            city: props.employee.city,
            state: props.employee.state,
            zip: props.employee.zip
        });

        return { form };
    },
    props: {
        employee: Object,
    },
    methods: {
        submit() {
            this.form.put(route("employees.update", this.employee.id));
        },
    },
};
</script>