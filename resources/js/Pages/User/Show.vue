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
                            </div>
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
            user_id: props.user.user_id,
            name_prefix: props.user.name_prefix,
            first_name: props.user.first_name,
            middle_initial: props.user.middle_initial,
            last_name: props.user.last_name,
            gender: props.user.gender,
            email: props.user.email,
            fathers_name: props.user.fathers_name,
            mothers_name: props.user.mothers_name,
            mothers_maiden_name: props.user.mothers_maiden_name,
            date_of_birth: props.user.date_of_birth,
            date_of_joining: props.user.date_of_joining,
            salary: props.user.salary,
            ssn: props.user.ssn,
            phone: props.user.phone,
            city: props.user.city,
            state: props.user.state,
            zip: props.user.zip
        });

        return { form };
    },
    props: {
        user: Object,
    },
    methods: {
        submit() {
            this.form.put(route("users.update", this.user.id));
        },
    },
};
</script>