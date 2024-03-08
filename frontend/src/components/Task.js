import React, {useState, useEffect} from "react";
import taskService from "../services/taskService";
import TaskList from "./TaskList";

const Task = () => {
    const [tasks, setTasks] = useState([]);

    useEffect(() => {
        const fetchTask = async() => {
            try {
                const taskFromApi = await taskService.getAllTasks();
                setTasks(taskFromApi);
            }catch(error) {
                console.error(error);
            }
        };

        fetchTask();
    }, []);

    const handleAddTask = async () => {
        const newTask = {
            title: 'New Task',
            description: 'Description for the new task',
        };
    
        try {
            const addedTask = await taskService.addTask(newTask);
            setTasks([...tasks, addedTask]);
        } catch (error) {
            console.error(error);
        }
    };
    

    return (
        <div className="mt-5">
            <h2>Issue Management</h2>

            <div className="mt-3">
                {tasks.map((task) => (
                    <TaskList task={task} />
                ))}
            </div>
            {/* <h1>{task.title}</h1>
            <p>{task.description}</p> */}
        </div>
    );
};

export default Task;