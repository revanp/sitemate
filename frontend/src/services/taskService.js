import axios from  'axios';

const API_BASE_URL = 'http://localhost:8000';

const taskService = {
    getAllTasks: async() => {
        try{
            const response = await axios.get(`${API_BASE_URL}/api`);
            console.log(response)
            return response.data;
        } catch(error){
            console.error('Error fething issues: ' + error.message);
        }
    }
}

export default taskService;