import React from "react";

const TaskList = ({tasks}) => {
    return (
        <div>
            {tasks.map((task) => {
                <div className="col-md-6">
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title">{task.title}</h5>
                            <p className="card-text">{task.description}</p>
                        </div>
                    </div>
                </div>
            })}
        </div>
    );
}

export default TaskList;