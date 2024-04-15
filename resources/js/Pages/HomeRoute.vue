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
            <button @click="handleClear">Clear</button>
        </div>
        <div v-if="isUserSavedSuccessfully">User saved successfully</div>
        <div v-if="hasResponseError">There was an issue saving the user details
            <ul v-for="(error, index) in errorResponse" :key="index">
                <li>{{ error[0] }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';

export default {
    setup() {
        const firstName = ref('');
        const lastName = ref('');
        const email = ref('');
        const socialSecurityNumber = ref(null);
        const isUserSavedSuccessfully = ref(false);
        const hasResponseError = ref(false);
        const errorResponse = ref(null);

        const handleSubmit = () => {
            axios.post('/api/users', {
                firstName: firstName.value,
                lastName: lastName.value,
                email: email.value,
                ssn: socialSecurityNumber.value
            }).then((response) => {
                isUserSavedSuccessfully.value = true;
            }).catch((error) => {
                hasResponseError.value = true;

                if (error.response.data.errors) {
                    errorResponse.value = error.response.data.errors;
                }
            });
        };

        const handleClear = () => {
            firstName.value = '';
            lastName.value = '';
            email.value = '';
            socialSecurityNumber.value = null;
            isUserSavedSuccessfully.value = false;
            hasResponseError.value = false;
            errorResponse.value = null;
        };

        return {
            firstName,
            lastName,
            email,
            socialSecurityNumber,
            handleSubmit,
            isUserSavedSuccessfully,
            hasResponseError,
            handleClear,
            errorResponse
        };
    }
}
</script>