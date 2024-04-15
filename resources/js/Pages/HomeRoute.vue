<template>
    <div>
        <div>
            <h1>Add user</h1>
        </div>
        <div>
            <label for="first-name">First name</label>
            <input id="first-name" v-model="firstName" />
            <label for="last-name">Last name</label>
            <input id="last-name" v-model="lastName" />
            <label for="email">Email</label>
            <input type="email" id="email" v-model="email" />
            <label for="ssn">SSN</label>
            <input type="password" id="ssn" v-model="socialSecurityNumber" />
            <button type="submit" @click="handleSubmit">Submit</button>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    setup() {
        const firstName = ref('');
        const lastName = ref('');
        const email = ref('');
        const socialSecurityNumber = ref(null);

        const handleSubmit = () => {
            console.log(firstName.value, lastName.value, email.value, socialSecurityNumber.value);
        }

        return {
            firstName,
            lastName,
            email,
            socialSecurityNumber,
            handleSubmit
        };
    }
}
</script>