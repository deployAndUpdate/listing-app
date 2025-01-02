<script setup>
import Container from '../../Components/Container.vue'
import Title from '../../Components/Title.vue'
import TextLink from '../../Components/TextLink.vue'
import InputField  from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";

import ErrorMessages from "../../Components/ErrorMessages.vue";
import {useForm} from "@inertiajs/vue3";
const form = useForm({
    name : "",
    email : "",
    password : "",
    password_confirmation : ""
})

const submit = () => {
    form.post(route('register'), {
        onFinish : () => {
            form.reset('password', 'password_confirmation')
        }
    })
}

</script>

<template>
    <Head title = "- Register"/>
    <Container class ="w-1/2">
        <div class="mb-8 text-center">
            <Title>Register a new account</Title>
            <p>Already have an account? <TextLink routeName="login" label="Login"/></p>
        </div>
        <ErrorMessages :errors="form.errors"/>
        <form @submit.prevent="submit" class="space-y-6">
            <InputField label = "Name" icon = "id-badge" v-model="form.name"/>

            <InputField label = "Email" icon = "at" v-model="form.email"/>
            <InputField label = "Password" type = "password" icon = "key" v-model="form.password"/>
            <InputField label = "Confirm password" type = "password" icon = "key" v-model="form.password_confirmation"/>

            <p>Создание аккаунта означает ваше согласие с тем что я самый крутой разраб :)</p>
            <PrimaryBtn :disabled="form.processing">Register</PrimaryBtn>
        </form>



    </Container>
</template>
