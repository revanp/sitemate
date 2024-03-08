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

    return (
        <div className="mt-5">
            <h2>Issue Management</h2>
            <button className="btn btn-primary">Add Task</button>

            <div className="mt-3 row">
                <TaskList tasks={tasks}/>
            </div>
            {/* <h1>{task.title}</h1>
            <p>{task.description}</p> */}
        </div>
    );
};

export default Task;