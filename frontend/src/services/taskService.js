import axios from  'axios';

const API_BASE_URL = 'http://localhost:8000';

const taskService = {
    getAllTasks: async() => {
        try{
            const response = await axios.get(`${API_BASE_URL}/api`);
            return response.data.data;
        } catch(error){
            console.error('Error fething issues: ' + error.message);
        }
    },

    addTask: async (newTask) => {
        try {
            const response = await axios.post(`${API_BASE_URL}/api/create`, newTask);
            return response.data;
        } catch (error) {
            console.error('Error adding task:', error);
            throw error;
        }
    },
    
}

export default taskService;