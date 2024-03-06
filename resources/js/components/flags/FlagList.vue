<template>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-2 my-4">
            <button
                @click="filterFlags('')"
                :class="[
                    'px-2 py-1 rounded transition duration-300',
                    '' === selectedLetter ? 'bg-blue-700' : 'bg-blue-300',
                    'text-white hover:bg-blue-700',
                ]"
            >
                All countries
            </button>
            <button
                v-for="letter in letters"
                :key="letter"
                @click="filterFlags(letter)"
                :class="[
                    'px-2 py-1 rounded transition duration-300',
                    letter === selectedLetter ? 'bg-blue-700' : 'bg-blue-300',
                    'text-white hover:bg-blue-700',
                ]"
            >
                {{ letter }}
            </button>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-4 md:grid-cols-6 gap-4">
            <FlagItem
                v-for="flag in filteredFlags"
                :key="flag.country"
                :flag="flag"
            />
        </div>
    </div>
</template>

<script>
import FlagItem from "./FlagItem.vue";
import axios from "axios"; // Ensure axios is imported if not globally available

export default {
    components: {
        FlagItem,
    },
    data() {
        return {
            letters: "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split(""),
            flags: [],
            filteredFlags: [],
            selectedLetter: "",
        };
    },
    methods: {
        filterFlags(letter) {
            this.selectedLetter = letter;
            this.filteredFlags = this.flags.filter((flag) =>
                (flag.name.common ?? "")
                    .toUpperCase()
                    .startsWith(letter.toUpperCase())
            );
        },
        async fetchCountries() {
            try {
                const response = await axios.get("/countries");
                this.flags = response.data;
                this.filteredFlags = this.flags;
            } catch (error) {
                console.error(
                    "There was an error fetching the countries: ",
                    error
                );
            }
        },
    },
    async mounted() {
        await this.fetchCountries();
    },
};
</script>
