<template>
    <div class="todoListContainer">
        <div class="header">
            <h2 id="title">Todo List</h2>
            <add-item-form v-on:reloadlist="getList()" />
        </div>
        <list-view :items="items" v-on:reloadlist="getList()" />
    </div>
</template>

<script>
import addItemForm from "./addItemForm";
import listView from "./listView";
export default {
    components: {
        addItemForm,
        listView
    },
    data: function() {
        return {
            items: []
        };
    },
    methods: {
        getList() {
            // gets items in the list from api/items route
            axios
                .get("api/items")
                .then(res => {
                    this.items = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getList();
    }
};
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin: auto;
}

.header {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}
</style>
