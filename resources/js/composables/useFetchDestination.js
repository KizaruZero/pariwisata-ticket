import axios from 'axios';
import { ref } from 'vue';

export function useFetchRecommendedDestinations() {
    const recommendedDestinations = ref([]);
    const loading = ref(false);
    const error = ref(null);

    const fetchRecommendedDestinations = async () => {
        loading.value = true;
        error.value = null;
        try {
            const response = await axios.get('http://127.0.0.1:8000/api/destination/recommendation');
            recommendedDestinations.value = response.data;
        } catch (err) {
            error.value = 'Failed to fetch recommended destinations';
            console.error(err);
        } finally {
            loading.value = false;
        }
    };

    return {
        recommendedDestinations,
        loading,
        error,
        fetchRecommendedDestinations
    };
}
