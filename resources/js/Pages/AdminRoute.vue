<template>
    <div>
        <div>
            <h1>Admin Page</h1>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th v-for="(column, index) in columns" :key="column">
                            <a href="#" @click="sortBy(column)" :classes="{active: sortKey == column}">
                                {{ column }}
                            </a>
                        </th>
                        <th id="disabled">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.first_name }}</td>
                        <td>{{ user.last_name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.ssn }}</td>
                        <td>{{ user.is_disabled ? 'Yes' : 'No' }}</td>
                        <td>
                            <button @click="handleDisable(user.id)">Disable</button>
                            <button @click="handleEnable(user.id)">Enable</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <button>
                <router-link to="/">Home</router-link>
            </button>
        </div>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { _ } from 'lodash';

export default {
    setup() {
        const users = ref([]);
        const sortKey = ref('');
        const direction = ref('desc');
        const columns = ['first_name', 'last_name', 'email', 'ssn', 'is_disabled'];

        const sortBy = (currentSortKey) => {
            direction.value = direction.value == 'desc'
                ? 'asc'
                : 'desc';

            sortKey.value = currentSortKey;

            users.value = _.orderBy(users.value, [sortKey.value], [direction.value]);
        };

        const handleDisable = (id) => {
            axios.post('/api/users/disable/'+id)
            .then((response) => {
                axios.get('/api/users')
                .then((response) => {
                    users.value = response.data;
                })
                .catch((error) => {

                });
            })
            .catch((error) => {

            });
        };

        const handleEnable = (id) => {
            axios.post('/api/users/enable/'+id)
            .then((response) => {
                axios.get('/api/users')
                .then((response) => {
                    users.value = response.data;
                })
                .catch((error) => {

                });
            })
            .catch((error) => {

            });
        };

        onMounted(() => {
            axios.get('/api/users')
                .then((response) => {
                    users.value = response.data;
                })
                .catch((error) => {

                });
        });

        return {
            users,
            sortKey,
            direction,
            columns,
            sortBy,
            handleDisable,
            handleEnable
        }
    }
}
</script>

<style scoped>
a {
  font-weight: normal;
  color: black;
}

a.active {
  font-weight: bold;
  color: blue;
}

#disabled {
    font-weight: normal;
}
</style>