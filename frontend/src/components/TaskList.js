import React from "react";

const TaskList = ({task}) => {
    return (
        <div className="col-md-6">
            <div className="card">
                <div className="card-body">
                    <h5 className="card-title">{task.title}</h5>
                    <p className="card-text">{task.description}</p>
                    <p className="card-text mt-3">{task.created_at}</p>
                </div>
            </div>
        </div>
    );
}

export default TaskList;